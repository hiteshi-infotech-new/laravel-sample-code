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
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Product Category</h3> 
                        <span class="pull-right"><a href="{{route('Category.create')}}" class="btn btn-info  pull-right mt-5">Add</a></span>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($category)
                                @foreach($category as $key => $category)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><img src="{{ asset('/storage/category/'.$category->image) }}" width="100px"></td>
                                    <td><div class="btn-group">
                                    <a href="{{route('Category.edit',$category->id)}}" class="btn btn-info ml">edit</a><span>&nbsp;</span>
                                    <form action="{{ route('Category.destroy', $category->id) }}" onsubmit="return confirm('Are you sure?');" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mr" type="submit">Delete</button>
                                    </form> 
                                    </div></td>
                                </tr>
                        @endforeach
                        @else
                        <tr>No Data Found.</tr>
                        @endif
                                
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
            
@endsection


