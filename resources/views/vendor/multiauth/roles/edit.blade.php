@extends('multiauth::layouts.master') 
@section('main-content')

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Edit this Role</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ROLE EDIT
                                <small>Different sizes and widths</small>
                            </h2>                        
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    @include('multiauth::message')
                                    <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                                        @csrf @method('patch')
                                        <div class="form-group">
                                            <label for="role">Role Name</label>
                                            <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="role">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Change</button>
                                        <a href="{{ route('admin.roles') }}" class="btn btn-danger btn-sm float-right">Back</a>
                                    </form>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit this Role</div>

                <div class="card-body">
                    <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="role">Role Name</label>
                            <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="role">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Change</button>
                        <a href="{{ route('admin.roles') }}" class="btn btn-danger btn-sm float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection