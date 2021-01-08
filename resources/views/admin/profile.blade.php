@extends('layouts.admin.app1')

@section('content')
                <section class="content-header">
                    <h1>
                        Edit Profile
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li><a href="#">Profile</a></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                        @include('layouts/flash')
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Update Persional Details</h3>
                                </div>
                            
                                <div class="box-body">
                                <form action="{{route('admin.profile')}}" method="post" >
                                @csrf
                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"/>
                                       
                                        </div><!-- /.input group -->
                                         <!-- Error -->
                                         @if ($errors->has('name'))
                                            <div class="callout callout-danger">
                                                <h5>{{ $errors->first('name') }}</h5>
                                            </div>
                                            @endif
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <label>Email:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}"/>
                                            <!-- Error -->
               
                                        </div><!-- /.input group -->
                                        @if ($errors->has('email'))
                                        <div class="callout callout-warning">
                                            <h5>{{ $errors->first('email') }}</h5>
                                        </div>
                                        @endif
                                    </div><!-- /.form group -->
                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-primary" name="addmaincatg" value="Update Profile" />                                       
                                    </div>
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col (left) -->
                        <!-- /.col (right) -->                       
                    </div><!-- /.row -->                   

                </section>
            
@endsection
<script src=" {{ asset('admin_theme/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">

      $(document).ready(function(){

        $(".setpassword").hide();        
                
        $("#setpassword").click(function() {

          $(".setpassword").show();        
        });
      });
    </script>
