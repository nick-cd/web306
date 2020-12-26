@extends('layouts.base')

@section('navigation')
  @isset($id)
    @include('includes/nav/btn-nav', ['planet_id' => $id, 'planet_name' => $planets[$id]])
  @else
    @include('includes/nav/btn-main')
  @endisset
@endsection

@section('content')
  {{ Form::open(['url' => '/moon/add', 'files' => true]) }}
    @include('includes/forms/moon-form', ['planet_id' => $id])
  {{ Form::close() }}
@endsection
