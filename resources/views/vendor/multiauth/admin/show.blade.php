@extends('multiauth::layouts.master')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>{{ ucfirst(config('multiauth.prefix')) }} Profiles </h2>
        </div>
        @include('multiauth::message')
        @foreach ($admins as $admin)
            <div class="col-xs-12 col-sm-3">               
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            @if(!empty($admin->profile_pic)) 
                                <img src=" {{ asset('images/profiles/'.$admin->profile_pic ) }}" alt="AdminBSB - Profile Image"> 
                            @else
                                <img src="{{ asset('images/user-lg.jpg') }}" alt="AdminBSB - Profile Image">  
                            @endif 
                        </div>
                        <div class="content-area">
                            <h3> {{ $admin->name }}</h3>
                            <p>{{ $admin->designation }}</p>
                            @foreach ($admin->roles as $role)
                                <p>{{ $role->name }} </p> 
                            @endforeach                           
                            
                        </div>
                    </div>
                    <div class="profile-footer">                        
                        <ul>
                            <li>
                                <span>Status: </span>
                                <span style="color: {{ $admin->active? 'green' : 'red' }}">{{ $admin->active? 'Active' : 'Inactive' }} </span>
                            </li>
                            <li>
                                <span>
                                    <a href="#" class="btn bg-red btn-lg waves-effect" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();"><i class="material-icons">delete</i>&nbsp;<b>Delete</b></a>
                                    <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                        @csrf @method('delete')
                                    </form>
                                </span>
                                <span>
                                    <a href="{{route('admin.edit',[$admin->id])}}" class="btn bg-deep-purple btn-lg waves-effect"><i class="material-icons">edit</i>&nbsp;  <b>Edit</b></a>
                                </span>
                            </li>
                        </ul>                        
                    </div>
                </div>
            </div>
        @endforeach



        {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ ucfirst(config('multiauth.prefix')) }} List
                            <span class="float-right">
                                <a href="{{route('admin.register')}}" class="btn btn-sm btn-success">New {{ ucfirst(config('multiauth.prefix')) }}</a>
                            </span>
                        </div>
                        <div class="card-body">
            @include('multiauth::message')
                            <ul class="list-group">
                                @foreach ($admins as $admin)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $admin->name }}
                                    <span class="badge">
                                            @foreach ($admin->roles as $role)
                                                <span class="badge-warning badge-pill ml-2">
                                                    {{ $role->name }}
                                                </span> @endforeach
                                    </span>
                                    {{ $admin->active? 'Active' : 'Inactive' }}
                                    <div class="float-right">
                                        <a href="#" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">Delete</a>
                                        <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                            @csrf @method('delete')
                                        </form>

                                        <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-primary mr-3">Edit</a>
                                    </div>
                                </li>
                                @endforeach @if($admins->count()==0)
                                <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
</section>
@endsection
