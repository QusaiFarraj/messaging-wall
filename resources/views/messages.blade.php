@extends('layouts.app')

@section('content')
    <div class="container align-content-center">

        </div><!--add-a-comment-->

        <div class="readers-comment">
            <div class="single-media-title"><h2>All Messages</h2></div>
            @foreach($msgs as $msg)
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img alt="64x64" class="media-object" data-src="assets/img/img-author1.jpg"
                                 src="assets/img/img-author1.jpg" data-holder-rendered="true">
                        </a>
                    </div>
                    <div class="media-body">
                        <h2 class="media-heading">by {{ $msg->name }}</h2><h6> ({{ $msg->email }})</h6>
                        {{ $msg->body }}

                        <div class="comment-article-social">
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                            <a href="{{ route('messages.delete') }}"><span class="reply-ic"> Delete </span></a>
                        </div>
                    </div>
                </div>
            </div><!--readers-comment-->
        @endforeach
    </div>
@endsection
