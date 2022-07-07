@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-none pt-0">
                @if(\Illuminate\Support\Facades\Auth::user()->hasRole(\App\Enum\RoleEnum::ADMIN))
                    @include('dashboard.components.general.form-list-header',['url'=>'dashboard.freelancers.create','is_create'=>true])
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        @include('dashboard.components.general.table-headings',['headings'=>\App\Enum\TableHeadings\UserManagement\FreelancerTableHeadingEnum::getTranslationKeys()])
                        <tbody>
                        @include('dashboard.freelancer-management.list')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
