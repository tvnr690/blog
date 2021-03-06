@extends('multiauth::layouts.master')
@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            {{-- <img src="{{ asset('images/profiles/'.$admin->profile_pic) }}" /> --}}
                                                            <img src="{{ asset('images/profiles/'.auth('admin')->user()->profile_pic) }}" />
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#"></a>
                                                        </h4>
                                                        {{ $post->p_author }} - {{ $post->created_at }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <h3 class="text-info">{{ $post->p_title }}</h3>                                                       
                                                    </div>
                                                    <div class="post-content">
                                                        <img src="{{ asset('images/post/'.$post->p_image) }}" class="img-responsive pb-2" />
                                                        <div class="text" style="padding:20px">
                                                            {!! $post->p_content !!}
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">thumb_up</i>
                                                            <span>{{ $post->likes }} Likes</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">thumb_down</i>
                                                            <span>{{ $post->dislikes }} Dislikes</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="material-icons">share</i>
                                                            <span>Share</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
