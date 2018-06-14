<?php

namespace App\Http\Controllers\Api;

use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use App\Models\Area;


class LocationController extends Controller
{
    public function __construct()
    {

    }

    public function countryList(Request $request)
    {
        // $lang = $request->input('lang', 'zh');
        $lang = $request->session()->get('bw.locale');
        $data = Country::select('seq', 'calling_code', 'name_'.$lang.' as name','created_at', 'updated_at', 'deleted_at')->orderBy('seq', 'asc')->get();
        return $this->response4List($data);
    }

    public function provinceList($country)
    {
        return Province::where('country', $country)->orderBy('seq', 'asc')->get();
    }

    public function cityList($province)
    {
        return City::where('province', $province)->orderBy('seq', 'asc')->get();
    }

    public function areaList($city)
    {
        return Area::where('city', $city)->orderBy('seq', 'asc')->get();
    }

    public function list(Request $request)
    {
        $input = Input::only('type', 'seq');

        $validator = Validator::make($input, [
            'type'  => 'required|in:province,city,area,country',
            'seq'  => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return $this->responseBadRequest('잘못된 요청입니다.');
        }

        $type = $request->type;
        $seq = $request->seq;

        if ($type == 'province') {
            $result = $this->provinceList($seq);
        } else if ($type == 'city') {
            $result = $this->cityList($seq);
        } else if ($type == 'area') {
            $result = $this->areaList($seq);
        }

        return $this->response4List($result);
    }

}
