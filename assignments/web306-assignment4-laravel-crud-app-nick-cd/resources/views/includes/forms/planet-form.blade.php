<div class="row">
  <div class="col-md-12">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', $planet ? $planet->name : null, ['class' => 'form-control']) }}
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    {{ Form::label('distance_from_sun', 'Distance from Sun (AU):') }}
    {{ Form::text('distance_from_sun', $planet ? $planet->distance_from_sun : null, ['class' => 'form-control']) }}
  </div>

  <div class="col-md-6">
    {{ Form::label('avg_temp', 'Average Temperature (°C):') }}
    {{ Form::text('avg_temp', $planet ? $planet->avg_temp : null, ['class' => 'form-control']) }}
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    {{ Form::label('planet_type', 'Planet Type: ') }}
    {{ Form::select('planet_type', ['T' => 'Terrestrial', 'J' => 'Jovian'], $planet ? $planet->planet_type : null, ['placeholder' => 'Planet Type ...']) }}
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
@endif

<div class="row">
  {{ Form::reset('Reset Form', ['class' => 'btn btn-primary pull-left']) }}
  {{ Form::submit($title, ['class' => 'btn btn-primary pull-right']) }}
</div>
