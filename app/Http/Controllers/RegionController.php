<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regencies;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;


class RegionController extends Controller
{
    public function getProvinces()
    {
        $provinces = DB::table('reg_provinces')->get();

        return view('region_dropdown')->with('provinces', $provinces);
    }

    public function getRegencies()
    {
        $regencies = Regencies::all("name")
        ->select('id', 'name')
        ->get();

        return new JsonResponse($regencies);
    }

    public function getDistricts()
    {
        $districts = District::all("name")
        ->select('id', 'name')
        ->get();

        return new JsonResponse($districts);
    }

    public function getVillages()
    {
        $villages = Village::orderBy("name")
        ->select('id', 'name')
        ->get();

        return new JsonResponse($villages);
    }
}
