@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-none pt-0">
                @if(\Illuminate\Support\Facades\Auth::user()->hasRole(\App\Enum\RoleEnum::BUSINESS_ACCELERATOR))
                    @include('dashboard.components.general.form-list-header',['url'=>'dashboard.floor-types.create','is_create'=>true])
                @endif
                <div class="card-body">
                    <table class="table custom-datatable table-bordered table-hover">
                        @include('dashboard.components.general.table-headings',['headings'=>\App\Enum\TableHeadings\FloorTypeTableHeadingEnum::getTranslationKeys()])
                        <tbody>
                        @include('dashboard.working-spaces.floor-types.list')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
