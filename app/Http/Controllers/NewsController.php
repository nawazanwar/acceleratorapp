<?php

namespace App\Http\Controllers;

use App\Services\CMS\BlogService;
use App\Services\CMS\PageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct(
        private PageService       $pageService,
        private BlogService $blogService
    )
    {

    }
    public function index(Request $request): Factory|View|Application
    {
        $page = $this->pageService->findByCode('news');
        $newses = $this->blogService->listByPagination();
        return view('website.news.index', compact('page','newses'));
    }
}
