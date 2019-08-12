@extends('multiauth::layouts.master')
@section('main-content')
{{-- <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Admin Roles</h2>
            </div>
        </div>
</section> --}}
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Post Categories</h2>
        </div>

        <div class="row clearfix">
            @include('multiauth::message')
                @foreach ($categories as $category)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue d-flex">
                            <h2>
                                {{ $category->category }}                                
                            </h2>
                        </div>
                        <div class="body">
                            <p>Lorem ipsum dolor sit amet csam alias quis necessitatibus saepe dolore tenetur, qui recusandae quae quas quisquam voluptas accusantium tempore, magnam corporis, facilis eaque!</p>
                            <div class="d-flex justify-content-between">
                                <a class="btn bg-red waves-effect mr-5" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                                    <i class="material-icons">delete</i>
                                    <span>Remove</span>
                                </a>
                                <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.delete', $category->id) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>
                                <a href="{{ route('admin.category.edit',$category->id) }}" class="btn bg-deep-purple waves-effect ml-5">
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
