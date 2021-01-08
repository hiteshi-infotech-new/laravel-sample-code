@extends('layouts.admin.tableapp')
@section('content')
            <section class="content-header">
               <h1>
                  Products List
                  <!-- <small>advanced tables</small> -->
               </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Product</a></li>
                  <li class="active">List</li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="box box-primary">
                        <div class="box-header">
                           <h3 class="box-title">Products</h3>
                           <a class="btn btn-success pull-right mt-5" href="javascript:void(0)" id="create-new-product"> Create New Product</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table class="table table-bordered table-striped" id="laravel_datatable">
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>S. No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Product Code</th>
                                    <th>Description</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
               </div>
            </section>
            <!-- /.content -->
         <!-- </aside> -->
         <!-- /.right-side -->
      </div>
      <!-- ./wrapper -->
      <!-- add new calendar event modal -->
      <div class="modal fade" id="ajax-product-modal" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title" id="productCrudModal"></h4>
               </div>
               <div class="modal-body">
                  <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data">
                  <div class="box-body">   
                     <input type="hidden" name="product_id" id="product_id">
                     <div class="form-group">
                        <label>Category</label>
                        <div id="selectId">
                           <select  class="form-control" name="category_id" id="category_id">
                              @if($category)
                              @foreach($category as $key => $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                              @else
                              <option>No Data Found.</option>
                              @endif
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Title</label>
                           <input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50">
                     </div>
                     <div class="form-group row">
                     <div class="col-md-6">
                        <label>Product Code</label>
                           <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Code" value="" maxlength="50" >
                     </div>
                     <div class="col-md-6">
                        <label>Product Price</label>
                           <input type="decimal" class="form-control" id="price" name="price" placeholder="Enter Price" value="" maxlength="50" >
                     </div>
                     </div>
                     <div class="form-group">
                        <label>Description</label>
                           <textarea class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label>Image</label>
                              <input id="image" type="file" name="image" accept="image/*" onchange="readURL(this);">
                              <input type="hidden" name="hidden_image" id="hidden_image">
                        </div>
                        <div class="col-md-6 form-group">
                           <label>Is featured ? </label>
                           <div class="checkbox">
                              <input id="is_feature" type="checkbox" name="is_feature" value="1" >
                           </div>
                        </div>
                     </div>
                     <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group" width="100" height="100" style="pa">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                        </button>
                     </div>
                  </div>
                  </form>
               </div>
               <div class="modal-footer"></div>
            </div>
         </div>
      </div>
    
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <script src="{{ asset('admin_theme/js/bootstrap.min.js')}}" type="text/javascript"></script>
      <script src="{{ asset('admin_theme/js/AdminLTE/app.js')}}" type="text/javascript"></script>
      <script src="{{ asset('js/custom_js/product.js')}}"></script>
      
      @endsection
  