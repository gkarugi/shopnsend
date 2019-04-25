<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreBranchRequest;
use App\Http\Requests\EditStoreBranchRequest;
use App\Models\Store;
use App\Models\StoreBranch;
use Freshbitsweb\Laratables\Laratables;

class StoreBranchController extends Controller
{
    /**
     * Instantiate a new PostController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:create-branch', ['only' => ['create','store']]);
        $this->middleware('can:update-branch', ['only' => ['edit','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store)
    {
        $branches = $store->branches;

        return view('dashboard.branches.index', compact('branches', 'store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        return view('dashboard.branches.create', compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateStoreBranchRequest $request
     * @param  \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoreBranchRequest $request, Store $store)
    {
        $store->branches()->create([
            'name' => $request->get('branch_name'),
        ]);

        return redirect()->route('branches.index', $store)->withMessage('successfully created');
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
     * @param  \App\Models\Store $store
     * @param  \App\Models\StoreBranch $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store, StoreBranch $branch)
    {
        return view('dashboard.branches.edit', compact('store', 'branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditStoreBranchRequest  $request
     * @param  \App\Models\Store  $store
     * @param  \App\Models\StoreBranch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(EditStoreBranchRequest $request, Store $store, StoreBranch $branch)
    {
        $branch->update([
            'name' => $request->get('branch_name')
        ]);

        return redirect()->route('branches.index', compact('store'))->withMessage('successfully updated');
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
