<?php

namespace App\Http\Controllers\RealEstate;

use App\Enum\TableEnum;
use App\Http\Controllers\Controller;
use App\Models\Accounts\AccountHead;
use App\Models\RealEstate\Broker;
use App\Models\RealEstate\FlatOwner;
use App\Services\RealEstate\BuildingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function brokerList() {
        $brokers = Broker::whereBuildingId(BuildingService::getBuildingId())->with('Hr')->get();

        $params = [
            'pageTitle' => __('general.brokers_list'),
            'records' => $brokers,
        ];
        return view('dashboard.real-estate.lists.broker', $params);
    }

    public function sellerList() {
        $soldFlatOwnersQuery = DB::Table('flat_owners')
            ->where('flat_owners.building_id', BuildingService::getBuildingId())
            ->where('flat_owners.status', 1)->whereNotNull('flat_owners.sale_id')
            ->join('hrs as hr', 'hr.id', '=', 'flat_owners.hr_id')
            ->select('hr.first_name', 'hr.middle_name', 'hr.last_name', 'hr.cnic', 'hr.id', 'hr.cell_1', 'hr.hr_no' )
            ->groupBy('hr.first_name', 'hr.middle_name', 'hr.last_name', 'hr.cnic', 'hr.id', 'hr.cell_1', 'hr.hr_no');

        $soldFlatOwners = FlatOwner::whereBuildingId(BuildingService::getBuildingId())
            ->where('status', 1)->whereNotNull('sale_id')->pluck('id');

        $freeFlatOwnersQuery =  DB::Table(TableEnum::FLAT_OWNERS)
            ->where('flat_owners.building_id', BuildingService::getBuildingId())
            ->where('flat_owners.status', 1)->whereNull('flat_owners.sale_id')
            ->whereNotIn('flat_owners.id', $soldFlatOwners)
            ->join('hrs as hr', 'hr.id', '=', 'flat_owners.hr_id')
            ->select('hr.first_name', 'hr.middle_name', 'hr.last_name', 'hr.cnic', 'hr.id', 'hr.cell_1', 'hr.hr_no' )
            ->groupBy('hr.first_name', 'hr.middle_name', 'hr.last_name', 'hr.cnic', 'hr.id', 'hr.cell_1', 'hr.hr_no')
            ->union($soldFlatOwnersQuery)
            ->get();
//        dd($freeFlatOwnersQuery);

        $params = [
            'pageTitle' => __('general.sellers_list'),
            'records' => $freeFlatOwnersQuery,
        ];
        return view('dashboard.real-estate.lists.seller', $params);
    }

    public function buyerList() {
        $soldFlatBuyerQuery = DB::Table('flat_owners')
            ->where('flat_owners.building_id', BuildingService::getBuildingId())
            ->where('flat_owners.status', 0)->whereNotNull('flat_owners.sale_id')
            ->join('hrs as hr', 'hr.id', '=', 'flat_owners.hr_id')
            ->select('hr.first_name', 'hr.middle_name', 'hr.last_name', 'hr.cnic', 'hr.id', 'hr.cell_1', 'hr.hr_no' )
            ->groupBy('hr.first_name', 'hr.middle_name', 'hr.last_name', 'hr.cnic', 'hr.id', 'hr.cell_1', 'hr.hr_no');

        $soldFlatBuyers = FlatOwner::whereBuildingId(BuildingService::getBuildingId())
            ->where('status', 0)->whereNotNull('sale_id')->pluck('id');

        $freeFlatBuyersQuery =  DB::Table(TableEnum::FLAT_OWNERS)
            ->where('flat_owners.building_id', BuildingService::getBuildingId())
            ->where('flat_owners.status', 0)->whereNull('flat_owners.sale_id')
            ->whereNotIn('flat_owners.id', $soldFlatBuyers)
            ->join('hrs as hr', 'hr.id', '=', 'flat_owners.hr_id')
            ->select('hr.first_name', 'hr.middle_name', 'hr.last_name', 'hr.cnic', 'hr.id', 'hr.cell_1', 'hr.hr_no' )
            ->groupBy('hr.first_name', 'hr.middle_name', 'hr.last_name', 'hr.cnic', 'hr.id', 'hr.cell_1', 'hr.hr_no')
            ->union($soldFlatBuyerQuery)
            ->get();
//        dd($freeFlatOwnersQuery);

        $params = [
            'pageTitle' => __('general.buyers_list'),
            'records' => $freeFlatBuyersQuery,
        ];
        return view('dashboard.real-estate.lists.buyer', $params);
    }

}
