@extends('multiauth::layouts.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Edit details of {{$admin->name}} </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>{{$admin->name}} Profile Details</h2>
                        </div>
                        <div class="body">
                            @include('multiauth::message')
                            <form id="form_validation" method="POST" action="{{route('admin.update',[$admin->id])}}">
                                @csrf  @method('patch')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" value="{{ $admin->name }}" name="name" class="form-control" id="role">
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float {{ $errors->has('email') ? ' has-error' : '' }} ">
                                    <div class="form-line"> 
                                        <input type="email" value="{{ $admin->email }}" name="email" class="form-control" id="role">
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Assign Role</label>
                                    <select  name="role_id[]" id="role_id" class="form-control show-tick {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                        <option disabled>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" 
                                                @if (in_array($role->id,$admin->roles->pluck('id')->toArray())) 
                                                    selected 
                                                @endif >{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>

                                @endif
                                </div>
                               
                                <div class="form-group">             
                                    <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation" class="form-control" id="checkbox">
                                    <label for="checkbox">Activate</label>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Change</button>
                                <a href="{{ route('admin.show') }}" class="btn bg-black btn-sm float-right">Back</a>
                                   
                            </form>
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
                    <div class="card-header">Edit details of {{$admin->name}}</div>

                    <div class="card-body">
                        @include('multiauth::message')
                        <form action="{{route('admin.update',[$admin->id])}}" method="post">
                            @csrf @method('patch')
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Name</label>
                                <input type="text" value="{{ $admin->name }}" name="name" class="form-control col-md-6" id="role">
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Email</label>
                                <input type="text" value="{{ $admin->email }}" name="email" class="form-control col-md-6" id="role">
                            </div>

                            <div class="form-group row">
                                <label for="role_id" class="col-md-4 col-form-label text-md-right">Assign Role</label>

                                <select name="role_id[]" id="role_id" class="form-control col-md-6 {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                    <option selected disabled>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" 
                                            @if (in_array($role->id,$admin->roles->pluck('id')->toArray())) 
                                                selected 
                                            @endif >{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select> 

                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span> 
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="active" class="col-md-4 col-form-label text-md-right">Active</label>
                                <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation" class="form-control col-md-6" id="active">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Change
                                    </button>
                                    <a href="{{ route('admin.show') }}" class="btn btn-danger btn-sm float-right">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
