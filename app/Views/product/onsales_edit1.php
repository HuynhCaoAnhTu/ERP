<style>
	.select_option {
		display: flex;
		justify-content: flex-start;
		gap: 30px;
	}

	.table_onsale_information td {
		padding: 15px 0px;
	}

	.table_onsale_information th {
		vertical-align: middle;
	}

	.table_onsale_price_infor th {
		vertical-align: middle;
		text-align: center;
	}

	.col_action {
		display: flex;
		gap: 10px;
	}
</style>
<form id="data-form-onsales" class="pl-3 pr-3">
	<!-- <h2>On sales Information</h1>

		<div class="row">
			<input type="hidden" id="id_onsales" name="id_onsales" value="<?= $items->id ?>">">
			<input type="hidden" id="id_product" name="id_product" value="<?php echo $items->id_product ?>">
		</div>

		<div class="row">
			<div class="col-md-6">
				<table class="table table_onsale_information">
					<tbody>
						<tr>
							<th>Code</th>
							<td><input type="text" id="onsales_code" name="onsales_code" class="form-control" value="<?= $items->onsales_code ?>" placeholder="Code onsale"></td>
						</tr>
						<tr>
							<th>Onsale name</th>
							<td><input type="text" id="onsales_name" name="onsales_name" class="form-control" placeholder="Onsales over" value="<?= $items->onsales_name ?>" minlength="0" required></td>

						</tr>
						<tr>
							<th>Onsale information</th>
							<td>
								<div class="summernote" id="onsale_infor_editor" name="onsale_infor_editor"></div>
							</td>

						</tr>
						<tr>
							<th>Total seats</th>
							<td><input type="number" id="onsales_slot" name="onsales_slot" class="form-control" placeholder="Onsales slot" value="<?= $items->onsales_slot ?>" minlength="0" maxlength="3"></td>
						</tr>

					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<h2>Black out dates</h2>

				<table class="table table-bordered table-warning table_onsale_black_out " id="input_valid_temp">
					<thead>
						<td>Name</td>
						<td>From</td>
						<td>To</td>

					</thead>
					<tbody id="black_out_content">
						<?php foreach ($blackouts as $blackout) {
						?>

							<tr>
								<td><input type="text" name="blackout_name[]" class="form-control" value="<?= $blackout->blackout_name ?>" readonly></td>
								<td><input type="date" name="blackout_from[]" class="form-control" value="<?= $blackout->blackout_from ?>" readonly></td>
								<td><input type="date" name="blackout_to[]" class="form-control" value="<?= $blackout->blackout_to ?>" readonly></td>
							</tr>
						<?php
						} ?>


					</tbody>

				</table>

			</div>
			<hr> -->
	<h2>Onsales Information</h2>

	<div class="row">
		<input type="hidden" id="id_onsales" name="id_onsales" value="<?= $items->id ?>">">
		<input type="hidden" id="id_product" name="id_product" value="<?php echo $items->id_product ?>">
	</div>

	<div class="row">
		<div class="col-md-6">
			<table class="table table_onsale_information">
				<tbody id="table_body_onsale">
					<tr>
						<th>Code</th>
						<td><input type="text" id="onsales_code" name="onsales_code" class="form-control" value="<?= $items->onsales_code ?>" placeholder="Code onsale" required></td>

					</tr>
					<tr>
						<th>Onsale name</th>
						<td><input type="text" id="onsales_name" name="onsales_name" class="form-control" placeholder="Onsales over" value="<?= $items->onsales_name ?>" minlength="0" required></td>

					</tr>
					<tr>
						<th>Total seats</th>
						<td><input type="number" id="onsales_slot" name="onsales_slot" class="form-control" placeholder="Onsales slot" value="<?= $items->onsales_slot ?>" minlength="0" maxlength="3"></td>
					</tr>


				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<label for="onsales_info"> <b>Onsales Infomation</b></label>
			<div class="summernote" id="onsale_infor_editor" name="onsale_infor_editor"></div>

		</div>

	</div>
	<hr>
	<div class="row blackout_content">
		<h2>Black out dates</h2>

		<table class="table table-bordered table-warning table_onsale_black_out " id="input_valid_temp">
			<thead>
				<td style="width: 40%;">Name</td>
				<td>From</td>
				<td>To</td>
			</thead>
			<tbody id="black_out_content">
				<?php
				foreach ($blackouts as $blackout) {
				?>
					<tr>
						<td><input type="text" name="blackout_name[]" class="form-control" value="<?= $blackout->blackout_name ?>" readonly required></td>
						<td><input type="date" name="blackout_from[]" class="form-control" value="<?= $blackout->blackout_from ?>" readonly required></td>
						<td><input type="date" name="blackout_to[]" class="form-control" value="<?= $blackout->blackout_to ?>" readonly required></td>
					</tr>
				<?php
				}
				?>

			</tbody>

		</table>
	</div>
	<hr>
	<h2>On sales Price</h2>

	<div class="row">

		<div class="col-md-12 " id="table_price_content">
			<!-- <div id="tables-container">
              
                </div> -->
			<table id="tbl_edit_sku" name="tbl_edit_sku" class="table table-bordered table-warning table_onsale_price_infor">
				<thead>
					<tr>
						<th scope="col" style="width: 9%;" rowspan="2">Item</th>
						<th scope="col" rowspan="2" style="width: 18%;">Note</th>
						<th scope="col" colspan="2">Validity</th>
						<th scope="col" rowspan="2">3*</th>
						<th scope="col" rowspan="2">4*</th>
						<th scope="col" rowspan="2">5*</th>
						<th scope="col" rowspan="2" style="width: 2%;">VAT</th>
						<th scope="col" rowspan="2" style="width: 4%;">Seat</th>
						<th scope="col" rowspan="2" style="width: 6%;">Unit</th>
						<th scope="col" colspan="2">Quantity</th>
					</tr>
					<tr>
						<th scope="col">From</th>
						<th scope="col">To</th>
						<th scope="col" style="width: 5%;">Min</th>
						<th scope="col" style="width: 5%;">Max</th>

					</tr>
				</thead>
				<tbody id="priceTableBody">
					<?php

					foreach ($skus as $sku) {
						$price_3 = number_format($sku->price_3, 0, '', '');
						$price_4 = number_format($sku->price_4, 0, '', '');
						$price_5 = number_format($sku->price_5, 0, '', '');
					?>

						<tr>

							<td><input type="text" name="price_for[]" value="<?= $sku->price_for ?> " class="form-control" readonly></td>
							<td><input type="text" name="price_note[]" value="<?= $sku->price_notes ?>" class="form-control"></td>
							<td><input type="date" name="validity_from[]" class="form-control" value="<?= $sku->price_valied_from ?>" readonly></td>
							<td><input type="date" name="validity_to[]" class="form-control" value="<?= $sku->price_valied_to ?>" readonly></td>
							<!-- <input type="hidden" name="price_currency[]" value="${item.price_currency}"> -->
							<td>
								<input type="number" name="price_3[]" class="form-control float-end text-end" value="<?= $price_3 ?>" minlength="0" maxlength="14">
								<input type="hidden" name="price_group3[]" value="3*" class="form-control">
								<input type="hidden" id="id_onsales_price" name="id_price_3[]" class="form-control float-end text-end" value="<?= $sku->id_price_3 ?>" minlength="0" maxlength="14">
							</td>

							<td>
								<input type="number" name="price_4[]" class="form-control float-end text-end" value="<?= $price_4 ?>" minlength="0" maxlength="14">
								<input type="hidden" name="price_group4[]" value="4*" class="form-control">
								<input type="hidden" id="id_onsales_price" name="id_price_4[]" class="form-control float-end text-end" value="<?= $sku->id_price_4 ?>" minlength="0" maxlength="14">
							</td>

							<td>
								<input type="number" name="price_5[]" class="form-control float-end text-end" value="<?= $price_5 ?>" minlength="0" maxlength="14">
								<input type="hidden" name="price_group5[]" value="5*" class="form-control">
								<input type="hidden" id="id_onsales_price" name="id_price_5[]" class="form-control float-end text-end" value="<?= $sku->id_price_5 ?>" minlength="0" maxlength="14">
							</td>

							<?php
							if ($sku->price_vat == 0) { ?>
								<td> <input class="form-check-input" type="checkbox" value="0" name="price_vat[]" readonly></td>
							<?php	} else { ?>
								<td> <input class="form-check-input" type="checkbox" value="1" name="price_vat[]" checked readonly></td>
							<?php
							} ?>



							<td><input type="number" name="price_seat[]" readonly class="form-control text-center" value="<?= $sku->price_seat ?>" minlength="0" maxlength="14"></td>
							<td><input type="text" name="price_unit[]" readonly class="form-control text-center" value="<?= $sku->price_unit ?>" minlength="0" maxlength="14"></td>
							<td><input type="text" name="select_min[]" readonly class="form-control text-center" value="<?= $sku->select_min ?>" minlength="0" maxlength="14"></td>
							<td><input type="text" name="select_max[]" readonly class="form-control text-center" value="<?= $sku->select_max ?>" minlength="0" maxlength="14"></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>

		</div>


	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group mb-3">
				<label for="file_b2b" class="col-form-label"> File b2b: </label>
				<input type="text" id="file_b2b" name="file_b2b" class="form-control" placeholder="File b2b" minlength="0" maxlength="250" value="<?= $items->file_b2b ?>">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group mb-4">
				<label for="id_sale" class="col-form-label"> Sales: <span class="text-danger">*</span> </label>
				<select id="id_sale" name="id_sale" class="form-select" required>
					<?php
					$tt = 0;
					foreach ($ops as $op) { ?>
						<option value="<?= $op->id ?>"><?= $op->name ?></option>
					<?php } ?>

				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group mb-4">
				<label for="id_op" class="col-form-label"> Op: <span class="text-danger">*</span> </label>
				<select id="id_op" name="id_op" class="form-select" required>
					<?php
					$tt = 0;
					foreach ($ops as $op) { ?>
						<option value="<?= $op->id ?>"><?= $op->name ?></option>
					<?php } ?>

				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group mb-4">
				<label for="onsales_status" class="col-form-label"> Status: <span class="text-danger">*</span> </label>
				<select id="onsales_status" name="onsales_status" class="form-select">

					<?php
					if ($items->onsales_status == 0) {
					?>
						<option value="0" selected>Inactive</option>
						<option value="1">Actived</option>
						<option value="2">Sold out</option>
					<?php
					} else if ($items->onsales_status == 1) {
					?>
						<option value="0">Inactive</option>
						<option value="1" selected>Actived</option>
						<option value="2">Sold out</option>
					<?php
					} else {
					?>
						<option value="0">Inactive</option>
						<option value="1">Actived</option>
						<option value="2" selected>Sold out</option>

					<?php
					}
					?>

				</select>
			</div>
		</div>

	</div>

</form>
<div class="form-group text-center">
	<div class="btn-group">
		<button type="button" class="btn btn-success mr-2" id="form-onsales-btn" onclick="update_onsale()"><?= lang("App.save") ?></button>
		<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
	</div>
</div>


<script>
	$(document).ready(function() {
		// $('.summernote').summernote();
		$('#onsale_infor_editor').summernote('code', <?php echo json_encode($items->onsales_info) ?>);
	});





	var currency = 'vi'; // OR USD

	function use_number(node) {
		var empty_val = false;
		const value = node.value;
		if (node.value == '')
			empty_val = true;
		node.type = 'number';
		if (!empty_val)
			node.value = Number(value.replace(/,/g, '')); // or equivalent per locale
	}

	function use_text(node) {
		var empty_val = false;
		const value = Number(node.value);
		if (node.value == '')
			empty_val = true;
		node.type = 'text';
		if (!empty_val)
			node.value = value.toLocaleString(currency); // or other formatting
	}



	function update_onsale(id) {
		// $('#data-form-onsales').submit();
		var form = $('#data-form-onsales')[0]; // Get the form element
		var formData = new FormData(form);
		var summernoteContent = $('#onsale_infor_editor').summernote('code');
		formData.append('onsale_infor_editor', summernoteContent);
		if ($('#data-form-onsales')[0].checkValidity() === false) {
			// Trigger HTML5 form validation
			$('#data-form-onsales')[0].reportValidity();
			return;
		}
		$.ajax({
			url: '<?= base_url("/product/updateOnsales") ?>', // Make sure this URL is correct
			type: 'post',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
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
						})
						.
					then(function() {
						$('#data-modal-onsales').modal('hide');
						$('#rates-tab').click();
					});
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
						});
					}
				}

			}
		});
	}
</script>