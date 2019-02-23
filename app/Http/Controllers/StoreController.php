<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\EditStoreRequest;
use App\Models\Store;
use App\Repositories\Store\StoreRepository;
use App\User;

class StoreController extends Controller
{
    /**
     * @var \App\Repositories\Store\StoreRepository
     */
    private $storeRepository;

    /**
     * StoreController constructor.
     *
     * @param \App\Repositories\Store\StoreRepository $storeRepository
     */
    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();

        return view('dashboard.administrator.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.administrator.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->get('owner_name'),
            'email' => $request->get('owner_email'),
            'password' => str_random(),
        ]);

        $user->roles()->attach(2);

        $user->stores()->create([
            'name' => $request->get('store_name'),
        ]);

        return redirect()->route('dashboard.admin.stores.index')->withMessage('successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('dashboard.administrator.stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditStoreRequest  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(EditStoreRequest $request, Store $store)
    {
        $store->update([
            'name' => $request->get('store_name')
        ]);

        return redirect()->route('dashboard.admin.stores.index')->withMessage('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
