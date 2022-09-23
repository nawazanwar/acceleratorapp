<?php

namespace App\Http\Controllers;

use App\Enum\AccessTypeEnum;
use App\Enum\StartUpForEnum;
use App\Enum\StartUpTypeEnum;
use App\Models\Package;
use App\Services\CMS\PageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct(
        private PageService       $pageService,
    )
    {

    }
    public function index(Request $request, $plan_for, $plan_type = null): Factory|View|Application
    {
        $page = $this->pageService->findByCode('plan');
        $records = null;
        if ($plan_for==StartUpForEnum::BA && $plan_type==StartUpTypeEnum::INDIVIDUAL){
            $records = Package::where('package_type',AccessTypeEnum::BUSINESS_ACCELERATOR_INDIVIDUAL);
        }else  if ($plan_for==StartUpForEnum::BA && $plan_type==StartUpTypeEnum::COMPANY){
            $records = Package::where('package_type',AccessTypeEnum::BUSINESS_ACCELERATOR);
        }else  if ($plan_for==StartUpForEnum::FREELANCER && $plan_type==StartUpTypeEnum::COMPANY){
            $records = Package::where('package_type',AccessTypeEnum::SERVICE_PROVIDER_COMPANY);
        }else  if ($plan_for==StartUpForEnum::FREELANCER && $plan_type==StartUpTypeEnum::INDIVIDUAL){
            $records = Package::where('package_type',AccessTypeEnum::FREELANCER);
        }else  if ($plan_for==StartUpForEnum::MENTOR ){
            $records = Package::where('package_type',AccessTypeEnum::MENTOR);
        }
        $records = $records->paginate(20);
        return view('website.plans.index', compact('page', 'records', 'plan_for', 'plan_type'));
    }
}
