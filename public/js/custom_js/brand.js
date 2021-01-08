$(document).ready(function() {
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   $('#laravel_datatable').DataTable({
       processing: true,
       serverSide: true,
       ajax: {
           url: SITEURL + "/brand-list", //SITEURL var define in head (tableapp.blade)
           type: 'GET',
       },
       columns: [{
               data: 'id',
               name: 'id',
               'visible': false
           },
           {
               data: 'DT_RowIndex',
               name: 'DT_RowIndex',
               orderable: false,
               searchable: false
           },
           {
               data: 'image',
               name: 'image',
               orderable: false
           },
           {
               data: 'name',
               name: 'name'
           },
           {
               data: 'created_at',
               name: 'created_at'
           },
           {
               data: 'action',
               name: 'action',
               orderable: false
           },
       ],
       order: [
           [0, 'desc']
       ]
   });
   /*  When user click add user button */
   $('#create-new-product').click(function() {
       $('#btn-save').val("create-product");
       $('#brand_id').val('');
       $('#productForm').trigger("reset");
       $('#productCrudModal').html("Add New Product");
       $('#ajax-product-modal').modal('show');
       $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
   });
   /* When click edit user */
   $('body').on('click', '.edit-product', function() {
       var brand_id = $(this).data('id');
       $.get('brand-list/' + brand_id + '/edit', function(data) {
           $('#name-error').hide();
           $('#productCrudModal').html("Edit Product");
           $('#btn-save').val("edit-product");
           $('#ajax-product-modal').modal('show');
           $('#brand_id').val(data.id);
           $('#name').val(data.name);
           $('#modal-preview').attr('alt', 'No image available');

           if (data.image) {
               $('#modal-preview').attr('src', SITEURL + '/public/brand/' + data.image);
               $('#hidden_image').attr('src', SITEURL + '/public/brand/' + data.image);
           }
       })
   });
   $('body').on('click', '#delete-product', function() {
       var brand_id = $(this).data("id");
       if (confirm("Are You sure want to delete !")) {
           $.ajax({
               type: "get",
               url: SITEURL + "/brand-list/delete/" + brand_id,
               success: function(data) {
                   var oTable = $('#laravel_datatable').dataTable();
                   oTable.fnDraw(false);
               },
               error: function(data) {
                   console.log('Error:', data);
               }
           });
       }
   });
});
$('body').on('submit', '#productForm', function(e) {
   e.preventDefault();
   var name = $("#name").val();
   var image = $("#image").val();
   if ((name != '') && (image != '')) {
       var actionType = $('#btn-save').val();
       $('#btn-save').html('Sending..');
       var formData = new FormData(this);
       // console.log(formData);

       $.ajax({
           type: 'POST',
           url: SITEURL + "/brand-list/store",
           data: formData,
           cache: false,
           contentType: false,
           processData: false,
           success: (data) => {
               $('#productForm').trigger("reset");
               $('#ajax-product-modal').modal('hide');
               $('#btn-save').html('Save Changes');
               var oTable = $('#laravel_datatable').dataTable();
               oTable.fnDraw(false);
           },
           error: function(data) {
               console.log('Error:', data);
               $('#btn-save').html('Save Changes');
           }
       });
   } else if ((name == '')) {

       $('#productForm #name-error').text('Name field is required ');
   } else if ((image == '')) {

       $('#productForm #image-error').text('Image field is required ');
   } else if ((name == '') && (image == '')) {
       $('#productForm #name-error').text('Name field is required ');
       $('#productForm #image-error').text('Image field is required ');

   } else {
       $('#productForm #name-error').text('');
       $('#productForm #image-error').text('');

   }
});

function readURL(input, id) {
   id = id || '#modal-preview';
   if (input.files && input.files[0]) {
       var reader = new FileReader();
       reader.onload = function(e) {
           $(id).attr('src', e.target.result);
       };
       reader.readAsDataURL(input.files[0]);
       $('#modal-preview').removeClass('hidden');
       $('#start').hide();
   }
}