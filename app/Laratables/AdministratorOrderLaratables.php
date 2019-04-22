<?php
namespace App\Laratables;

class AdministratorOrderLaratables
{
    /**
     * Returns formatted fee for the datatables.
     *
     * @return string
     */
    public static function laratablesCustomFee($order)
    {
        return $order->currency . ' ' . $order->fee;
    }

    /**
     * Returns buyer full name for the datatables.
     *
     * @return string
     */
    public static function laratablesCustomBuyerName($order)
    {
        return $order->first_name . ' ' . $order->last_name;
    }

    /**
     * Returns receiver full name for the datatables.
     *
     * @return string
     */
    public static function laratablesCustomReceiverName($order)
    {
        return $order->receiver_first_name . ' ' . $order->receiver_last_name;
    }

    /**
     * Returns returns total order amount for the datatables.
     *
     * @return string
     */
    public static function laratablesCustomAmount($order)
    {
        $orderItemsSum = $order->orderItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        return $order->currency . ' ' . $orderItemsSum;
    }

    /**
     * Returns total order amount plus fee for the datatables.
     *
     * @return string
     */
    public static function laratablesCustomAmountPayable($order)
    {
        $orderItemsSum = $order->orderItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        $total = $orderItemsSum + $order->fee;

        return $order->currency . ' ' . $total;
    }

    /**
     * Additional columns to be loaded for datatables.
     *
     * @return array
     */
    public static function laratablesAdditionalColumns()
    {
        return ['currency', 'fee', 'first_name', 'last_name', 'receiver_first_name', 'receiver_last_name', 'paid'];
    }

    public static function laratablesCustomAction($order)
    {
        return view('dashboard.administrator.orders.index_action', compact('order'))->render();
    }

    /**
     * Returns string status from boolean paid status for the datatables.
     *
     * @return string
     */
    public static function laratablesCustomPaid($order)
    {
        return view('dashboard.administrator.orders.index_status', compact('order'))->render();
    }
}
