@extends('layouts.dashboard')
@section('css-before')
    <link href="{{ url('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
    <link href="{{ url('plugins/clockpicker/dist/jquery-clockpicker.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-none pt-0">
                @include('components.General.form-list-header')
                <div class="card-body">
                    {!! Form::model($model, ['url' =>route('dashboard.postal-receive.update', $model->id), 'method' => 'POST','files' => true,'id' =>'postal_receive_form', 'class' => 'solid-validation']) !!}
                    @method('PUT')
                    <x-updated-by-field />
                    <x-hidden-building-id />
                    @include('dashboard.real-estate.front-desk.postal-receive.fields', ['for' => 'edit'])
                    <x-buttons :update="true" :cancel="true" cancelRoute="dashboard.postal-receive.index"/>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('inner-script-files')
    <script src="{{ url('plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ url('plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ url('plugins/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>
@endsection

@section('innerScript')
    <script>
        $(function () {
            $(".cnic-mask").inputmask("99999-9999999-9");
            initDropify();

            $('.clockpicker').clockpicker({
                placement: 'bottom',
                align: 'left',
                autoclose: true,
                'default': 'now'
            });
        });

        function initDropify() {
            $('.dropify').dropify({
                tpl: {
                    message: '<div class="dropify-message"><span class="file-icon" /></div>',
                }
            });
        }

        let doc = 1;
        let img = 1;

        function addDocumentField() {
            doc++;
            let objTo = document.getElementById('documents')
            let divDoc = document.createElement("div");
            divDoc.setAttribute("class", "form-group doc-remove-class" + doc);
            divDoc.innerHTML = '<div class="row">' +
                '<div class="col-sm-10">' +
                '<input type="file" class="form-control dropify" name="documents[]" data-height="75" data-allowed-file-extensions="doc docx pdf jpg jpeg png xlsx xls">' +
                '</div>' +
                '<div class="col-sm-2">' +
                '<button class="btn btn-danger" type="button" onclick="removeDocumentField(' + doc + ');"> <i class="fa fa-minus"></i> </button>' +
                '</div>' +
                '</div><div class="clear"></div>';

            objTo.appendChild(divDoc)
            initDropify();
        }

        function removeDocumentField(rid) {
            $('.doc-remove-class' + rid).remove();
        }
    </script>
@endsection
