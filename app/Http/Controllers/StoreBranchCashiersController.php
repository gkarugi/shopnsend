<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\StoreBranch;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreBranchCashiersController extends Controller
{
    /**
     * Instantiate a new PostController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:create-cashier', ['only' => ['create','store']]);
        $this->middleware('can:update-cashier', ['only' => ['edit','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Store $store
     * @param StoreBranch $branch
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store, StoreBranch $branch)
    {
        $cashiers = $branch->cashiers()->with('user')->get();

        return view('dashboard.cashiers.index', compact('cashiers','store','branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Store $store
     * @param StoreBranch $branch
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store, StoreBranch $branch)
    {
        return view('dashboard.cashiers.create', compact('store','branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $store
     * @param StoreBranch $branch
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $store, StoreBranch $branch)
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->get('name'),
                'store_id' => $store->id,
                'email' => $request->get('email'),
                'password' => str_random(),
            ]);

            $user->roles()->attach(4);

            $branch->cashiers()->create([
                'user_id' => $user->id,
            ]);
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->route('cashiers.index',['store' => $store, 'branch' => $branch])->withMessage('Cashier created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
