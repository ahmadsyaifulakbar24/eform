<?php

namespace App\Http\Controllers\API\Param;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Param\ParamResource;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParamController extends Controller
{
    public function get_business_activity(Request $request)
    {
        return $this->param($request, 'business_activity', 'success get business activity data');
    }

    public function get_business_fields(Request $request)
    {
        return $this->param($request, 'business_fields', 'success get business fields data');
    }

    public function get_business_type(Request $request)
    {
        return $this->param($request, 'business_type', 'success get business type data');
    }

    public function get_image_plut(Request $request)
    {
        return $this->param($request, 'image_plut', 'success get image plut data');
    }

    public function get_industry(Request $request)
    {
        return $this->param($request, 'industry', 'success get industry data');
    }

    public function param ($request, $category, $message) {
        $request->validate([
            'id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) use ($category) {
                    return $query->where('category', $category);
                })
            ]
        ]);

        if($request->id){
            $param = Param::find($request->id);
            return ResponseFormatter::success(new ParamResource($param), $message);
        } else {
            $param = Param::where('category', $category)->orderBy('order', 'asc')->get();
            return ResponseFormatter::success(ParamResource::collection($param), $message);
        }
    }
}
