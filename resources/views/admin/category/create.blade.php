@extends('layouts.admin.app1')

@section('content')
               
    <section class="content-header">
        <h1>
            Categories List
            <!-- <small>advanced tables</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
            @include('layouts/flash')
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">
                        Create New</h3>
                    </div>
                
                    <div class="box-body">
                    <form action="{{route('Category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf                    
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Name:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" class="form-control" name="name" value=""/>                            
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
                                    <i class="fa fa-picture-o"></i>
                                </div>
                                <input type="file" id="file" onchange="imgchange(this)" class="form-control" name="image" value=""/>
                                <!-- Error -->    
                            </div><!-- /.input group -->
                            <br>
                            <div class="" id="item_pic" style="text-align: center;">
                            <img src="" width="100px" id="update_img">
                            </div>
                            @if ($errors->has('image'))
                            <div class="callout callout-warning">
                                <h5>{{ $errors->first('image') }}</h5>
                            </div>
                            @endif
                        </div><!-- /.form group -->
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" name="addmaincatg" value="Submit" />                            
                        </div>
                    </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->              
            </div><!-- /.col (left) -->
            <!-- /.col (right) -->
        </div><!-- /.row -->                    
    </section>            
@endsection
<script src="{{ asset('admin_theme/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() { 
        $('#item_pic').hide();        
    });
      
    function imgchange(f) 
    {            
        var filePath = $('#file').val();
        var reader = new FileReader();
        reader.onload = function (e) 
        {
            $('#item_pic').show(); 
            var target=e.target.result;
            var newimg=$('#update_img').attr('src',target);
        };
        reader.readAsDataURL(f.files[0]);        
    };
</script>



