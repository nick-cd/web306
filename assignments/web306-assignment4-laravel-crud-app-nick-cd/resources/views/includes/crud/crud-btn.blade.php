<a class="btn btn-primary pull-left" href="/{{ $model_type }}/edit/{{ $id }}">
  Edit {{ ucfirst($model_type) }} &#34;{{ $name }}&#34;
</a>
{{ Form::open(['url' => '/' . $model_type . '/delete/' . $id, 'method' => 'delete']) }}
  {{ Form::button('Delete ' . ucfirst($model_type) . ' "' . $name . '"', ['class' => 'col-md-2 btn btn-primary pull-right', 'type' => 'submit']) }}
{{ Form::close() }}