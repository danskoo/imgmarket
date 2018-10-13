@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>name</th>
                                <th>image</th>
                            </tr>
                            </thead>
                            @foreach($images as $image)
                                <tr>
                                    <td>{{ $image->title }}</td>
                                    <td><a href="image{{$image->id}}"><img src="{{ asset('little images/'.$image->img) }}"></a></td>
                                </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
