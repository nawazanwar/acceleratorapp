<?php
namespace App\Services\RealEstate;

use App\Models\RealEstate\Definition\General\Tehsil;

class TehsilService
{
    public static function tehsilDropDown(){
        return Tehsil::orderBy('id','ASC')->whereStatus(1)->pluck('name','id');
    }
}
