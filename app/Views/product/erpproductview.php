<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-10 mt-2">
              <h3 class="card-title">MENU FILLTER</h3>
            </div>
            <div class="col-2">
              
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="data_table" class="table table-bordered table-striped">
            <thead>
              <tr>
              <th>Code</th>
			<th>Product name</th>
			<th>Time</th>
			<th>Categories</th>
			<th>From</th>
			<th>To</th>
			<th>Status</th>
			<th>Updated</th>
			<th>Owner</th>
			  <th></th>
              </tr>
            </thead>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

<!-- /Main content -->

<!-- ADD modal content -->
<div id="data-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="text-center bg-info p-3" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form" class="pl-3 pr-3">
          <div class="row">
<input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="11" >
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_code" class="col-form-label"> Product code: <span class="text-danger">*</span> </label>
									<input type="text" id="product_code" name="product_code" class="form-control" placeholder="Product code" minlength="1"  maxlength="50" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_name" class="col-form-label"> Product name: <span class="text-danger">*</span> </label>
									<input type="text" id="product_name" name="product_name" class="form-control" placeholder="Product name" minlength="1"  maxlength="250" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_categories" class="col-form-label"> Product categories: <span class="text-danger">*</span> </label>
									<select id="product_categories" name="product_categories" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_location" class="col-form-label"> Product location: <span class="text-danger">*</span> </label>
									<select id="product_location" name="product_location" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_style" class="col-form-label"> Product style: <span class="text-danger">*</span> </label>
									<select id="product_style" name="product_style" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_time" class="col-form-label"> Product time: <span class="text-danger">*</span> </label>
									<select id="product_time" name="product_time" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_intro" class="col-form-label"> Product intro: <span class="text-danger">*</span> </label>
									<textarea cols="40" rows="5" id="product_intro" name="product_intro" class="form-control" placeholder="Product intro" minlength="0"  required></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_desc" class="col-form-label"> Product desc: <span class="text-danger">*</span> </label>
									<textarea cols="40" rows="5" id="product_desc" name="product_desc" class="form-control" placeholder="Product desc" minlength="0"  required></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_rules" class="col-form-label"> Product rules: <span class="text-danger">*</span> </label>
									<textarea cols="40" rows="5" id="product_rules" name="product_rules" class="form-control" placeholder="Product rules" minlength="0"  required></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_files" class="col-form-label"> Product files: </label>
									<input type="text" id="product_files" name="product_files" class="form-control" placeholder="Product files" minlength="0"  maxlength="100" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_lang" class="col-form-label"> Product lang: <span class="text-danger">*</span> </label>
									<select id="product_lang" name="product_lang" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="id_master" class="col-form-label"> Id master: </label>
									<select id="id_master" name="id_master" class="form-select" >
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_guide_lang" class="col-form-label"> Product guide lang: </label>
									<select id="product_guide_lang" name="product_guide_lang" class="form-select" >
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_filter" class="col-form-label"> Product filter: </label>
									<select id="product_filter" name="product_filter" class="form-select" >
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_priority" class="col-form-label"> Product priority: </label>
									<input type="number" id="product_priority" name="product_priority" class="form-control" placeholder="Product priority" minlength="0"  maxlength="1" >
								</div>
							</div>
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
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="product_status" class="col-form-label"> Product status: <span class="text-danger">*</span> </label>
									<select id="product_status" name="product_status" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="update_on" class="col-form-label"> Update on: </label>
									<input type="date" id="update_on" name="update_on" class="form-control" dateISO="true" >
								</div>
							</div>
						</div>
						<div class="row">
						</div>

          <div class="form-group text-center">
            <div class="btn-group">
              <button type="submit" class="btn btn-success mr-2" id="form-btn"><?= lang("App.save") ?></button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- /ADD modal content -->



<?= $this->endSection() ?>
<!-- /.content -->


