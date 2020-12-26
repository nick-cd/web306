@extends('layouts.base')

@section('navigation')
  @include('includes/nav/btn-nav', ['planet_id' => $planet->id, 'planet_name' => $planet->name])
@endsection

@section('content')
  {{ Form::open(['url' => '/planet/edit/' . $planet->id, 'method' => 'put', 'files' => true]) }}
    @include('includes/forms/planet-form', ['planet' => $planet, 'old_image' => $planet->image])
  {{ Form::close() }}
@endsection
