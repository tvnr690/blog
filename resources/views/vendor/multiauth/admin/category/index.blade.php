@extends('multiauth::layouts.master')
@section('main-content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Admin Roles</h2>
        </div>

        <div class="row clearfix">
            @include('multiauth::message')
                @foreach ($roles as $role)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue d-flex">
                            <h2>
                                {{ $role->name }}
                                <span class="badge badge-primary badge-pill pull-right">{{ $role->admins->count() }} {{ ucfirst(config('multiauth.prefix')) }}</span>
                            </h2>
                        </div>
                        <div class="body">
                            <p>Lorem ipsum dolor sit amet csam alias quis necessitatibus saepe dolore tenetur, qui recusandae quae quas quisquam voluptas accusantium tempore, magnam corporis, facilis eaque!</p>
                            <div class="d-flex justify-content-between">
                                <a class="btn bg-red waves-effect mr-5" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                    <i class="material-icons">delete</i>
                                    <span>Remove</span>
                                </a>
                                <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>
                                <a href="{{ route('admin.role.edit',$role->id) }}" class="btn bg-deep-purple waves-effect ml-5">
                                    <i class="material-icons">edit</i>
                                    <span>Update</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</section>






@endsection
