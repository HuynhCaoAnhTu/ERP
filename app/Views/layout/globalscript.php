<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('asset/js/jquery-3.6.0.min.js') ?>"></script>
<!-- Bootstrap 5 with Popper.js-->
<script src="<?= base_url('asset/js/bootstrap.bundle.min.js') ?>"></script>

<!-- overlayScrollbars -->
<script src="<?= base_url('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src=" <?= base_url('asset/js/adminlte.min.js') ?>"></script>
<script src=" <?= base_url('asset/js/select2.min.js') ?>"></script>
<script src=" <?= base_url('asset/js/summernote.min.js') ?>"></script>

<!-- Page Global Script -->
<!-- Toggle Button -->
<script src="<?= base_url('asset/js/bootstrap4-toggle.min.js') ?>"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url('asset/js/sweetalert2.all.min.js') ?>"></script>
<!-- jquery-validation -->
<script src="<?= base_url('asset/js/jquery.validate.min.js') ?>"></script>

<!-- DataTables Full Function -->
<script src="<?= base_url("asset/plugins/datatables/DataTables-1.11.3/js/jquery.dataTables.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/Buttons-2.0.1/js/dataTables.buttons.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/JSZip-2.5.0/jszip.min.js") ;?>" type="text/javascript"></script>					
<script src="<?= base_url("asset/plugins/datatables/Buttons-2.0.1/js/buttons.print.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/Buttons-2.0.1/js/buttons.html5.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/Responsive-2.2.9/js/dataTables.responsive.min.js") ;?>" type="text/javascript"></script>
<script src="<?= base_url("asset/plugins/datatables/Responsive-2.2.9/js/responsive.bootstrap5.min.js") ;?>" type="text/javascript"></script>

<!-- Active menu Function -->
<script>
$(function () {
	var lang = '<?=session('lang');?>';
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');

	$('#lang_vi').on('click', function (e) {
	  e.preventDefault();
	  setLang('vi');
	})
	$('#lang_en').on('click', function (e) {
	  e.preventDefault();
	  setLang('en');
	})

});
/////////////////////////////
function setLang(newlang){
	var oldlang = '<?=session('lang');?>';
	if(oldlang!=newlang){
		$.ajax({
			url: '<?php echo base_url("/lang") ?>',
			type: 'post',
			data: {
			  lang: newlang
			},
			dataType: 'json',
			success: function(response) {
			}
		});	  		
		window.location.reload(true);
	}
}
//
function setAjaxCSRF(){
$.ajaxPrefilter(function(options,originalOptions,jqXHR) {
        jqXHR.setRequestHeader('X-CSRF-Token', document.getElementsByTagName("META")["X-CSRF-TOKEN"].content);
    });
}
function setNewCSRF(csrf_token){
	if(csrf_token !== undefined) $('meta[name=X-CSRF-TOKEN]').attr("content", csrf_token);
}

</script>
