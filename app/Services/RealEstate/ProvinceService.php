<?php
namespace App\Services\RealEstate;


use App\Models\RealEstate\Definition\General\Province;

class ProvinceService
{
    public static function provinceDropDown(){
        return Province::orderBy('id','ASC')->whereStatus(1)->pluck('name','id');
    }
}
