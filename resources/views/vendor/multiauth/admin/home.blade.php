@extends('multiauth::layouts.master') 

@section('main-content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{ ucfirst(config('multiauth.prefix')) }} Dashboard</h2>
                @include('multiauth::message')
                    You are logged as {{ auth('admin')->user()->name }} !
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Blogs</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Not Published Blogs</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Published Blogs</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Users</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block-header">
                <h2>
                    User Blog Posts
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div>
              <!-- Exportable Table -->
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Blog Posts
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead class="bg-pink">
                                        <tr>
                                            <th>User Name</th>
                                            <th>Post Title</th>
                                            <th>Submitted On</th>
                                            <th>View</th>
                                            <th>Publish</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody  >
                                        <tr style="background-color: #fff !important;">
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td class="text-center text-info"><i class="material-icons">remove_red_eye</i></td>
                                            <td class="text-center text-success"><i class="material-icons">publish</i></td>
                                            <td class="text-center text-warning"><i class="material-icons">edit</i></td>
                                            <td class="text-center text-danger"><i class="material-icons">delete</i></td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
            
            

           
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            
            
        </div>
    </section>




@endsection