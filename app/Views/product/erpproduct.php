<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-10 mt-2">
              <h3 class="card-title">MENU FILLTER ~~~</h3>
            </div>
            <div class="col-2">
              
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="data_table" class="table table-bordered table-striped table-hover" table-layout:fixed>
            <thead>
              <tr>
              <th>Code</th>
			<th>Product name</th>
			<th>Duration</th>
			<th>Categories</th>
			<th>From</th>
			
			<th>Lang</th>
			<th>Updated</th>
			<th>Owner</th>
			<th>Status</th>
			  <th>Action</th>
              </tr>
            </thead>
			<!--
			<tfoot>
				<tr>
              <th>Code</th>
			<th>Product name</th>
			<th>Duration</th>
			<th>Categories</th>
			<th>From</th>
			<th>To</th>
			<th>Lang</th>
			<th>Updated</th>
			<th>Owner</th>
			<th>Status</th>
			  <th>Action</th>
			    </tr>
			</tfoot>
			-->
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

<!-- /Main content -->

<!-- ADD modal content -->
<div id="data-modal" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
    <div class="modal-content h-100">
      <div class="text-center bg-info p-1" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form" class="pl-3 pr-3">
          <div class="row">
<input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="11" >
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group mb-3">
									<label for="product_code" class="col-form-label"> Product code: <span class="text-danger">*</span> </label>
									<input type="text" id="product_code" name="product_code" class="form-control" placeholder="Product code" minlength="1"  maxlength="50" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="product_name" class="col-form-label"> Product name: <span class="text-danger">*</span> </label>
									<input type="text" id="product_name" name="product_name" class="form-control" placeholder="Product name" minlength="1"  maxlength="250" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-3">
									<label for="product_categories" class="col-form-label"> Product categories: <span class="text-danger">*</span> </label>
									<select id="product_categories" name="product_categories" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group mb-3">
									<label for="product_time" class="col-form-label"> Duration: <span class="text-danger">*</span> </label>
									<select id="product_time" name="product_time" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_from" class="col-form-label"> Start from: <span class="text-danger">*</span> </label>
									<select id="product_from" name="product_from" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_location" class="col-form-label"> Travel location: <span class="text-danger">*</span> </label>
									<select id="product_location" name="product_location" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-3">
									<label for="product_style" class="col-form-label"> Product style: <span class="text-danger">*</span> </label>
									<select id="product_style" name="product_style" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_intro" class="col-form-label"> Product intro: <span class="text-danger">*</span> </label>
									<textarea cols="40" rows="4" id="product_intro" name="product_intro" class="form-control" placeholder="Product intro" minlength="0"  required></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_desc" class="col-form-label"> Product desc: <span class="text-danger">*</span> </label>
									<textarea cols="40" rows="8" id="product_desc" name="product_desc" class="form-control" placeholder="Product desc" minlength="0"  required></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_rules" class="col-form-label"> Product rules: <span class="text-danger">*</span> </label>
									<textarea cols="40" rows="4" id="product_rules" name="product_rules" class="form-control" placeholder="Product rules" minlength="0"  required></textarea>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_guide_lang" class="col-form-label"> Guide lang: </label>
									<select id="product_guide_lang" name="product_guide_lang" class="form-select" >
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_filter" class="col-form-label"> Product filter: </label>
									<select id="product_filter" name="product_filter" class="form-select" >
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_priority" class="col-form-label"> Product priority: </label>
									<input type="number" id="product_priority" name="product_priority" class="form-control" placeholder="Product priority" minlength="0"  maxlength="1" >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_files" class="col-form-label"> Product files: </label>
									<input type="text" id="product_files" name="product_files" class="form-control" placeholder="Product files" minlength="0"  maxlength="100" >
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_slugs" class="col-form-label"> Product slugs: <span class="text-danger">*</span> </label>
									<input type="text" id="product_slugs" name="product_slugs" class="form-control" placeholder="Product slugs" minlength="1"  maxlength="100" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_keywords" class="col-form-label"> Product keywords: </label>
									<input type="text" id="product_keywords" name="product_keywords" class="form-control" placeholder="Product keywords" minlength="0"  maxlength="100" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_seo" class="col-form-label"> Product seo: </label>
									<input type="text" id="product_seo" name="product_seo" class="form-control" placeholder="Product seo" minlength="0"  maxlength="250" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_lang" class="col-form-label"> Product lang: <span class="text-danger">*</span> </label>
									<select id="product_lang" name="product_lang" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="id_master" class="col-form-label"> Translate of: </label>
									<select id="id_master" name="id_master" class="form-select" >
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_status" class="col-form-label"> Product status: <span class="text-danger">*</span> </label>
									<select id="product_status" name="product_status" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="update_on" class="col-form-label"> Update on: </label>
									<input type="date" id="update_on" name="update_on" class="form-control" dateISO="true" >
								</div>
							</div>
						</div>
						<div class="row">
						</div>

         
        </form>
      </div>
	  <div class="modal-footer">
              <button type="submit" class="btn btn-success mr-2" id="form-btn"><?= lang("App.save") ?></button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- /ADD modal content -->


