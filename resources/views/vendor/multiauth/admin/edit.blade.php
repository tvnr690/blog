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
                            <form id="form_validation" class="form-horizontal" method="POST" action="{{route('admin.update',[$admin->id])}}">
                                @csrf  @method('patch')
                                <div class="form-group">
                                    <label for="Email" class="col-sm-2 control-label">Name </label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="text" value="{{ $admin->name }}" name="name" class="form-control" id="role">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float {{ $errors->has('email') ? ' has-error' : '' }} ">
                                    <label for="Email" class="col-sm-2 control-label">Email Address</label>
                                    <div class="col-sm-10">
                                        <div class="form-line"> 
                                            <input type="email" value="{{ $admin->email }}" name="email" class="form-control" id="role">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="col-sm-2 control-label">Profile Photo</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="file" name="" id="upload_image" />
                                            <textarea style="display:none;" name="profile_pic" id="profile_pic">{{ $admin->profile_pic }}</textarea>
                                            <div id="uploaded_image"></div>
                                            <div id="imageContainer">
                                                <img id="preview" src="{{ asset('images/profiles/'.$admin->profile_pic) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label for="Email" class="col-sm-2 control-label">Designtion</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="text"class="form-control" name="designation" value="{{ $admin->designation }}" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="Email" class="col-sm-2 control-label">Asigned Roles</label>
                                    <div class="col-sm-10">
                                        <div class="form-inline">
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
                                    </div>                                    
                                </div>
                               
                                <div class="form-group">   
                                    <label for="Email" class="col-sm-2 control-label">Activation</label>                                     
                                    <div class="col-sm-10">           
                                        <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation" class="form-control" id="checkbox">
                                        <label for="checkbox">Activate</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-sm btn-danger">Update</button>
                                        <a href="{{ route('admin.show') }}" class="btn bg-black btn-sm float-right">Back</a>     
                                    </div>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="uploadimageModal" class="modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upload & Crop Image</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center align-content-center">
                                <div id="image_demo" style="width:550px; margin-top:30px"></div>
                                <button class="btn btn-success crop_image">Crop & Upload Image</button>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                </div>
            </div>
        </div>
        
    
    
    @endsection
    
    @section('script')
    <script>
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:128,
                height:128,
                type:'circle'
            },
            boundary:{
                width:400,
                height:300
            }
        });
        $('#upload_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    // $uploadCrop.croppie('setZoom', 0);
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });
        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
            }).then(function(response){
                $('#uploadimageModal').modal('hide');
                 $("#preview").attr('src', response);
                 $("#profile_pic").text(response);
            });
        });
    </script>
    
    @endsection
    
    