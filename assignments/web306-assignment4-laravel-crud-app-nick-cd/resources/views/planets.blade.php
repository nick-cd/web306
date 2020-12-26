@extends('layouts.base')

@section('navigation')
  <div class="row">
    <a class="col-md-2 col-md-offset-3 btn btn-success" href="{{ url('/planet/add') }}">
      Add Planet
    </a>

  @unless($planets->isEmpty())
    <a class="col-md-2 btn btn-success" href="{{ url('/moon/add') }}">
      Add Moon
    </a>
  @endif
  </div>
  @if($planets->isEmpty())
    <div class="alert alert-info alert-dismissible">
      Note: You must have a planet to be able to add a moon.
      <!-- https://getbootstrap.com/docs/4.0/components/alerts/#dismissing -->
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
@endsection

@section('content')

  @foreach($planets as $planet)
    <div class="row">
      <h2 class="col-md-offset-4">
        Name: {{ $planet->name }}
      </h2>
    </div>
    <div class="row">
      <h3 class="col-md-offset-3">
        Image:
      </h3>
      <div class="col-md-offset-4">
        <img src="data:{{ $planet->img_type }};base64,{{ $planet->image }}" alt="Image of {{ $planet->name }}" />
      </div>
    </div>
    <div class="row">
      <div class="col-md-offset-4 col-md-1">
        <a class="btn btn-primary" href="/planet/{{ $planet->id }}">
          View &#34;{{ $planet->name }}&#34; Details
        </a>
      </div>
    </div>
    <div class="row">
      @include('includes/crud/crud-btn', ['model_type' => 'planet', 'name' => $planet->name, 'id' => $planet->id])
    </div>
    <hr />
  @endforeach
@endsection