<!-- page script -->
<?= $this->section("pageScript") ?>
<script>
  // dataTables
  $(function() {
    var table = $('#data_table').removeAttr('width').DataTable({
      "paging": true,
      "searching": true,
	  "lengthChange": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollY": '55vh',
      "scrollX": true,
      "scrollCollapse": false,
      "responsive": true,
	  "order": [],
	  "pageLength": 30,
	   "dom": '<"row" <"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>><"row"<t>><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>', //<lf<t>ip>
	  "buttons": [{text: '+ TẠO MỚI',className: 'btn btn-success',action: function ( e, dt, node, config ) {save(); }}],	  
    
      "ajax": {
        "url": '<?php echo base_url($controller . "/getAll") ?>',
        "type": "POST",
        "dataType": "json",
        async: "true"
      }
    });
  });

  var urlController = '';
  var submitText = '';

  function getUrl() {
    return urlController;
  }

  function getSubmitText() {
    return submitText;
  }

  function save(id) {
    // reset the form 
    $("#data-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');
    if (typeof id === 'undefined' || id < 1) { //add
      urlController = '<?= base_url($controller . "/add") ?>';
      submitText = '<?= lang("App.save") ?>';
      $('#model-header').removeClass('bg-info').addClass('bg-success');
      $("#info-header-modalLabel").text('<?= lang("App.add") ?>');
      $("#form-btn").text(submitText);
      $('#data-modal').modal('show');
    } else { //edit
      urlController = '<?= base_url($controller . "/edit") ?>';
      submitText = '<?= lang("App.update") ?>';
      $.ajax({
        url: '<?php echo base_url($controller . "/getOne") ?>',
        type: 'post',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('#model-header').removeClass('bg-success').addClass('bg-info');
          $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
          //insert data to form
          			$("#data-form #id").val(response.id);
			$("#data-form #product_code").val(response.product_code);
			$("#data-form #product_name").val(response.product_name);
			$("#data-form #product_categories").val(response.product_categories);
			$("#data-form #product_location").val(response.product_location);
			$("#data-form #product_style").val(response.product_style);
			$("#data-form #product_time").val(response.product_time);
			$("#data-form #product_intro").val(response.product_intro);
			$("#data-form #product_desc").val(response.product_desc);
			$("#data-form #product_rules").val(response.product_rules);
			$("#data-form #product_files").val(response.product_files);
			$("#data-form #product_lang").val(response.product_lang);
			$("#data-form #id_master").val(response.id_master);
			$("#data-form #product_guide_lang").val(response.product_guide_lang);
			$("#data-form #product_filter").val(response.product_filter);
			$("#data-form #product_priority").val(response.product_priority);
			$("#data-form #product_slugs").val(response.product_slugs);
			$("#data-form #product_keywords").val(response.product_keywords);
			$("#data-form #product_seo").val(response.product_seo);
			$("#data-form #product_status").val(response.product_status);
			$("#data-form #update_on").val(response.update_on);

        }
      });
    }
    $.validator.setDefaults({
      highlight: function(element) {
        $(element).addClass('is-invalid').removeClass('is-valid');
      },
      unhighlight: function(element) {
        $(element).removeClass('is-invalid').addClass('is-valid');
      },
      errorElement: 'div ',
      errorClass: 'invalid-feedback',
      errorPlacement: function(error, element) {
        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else if ($(element).is('.select')) {
          element.next().after(error);
        } else if (element.hasClass('select2')) {
          //error.insertAfter(element);
          error.insertAfter(element.next());
        } else if (element.hasClass('selectpicker')) {
          error.insertAfter(element.next());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) {
        var form = $('#data-form');
        $(".text-danger").remove();
        $.ajax({
          // fixBug get url from global function only
          // get global variable is bug!
          url: getUrl(),
          type: 'post',
          data: form.serialize(),
          cache: false,
          dataType: 'json',
          beforeSend: function() {
            $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
          },
          success: function(response) {
            if (response.success === true) {
              Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                $('#data-modal').modal('hide');
              })
            } else {
              if (response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var ele = $("#" + index);
                  ele.closest('.form-control')
                    .removeClass('is-invalid')
                    .removeClass('is-valid')
                    .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                  ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');
                });
              } else {
                Swal.fire({
                  toast: false,
                  position: 'bottom-end',
                  icon: 'error',
                  title: response.messages,
                  showConfirmButton: false,
                  timer: 3000
                })

              }
            }
            $('#form-btn').html(getSubmitText());
          }
        });
        return false;
      }
    });

    $('#data-form').validate({

      //insert data-form to database

    });
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
