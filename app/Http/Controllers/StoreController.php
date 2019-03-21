<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\EditStoreRequest;
use App\Models\Store;
use App\Repositories\Store\StoreRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{
    /**
     * @var \App\Repositories\Store\StoreRepository
     */
    private $storeRepository;

    /**
     * Instantiate a new PostController instance.
     *
     * @param \App\Repositories\Store\StoreRepository $storeRepository
     */
    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
        $this->middleware('can:create-store', ['only' => ['create','store']]);
        $this->middleware('can:update-store', ['only' => ['edit','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();

        return view('dashboard.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->get('owner_name'),
                'email' => $request->get('owner_email'),
                'password' => str_random(),
            ]);

            $user->roles()->attach(2);

            $store = $user->stores()->create([
                'name' => $request->get('store_name'),
                'email' => $request->get('store_email'),
            ]);

            $user->update([
                'store_id' => $store->id,
            ]);

            if ($request->hasFile('main_image')) {
                $store->addMediaFromRequest('main_image')
                    ->usingName($request->get('name') . ' main image')
                    ->usingFileName($store->slug . '-main-image.' . $request->file('main_image')->getClientOriginalExtension())
                    ->toMediaCollection('main-images');
            }

            if ($request->hasFile('banner_image')) {
                $store->addMediaFromRequest('banner_image')
                    ->usingName($request->get('name') . ' banner')
                    ->usingFileName($store->slug . '-banner-image.' . $request->file('banner_image')->getClientOriginalExtension())
                    ->toMediaCollection('banner-images');
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->back()->withInput(Input::all())->withError('Error occurred when creating the store');
        }


        return redirect()->route('stores.index')->withMessage('successfully created');
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
        return view('dashboard.stores.edit', compact('store'));
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

        if ($request->hasFile('main_image')) {
            ($store->getFirstMedia('main-images') !== null) ? $store->getFirstMedia('main-images')->delete() : null;

            $store->addMediaFromRequest('main_image')
                ->usingName($request->get('name') . ' main image')
                ->usingFileName($store->slug . '-main-image.' . $request->file('main_image')->getClientOriginalExtension())
                ->toMediaCollection('main-images');
        }

        if ($request->hasFile('banner_image')) {
            ($store->getFirstMedia('banner-images') !== null) ? $store->getFirstMedia('banner-images')->delete() : null;

            $store->addMediaFromRequest('banner_image')
                ->usingName($request->get('name') . ' banner')
                ->usingFileName($store->slug . '-banner-image.' . $request->file('banner_image')->getClientOriginalExtension())
                ->toMediaCollection('banner-images');
        }

        return redirect()->route('stores.index')->withMessage('successfully updated');
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
