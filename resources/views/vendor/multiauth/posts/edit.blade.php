@extends('multiauth::layouts.master')
@section('main-content')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Edit this Post</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> Post EDIT </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    @include('multiauth::message')
                                    <form action="{{ route('admin.post.update', $post->id) }}" method="post">
                                        @csrf @method('patch')
                                        <div class="form-group">
                                            <label for="post">Post Name</label>
                                            <input type="text" value="{{ $post->p_title }}" name="p_title" class="form-control" id="post">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Change</button>
                                        <a href="{{ route('admin.posts') }}" class="btn btn-danger btn-sm float-right">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
