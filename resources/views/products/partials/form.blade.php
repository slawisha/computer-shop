<!-- Number form input -->
<div class="form-group">
    {!!Form::label('number', 'Number:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>
<!-- Name form input -->
<div class="form-group">
    {!!Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Manufacturer form input -->
<div class="form-group">
    {!!Form::label('manufacturer_id', 'Manufacturer:') !!}
    {!! Form::select('manufacturer_id', $manufacturers, null, ['class' => 'form-control']) !!}
</div>
<!-- Model form input -->
<div class="form-group">
    {!!Form::label('model', 'Model:') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
</div>
<!-- Category form input -->
<div class="form-group">
    {!!Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>
<!-- Price form input -->
<div class="form-group">
    {!!Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>
<!-- Processor form input -->
<div class="form-group">
    {!!Form::label('processor', 'Processor:') !!}
    {!! Form::text('processor', null, ['class' => 'form-control']) !!}
</div>
<!-- Memory form input -->
<div class="form-group">
    {!!Form::label('memory', 'Memory:') !!}
    {!! Form::text('memory', null, ['class' => 'form-control']) !!}
</div>
<!-- Hdd form input -->
<div class="form-group">
    {!!Form::label('hdd', 'Hdd:') !!}
    {!! Form::text('hdd', null, ['class' => 'form-control']) !!}
</div>
<!-- Graphics form input -->
<div class="form-group">
    {!!Form::label('graphics', 'Graphics:') !!}
    {!! Form::text('graphics', null, ['class' => 'form-control']) !!}
</div>
<!-- Screen form input -->
<div class="form-group">
    {!!Form::label('screen', 'Screen:') !!}
    {!! Form::text('screen', null, ['class' => 'form-control']) !!}
</div>
<!-- Optical form input -->
<div class="form-group">
    {!!Form::label('optical', 'Optical:') !!}
    {!! Form::text('optical', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('images', 'Images:') !!}
    {!! Form::file('images[]', ['class' => 'form-control', 'multiple' => '']) !!}
</div>
<!-- Submit form input -->
<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>