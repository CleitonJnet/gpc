<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Gallery;
use App\Mail\SendMailContact;
use App\Mail\SendMailInterested;
use App\Tenancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function index()
    {
        $size = '0-999999999';
        $type_rent = null;
        $tot_all_max = 10000;
        $tot_all_min = 0;
        $rooms = null;
        $park = null;
        $neighborhood = null;
        $city = null;

        $rants = Tenancy::inRandomOrder()->limit(3)->get();

        $comments = Comment::inRandomOrder()->limit(5)->get();

        return view('index',compact('rants','tot_all_max','tot_all_min','type_rent','rooms','park','neighborhood','city','size','comments'));
    }

    public function about()
    {
        return view('about');
    }

    public function tenancy_about()
    {
        return view('tenancy');
    }

    public function tenancy_view($id)
    {
        $tenancy = Tenancy::find($id);
        $gallery = Gallery::where('tenancy_id',$tenancy->id)->get();
        $alert = 0;
        return view('tenancy_view',compact('tenancy','gallery','alert'));
    }

    public function tenancy_list()
    {
        $size = '0-999999999';
        $type_rent = null;
        $tot_all_max = 10000;
        $tot_all_min = 0;
        $rooms = null;
        $park = null;
        $neighborhood = null;
        $city = null;

        $rants = Tenancy::paginate(6);
        $tot_house = Tenancy::count();
        return view('tenancy_list', compact('rants','tot_all_max','tot_all_min','type_rent','rooms','park','size','neighborhood','city','tot_house'));
    }

    public function tenancy_filter(Request $request)
    {
        $tot_all_min = $request->tot_all_min;
        $tot_all_max = $request->tot_all_max;

        $type_rent_ = explode('-',$request->type_rent);
        $rooms_ = explode('-',$request->rooms);
        $park_ = explode('-',$request->park);
        $size_ = explode('-',$request->size);
        $neighborhood_ = explode('-',$request->neighborhood);
        $city_ = explode('-',$request->city);

        $type_rent = $request->type_rent;
        $rooms = $request->rooms;
        $park = $request->park;
        $size = $request->size;
        $neighborhood = $request->neighborhood;
        $city = $request->city;

        $rants = DB::table('tenancies')
            ->whereBetween('type_rent',[$type_rent_[0],$type_rent_[1]])
            ->whereBetween('rooms',[$rooms_[0],$rooms_[1]])
            ->whereBetween('park',[$park_[0],$park_[1]])
            ->whereBetween('tot_all',[$request->tot_all_min,$request->tot_all_max])
            ->whereBetween('size',[$size_[0],$size_[1]])
            ->whereIn('neighborhood',$neighborhood_)
            ->whereIn('city',$city_)
            ->paginate(6);

        $tot_house = DB::table('tenancies')
            ->whereBetween('type_rent',[$type_rent_[0],$type_rent_[1]])
            ->whereBetween('rooms',[$rooms_[0],$rooms_[1]])
            ->whereBetween('park',[$park_[0],$park_[1]])
            ->whereBetween('tot_all',[$request->tot_all_min,$request->tot_all_max])
            ->whereBetween('size',[$size_[0],$size_[1]])
            ->whereIn('neighborhood',$neighborhood_)
            ->whereIn('city',$city_)
            ->count();
        return view('tenancy_filter',compact('rants','tot_all_max','tot_all_min','type_rent','rooms','park','size','neighborhood','city','tot_house'));
    }

    public function sale()
    {
        return view('sale');
    }

    public function condominium()
    {
        return view('condominium');
    }

    public function contact()
    {
        $alert = 0;
        return view('contact',compact('alert'));
    }

    public function contactMail(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $msg = $request->msg;

        Mail::send(new SendMailContact($name, $phone, $email,$msg));
        $alert = 1;
        return view('contact',compact('alert'));
    }

    public function interested(Request $request){
        $tenancy = Tenancy::find($request->id);
        $gallery = Gallery::where('tenancy_id',$tenancy->id)->get();
        $alert = 1;

        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $url = route('tenancy_view',$request->id);
        Mail::send(new SendMailInterested($name, $phone, $email,$url));

        return view('tenancy_view',compact('tenancy','gallery','alert'));
    }
}
