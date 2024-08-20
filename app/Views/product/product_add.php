<?= $this->extend("layout/master") ?>
<?= $this->section("content") ?>

<style>
	.modal-xxl {
		max-width: 90%;
	}

	#form_upload_file {
		display: flex;
		flex-direction: column;
		height: 670px;
		overflow-y: scroll;
	}

	#pagination-container {
		text-align: center;
		margin-top: 20px;
	}

	.pagination {
		justify-content: flex-end;
	}

	.pagination-link {
		display: inline-block;
		padding: 7px 12px;
		margin: 5px 5px;
		border: 1px solid #ddd;
		border-radius: 5px;
		color: #007bff;
		text-decoration: none;
		background-color: #f8f9fa;
	}

	.pagination-link:hover {
		background-color: #e2e6ea;
		border-color: #007bff;
		color: #0056b3;
	}

	.pagination-link.active {
		background-color: #007bff;
		color: white;
		border-color: #007bff;
	}

	.pagination-link.disabled {
		color: #6c757d;
		pointer-events: none;
		cursor: not-allowed;
	}

	.pick-image-container {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;


	}

	.panel-primary {
		border-color: transparent;
		background-color: #f4f6f9;
	}

	.img-div {

		position: relative;
		width: 100px;
		float: left;
		margin-right: 5px;
		margin-left: 5px;
		margin-bottom: 10px;
		margin-top: 10px;
	}

	.image {
		opacity: 1;
		display: block;
		width: 100px;
		height: 100px;
		max-width: auto;
		transition: .5s ease;
		backface-visibility: hidden;
	}

	.pick-image-content {
		display: flex;
		margin: 10px;
		text-align: center;
	}

	.pick-image-content input[type="checkbox"] {
		display: none;
		/* Hide the checkbox itself */
	}

	.pick-image-content p {
		display: block;
		width: 100%;
		overflow: hidden;
		/* Hide overflow text */
		text-overflow: ellipsis;
		/* Add ellipsis for overflow text */
		white-space: nowrap;
		margin-top: 5px;
		/* Add space between image and text */
		font-size: 14px;
		/* Adjust font size as needed */
	}

	.pick-image-content label {
		width: 150px;
		height: 170px;
		cursor: pointer;
		display: block;
		position: relative;
		transition: transform 0.2s;
	}

	.pick-image-content img {
		width: 150px;
		height: 150px;
		margin-top: 4px;
		border-radius: 15px;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		transition: box-shadow 0.2s, transform 0.2s;
	}

	.pick-image-content label:hover img {
		box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
		transform: scale(1.05);
	}

	.pick-image-content input[type="checkbox"]:checked+label img {
		border: 4px solid #007bff;
		transform: scale(1.05);

	}

	.select2-container {
		z-index: 2000 !important;

	}

	.form-group .select2-container {
		z-index: 1000 !important
	}

	.filter-image {
		display: flex;
		justify-content: flex-end;
		gap: 20px;
		padding: 10px;

	}
