<?php

namespace App\Http\Controllers\API\Region;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Region\CityResource;
use App\Http\Resources\Region\ProvinceResource;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegionController extends Controller
{
    public function province(Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:provinces,id']
        ]);

        if($request->id) {
            $province = Province::find($request->id);
            return ResponseFormatter::success(new ProvinceResource($province), 'success get province data');
        }

        $province = Province::all();
        return ResponseFormatter::success(ProvinceResource::collection($province), 'success get province data');
    }

    public function city(Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:cities,id'],
            'province_id' => [
                Rule::requiredIf(empty($request->id)),
                'exists:provinces,id'
            ]
        ]);

        if($request->id) {
            $city = City::find($request->id);
            return ResponseFormatter::success(new CityResource($city), 'success get city data');
        }

        $city = City::where('province_id', $request->province_id);
        return ResponseFormatter::success(CityResource::collection($city->get()), 'success get city data');
    }
}
