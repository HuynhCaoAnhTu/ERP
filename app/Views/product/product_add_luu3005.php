<?= $this->extend("layout/master") ?>
<?= $this->section("content") ?>
<div class="card card-outline card-success card-tabs">
			<div class="card-header p-0 pt-1">
				<ul class="nav nav-tabs" id="scmTab" role="tablist">
				  <li class="nav-item" role="presentation">
					<button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">PRODUCT</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="rates-tab" data-bs-toggle="tab" data-bs-target="#rates" type="button" role="tab" aria-controls="rates" aria-selected="false">ON SALES</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions" type="button" role="tab" aria-controls="transactions" aria-selected="false">TRANSACTIONS</button>
				  </li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content" id="scmTabContent">
<!-- /TAB INFO-->	
					<div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">	
					<!-- Main content -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-6 mt-2">
              <h3 class="card-title">PRODUCT ADD/EDIT</h3>
            </div>
            <div class="col-6">
                <button class="btn btn-success mr-2" id="form-btn-save" onclick="save_product()"><?= lang("App.save") ?></button>
				<!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
				-->
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
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
									<input type="text" id="product_name" name="product_name" class="form-control" placeholder="Product name" minlength="1"  maxlength="250" onfocusout="SlugGen();" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-3">
									<label for="product_categories" class="col-form-label"> Product categories: <span class="text-danger">*</span> </label>
									<select id="product_categories" name="product_categories" class="form-select select2" required>
									<option value="0">Select...</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group mb-3">
									<label for="product_duration" class="col-form-label"> Duration: <span class="text-danger">*</span> </label>
									<select id="product_duration" name="product_duration" class="form-select" required>
										<option value="0">Select</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_guide_lang" class="col-form-label"> Guide lang: </label>
									<select id="product_guide_lang" name="product_guide_lang[]" class="form-select select2" multiple="multiple" data-placeholder="Single or multiple languages " style="width: 100%">
										<option value="vi">Tiếng Việt</option>
										<option value="en">English</option>
										<option value="ko">한국인</option>
										<option value="cn">中国人</option>
										<option value="ru">Русский</option>
										<option value="fr">Français</option>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group mb-3">
									<label for="product_travel_from" class="col-form-label"> Start from: <span class="text-danger">*</span> </label>
									<select id="product_travel_from" name="product_travel_from" class="form-select select2" required>
									</select>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group mb-3">
									<label for="product_location" class="col-form-label"> Travel location: <span class="text-danger">*</span> </label>
									<select id="product_location" name="product_location[]" multiple="multiple" class="form-select select2" required>
										
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
									<label for="product_seo" class="col-form-label"> Product SEO title: </label>
									<textarea cols="40" rows="2" id="product_seo" name="product_seo" class="form-control" placeholder="Product SEO title" minlength="0" maxlength="250" ></textarea>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_lang" class="col-form-label"> Product lang: <span class="text-danger">*</span> </label>
									<select id="product_lang" name="product_lang" class="form-select" disabled>
										<option value="">Select...</option>
										<option value="vi">Tiếng Việt</option>
										<option value="en">English</option>
										<option value="ko">한국인</option>
										<option value="cn">中国人</option>
										<option value="ru">Русский</option>
										<option value="fr">Français</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="id_master" class="col-form-label"> Translate of: </label>
									<input type="text" id="id_master" name="id_master" class="form-control" disabled>
					
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="product_status" class="col-form-label"> Product status: <span class="text-danger">*</span> </label>
									<select id="product_status" name="product_status" class="form-select" disabled>
										<option value="0">Draf</option>
										<option value="1">Published</option>
										<option value="-1">Deleted</option>
										
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label for="update_on" class="col-form-label"> Update on: </label>
									<input type="date" id="update_on" name="update_on" class="form-control" dateISO="true" disabled>
								</div>
							</div>
						</div>
						<div class="row">
						</div>
						<input type="hidden" id="product_id" name="product_id" class="form-control">
						
        </form>          		  
        </div>
      </div>
      <!-- /.card -->
<br>

<!-- /Main content -->
					</div>
<!-- /TAB RATES-->	
					<div class="tab-pane fade" id="rates" role="tabpanel" aria-labelledby="rates-tab">
					  ONSALES
					</div>
<!-- /TAB Transactions-->	
					<div class="tab-pane fade" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
					  TRANSACTIONS
					</div>
				</div>
			</div>
</div>



<!-- ADD modal content -->
<div id="data-modal" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
    <div class="modal-content h-100">
      <div class="text-center bg-info p-1" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
      </div>
      <div class="modal-body">
        
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
var urlController = '';
var submitText = '';
function getUrl() {
    return urlController;
}
function getSubmitText() {
    return submitText;
}

