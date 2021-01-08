@extends('layouts.admin.tableapp')
@section('content')
            <section class="content-header">
               <h1>
                  Brand List
                  <!-- <small>advanced tables</small> -->
               </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Brand</a></li>
                  <li class="active">List</li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="box box-primary">
                        <div class="box-header">
                           <h3 class="box-name">Brands</h3>
                           <a class="btn btn-success pull-right mt-5" href="javascript:void(0)" id="create-new-product"> Create New Brand</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table class="table table-bordered table-striped" id="laravel_datatable">
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>S. No</th>
                                    <th>Image</th>
                                    <th>Name</th>
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
                  <h4 class="modal-name" id="productCrudModal"></h4>
               </div>
               <div class="modal-body">
                  <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data">
                  <div class="box-body">   
                     <input type="hidden" name="brand_id" id="brand_id">
                     <div class="form-group">
                        <label>Brand-name</label>
                           <input type="text" class="form-control" id="name" name="name" placeholder="Enter Tilte" value="" maxlength="50">
                           <span class="" id="name-error"></span>
                     </div>
                     <div class="form-group ">
                           <label>Image</label>
                              <input id="image" type="file" name="image" accept="image/*" onchange="readURL(this);">
                              <span id="image-error"></span>                              
                              <input type="hidden" name="hidden_image" id="hidden_image">  
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
      <script src="{{ asset('js/custom_js/brand.js')}}"></script>
      
      @endsection
  