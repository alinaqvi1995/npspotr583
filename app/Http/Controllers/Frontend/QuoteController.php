<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return view('site.quote.index');
    }
    public function car()
    {
        return view('site.quote.car');
    }

    public function motorcycle()
    {
        return view('site.quote.motorcycle');
    }

    public function golf_cart()
    {
        return view('site.quote.golf_cart');
    }

    public function atv_utv()
    {
        return view('site.quote.atv_utv');
    }

    public function boat()
    {
        return view('site.quote.boat');
    }

    public function heavyEquipment()
    {
        return view('site.quote.heavyEquipment');
    }

    public function freight()
    {
        return view('site.quote.freight');
    }

    public function roro()
    {
        return view('site.quote.roro');
    }

    public function recreationalVehicle()
    {
        return view('site.quote.rv');
    }

    public function quoteForm()
    {
        return view('site.quote.quote_form');
    }

    public function commercialTruck()
    {
        return view('site.quote.commercial_truck');
    }

    public function constructionTransport()
    {
        return view('site.quote.construction_transport');
    }

    public function excavator()
    {
        return view('site.quote.excavator');
    }

    public function farmTransport()
    {
        return view('site.quote.farm_transport');
    }

    public function rvTransport()
    {
        return view('site.quote.rv_transport');
    }

}
