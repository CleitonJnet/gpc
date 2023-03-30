<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Tenancy;
use Illuminate\Http\Request;

class TenancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $houses = Tenancy::orderBy('id','DESC')->paginate(10);
        return view('admin.tenancy.index',compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $sum  = ((float)$request->rent + (float)$request->condominium + (float)$request->IPTU + (float)$request->firefighting);
        $tot_all = ['tot_all' => $sum];
        $data = $request->all();
        $result = array_merge($data, $tot_all);
        Tenancy::create($result);

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenancy  $tenancy
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Tenancy $tenancy)
    {
        $gallery = Gallery::where('tenancy_id',$tenancy->id)->get();
        return view('admin.tenancy.view',compact('tenancy','gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tenancy  $tenancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenancy $tenancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenancy  $tenancy
     * @return string
     */
    public function update(Request $request, Tenancy $tenancy)
    {
        $tot_all = ['tot_all' => $request->rent + $request->condominium + $request->IPTU + $request->firefighting];
        $data = $request->all();
        $result = array_merge($data, $tot_all);
        $tenancy->update($result);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenancy  $tenancy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tenancy $tenancy)
    {
        $tenancy->delete();
        return back();
    }
}
