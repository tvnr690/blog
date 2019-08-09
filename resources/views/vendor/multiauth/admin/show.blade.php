@extends('multiauth::layouts.master') 
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Admin Roles</h2>
        </div>

        <div class="col-xs-12 col-sm-3">
            <div class="card profile-card">
                <div class="profile-header">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                        <img src="{{ asset('images/user-lg.jpg') }}" alt="AdminBSB - Profile Image">
                    </div>
                    <div class="content-area">
                        <h3>Marc K. Hammond</h3>
                        <p>Web Software Developer</p>
                        <p>Administrator</p>
                    </div>
                </div>
                <div class="profile-footer">
                    <ul>
                        <li>
                            <span>Followers</span>
                            <span>1.234</span>
                        </li>
                        <li>
                            <span>Following</span>
                            <span>1.201</span>
                        </li>
                        <li>
                            <span>Friends</span>
                            <span>14.252</span>
                        </li>
                    </ul>
                    <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button>
                </div>
            </div>  
        </div>

        <div class="container">
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
        </div>

    </div>
</section>
@endsection