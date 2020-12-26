@extends('layouts.base')

@section('navigation')
  @include('includes/nav/btn-main')
  <a class="col-md-2 btn btn-success" href="/planet/add">Add Another Planet</a>
@endsection

@section('content')
  <div class="row">
    <h2 class="col-md-offset-5">
      Content
    </h2>
  </div>
  <div class="row">
    <h3 class="col-md-offset-4">
      Planet Type:
      @switch($planet->planet_type)
        @case('T')
          Terrestrial
          @break
        @case('J')
          Jovian
          @break
        @default
          'Unknown'
      @endswitch
    </h3>
  </div>
  <div class="row">
    <h3 class="col-md-offset-4">
      Distance From Sun: {{ $planet->distance_from_sun }}AU
    </h3>
  </div>
  <div class="row">
    <h3 class="col-md-offset-4">
      Average Temperature: {{ $planet->avg_temp }}°C
    </h3>
  </div>
  <div class="row">
    <h4 class="col-md-offset-4">
      Image:
    </h4>
    <div class="col-md-offset-4">
      <img src="data:{{ $planet->img_type }};base64,{{ $planet->image }}" alt="Image of {{ $planet->name }}" />
    </div>
  </div>
  <div class="row">
    <a class="col-md-offset-5 col-md-1 btn btn-primary" href="/moon/add?for_planet_id={{ $planet->id }}">
      Add Moon
    </a>
  </div>
  <div class="row">
    @include('includes/crud/crud-btn', ['model_type' => 'planet', 'name' => $planet->name, 'id' => $planet->id])
  </div>
  @unless($moons->isEmpty())
    <div class="row">
      <h2 class="col-md-offset-4">
        {{ $planet->name }}&#39;s Moon(s)
      </h2>
    </div>
    @foreach($moons as $moon)
      <div class="row">
        <h3 class="col-md-offset-3">
          Name: {{ $moon->name }}
        </h3>
      </div>
      <div class="row">
        <h4 class="col-md-offset-3">
          Image:
        </h4>
        <div class="col-md-offset-4">
          <img src="data:{{ $moon->img_type }};base64,{{ $moon->image }}" alt="Image of {{ $moon->name }}" />
        </div>
      </div>
      <div class="row">
        @include('includes/crud/crud-btn', ['model_type' => 'moon', 'name' => $moon->name, 'id' => $moon->id])
      </div>
      <hr />
    @endforeach
  @endunless
@endsection
