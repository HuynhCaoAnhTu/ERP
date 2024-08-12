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
			<th>Duration</th>
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

  function view(id) {
      urlController = '<?= base_url($controller . "/view") ?>';
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
			$("#data-form #product_duration").val(response.product_duration);
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
