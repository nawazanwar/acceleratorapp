@extends('layouts.dashboard')
@section('css-before')
    @include('includes.datatable-css')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-none pt-0">
                @include('components.General.form-list-header')
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="datatable">
                        @include('components.General.table-headings-simple',['headings'=>\App\Enum\TableHeadings\RealEstate\SellersList::getTranslationKeys()])
                        <tbody>
                        @include('dashboard.real-estate.lists.components.seller-list')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('inner-script-files')
    @include('includes.datatable-js')
@endsection
@section('innerScript')
    @include('includes.datatable-general-init', ['table' => 'datatable'])
@endsection
