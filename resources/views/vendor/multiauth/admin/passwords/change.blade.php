@extends('multiauth::layouts.master') 
@section('main-content')

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
           <h4>{{ ucfirst(config('multiauth.prefix')) }} Change Your Password</h4>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    
                    <div class="body">
                        <div>
                            <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal"  method="POST" action="{{ route('admin.password.change') }}" aria-label="{{ __('Admin Change Password') }}">
                                            @csrf
                                        <div class="form-group">
                                            <label for="oldPassword" class="col-sm-3 control-label">{{ __('Old Password') }}</label>
                                            <div class="col-sm-9">                                                
                                                <div class="form-line">
                                                    <input id="oldPassword" type="password" class="form-control{{ $errors->has('oldPassword') ? ' is-invalid' : '' }}" name="oldPassword" value="{{ $oldPassword ?? old('oldPassword') }}"
                                                    required autofocus> @if ($errors->has('oldPassword'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('oldPassword') }}</strong>
                                                    </span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="password" class="col-sm-3 control-label">{{ __('Password') }}</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                                    required> @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm" class="col-sm-3 control-label">{{ __('Confirm Password') }}</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-danger">{{ __('Change Password') }}</button>
                                            </div>
                                        </div>
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
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Change Your Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.password.change') }}" aria-label="{{ __('Admin Change Password') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="oldPassword" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="oldPassword" type="password" class="form-control{{ $errors->has('oldPassword') ? ' is-invalid' : '' }}" name="oldPassword" value="{{ $oldPassword ?? old('oldPassword') }}"
                                    required autofocus> @if ($errors->has('oldPassword'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldPassword') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection