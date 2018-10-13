@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="create">create Dashboard</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('delete')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>delete</th>
                                    <th>name</th>
                                    <th>image</th>
                                </tr>
                                </thead>
                                @foreach($images as $image)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="del" value="{{$image->id}}">
                                        </td>
                                        <td>{{ $image->title }}</td>
                                        <td><a href="image{{$image->id}}"><img
                                                        src="{{ asset('little images/'.$image->img) }}"></a></td>
                                    </tr>
                                @endforeach
                            </table>
                            <button type="submit" class="btn btn-default">delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
