<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->
      <div class="card">
        <div class="card-header">
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
              <th>Ocode</th>
<th>Oname</th>
<th>Location id</th>
<th>Contact</th>
<th>Tel</th>
<th>Email</th>
<th>Company</th>
<th>Tax</th>
<th>Addr</th>
<th>Level</th>
<th>Updated at</th>

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
<input type="hidden" id="obj_id" name="obj_id" class="form-control" placeholder="Obj id" maxlength="11" >
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="ogroup" class="col-form-label"> Ogroup: </label>
									<input type="text" id="ogroup" name="ogroup" class="form-control" placeholder="Ogroup" minlength="0"  maxlength="3" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="ostyle" class="col-form-label"> Ostyle: </label>
									<input type="number" id="ostyle" name="ostyle" class="form-control" placeholder="Ostyle" minlength="0"  maxlength="11" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="ocode" class="col-form-label"> Ocode: <span class="text-danger">*</span> </label>
									<input type="text" id="ocode" name="ocode" class="form-control" placeholder="Ocode" minlength="3"  maxlength="10" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="oname" class="col-form-label"> Oname: <span class="text-danger">*</span> </label>
									<input type="text" id="oname" name="oname" class="form-control" placeholder="Oname" minlength="3"  maxlength="150" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="location_id" class="col-form-label"> Location id: </label>
									<select id="location_id" name="location_id" class="form-select" >
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="contact" class="col-form-label"> Contact: <span class="text-danger">*</span> </label>
									<input type="text" id="contact" name="contact" class="form-control" placeholder="Contact" minlength="0"  maxlength="100" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="tel" class="col-form-label"> Tel: </label>
									<input type="text" id="tel" name="tel" class="form-control" placeholder="Tel" minlength="0"  maxlength="50" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="email" class="col-form-label"> Email: </label>
									<input type="email" id="email" name="email" class="form-control" placeholder="Email" minlength="0"  maxlength="50" >
								</div>
							</div>
<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="bday" class="col-form-label"> Bday: </label>
									<input type="date" id="bday" name="bday" class="form-control" dateISO="true" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="company" class="col-form-label"> Company: </label>
									<input type="text" id="company" name="company" class="form-control" placeholder="Company" minlength="0"  maxlength="150" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="tax" class="col-form-label"> Tax: </label>
									<input type="text" id="tax" name="tax" class="form-control" placeholder="Tax" minlength="0"  maxlength="20" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="addr" class="col-form-label"> Addr: </label>
									<input type="text" id="addr" name="addr" class="form-control" placeholder="Addr" minlength="0"  maxlength="150" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="accno" class="col-form-label"> Accno: </label>
									<input type="text" id="accno" name="accno" class="form-control" placeholder="Accno" minlength="0"  maxlength="20" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="bank" class="col-form-label"> Bank: </label>
									<input type="text" id="bank" name="bank" class="form-control" placeholder="Bank" minlength="0"  maxlength="100" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="swift" class="col-form-label"> Swift: </label>
									<input type="text" id="swift" name="swift" class="form-control" placeholder="Swift" minlength="0"  maxlength="20" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="level" class="col-form-label"> Level: </label>
									<input type="number" id="level" name="level" class="form-control" placeholder="Level" minlength="0"  maxlength="1" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="chanel" class="col-form-label"> Chanel: </label>
									<select id="chanel" name="chanel" class="form-select" >
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="ofilter" class="col-form-label"> Ofilter: </label>
									<select id="ofilter" name="ofilter" class="form-select" >
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="notes" class="col-form-label"> Notes: </label>
									<textarea cols="40" rows="5" id="notes" name="notes" class="form-control" placeholder="Notes" minlength="0"  ></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="id_creat" class="col-form-label"> Id creat: </label>
									<select id="id_creat" name="id_creat" class="form-select" >
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
									<label for="id_update" class="col-form-label"> Id update: </label>
									<input type="number" id="id_update" name="id_update" class="form-control" placeholder="Id update" minlength="0"  maxlength="11" >
								</div>
							</div>
<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="created_at" class="col-form-label"> Created at: </label>
									<input type="date" id="created_at" name="created_at" class="form-control" dateISO="true" >
								</div>
							</div>
<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="updated_at" class="col-form-label"> Updated at: </label>
									<input type="date" id="updated_at" name="updated_at" class="form-control" dateISO="true" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="oactive" class="col-form-label"> Oactive: </label>
									<input type="number" id="oactive" name="oactive" class="form-control" placeholder="Oactive" minlength="0"  maxlength="1" >
								</div>
							</div>
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
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollY": '45vh',
      "scrollX": true,
      "scrollCollapse": false,
      "responsive": false,
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

  function save(obj_id) {
    // reset the form 
    $("#data-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');
    if (typeof obj_id === 'undefined' || obj_id < 1) { //add
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
          obj_id: obj_id
        },
        dataType: 'json',
        success: function(response) {
          $('#model-header').removeClass('bg-success').addClass('bg-info');
          $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
          //insert data to form
          			$("#data-form #obj_id").val(response.obj_id);
			$("#data-form #ogroup").val(response.ogroup);
			$("#data-form #ostyle").val(response.ostyle);
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
			$("#data-form #created_at").val(response.created_at);
			$("#data-form #updated_at").val(response.updated_at);
			$("#data-form #oactive").val(response.oactive);

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
        $.ajax({
          url: '<?php echo base_url($controller . "/remove") ?>',
          type: 'post',
          data: {
            obj_id : obj_id
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
