<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Tenancy;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index($id)
    {
        $tenancy = Tenancy::find($id);
        $gallery = Gallery::where('tenancy_id',$tenancy->id)->get();
        return view('admin.tenancy.gallery.index',compact('gallery','tenancy'));
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
        $request->validate(['path' => 'required|image|mimes:jpeg,png,jpg',]);
        $path = 'img/imoveis/'.$request->tenancy_id.'/'.time().'.'.$request->path->extension();
        $request->path->move(public_path('img/imoveis/'.$request->tenancy_id.'/'), $path);
        $pathname_ = ['path'=>$path];
        $data = array_merge($request->all(), $pathname_);
        Gallery::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate(['path' => 'required|image|mimes:jpeg,png,jpg',]);
        $gallery = Gallery::find($request->id);
        if (file_exists($gallery->path)){ unlink($gallery->path); }
        $path = 'img/imoveis/'.$request->tenancy_id.'/'.time().'.'.$request->path->extension();
        $request->path->move(public_path('img/imoveis/'.$request->tenancy_id.'/'), $path);
        $gallery->path = $path;
        $gallery->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Gallery $gallery)
    {
        if (file_exists($gallery->path)){ unlink($gallery->path); }
        $gallery->delete();
        return back();
    }
}
