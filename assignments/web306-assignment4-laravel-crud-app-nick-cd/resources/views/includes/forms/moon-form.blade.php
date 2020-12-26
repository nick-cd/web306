<div class="row">
  <div class="col-md-12">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', $name ?? null, ['class' => 'form-control']) }}
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    {{ Form::label('planet_id', 'Belongs to Planet: ') }}
    {{ Form::select('planet_id', $planets, $planet_id ?? "", ['placeholder' => 'Select a Planet ...']) }}
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    {{ Form::label('image', 'Image:') }}
    {{ Form::file('image', ['class' => 'form-control']) }}
  </div>
</div>

@isset($old_image)
  {{ Form::hidden('old_image', $old_image) }}
@endisset

<div class="row">
  {{ Form::reset('Reset Form', ['class' => 'btn btn-primary pull-left']) }}
  {{ Form::submit($title, ['class' => 'btn btn-primary pull-right']) }}
</div>