</style>
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
							<div class="col-9 mt-2">
								<h3 class="card-title" id="form-title">PRODUCT ADD/EDIT</h3>
							</div>
							<div class="col-3">
								<button class="btn btn-success mr-2" id="form-btn-save" onclick="save_product()"><?= lang("App.save") ?></button>
								<a href=<?= base_url($controller . "/viewFullProduct" . "/" . $translate_id) ?>><button class="btn btn-success mr-2" id="form-btn-view-product">View</button></a>

								<!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
				-->
							</div>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form id="data-form" class="pl-3 pr-3">
							<div class="row">
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group mb-3">
												<label for="product_code" class="col-form-label"> Product code: <span class="text-danger">*</span> </label>
												<input type="text" id="product_code" name="product_code" class="form-control" placeholder="Product code" minlength="1" maxlength="50" oninput="this.value = this.value.toUpperCase()" required>
											</div>
										</div>
										<div class="col-md-9">
											<div class="form-group mb-3">
												<label for="product_name" class="col-form-label"> Product name: <span class="text-danger">*</span> </label>
												<input type="text" id="product_name" name="product_name" class="form-control" placeholder="Product name" minlength="1" maxlength="250" onfocusout="SlugGen();" required>
											</div>
										</div>

									</div>

									<div class="row">


										<div class="col-md-12">
											<div class="form-group mb-3">
												<label class="col-form-label"> Product intro: <span class="text-danger">*</span> </label>
												<div class="summernote" id="product_intro_editor" name="product_intro_editor"></div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group mb-3">
												<label class="col-form-label"> Product desc: <span class="text-danger">*</span> </label>
												<div class="summernote" id="product_desc_editor" name="product_desc_editor"></div>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group mb-3">
												<label class="col-form-label"> Product rules: <span class="text-danger">*</span> </label>
												<div class="summernote" id="product_rules_editor" name="product_rules_editor"></div>
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group mb-3">

												<label for="product_images" class="col-form-label"> Product files: </label>
												<input type="text" id="product_images" name="product_images" class="form-control" placeholder="Product files" minlength="0" maxlength="1000">
												<button type="button" class="btn btn-success" id="#data-upload-image" onclick="choose_file()">
													Choose File
												</button>
												<div id="image_preview" style="width:100%;">
													<!-- Các div chứa ảnh sẽ được thêm vào đây bởi JavaScript -->
												</div>
											</div>
										</div>

									</div>

								</div>
								<div class="col-md-3 card">
									<div class="row">
										<div class="form-group mb-3">
											<label for="product_status" class="col-form-label"> Product status: <span class="text-danger">*</span> </label>
											<select id="product_status" name="product_status" class="form-select">
												<option value="0">Draf</option>
												<option value="1">Published</option>
												<option value="-1">Deleted</option>

											</select>
										</div>
									</div>
									<div class="row">
										<div class="form-group mb-3">
											<label for="product_lang_view" class="col-form-label"> Product lang: <span class="text-danger">*</span> </label>
											<select id="product_lang_view" name="product_lang_view" class="form-select" disabled>
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
									<div class="row">
										<div class="form-group mb-3">
											<label for="id_master" class="col-form-label"> Translate of: </label>
											<input type="text" id="id_master" name="id_master" class="form-control" disabled>

										</div>
									</div>
									<div class="row">
										<div class="form-group mb-3">
											<label for="product_categories" class="col-form-label"> Product categories: <span class="text-danger">*</span> </label>
											<select id="product_categories" name="product_categories" class="form-select select2" required>
												<option value="0">Select...</option>
											</select>
										</div>
									</div>

									<div class="row">
										<div class="form-group mb-3">
											<label for="product_duration" class="col-form-label"> Duration: <span class="text-danger">*</span> </label>
											<select id="product_duration" name="product_duration" class="form-select select2" required>
												<option value="0">Select...</option>
											</select>
										</div>
									</div>

									<div class="row">
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

									<div class="row">
										<div class="form-group mb-3">
											<label for="product_travel_from" class="col-form-label"> Start from: <span class="text-danger">*</span> </label>
											<select id="product_travel_from" name="product_travel_from" class="form-select select2" required>
												<option value="0">Select...</option>
											</select>
										</div>
									</div>

									<div class="row">
										<div class="form-group mb-3">
											<label for="product_location" class="col-form-label"> Travel location: <span class="text-danger">*</span> </label>
											<select id="product_location" name="product_location[]" multiple="multiple" class="form-select select2" required>

											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group mb-3">
												<label for="product_slugs" class="col-form-label"> Product slugs: <span class="text-danger">*</span> </label>
												<input type="text" id="product_slugs" name="product_slugs" class="form-control" placeholder="Product slugs" minlength="1" maxlength="100" required>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group mb-3">
												<label for="product_keywords" class="col-form-label"> Product keywords: </label>
												<input type="text" id="product_keywords" name="product_keywords" class="form-control" placeholder="Product keywords" minlength="0" maxlength="100">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group mb-3">
												<label for="product_seo" class="col-form-label"> Product SEO title: </label>
												<textarea cols="40" rows="4" id="product_seo" name="product_seo" class="form-control" placeholder="Product SEO title" minlength="0" maxlength="250"></textarea>

											</div>
										</div>
									</div>


								</div>
							</div>
							<div class="row">
								<input type="hidden" id="product_id" name="product_id" class="form-control">
								<input type="hidden" id="product_lang" name="product_lang" class="form-control">
								<input type="hidden" id="product_intro" name="product_intro" class="form-control">
								<input type="hidden" id="product_desc" name="product_desc" class="form-control">
								<input type="hidden" id="product_rules" name="product_rules" class="form-control">


							</div>
						</form>
					</div>
				</div>
				<!-- /.card -->
				<br>

				<!-- /Main content -->
			</div>
			<!-- /TAB RATES-->
			<div class="tab-pane fade" id="rates" role="tabpanel" aria-labelledby="rates-tab">
				<div class="row" id="tab_onsales" data-tab="tab2">
					<div class="onsales_action">
						<div><button class="dt-button btn btn-success" tabindex="0" type="button" onclick="select_onsales_style()"><span>+ Add new</span></button></div>

						<div class="col-md-3 onsales_filter">
							<div><b>Show by:</b> </div>
							<div class="filter_select_content">
								<select id="onsales_filter_select" class="form-select" onchange="onsales_filter()">
									<option value="9" selected>All</option>
									<option value="1"> Actived</option>
									<option value="0">Darf</option>
									<option value="2">Inactive</option>
									<option value="-1">Del</option>
									<option value="3">Sold out</option>
								</select>
							</div>
						</div>
					</div>
					<hr>
				</div>
				<div class="onsales_price_content">

				</div>
			</div>
			<!-- /TAB Transactions-->
			<div class="tab-pane fade" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
				<div class="row" id="tab_transactions">
					TRANSACTIONS
					<div class="row">
						<div class="col-md-4">Info<br>B2B file</div>
						<div class="col-md-2">
							<table class="table">
								<tr>
									<th>Date</th>
									<td>01/08/2024</td>
								</tr>
								<th>Cutoff</th>
								<td>01/07/2024</td>
								</tr>
								<th>Slot</th>
								<td>25</td>
								</tr>
								<th>Over</th>
								<td>0</td>
								</tr>
								<tr>
							</table>
						</div>

						<div class="col-md-4">
							<table class="table table-bordered">
								<tr>
									<th>SKU</th>
									<th>Item</th>
									<th>B2C Price</th>
									<th>B2B Discount</th>
								</tr>
								<tr>
									<td>001</td>
									<td>Người lớn</td>
									<td class="text-right">10.000.000đ</td>
									<td class="text-right">1.000.000đ</td>
								</tr>
								<tr>
									<td>001</td>
									<td>Trẻ em</td>
									<td class="text-right">9.000.000đ</td>
									<td class="text-right">1.000.000đ</td>
								</tr>
								<tr>
									<td>001</td>
									<td>Em bé</td>
									<td>5.000.000đ</td>
									<td class="text-right">0đ</td>
								</tr>
								<tr>
									<td>001</td>
									<td>Phụ thu phòng đơn</td>
									<td>5.000.000đ</td>
									<td>0đ</td>
								</tr>
							</table>
						</div>
						<div class="col-md-2 card card-outline card-success">
							<div class="col-md-12">taothang@gmail.com<br>Update: 2024/01/01 10:10:10<br>Sale:<br>Op:<br><br></div>
							<div class="col-md-12" style="position:absolute; bottom:5px;"><button type="button" id="edit-onsales-raw" class="btn btn-success">Active</button> <button type="button" id="edit-onsales-raw" class="btn btn-danger">Edit</button></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- modal select add onsales  -->
	<div class="modal fade" id="modal-onsales-style" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="title-123">SELECT STYLE ONSALES</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<button type="button" id="modal-1" class="btn btn-danger">Single day</button>
						<p id="msg-1" class="text-center">Single day (Outbound)</p>
						<button type="button" id="modal-2" class="btn btn-danger">Multiple days</button>
						<p id="msg-2" class="text-center">Multi days (CDLK)</p>
						<button type="button" id="modal-3" class="btn btn-danger">Date range</button>
						<p id="msg-3" class="text-center">Day to day (Daily, Hotel packed)</p>
						<button type="button" id="modal-4" class="btn btn-danger">Inbound</button>
						<p id="msg-4" class="text-center">Price according to customer group and hotel</p>
						<button type="button" id="modal-5" class="btn btn-danger">Private</button>
						<p id="msg-5" class="text-center">Private, onrequest and other (Not public)</p>
					</div>
				</div>
				<div class="modal-footer justify-content-center">

					<button type="button" id="modal-close" class="btn btn-success" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- modal add onsales  -->
	<!-- ADD modal content -->
	<div id="data-modal-onsales" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xxl">
			<div class="modal-content">
				<div class="text-center bg-warning" id="model-header">
					<h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
				</div>
				<div class="modal-body" id="onsales-form" name="onsales-form">

				</div>
				<div class="modal-footer">
					
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!-- /ADD modal content -->

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
	<div class="modal" id="data-upload-image" style="    overflow: hidden;">
		<div class="modal-dialog" style="max-width: 1170px; margin: 1.75rem auto;">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Choose File</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="filter-image">
						<select style="width: 200px;" id="image_location" name="image_location[]" multiple="multiple" class="form-select select2">
						</select>
						<input type="text" id="search_input" placeholder="Keyword">
						<button type="submit" class="btn btn-success mr-2" id="btn-upload-file"><?= lang("App.save") ?></button>
					</div>
					<form id="form_upload_file" method="post">
						<div class="pick-image-container"></div>
						<div id="pagination-container" class="pagination"></div>

					</form>




				</div>
			</div>
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
	var urlController = '';
	var formAction = '';
	var submitText = '';
	var id_product = 0;
	var id_product = parseInt('<?php echo $translate_id; ?>');
	var filter_onsales_selected = 9;

	function getUrl() {
		return urlController;
	}

	function containsArray(outerArray, innerArray) {
		return innerArray.every(item => outerArray.includes(item));
	}
	// TU
	$(document).ready(function() {
		// Khởi tạo select2 cho phần tử với ID image_location
		$('#image_location').select2();

		// Bắt sự kiện thay đổi giá trị
		$('#image_location').on('change', function() {
			var values = $(this).val(); // Lấy tất cả giá trị đã chọn
			const allimages = document.querySelectorAll('.pick-image-content');
			const lowercaseValue = values;
			console.log(lowercaseValue)
			allimages.forEach(image => {
				const checkbox = image.querySelector('.check');
				const id_location = checkbox.dataset.idlocation;
				console.log(id_location)
				if (!containsArray(id_location, values)) {
					image.style.display = 'none';
				} else {
					image.style.display = 'flex';
				}
			});
		});


	});


	function getSubmitText() {
		return submitText;
	}

	function choose_file() {
		$('.pick-image-container').html("");
		$('#image_location').html("");
		$('#form_upload_file')[0].reset();
		$('#search_input').val();
		$.ajax({
			url: '<?php echo base_url($controller . "/choosefile") ?>',
			type: 'get',
			dataType: 'json',
			success: function(response) {
				$.each(response.image, function(index, data) {
					$('.pick-image-container').append(`
                    <div class="pick-image-content">
                        <input style="height: 20px;" class="check" type="checkbox" id="${data['id']}" name="image_ids[]" value="${data['image_name']}" data-keyword="${data['keyword']}" data-id="${data['id']}" data-idlocation=${data['id_location']}>
                        <label for="${data['id']}">
                            <img src="<?php echo base_url() ?>uploads/${data['image_name']}" alt="" srcset="">
                            <p>${data['image_name']}_${data['keyword']}</p>
                        </label>
                        <br>
                    </div>
                `);
				});
				var image_location = response.location;
				console.log(image_location);
				$.each(image_location, function(index, data) {
					$('#image_location').append('<option value="' + data['id'] + '">' + data['name'] + '</option>');
				});

				// renderPagination(response.total_pages, page);

				$('#data-upload-image').modal('show');



				$('.check').change(function() {
					var maxCheckboxes = 5; // Số lượng checkbox tối đa
					var selectedCheckboxes = $('.check:checked').length; // Đếm số checkbox đã được chọn

					// Kiểm tra checkbox hiện tại có được chọn hay không
					if ($(this).is(':checked')) {
						// Nếu được chọn, tăng số lượng checkbox đã chọn lên 1
						selectedCheckboxes++;
					} else {
						// Nếu bị bỏ chọn, giảm số lượng checkbox đã chọn xuống 1
						selectedCheckboxes--;
					}

					// Nếu số lượng checkbox đã chọn vượt quá giới hạn
					if (selectedCheckboxes > maxCheckboxes + 1) {
						// Bỏ chọn checkbox hiện tại
						$(this).prop('checked', false);
						Swal.fire({
							toast: true,
							position: 'top-end',
							icon: 'error',
							title: 'Upload limit is ' + maxCheckboxes + ' images',
							showConfirmButton: false,
							timer: 2500
						})
					}
				});


				searchHandle();
			},
			error: function(xhr, status, error) {
				console.error('AJAX Error:', status, error);
				console.error(xhr.responseText);
			}
		});
	}

	// function renderPagination(totalPages, currentPage) {
	// 	const paginationContainer = $('#pagination-container');
	// 	paginationContainer.html('');

	// 	const addPageLink = (pageNumber, text = pageNumber) => {
	// 		const activeClass = pageNumber === currentPage ? 'active' : '';
	// 		return `<a href="#" onclick="choose_file(${pageNumber}); return false;" class="pagination-link ${activeClass}">${text}</a> `;
	// 	};

	// 	if (currentPage > 1) {
	// 		paginationContainer.append(addPageLink(currentPage - 1, 'Previous'));
	// 	}

	// 	if (currentPage > 3) {
	// 		paginationContainer.append(addPageLink(1));
	// 		paginationContainer.append('<span style="padding-top: 20px ">...</span>');
	// 	}

	// 	const startPage = Math.max(currentPage - 1, 1);
	// 	const endPage = Math.min(currentPage + 1, totalPages);

	// 	for (let i = startPage; i <= endPage; i++) {
	// 		paginationContainer.append(addPageLink(i));
	// 	}

	// 	if (currentPage < totalPages - 2) {
	// 		paginationContainer.append('<span style="padding-top: 20px ">...</span>');
	// 		paginationContainer.append(addPageLink(totalPages));
	// 	}

	// 	if (currentPage < totalPages) {
	// 		paginationContainer.append(addPageLink(currentPage + 1, 'Next'));
	// 	}
	// }



	function searchHandle() {
		const searchInput = document.querySelector('#search_input');
		searchInput.addEventListener('input', e => {

			let count = 0;
			const allimages = document.querySelectorAll('.pick-image-content');
			const value = e.target.value;
			const lowercaseValue = value.toLowerCase();
			console.log(lowercaseValue)
			allimages.forEach(image => {
				const checkbox = image.querySelector('.check');
				const keyword = checkbox.dataset.keyword.toLowerCase();
				if (!keyword.includes(lowercaseValue)) {
					image.style.display = 'none';
				} else {
					image.style.display = 'flex';
				}
			});


		})
	}

	$(document).ready(function() {
		$('.summernote').summernote();
		$('.select2').select2();
		$('#data-modal-onsales').modal({
			backdrop: 'static',
			keyboard: false
		});
		$('div.note-editable').css({
			'min-height': 150 + 'px'
		});
		$('#btn-upload-file').on('click', function() {
			// Serialize form data
			var selectedImages = [];
			$('input[name="image_ids[]"]:checked').each(function() {
				var id = $(this).data('id');
				var imageName = $(this).val();
				var keyword = $(this).data('keyword');
				var id_location = $(this).data('idlocation');
				selectedImages.push({
					id: id,
					image_name: imageName,
					keyword: keyword,
					id_location: id_location
				});
			});
			console.log(selectedImages)
			var formData = {
				images: selectedImages
			};

			// Send AJAX request
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url($controller . "/choosedfile") ?>',
				data: formData,
				success: function(response) {
					console.log(response)
					var images = JSON.stringify(response);
					$('#product_images').val();
					$('#product_images').val(images);
					$('#data-upload-image').modal('hide');
					$('#image_preview').html("");
					$.each(response, function(index, data) {
						$('#image_preview').append(
							"<div class='img-div' id='img-div" + data.id + "'>" +
							"<img src='" + "<?php echo base_url('/uploads'); ?>" + "/" + data.image_name + "' class='image img-thumbnail'  title='" + data.keyword + "' loading='lazy'>" +
							"<div class='middle'>" +
							"</div>" +
							"</div>"
						);
					});

				},
				error: function(xhr, status, error) {
					alert('An error occurred: ' + error);
				}
			});
		});
	});
	// TU

	$(function() {
		$.ajax({
			url: '<?php echo base_url($controller . "/getData") ?>',
			type: 'post',
			data: {
				id: <?php echo $translate_id; ?>,
				lang: '<?php echo $lang; ?>'
			},
			dataType: 'json',
			success: function(response) {
				$("#data-form #product_desc").val(response.product);
				$.each(response.location, function(index, data) {
					$('#product_location').append('<option value="' + data['id'] + '">' + data['name'] + '</option>');
					$('#product_travel_from').append('<option value="' + data['id'] + '">' + data['name'] + '</option>');
				});

				var p_cat = '';
				$.each(response.product_categories, function(index, data) {
					if (p_cat != data['master']) {
						if (p_cat != '') {
							$('#product_categories').append('</optgroup>');
						}
						$('#product_categories').append('<optgroup label="' + data['master'] + '">');
						$('#product_categories').append('<option value="' + data['id'] + '"> + ' + data['name'] + '</option>');
						p_cat = data['master'];
					} else {
						$('#product_categories').append('<option value="' + data['id'] + '"> + ' + data['name'] + '</option>');
					}
				});
				$('#product_categories').append('</optgroup>');

				$.each(response.product_duration, function(index, data) {
					$('#product_duration').append('<option value="' + data['id'] + '">' + data['name'] + '</option>');
				});
				if (typeof response.product.id === 'undefined' || response.product.id < 1) { //add

					$('#form-title').html('ADD NEW PRODUCT');
					$('#data-form #product_lang').val('<?php echo $lang; ?>');
					$('#data-form #product_lang_view').val('<?php echo $lang; ?>');
					$("#data-form #product_id").val('0');
					formAction = 'addProduct';
				} else {
					formAction = 'saveProduct';
					$('#form-title').html('EDIT PRODUCT: #' + response.product.id + ' (Last updated:' + response.product.update_on + ')');
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
					$("#data-form #product_intro_editor").summernote('code', response.product.product_intro);
					$("#data-form #product_desc_editor").summernote('code', response.product.product_desc);
					$("#data-form #product_rules_editor").summernote('code', response.product.product_rules);
					$("#data-form #product_images").val(response.product.product_images);
					var imagesArray = JSON.parse(response.product.product_images)
					$.each(imagesArray, function(index, data) {
						$('#image_preview').append(
							"<div class='img-div' id='img-div" + data.id + "'>" +
							"<img src='" + "<?php echo base_url('/uploads'); ?>" + "/" + data.image_name + "' class='image img-thumbnail' title='" + data.keyword + "'>" +
							"</div>"
						);
					});
					$("#data-form #product_lang").val(response.product.product_lang);
					$("#data-form #product_lang_view").val(response.product.product_lang);
					$("#data-form #id_master").val(response.id_master);
					$("#data-form #product_filter").val(response.product.product_filter);
					$("#data-form #product_priority").val(response.product.product_priority);
					$("#data-form #product_slugs").val(response.product.product_slugs);
					$("#data-form #product_keywords").val(response.product.product_keywords);
					$("#data-form #product_seo").val(response.product.product_seo);
					$("#data-form #product_status").val(response.product.product_status);
					switch (response.product.product_status) {
						case 1: // Published
							break;
						case 2: // UnPublished
							break;
						default: // 0=DRAF / TEMPLE
					}
				}

			}
		});
		//$('.select2').select2({ dropdownParent: $("#select2_guide") });//********product_guide_lang


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
			$("#data-form #product_intro").val($('#product_intro_editor').summernote('code'));
			$("#data-form #product_desc").val($('#product_desc_editor').summernote('code'));
			$("#data-form #product_rules").val($('#product_rules_editor').summernote('code'));
			$(".text-danger").remove();
			$.ajax({
				url: '<?php echo base_url($controller . "/") ?>' + formAction,
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
	$('#data-form').validate({ //insert data-form to database
	});

	function save_product() {
		$('#data-form').submit();
	}
	// onsales filter
	function onsales_filter() {
		var selectElement = document.getElementById('onsales_filter_select');
		filter_onsales_selected = selectElement.value;
		console.log(filter_onsales_selected)
		$.ajax({
			url: '<?php echo base_url($controller . "/listOnSales") ?>',
			type: 'post',
			data: {
				id_product: id_product,
				id_status: filter_onsales_selected
			},
			dataType: 'json',
			success: function(data) {
				// console.log('AJAX response:', data);
				$('.onsales_price_content').html(data.html);
			},
			error: function() {
				$('.onsales_price_content').html('PRODUCT NOT FOUND!');
			}
		});
	}
	//TAB rates-tab
	$('#rates-tab').click(function() {
		if (id_product > 0) {
			$.ajax({
				url: '<?php echo base_url($controller . "/listOnSales") ?>',
				type: 'post',
				data: {
					id_product: id_product,
					id_status: 9
				},
				dataType: 'json',
				success: function(data) {
					// console.log('AJAX response:', data);
					$('.onsales_price_content').html(data.html);
				},
				error: function() {
					$('.onsales_price_content').html('PRODUCT NOT FOUND!');
				}
			});
		} else {
			$('onsales_price_content').html('NOT FOUND!');
		}

	});


	function select_onsales_style() {
		var dfd = jQuery.Deferred();
		var $confirm = $('#modal-onsales-style');
		$confirm.modal('show');
		$('#modal-1').off('click').click(function() {
			$confirm.modal('hide');
			$('.overlay').remove();
			// Xóa lớp phủ
			add_onsales_1()

		});
		$('#modal-2').off('click').click(function() {
			$confirm.modal('hide');
			$('.overlay').remove();
			// Xóa lớp phủ
			add_onsales_2()
		});
		$('#modal-3').off('click').click(function() {
			$confirm.modal('hide');
			add_onsales_2()
		});
		$('#modal-4').off('click').click(function() {
			$confirm.modal('hide');

			add_onsales_4();

		});

		$('#modal-close').off('click').click(function() {
			$confirm.modal('hide');
			return 0;
		});
		return dfd.promise();
	}


	function add_onsales_1() {
		$.ajax({
			url: '<?php echo base_url($controller . "/getTempOnsalesForm") ?>',
			type: 'post',
			data: {
				id_product: id_product,
				onsale_style: 1
			},
			dataType: 'json',
			success: function(response) {
				$('#model-header').addClass('bg-info');
				$("#info-header-modalLabel").text('Single-ADD');
				$("#form-btn").text(submitText);
				$("#onsales-form").html(response.html);
				$('.modal-backdrop').remove();
				$('#data-modal-onsales').modal('show');


			},
			error: function(xhr, status, error) {
				console.error('AJAX Error:', status, error); // Kiểm tra lỗi nếu có
				console.error(xhr.responseText); // In ra nội dung phản hồi lỗi
			}
		});

	}

	function add_onsales_4() {
		$.ajax({
			url: '<?php echo base_url($controller . "/getTempOnsalesForm") ?>',
			type: 'post',
			data: {
				id_product: id_product,
				onsale_style: 4
			},
			dataType: 'json',
			success: function(response) {
				$('#model-header').addClass('bg-info');
				$("#info-header-modalLabel").text('InBound-ADD');
				$("#form-btn").text(submitText);
				$("#onsales-form").html(response.html);
				$('.modal-backdrop').remove();
				$('#data-modal-onsales').modal('show');
				$("#data-modal-onsales .modal-footer").html(`<button type="submit" class="btn btn-success mr-2" id="form-onsales-btn" onclick="save_onsale()"><?= lang("App.save") ?></button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button> `);


			},
			error: function(xhr, status, error) {
				console.error('AJAX Error:', status, error); // Kiểm tra lỗi nếu có
				console.error(xhr.responseText); // In ra nội dung phản hồi lỗi
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
		}

	});

	$('#data-form-onsales').validate({

		//insert data-form to database

	});

	function add_onsales_2() {
		alert('select2');
	}

	function add_onsales_3() {
		alert('select3');
	}

	// Edit Ónales
	function edit_onsales(id_onsales, act) {
		// reset the form 
		//$("data-form-onsales")[0].reset();
		//$(".form-control").removeClass('is-invalid').removeClass('is-valid');
		if (typeof id_onsales === 'undefined' || id_onsales < 1) { //add
			// urlController = '<?= base_url($controller . "/addOnsales") ?>';
			// submitText = '<?= lang("App.save") ?>';
			// $('#model-header').removeClass('bg-info').addClass('bg-success');
			// $("#info-header-modalLabel").text('<?= lang("App.add") ?>');
			// $("#form-btn").text(submitText);
			// $('#data-modal-onsales').modal('show');
			return false;
		}
		if (act == 1) { //edit
			urlController = '<?= base_url($controller . "/saveOnsales") ?>';
			submitText = '<?= lang("App.update") ?>';
			$.ajax({
				url: '<?php echo base_url($controller . "/getOnsalesForm") ?>',
				type: 'post',
				data: {
					id_onsales: id_onsales
				},
				dataType: 'json',
				success: function(response) {
					$('#model-header').removeClass('bg-success').addClass('bg-info');
					$("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
					$("#form-btn").text(submitText);
					$("#onsales-form").html(response.html);
					$('#data-modal-onsales').modal('show');
					$("#data-modal-onsales .modal-footer").html(`<button type="button" class="btn btn-success mr-2" id="form-onsales-btn" onclick="update_onsale()"><?= lang("App.save") ?></button>
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>`);


				}
			});

		} else { //add
			urlController = '<?= base_url($controller . "/saveOnsalesNew") ?>';
			submitText = '<?= lang("App.update") ?>';
			$.ajax({
				url: '<?php echo base_url($controller . "/getTempOnsalesForm") ?>',
				type: 'post',
				data: {
					id_onsales: id_onsales
				},
				dataType: 'json',
				success: function(response) {
					$('#model-header').removeClass('bg-success').addClass('bg-info');
					$("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
					$("#form-btn").text(submitText);
					$("#onsales-form").html(response.html);
					$('#data-modal-onsales').modal('show');
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
			}

		});

		$('#data-form-onsales').validate({

			//insert data-form to database

		});
	}
	//-----
	function save_product_onsales() {
		var form = $('#data-form-onsales');
		$(".text-danger").remove();
		$.ajax({
			url: urlController,
			type: 'post',
			data: form.serialize(),
			cache: false,
			dataType: 'json',
			beforeSend: function() {
				$('#form-onsales-btn').html('<i class="fa fa-spinner fa-spin"></i>');
			},
			success: function(response) {
				alert(JSON.stringify(response)); // Check!!!
				if (response.success === true) {
					Swal.fire({
						toast: true,
						position: 'top-end',
						icon: 'success',
						title: response.messages,
						showConfirmButton: false,
						timer: 1500
					}).then(function() {
						//load lại trang onsales
						//$('#data_table').DataTable().ajax.reload(null, false).draw(false);
						$('#data-modal-onsales').modal('hide');
						$('#rates-tab').click();
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
				//            $('#form-onsales-btn').html(response.messages);
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		});

	}


	function SlugGen() {
		var code, title, slug;
		//Lấy text từ thẻ input title 
		code = document.getElementById("product_code").value;
		title = document.getElementById("product_name").value;
		slug = document.getElementById("product_slugs").value;
		if (code.length > 0 && title.length > 0 && slug.length == 0) {
			slug = title + '-' + code;
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

	// $('#data-modal-onsales').on('hidden.bs.modal', function() {
	// 	$('.modal-backdrop').remove(); // Xóa lớp phủ của Modal 1
	// });

	// $('#modal-onsales-style').on('shown.bs.modal', function() {
	// 	$('#modal2').modal('show'); // Mở Modal 2 khi Modal 1 được mở
	// });

	// $('#modal-onsales-style').on('hidden.bs.modal', function() {
	// 	$('.modal-backdrop').remove(); // Xóa lớp phủ của Modal 1
	// });
	// $('#data-modal-onsales').on('hidden.bs.modal', function() {
	// 	$('.modal-backdrop').remove(); // Xóa lớp phủ của Modal 1
	// });

	// $('#modal-onsales-style').on('shown.bs.modal', function() {
	// 	$('#data-modal-onsales').modal('show'); // Mở Modal 2 khi Modal 1 được mở
	// });
	// 	document.getElementById('modal1').addEventListener('hidden.bs.modal', function () {
	//     var backdrop = document.querySelector('.modal-backdrop');
	//     if (backdrop) {
	//         backdrop.remove(); // Xóa lớp phủ của Modal 1
	//     }
	// });

	// document.getElementById('modal1').addEventListener('shown.bs.modal', function () {
	//     var modal2 = new bootstrap.Modal(document.getElementById('modal2'));
	//     modal2.show(); // Mở Modal 2 khi Modal 1 được mở
	// });
</script>


<?= $this->endSection() ?>