<div class="mb-3 row">
    <div class="col">
        {!!  Html::decode(Form::label('name' ,__('general.name') ,['class'=>'form-label']))   !!}
        {!!  Form::text('name',null,['id'=>'name','class'=>'form-control ','placeholder'=>__('general.name')]) !!}
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
