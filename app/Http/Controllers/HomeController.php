<?php

namespace App\Http\Controllers;

use App\Services\BuildingService;
use App\Services\FlatService;
use App\Services\FloorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class HomeController extends Controller
{
    public function __construct(
        private BuildingService $buildingService,
        private FloorService    $floorService,
        private FlatService     $flatService
    ){
    }
    public function index(Request $request): View|Factory|Redirector|Application|RedirectResponse
    {
        $pageTitle = __('general.website');
        return view('website.index', compact('pageTitle'));
    }
    public function getCoWorkingSpaces(): Factory|View|Application
    {
        return \view('website.working-spaces');
    }
    public function getFreelancers(): Factory|View|Application
    {
        return \view('website.freelancers');
    }
    public function getInvestors(): Factory|View|Application
    {
        return \view('website.investors');
    }
}
