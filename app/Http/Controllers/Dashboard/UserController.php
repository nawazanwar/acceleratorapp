<?php

namespace App\Http\Controllers\Dashboard;

use App\Enum\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\BA;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $model = null;
        if ($user->hasRole(RoleEnum::BUSINESS_ACCELERATOR)) {
            $model = $user->ba;
        } else if ($user->hasRole(RoleEnum::FREELANCER)) {
            $model = $user->freelancer;
        } else if ($user->hasRole(RoleEnum::MENTOR)) {
            $model = $user->mentor;
        } else if ($user->hasRole(RoleEnum::CUSTOMER)) {
            $model = $user->customer;
        }
        $model->update([
            'map_address' => $request->input('map_address', null),
            'map_latitude' => $request->input('map_latitude', null),
            'map_longitude' => $request->input('map_longitude', null),
            'about_us' => $request->input('about_us', null),
            'instagram' => $request->input('instagram', null),
            'facebook' => $request->input('facebook', null),
            'twitter' => $request->input('twitter', null),
            'youtube' => $request->input('youtube', null),
            'linkedIn' => $request->input('linkedIn', null),
            'whatsapp' => $request->input('whatsapp', null),
           /* 'office_start_time' => $request->input('office_start_time', null),
            'office_end_time' => $request->input('office_end_time', null),*/
        ]);
        return redirect()->back()
            ->with('success', __('general.record_updated_successfully'));
    }
}
