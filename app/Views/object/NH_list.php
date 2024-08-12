<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->
      <div class="card">
	 
 <!--       <div class="card-header">
          <div class="row">
            <div class="col-10 mt-2">
              <h3 class="card-title">obj_db</h3>
            </div>
            <div class="col-2">
              <button type="button" class="btn float-right btn-success" onclick="save()" title="<?= lang("App.new") ?>"> <i class="fa fa-plus"></i>   <?= lang('App.new') ?></button>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="data_table" class="table table-bordered table-striped">
            <thead>
              <tr>
              <th>Code</th>
				<th>Name</th>
				<th>Location</th>
				<th>Tel</th>
				<th>Email</th>
				<th>Company</th>
				<th>Tax</th>
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
<div id="data-modal" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="text-center bg-info p-3" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form" class="pl-3 pr-3">
          <div class="row">
			<input type="hidden" id="obj_id" name="obj_id" class="form-control">
			<input type="hidden" id="ogroup" name="ogroup" class="form-control">
			<input type="hidden" id="ostyle" name="ostyle" class="form-control">
			<input type="hidden" id="ostylecode" name="ostylecode" class="form-control">

						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group mb-3">
									<label for="ocode" class="col-form-label"> Code: <span class="text-danger">*</span> </label>
									<input type="text" id="ocode" name="ocode" class="form-control" placeholder="Auto" minlength="3"  maxlength="10" required'>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="oname" class="col-form-label"> Name: <span class="text-danger">*</span> </label>
									<input type="text" id="oname" name="oname" class="form-control" placeholder="Name" minlength="3"  maxlength="150" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-3">
									<label for="location" class="col-form-label"> Location: </label>
									<select id="location_id" name="location_id" class="form-select" >
										<option value="0">Select</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group mb-3">
									<label for="contact" class="col-form-label"> Contact name: <span class="text-danger">*</span> </label>
									<input type="text" id="contact" name="contact" class="form-control" placeholder="Contact" minlength="0"  maxlength="100" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="tel" class="col-form-label"> Tel: </label>
									<input type="text" id="tel" name="tel" class="form-control" placeholder="Tel" minlength="0"  maxlength="50" >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="email" class="col-form-label"> Email: </label>
									<input type="email" id="email" name="email" class="form-control" placeholder="Email" minlength="0"  maxlength="50" >
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group mb-3">
									<label for="bday" class="col-form-label"> Birthday/Founding day: </label>
									<input type="date" id="bday" name="bday" class="form-control" dateISO="true" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="company" class="col-form-label"> Company: </label>
									<input type="text" id="company" name="company" class="form-control" placeholder="Company" minlength="0"  maxlength="150" >
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="addr" class="col-form-label"> Addr: </label>
									<input type="text" id="addr" name="addr" class="form-control" placeholder="Addr" minlength="0"  maxlength="150" >
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="tax" class="col-form-label"> Tax: </label>
									<input type="text" id="tax" name="tax" class="form-control" placeholder="Tax" minlength="0"  maxlength="20" >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="accno" class="col-form-label"> Accno: </label>
									<input type="text" id="accno" name="accno" class="form-control" placeholder="Accno" minlength="0"  maxlength="20" >
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group mb-3">
									<label for="bank" class="col-form-label"> Bank: </label>
									<input type="text" id="bank" name="bank" class="form-control" placeholder="Bank" minlength="0"  maxlength="100" >
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group mb-3">
									<label for="swift" class="col-form-label"> Swift: </label>
									<input type="text" id="swift" name="swift" class="form-control" placeholder="Swift" minlength="0"  maxlength="20" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="chanel" class="col-form-label">Contact chanel: </label>
									<select id="chanel" name="chanel" class="form-select" >
										<option value="0">Select...</option>
										<option value="1">Company</option>
										<option value="2">Email</option>
										<option value="3">Website</option>
										<option value="4">Facebook</option>
										<option value="5">Zalo</option>
										<option value="6">Direct</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="level" class="col-form-label"> Level/Ratings: </label>
									<select id="level" name="level" class="form-select" >
										<option value="0">Select...</option>
										<option value="1">1.</option>
										<option value="2">2.</option>
										<option value="3">3.</option>
										<option value="4">4.</option>
										<option value="5">5.</option>
									</select>
								</div>
							</div>	
							<div class="col-md-6" id='select2pr'>
								<div class="form-group mb-3">
									<label for="ofilter" class="col-form-label">Filters/ Search: </label>
									<select name="ofilter[]" class="form-control select2" multiple="multiple" data-placeholder="Select multi value" style="width: 100%;">
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
									<label for="notes" class="col-form-label"> Notes: </label>
									<textarea cols="40" rows="5" id="notes" name="notes" class="form-control" placeholder="Notes" minlength="0"  ></textarea>
								</div>
							</div>

						</div>
						<div class="row">
							<input type="hidden" id="id_creat" name="id_creat" class="form-control">
							<input type="hidden" id="id_update" name="id_update" class="form-control">
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

