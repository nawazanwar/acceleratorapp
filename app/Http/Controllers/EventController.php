<?php

namespace App\Http\Controllers;

use App\Services\CMS\PageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(
        private PageService       $pageService,
    )
    {

    }
    public function index(Request $request): Factory|View|Application
    {
        $page = $this->pageService->findByCode('event');
        return view('website.events.index', compact('page'));
    }
}
