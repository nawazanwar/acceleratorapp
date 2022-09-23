<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id): Factory|View|Application
    {
        $user = User::find($id);
        $params = [
            'pageTitle' => __('general.edit') . " " . ucwords($user->getFullName()),
            'model' => $user
        ];
        return view('dashboard.user-management.users.edit', $params);
    }
}