<?= $this->endSection() ?>
<!-- /.content -->

<!-- page script -->
<?= $this->section("pageScript") ?>
<script>
  // dataTables
  $(function() {
	//X-CSRF-TOKEN check
  	setAjaxCSRF();//********
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
	  "pageLength": 30,
	  "dom": '<"row" <"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>><"row"<t>><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>', //<lf<t>ip>
	  "buttons": [{text: '+ New',className: 'btn btn-success',action: function ( e, dt, node, config ) {save();}}],	  
      "ajax": {
        "url": '<?php echo base_url($controller . "/getAll") ?>',
        "type": "POST",
        "dataType": "json",
        async: "true",
		dataSrc: function (response) { // X-CSRF-TOKEN Update
				setNewCSRF(response.csrf_token);//********
				$.each(response.location,function(index,data){
                $('#location_id').append('<option value="'+data['id']+'">'+data['name']+'</option>');
                });
               return response.data;
        }
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

  function save(obj_id) {
    // reset the form 
    $("#data-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');
	$('.select2').select2({ dropdownParent: $("#select2pr") });//********
    if (typeof obj_id === 'undefined' || obj_id < 1) { //add
      urlController = '<?= base_url($controller ."/add") ?>';
      submitText = '<?= lang("App.save") ?>';
      $('#model-header').removeClass('bg-info').addClass('bg-success');
      $("#info-header-modalLabel").text('<?= lang("App.add") ?> - <?= $ogroup ?>: <?= $ostylename ?> ');
      $("#form-btn").text(submitText);
      $('#data-modal').modal('show');
			$("#data-form #ogroup").val('<?= $ogroup ?>');
			$("#data-form #ostyle").val('<?= $ostyle ?>');
			$("#data-form #ostylecode").val('<?= strtoupper($ostylecode) ?>');
			$("#data-form #ocode").val('Auto');
			$("#data-form #location_id").val('1');
			$("#data-form #id_creat").val('<?= session('id');?>');
			$("#data-form #id_update").val('<?= session('id');?>');
			
	  
    } else { //edit
      urlController = '<?= base_url($controller . "/edit") ?>';
      submitText = '<?= lang("App.update") ?>';
	  setAjaxCSRF();//********
      $.ajax({
        url: '<?php echo base_url($controller . "/getOne") ?>',
        type: 'post',
        data: {
          obj_id: obj_id
        },
        dataType: 'json',
        success: function(response) {
			//console.log(response.csrf_token);//********
			setNewCSRF(response.csrf_token);//********
			response = response.data;//********
          $('#model-header').removeClass('bg-success').addClass('bg-info');
          $("#info-header-modalLabel").text('<?= lang("App.edit") ?> - <?= $ogroup ?>: <?= $ostylename ?> ');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
          //insert data to form
          	$("#data-form #obj_id").val(response.obj_id);
			$("#data-form #ogroup").val(response.ogroup);
			$("#data-form #ostyle").val(response.ostyle);
			$("#data-form #ostylecode").val('<?= strtoupper($ostylecode) ?>');
			$("#data-form #ocode").val(response.ocode);
			$("#data-form #oname").val(response.oname);
			$("#data-form #location_id").val(response.location_id);
			$("#data-form #contact").val(response.contact);
			$("#data-form #tel").val(response.tel);
			$("#data-form #email").val(response.email);
			$("#data-form #bday").val(response.bday);
			$("#data-form #company").val(response.company);
			$("#data-form #tax").val(response.tax);
			$("#data-form #addr").val(response.addr);
			$("#data-form #accno").val(response.accno);
			$("#data-form #bank").val(response.bank);
			$("#data-form #swift").val(response.swift);
			$("#data-form #level").val(response.level);
			$("#data-form #chanel").val(response.chanel);
			$("#data-form #ofilter").val(response.ofilter);
			$("#data-form #notes").val(response.notes);
			$("#data-form #id_creat").val(response.id_creat);
			$("#data-form #id_update").val(response.id_update);
			//$("#data-form #created_at").val(response.created_at);
			//$("#data-form #updated_at").val(response.updated_at);
			//$("#data-form #oactive").val(response.oactive);
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
		
		setAjaxCSRF();//********
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
			  setNewCSRF(response.csrf_token);//********
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
          },
		  error: function(response) {
			  
			  alert(response.messages);
			}
        });
        return false;
      }
    });

    $('#data-form').validate({

      //insert data-form to database

    });
  }
  	
	$("#form-btn").click(function(){
		$('#data-form').submit();
		
	});

  function remove(obj_id) {
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
		setAjaxCSRF();//********
        $.ajax({
          url: '<?php echo base_url($controller . "/remove") ?>',
          type: 'post',
          data: {
            obj_id : obj_id
          },
          dataType: 'json',
          success: function(response) {
			setNewCSRF(response.csrf_token);//********
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
  // In your Javascript (external .js resource or <script> tag)
</script>


<?= $this->endSection() ?>
