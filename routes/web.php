<?php

use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\RealEstate\BuildingUnits\BuildingsController;
use App\Http\Controllers\RealEstate\BuildingUnits\FlatController;
use App\Http\Controllers\RealEstate\BuildingUnits\FloorController;
use App\Http\Controllers\RealEstate\Definition\ColonyController;
use App\Http\Controllers\RealEstate\Definition\CommodityTypeController;
use App\Http\Controllers\RealEstate\Definition\CountryController;
use App\Http\Controllers\RealEstate\Definition\DistrictController;
use App\Http\Controllers\RealEstate\Definition\ProvinceController;
use App\Http\Controllers\RealEstate\Definition\TehsilController;
use App\Http\Controllers\RealEstate\GeneralController;
use App\Http\Controllers\RealEstate\HumanResource\HumanResourceController;
use App\Http\Controllers\RealEstate\ListController;
use App\Http\Controllers\RealEstate\Sales\InstallmentPlanController;
use App\Http\Controllers\RealEstate\Sales\SalesController;
use App\Http\Controllers\Website\PricingPlanController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/', 'as' => 'website.'], function () {
    Route::get('', [\App\Http\Controllers\Website\HomeController::class, 'index'])
        ->name('index');

    Route::resource('pricing-plans', PricingPlanController::class, ['names' => 'pricing-plans']);


    require __DIR__ . '/auth.php';
});
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('index');
    Route::post('/change-building', [BuildingsController::class, 'changeBuilding'])->name('change-building');
    Route::get('/search-flat', [FlatController::class, 'searchFlat'])->name('search-flat');
    Route::post('get-provinces-of-country', [CountryController::class, 'getProvincesOfCountry'])->name('get.provinces-by-country');
    Route::post('get-districts-of-province', [ProvinceController::class, 'getDistrictsOfProvince'])->name('get.districts-by-province');
    Route::post('get-tehsils-of-district', [DistrictController::class, 'getTehsilsOfDistrict'])->name('get.tehsils-by-district');
    Route::post('get-colonies-by-tehsil', [TehsilController::class, 'getColoniesOfTehsil'])->name('get.colonies-by-tehsil');
    Route::post('get-address-by-colony', [ColonyController::class, 'getAddressOfColony'])->name('get.address-by-colony');
    Route::post('get-hr-details', [HumanResourceController::class, 'getHrDetails'])->name('get.hr-details');
    Route::post('get-hr-details-for-employee', [HumanResourceController::class, 'getHrDetailsForEmployee'])->name('get.hr-details-for-employee');
    Route::post('hr-picker', [HumanResourceController::class, 'HrPickerTable'])->name('hr-picker');
    Route::post('get-floors-of-building', [BuildingsController::class, 'getFloorsOfBuilding'])->name('get.floors-of-building');
    Route::post('get-flats-of-floor', [FloorController::class, 'getFlatsOfFloor'])->name('get.flats-of-floor');
    Route::post('get-floor-details', [FloorController::class, 'getFloorDetails'])->name('get.floor-details');
    Route::post('get-flat-details', [FlatController::class, 'getFlatDetails'])->name('get.flat-details');
    Route::post('get-flat-owners', [FlatController::class, 'getFlatOwners'])->name('get.flat-owners');
    Route::post('get-sales-payment-sub-types', [GeneralController::class, 'getPaymentSubTypes'])->name('get.sales-payment-sub-types');
    Route::post('get-commodity-sub-types', [CommodityTypeController::class, 'getCommoditySubTypes'])->name('get.commodity-sub-types');
    Route::post('dashboard-data-ajax', [HomeController::class, 'dashboardDataAjax'])->name('dashboard.data.ajax');
    Route::post('get-installment-plan-details', [InstallmentPlanController::class, 'getInstallmentPlanDetails'])->name('get.installment-plan-details');
    Route::post('get-sales-payment-view', [SalesController::class, 'getPaymentTypeView'])->name('get.sales-payment-view');
    Route::post('get-sales-commodity-view', [SalesController::class, 'getCommodityTypeView'])->name('get.sales-commodity-view');
    Route::post('get-flat-revisions', [FlatController::class, 'getFlatRevisions'])->name('get.flat-revisions');
    Route::post('get-flat-object', [FlatController::class, 'getFlatObject'])->name('get.flat-object');
    Route::get('nav-search', [GeneralController::class, 'navSearch'])->name('nav-search');
    Route::get('/brokers-list', [ListController::class, 'brokerList'])->name('brokers-list');
    Route::get('/sellers-list', [ListController::class, 'sellerList'])->name('sellers-list');
    Route::get('/buyers-list', [ListController::class, 'buyerList'])->name('buyers-list');
    require __DIR__ . '/real-estate/definition/definition.php';
    require __DIR__ . '/real-estate/definition/service.php';
    require __DIR__ . '/accounts.php';
    require __DIR__ . '/payroll.php';
    require __DIR__ . '/real-estate/device.php';
    require __DIR__ . '/real-estate/authorization.php';
    require __DIR__ . '/real-estate/human-resource.php';
    require __DIR__ . '/real-estate/building-units.php';
    require __DIR__ . '/real-estate/sales.php';
    require __DIR__ . '/real-estate/print.php';
    require __DIR__ . '/real-estate/settings.php';
    require __DIR__ . '/real-estate/front-desk.php';
    require __DIR__ . '/real-estate/fixed-assets.php';
    require __DIR__ . '/plan.php';
});
