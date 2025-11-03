<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaerahController extends Controller
{
    public function provinces()
    {
        return \Indonesia::allProvinces();
    }

    public function cities(Request $request)
    {
        return \Indonesia::findProvince($request->id, ['cities'])->cities->pluck('name', 'id');
    }

    public function cities_all()
    {
        return \Indonesia::allCities();
    }

    public function districts(Request $request)
    {
        return \Indonesia::findCity($request->id, ['districts'])->districts->pluck('name', 'id');
    }

    public function districts_all()
    {
        return \Indonesia::allDistricts();
    }

    public function villages_all()
    {
        return \Indonesia::allVillages();
    }

    public function villages(Request $request)
    {
        return \Indonesia::findDistrict($request->id, ['villages'])->villages->pluck('name', 'id');
    }

}