<!-- modal lang  -->
<div class="modal fade" id="modal-lang" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-sm modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="title-123">SELECT PRODUCT LANGUAGE</h4>
		</div>
		<!--
		<div class="modal-body">
			<p id="msg-123"></p>
		</div>
		-->
		<div class="modal-footer justify-content-evenly">
			<button type="button" id= "modal-en"class="btn btn-danger">English</button>
			<button type="button" id= "modal-close" class="btn btn-success" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
</div>


<?= $this->endSection() ?>
<!-- /.content -->


<!-- page script -->
<?= $this->section("pageScript") ?>
<script>
  // dataTables
  $(function() {
	$('body').addClass('sidebar-collapse');
    var table = $('#data_table').removeAttr('width').DataTable({
      "paging": true,
      "searching": true,
	  "lengthChange": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollY": '50vh',
      "scrollX": true,
      "scrollCollapse": false,
      "responsive": true,
	  "order": [],
	  "pageLength": 30,
	  "select": true,
	   "dom": '<"row" <"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>><"row"<t>><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>', //<lf<t>ip>
	  "buttons": [{text: '+ ADD NEW',className: 'btn btn-success',action: function ( e, dt, node, config ) {select_lang(); }}],	  
    
      "ajax": {
        "url": '<?php echo base_url($controller . "/getAll") ?>',
        "type": "POST",
        "dataType": "json",
        async: "true"
      }
    });
	setTimeout(function () {
        table.columns.adjust().draw();
    }, 300);
	//table.columns.adjust().draw();
//	document.body.classList.add("sidebar-collapse");
	
  });

  var urlController = '';
  var submitText = '';

  function getUrl() {
    return urlController;
  }

  function getSubmitText() {
    return submitText;
  }
  
function select_lang() {
  var dfd = jQuery.Deferred();
  window.location.href = '<?= base_url("/product/add_new/en") ?>';
//   var $confirm = $('#modal-lang');
//   $confirm.modal('show');
//   $('#modal-vi').off('click').click(function () {
// 	  window.location.href = '<?= base_url("/product/add_new/vi") ?>';
//   });
//     $('#modal-en').off('click').click(function () {
//     window.location.href = '<?= base_url("/product/add_new/en") ?>';
//   });

//   $('#modal-close').off('click').click(function () {
//     $confirm.modal('hide');
//     return 0;
//   });
  return dfd.promise();
}



  function remove(id) {
    Swal.fire({
      title: "<?= lang("App.remove-title") ?>",
      text: "<?= lang("App.remove-text") ?>",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '<?= lang("App.confirm") ?>',
      cancelButtonText: '<?= lang("App.cancel") ?>'
    }).then((result) => {

      if (result.value) {
        $.ajax({
          url: '<?php echo base_url($controller . "/remove") ?>',
          type: 'post',
          data: {
            id : id
          },
          dataType: 'json',
          success: function(response) {

            if (response.success === true) {
              Swal.fire({
                toast:true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
              })
            } else {
              Swal.fire({
                toast:false,
                position: 'bottom-end',
                icon: 'error',
                title: response.messages,
                showConfirmButton: false,
                timer: 3000
              })
            }
          }
        });
      }
    })
  }
</script>


<?= $this->endSection() ?>
