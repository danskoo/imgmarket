@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div id="picture"></div>
    <script>
        var timerId = setInterval(func, 100);

        function func() {
            client_w = document.body.clientWidth;
            client_h = document.body.clientHeight;
            document.getElementById('picture').innerHTML = "<image src=\"{{ asset('water images/'.$image->img) }}\" width=" + client_w + "></image>";
        }
    </script>
    <div class="container">
        <hr>
        <div class="comments">
            <u1 class="list-group">
                @foreach($image->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{$comment->created_at->diffForHumans()}}: &nbsp;
                        </strong>
                        {{$comment->body}}
                    </li>
                @endforeach
            </u1>
        </div>

        <!--add comment-->
        <hr>
        <div class="card">
            <div class="card-block">
               <form method="POST" action="/image{{$image->id}}/comments">
                   {{ csrf_field() }}
                   <div class="form-group">
                       <textarea name="body" placeholder="your comment" class="form-control"></textarea>
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-primary">add comment</button>
                   </div>
               </form>
            </div>
        </div>
       @include('layouts.errors')
    </div>
@endsection
