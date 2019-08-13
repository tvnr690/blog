@extends('multiauth::layouts.master')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Add New Post</h2>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> Post INPUT </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                @include('multiauth::message')
                                <form action="{{ route('admin.post.store') }}" method="post">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="post">Post Title</label>
                                                    <input type="text" placeholder="Post Title" name="p_title" class="form-control" id="Post" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="post">Post Slug</label>
                                                    <input type="text" placeholder="Post Slug" name="p_title" class="form-control" id="Post" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="categry">Select Category</label>
                                                    <select name="category_id" id="category_id" class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }} ">
                                                        <option>Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="post">Location</label>
                                                    <input type="text" placeholder="location" name="location" class="form-control" id="location" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="post">Select Banner Image</label>
                                        <input type="file" name="upload_image" id="upload_image" />
                                        <div id="uploaded_image"></div> 
                                        <div id="imageContainer"></div>                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="post">Content</label>
                                        <textarea type="text" name="p_content" class="form-control" id="p_content" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                                    <a href="{{ route('admin.posts') }}" class="btn btn-sm btn-danger float-right">Back</a>
                                </form>
                            </div>
                        </div>
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
                          <div class="col-md-8 text-center">
                              <div id="image_demo" style="width:350px; margin-top:30px"></div>
                          </div>
                          <div class="col-md-4" style="padding-top:30px;">
                              <br />
                              <br />
                              <br/>
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
            width:200,
            height:200,
            type:'square'
        },
        boundary:{
            width:300,
            height:300
        }
    });

    $('#upload_image').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function(){
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
            alert(response);
            $('#uploadimageModal').modal('hide');        

            var src = "data:image/jpeg;base64,";
            src += item_image;
            $("#preview").attr('src', src);
            
            var newImage = document.createElement('img');
            newImage.src = src;
            newImage.width = newImage.height = "80";
            document.querySelector('#imageContainer').innerHTML = newImage.outerHTML;
        })
    });
            
            

    CKEDITOR.replace( 'p_content', {
        filebrowserBrowseUrl: '/browser/browse.php',
        filebrowserUploadUrl: '/uploader/upload.php'
    });
</script>

@endsection
@section('cropper')
    

<script> 
         
            

        </script>
@endsection



