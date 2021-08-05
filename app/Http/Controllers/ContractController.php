<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Provider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::all();
        return view('pages.contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $providers = Provider::all();
        return view('pages.contracts.create', compact('products', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContractRequest $request)
    {
        $contract = new Contract($request->validated());
        $contract->provider_id = request()->get('provider_id');
        $contract->save();
        $contract->products()->sync(request('products'));
        return redirect()->route('contracts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        return view('pages.contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        $providers = Provider::all();
        $products = Product::all();
        $selected_products = [];
        foreach ($contract->products as $sel_prod)
        {
            array_push($selected_products, $sel_prod->id);
        }
        return view('pages.contracts.edit', compact('contract', 'providers', 'products', 'selected_products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->update($request->validated());
        $contract->save();
        $contract->products()->sync(request('products'));
        return redirect()->route('contracts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return back();
    }

    public function onlyTrashedContracts()
    {
        $contracts = Contract::onlyTrashed()->whereNotNull('deleted_at')->get();
        return view('pages.contracts.trashed', compact('contracts'));
    }

    public function restoreContracts(Request $request, $id)
    {
        Contract::onlyTrashed()->find($id)->restore();
        return redirect()->route('trashed_contracts');
    }

    public function permanentlyDeleteContracts(Request $request, $id)
    {
        Contract::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('trashed_contracts');
    }
}
