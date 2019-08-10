@extends('multiauth::layouts.master') 
@section('main-content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Admin Roles</h2>
        </div> 
        
        <div class="row clearfix">
            @include('multiauth::message')
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                @foreach ($roles as $role)
                    <div class="card">
                        <div class="header bg-blue d-flex">
                            <h2>
                                {{ $role->name }} 
                                <span class="badge badge-primary badge-pill pull-right">{{ $role->admins->count() }} {{ ucfirst(config('multiauth.prefix')) }}</span>
                            </h2>                       
                        </div>
                        <div class="body">
                            <p>Lorem ipsum dolor sit amet csam alias quis necessitatibus saepe dolore tenetur, qui recusandae quae quas quisquam voluptas accusantium tempore, magnam corporis, facilis eaque!</p>
                            <a class="btn bg-red waves-effect ml-auto" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                <i class="material-icons">delete</i>
                                <span>EXTENSION</span>
                            </a>
                            <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>
                            <a href="{{ route('admin.role.edit',$role->id) }}" class="btn bg-deep-purple waves-effect mr-auto">
                                <i class="material-icons">edit</i>
                                <span>EXTENSION</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            Roles
                            <span class="float-right">
                                <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-success">New Role</a>
                            </span>
                        </div>
        
                        <div class="card-body">
                    @include('multiauth::message')
                            <ol class="list-group">
                                @foreach ($roles as $role)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $role->name }}
                                    <span class="badge badge-primary badge-pill">{{ $role->admins->count() }} {{ ucfirst(config('multiauth.prefix')) }}</span>
                                    <div class="float-right">
                                        <a href="" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">Delete</a>
                                        <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                            @csrf @method('delete')
                                        </form>
        
                                        <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-sm btn-primary mr-3">Edit</a>
                                    </div>
                                </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}
       

        
    </div>
</section>






@endsection