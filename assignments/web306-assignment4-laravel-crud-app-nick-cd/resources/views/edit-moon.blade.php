@extends('layouts.base')

@section('navigation')
  @include('includes/nav/btn-nav', ['planet_id' => $moon->planet_id, 'planet_name' => $planets[$moon->planet_id]])
@endsection

@section('content')
  {{ Form::open(['url' => '/moon/edit/' . $moon->id, 'method' => 'put', 'files' => true]) }}
    @include('includes/forms/moon-form', ['name' => $moon->name, 'planet_id' => $moon->planet_id, 'old_image' => $moon->image])
  {{ Form::close() }}
@endsection