$(function() {
	$.ajax({
        url: '<?php echo base_url($controller . "/getData") ?>',
        type: 'post',
        data: {
          id: <?php echo $translate_id;?>,
		  lang: '<?php echo $lang;?>'
        },
        dataType: 'json',
        success: function(response) {
				$("#data-form #product_desc").val(response.product);
				$.each(response.location,function(index,data){
					$('#product_location').append('<option value="'+data['id']+'">'+data['name']+'</option>');
					$('#product_travel_from').append('<option value="'+data['id']+'">'+data['name']+'</option>');
				});
				
				var p_cat='';
				$.each(response.product_categories,function(index,data){
					if(p_cat!=data['master']){
						if(p_cat!=''){
							$('#product_categories').append('</optgroup>');
						}
						$('#product_categories').append('<optgroup label="'+data['master']+'">');
						$('#product_categories').append('<option value="'+data['id']+'"> + '+data['name']+'</option>');
						p_cat = data['master'];
					}else{
						$('#product_categories').append('<option value="'+data['id']+'"> + '+data['name']+'</option>');
					}
				});
				$('#product_categories').append('</optgroup>');

				$.each(response.product_duration,function(index,data){
					$('#product_duration').append('<option value="'+data['id']+'">'+data['name']+'</option>');
				});
			if (typeof response.product.id === 'undefined' || response.product.id < 1) { //add
				$('#product_lang').val('<?php echo $lang;?>');
				$("#data-form #product_id").val('0');
			}else{
				$("#data-form #product_id").val(response.product.id);
				$("#data-form #product_code").val(response.product.product_code);
				$("#data-form #product_name").val(response.product.product_name);
				$("#data-form #product_categories").val(response.product.product_categories);
				$("#data-form #product_duration").val(response.product.product_duration);
				$("#data-form #product_travel_from").val(response.product.product_travel_from);
				$("#data-form #product_location").val(JSON.parse(response.product.product_location)).trigger('change');
				//$(JSON.parse(product_guide_lang)).trigger('change');
				$("#data-form #product_guide_lang").val(JSON.parse(response.product.product_guide_lang)).trigger('change');
				$("#data-form #product_intro").val(response.product.product_intro);
				$("#data-form #product_desc").val(response.product.product_desc);
				$("#data-form #product_rules").val(response.product.product_rules);
				$("#data-form #product_files").val(response.product.product_files);
				$("#data-form #product_lang").val(response.product.product_lang);
				$("#data-form #id_master").val(response.id_master);	
				$("#data-form #product_filter").val(response.product.product_filter);
				$("#data-form #product_priority").val(response.product.product_priority);
				$("#data-form #product_slugs").val(response.product.product_slugs);
				$("#data-form #product_keywords").val(response.product.product_keywords);
				$("#data-form #product_seo").val(response.product.product_seo);
				$("#data-form #product_status").val(response.product.product_status);
				$("#data-form #update_on").val(response.update_on);
				switch(response.product.product_status) {
				  case 1: // Published
					break;
				  case 2: // UnPublished
					break;
				  default: // 0=DRAF / TEMPLE
				}
			}
			$('#product_lang').readOnly = true;
		}
		});
		//$('.select2').select2({ dropdownParent: $("#select2_guide") });//********product_guide_lang
		 $('.select2').select2();
		
		
	});
	
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
		  url: '<?php echo base_url($controller . "/saveProduct") ?>',
          type: 'post',
          data: form.serialize(),
          cache: false,
          dataType: 'json',
          beforeSend: function() {
            $('#form-btn-save').html('<i class="fa fa-spinner fa-spin"></i>');
          },
          success: function(response) {
            if (response.success === true) {
              Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 2000
              }).then(function() {
                //$('#data_table').DataTable().ajax.reload(null, false).draw(false);
                //$('#data-modal').modal('hide');
				 $('#form-btn-save').html("Save OK");
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
		
            $('#form-btn-save').html("Save");
          }      
        });
        return false;
      }
    });
    $('#data-form').validate({     //insert data-form to database
    });	



	function save_product() {
		 $('#data-form').submit();
      }
  


function SlugGen()
{
    var code, title, slug;
    //Lấy text từ thẻ input title 
    code = document.getElementById("product_code").value;
	title = document.getElementById("product_name").value;
	slug = document.getElementById("product_slugs").value;
	if(code.length>0&&title.length>0&&slug.length==0){
		slug = title+'-'+code;
		//Đổi chữ hoa thành chữ thường
		slug = slug.toLowerCase();
	 
		//Đổi ký tự có dấu thành không dấu
		slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
		slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
		slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
		slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
		slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
		slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
		slug = slug.replace(/đ/gi, 'd');
		//Xóa các ký tự đặt biệt
		slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
		//Đổi khoảng trắng thành ký tự gạch ngang
		slug = slug.replace(/ /gi, "-");
		//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
		//Phòng trường hợp người nhập vào quá nhiều ký tự trắng
		slug = slug.replace(/\-\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-/gi, '-');
		slug = slug.replace(/\-\-/gi, '-');
		//Xóa các ký tự gạch ngang ở đầu và cuối
		slug = '@' + slug + '@';
		slug = slug.replace(/\@\-|\-\@|\@/gi, '');
		//In slug ra textbox có id “slug”
		document.getElementById('product_slugs').value = slug;
	}
}

</script>


<?= $this->endSection() ?>
