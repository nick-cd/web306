@include('includes/nav/btn-main')
<a class="col-md-3 btn btn-success" href="{{ url('/planet/' . $planet_id) }}">
    Back to &#34;{{ $planet_name }}&#34; Information
</a>
