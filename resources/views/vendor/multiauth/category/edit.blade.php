@extends('multiauth::layouts.master') 
@section('main-content')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Edit this Category</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> CATEGORY EDIT </h2>                        
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    @include('multiauth::message')
                                    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                                        @csrf @method('patch')
                                        <div class="form-group">
                                            <label for="category">Category Name</label>
                                            <input type="text" value="{{ $category->category }}" name="category" class="form-control" id="category">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Change</button>
                                        <a href="{{ route('admin.category') }}" class="btn btn-danger btn-sm float-right">Back</a>
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