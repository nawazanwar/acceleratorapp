@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-none pt-0">
                @include('dashboard.components.general.form-list-header',['url'=>'dashboard.roles.create','is_create'=>true])
                <div class="card-body">
                    <table class="table custom-datatable table-bordered table-hover">
                        @include('dashboard.components.general.table-headings',['headings'=>\App\Enum\TableHeadings\UserManagement\RoleEnumHeading::getTranslationKeys()])
                        <tbody>
                        @include('dashboard.user-management.roles.list')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
