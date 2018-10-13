@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="predelete">delete dashboard</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="title">enter name</label>
                                    <input class="form-control" id="title" placeholder="name" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="img">choose file</label>
                                    <input id="img" type="file" multiple name="file[]">
                                </div>
                                <button type="submit" class="btn btn-default">add</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
