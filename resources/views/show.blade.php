@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div id="width">
    </div>
    <script>
        client_w=document.body.clientWidth;
        client_h=document.body.clientHeight;
        document.getElementById('width').innerHTML="<image src=\"{{ asset('water images/'.$image->img) }}\" width="+client_w+"></image>";
    </script>

@endsection



