@extends('multiauth::layouts.master') 
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Add New Category</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Category INPUT
                        </h2>                        
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                @include('multiauth::message')
                                <form action="{{ route('admin.category.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="role">Category Name</label>
                                        <input type="text" placeholder="Give a Category Name" name="name" class="form-control" id="category" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                                    <a href="{{ route('admin.category') }}" class="btn btn-sm btn-danger float-right">Back</a>
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