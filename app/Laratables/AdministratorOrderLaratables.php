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
        return ['number', 'currency', 'fee', 'receiver_name', 'receiver_phone', 'paid'];
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
