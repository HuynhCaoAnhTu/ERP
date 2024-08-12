<div class="card card-outline card-success">
	<div class="card-body">
		<div class="row">
			<div class="col-md-3"><b><?= $items->onsales_code ?>: <?= $items->onsales_name ?>:</b><br><?= $items->onsales_info ?><br><a href="<?= $items->file_b2b ?>" target="_blank">B2B file</a></div>
			<!-- <div class="col-md-2">
				<table class="table_onsale_view">
					<tr>
						<th>Date</th>
						<td><?= $items->date_from ?></td>
					</tr>
					<th>Cutoff</th>
					<td><?= $items->date_ends ?></td>
					</tr>
					<th>Slot</th>
					<td><?= $items->onsales_slot ?></td>

				</table>
			</div> -->
			<div class="col-md-7">
				<h4> Onsales price</h4>
				<table id="onsales" class="table table-bordered">
					<thead>
						<tr>
							<th scope="col" style="width: 6%;" rowspan="2">Item</th>
							<th scope="col" colspan="2">Validity</th>
							<th scope="col" rowspan="2" style="width:8%">2 pax </th>
							<th scope="col" rowspan="2" style="width:8%">3-4 pax </th>
							<th scope="col" rowspan="2" style="width:8%">5-6 pax </th>
							<th scope="col" rowspan="2" style="width:8%">7-8 pax </th>
							<th scope="col" rowspan="2" style="width:8%">9-10 pax </th>
							<th scope="col" rowspan="2" style="width:8%">11-14 pax </th>
							<th scope="col" rowspan="2" style="width:8%">Single Supp ADD </th>

						</tr>
						<tr>
							<th scope="col">From</th>
							<th scope="col">To</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$tt = 0;
						foreach ($skus as $sku) {
							$price_2_pax = number_format($sku->price_2_pax, 0, ',', '.');
							$price_3_4_pax = number_format($sku->price_3_4_pax, 0, ',', '.');
							$price_5_6_pax = number_format($sku->price_5_6_pax, 0, ',', '.');
							$price_7_8_pax = number_format($sku->price_7_8_pax, 0, ',', '.');
							$price_9_10_pax = number_format($sku->price_9_10_pax, 0, ',', '.');
							$price_11_14_pax = number_format($sku->price_11_14_pax, 0, ',', '.');
							$price_supp_add = number_format($sku->price_supp_add, 0, ',', '.');

						?>
							<tr>
								<td><?= $sku->price_group ?></td>
								<td><?= $sku->price_valied_from ?></td>
								<td><?= $sku->price_valied_to ?></td>
								<td><?= $price_2_pax ?></td>
								<td><?= $price_3_4_pax ?></td>
								<td><?= $price_5_6_pax ?></td>
								<td><?= $price_7_8_pax ?></td>
								<td><?= $price_9_10_pax ?></td>
								<td><?= $price_11_14_pax ?></td>
								<td><?= $price_supp_add ?></td>
								<!-- <td> <?php if ($sku->price_vat == 0) {
												echo ('Chưa VAT');
											} else {
												echo ('Gồm VAT');
											} ?></td>
								<td><?= $sku->price_notes ?></td> -->


							</tr>
						<?php } ?>
					</tbody>
				</table>
				<?php
				if (!empty($blackouts)) {
				?>
					<h4> Onsales Blackout</h4>
					<table id="onsales-blackout" class="table table-bordered">
						<thead>
							<tr>
								<th scope="col" style="width: 6%;" rowspan="2">Name</th>
								<th scope="col" rowspan="2" style="width:8%">From</th>
								<th scope="col" rowspan="2" style="width:8%">To </th>

							</tr>

						</thead>
						<tbody>
							<?php
							$tt = 0;
							foreach ($blackouts as $blackout) {

							?>
								<tr>
									<td><?= $blackout->blackout_name ?></td>
									<td><?= $blackout->blackout_from ?></td>
									<td><?= $blackout->blackout_to ?></td>

								</tr>
							<?php } ?>
						</tbody>
					</table>


				<?php
				}
				?>

			</div>
			<div class="col-md-2 card card-outline card-success">
				<div class="col-md-12">Update: <?= $items->update_on ?><br>Sale:<br>Op:<br><br></div>
				<?php
				if ($items->onsales_status == 0) {
				?>
					<div class="col-md-12 text-center">Status: <span class="badge bg-warning">Inactive</span><br></div>
				<?php
				} else if ($items->onsales_status == 1) {
				?>
					<div class="col-md-12 text-center">Status: <span class="badge bg-success">Active</span><br></div>
				<?php
				} else {
				?>
					<div class="col-md-12 text-center">Status: <span class="badge bg-danger">Sold out</span><br></div>

				<?php
				}
				?>


				<hr>
				<div class="col-md-12 text-center">
					<button type="button" id="edit-onsales-raw" class="btn btn-danger" onClick="edit_onsales('<?= $items->id ?>',1)">Edit</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		// Tạo ID động cho bảng
		var tableId = '#onsales_<? echo $items->onsales_code ?>';

		// Kiểm tra nếu DataTable đã được khởi tạo
		if ($.fn.DataTable.isDataTable(tableId)) {
			$(tableId).DataTable().destroy(); // Hủy khởi tạo nếu đã được khởi tạo
		}

		// Khởi tạo DataTable mới
		$(tableId).DataTable({
			info: false,
			// ordering: true,
			paging: false,
			searching: false,
			order: [
				[3, 'desc']
			]
		});
	});
</script>