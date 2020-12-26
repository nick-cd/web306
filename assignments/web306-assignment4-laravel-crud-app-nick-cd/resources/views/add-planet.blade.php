@extends('layouts.base')

@section('navigation')
  @include('includes/nav/btn-main')
@endsection

@section('content')
  {{ Form::open(['url' => '/planet/add', 'files' => true]) }}
    @include('includes/forms/planet-form', ['planet' => null])
  {{ Form::close() }}
@endsection
