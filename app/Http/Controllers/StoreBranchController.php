<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreBranchRequest;
use App\Http\Requests\EditStoreBranchRequest;
use App\Models\Store;
use App\Models\StoreBranch;

class StoreBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store)
    {
        $branches = $store->branches;

        return view('dashboard.administrator.branches.index', compact('branches', 'store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        return view('dashboard.administrator.branches.create', compact('store'));
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

        return redirect()->route('dashboard.admin.branches.index', $store)->withMessage('successfully created');
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
        return view('dashboard.administrator.branches.edit', compact('store', 'branch'));
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

        return redirect()->route('dashboard.admin.branches.index', compact('store'))->withMessage('successfully updated');
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
