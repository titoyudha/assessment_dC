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
       $provinces = DB::table('reg_provinces')->select('*')->get();

       dd($provinces);

        return view('region_dropdown', ['provinces' => $provinces]);
    }

    public function getRegencies()
    {
        $regencies = DB::table('reg_regencies')->select('*')->get();

        return view('region_dropdown', ['regencies' => $regencies]);
    }

    public function getDistricts()
    {
       $districts = DB::table('reg_districts')->select('*')->get();

        return view('region_dropdown',['districts' => $districts]);
    }

    public function getVillages()
    {
        $villages = DB::table('reg_village')->select('*')->get();

        return view('region_dropdown', ['villages' => $villages]);
    }
}
