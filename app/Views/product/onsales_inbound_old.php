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
</style>
<form id="data-form-onsales" class="pl-3 pr-3">
    <h2>On sales Information</h1>

        <div class="row">
            <input type="hidden" id="id_onsales" name="id_onsales" value="">
            <input type="hidden" id="id_product" name="id_product" value="<?php echo $id_product ?>">
        </div>

        <div class="row">
            <div class="col-md-5">
                <table class="table table_onsale_information">
                    <tbody>
                        <tr>
                            <th>Code</th>
                            <td><input type="text" id="onsales_code" name="onsales_code" class="form-control" value="" placeholder="Code onsale"></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><input type="datetime-local" id="date_from_onsale" name="date_from" class="form-control" value=""></td>
                        </tr>
                        <tr>
                            <th>Cutoff</th>
                            <td><input type="datetime-local" id="date_ends" name="date_ends" class="form-control" value=""></td>
                        </tr>
                        <tr>
                            <th>Total seats</th>
                            <td><input type="number" id="onsales_slot" name="onsales_slot" class="form-control" placeholder="Onsales slot" value="" minlength="0" maxlength="3"></td>
                        </tr>
                        <tr>
                            <th>Over</th>
                            <td><input type="number" id="onsales_over" name="onsales_over" class="form-control" placeholder="Onsales over" value="" minlength="0" maxlength="3"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-7">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="onsales_name" class="col-form-label"> <b>Onsales name:</b> </label>
                        <td><input type="number" id="onsales_name" name="onsales_name" class="form-control" placeholder="Onsales over" value="" minlength="0" maxlength="3"></td>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3 select_option">
                        <div><label for="select_min" class="col-form-label"> <b>Select Min:</b></label>
                            <input type="text" id="select_min" name="select_min" class="form-control" value="" placeholder="Select min">
                        </div>
                        <div> <label for="select_max" class="col-form-label"> <b>Select Max:</b></label>
                            <input type="text" id="select_max" name="select_max" class="form-control" value="" placeholder="Select max">
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="onsales_info" class="col-form-label"> <b>Onsales info:</b> </label>
                        <textarea cols="40" rows="6" id="onsales_info" name="onsales_info" class="form-control" placeholder="Onsales info" minlength="0"></textarea>
                    </div>
                </div>

            </div>
        </div>
        <hr>
        <h2>On sales Price</h2>

        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <tr>

                        <th>Group price</th>
                        <td><input type="text" id="group_price_temp" name="group_price_temp" class="form-control" value="" placeholder="Code onsale"></td>
                        <th>Group price name</th>
                        <td><input type="text" id="group_type_temp" name="group_type_temp" class="form-control" value="" placeholder="Code onsale"></td>
                        <th>VAT:</th>
                        <td><select id="price_vat_temp" name="price_vat_temp[]" class="form-select">
                                <option value="0" selected>
                                    <h4>Chưa VAT</h4>
                                </option>
                                <option value="1">
                                    <h4>Gồm VAT</h4>
                                </option>


                            </select></td>

                    </tr>
                    <tr>
                        <th>Peak days</th>
                        <td><input type="datetime-local" id="peak_day_from" name="peak_day_from" class="form-control" value="" placeholder="Code onsale"></td>
                        <td>To</td>
                        <td><input type="datetime-local" id="peak_day_to" name="peak_day_from" class="form-control" value="" placeholder="Code onsale"></td>
                    </tr>
                    <tr>
                        <th>Off peak days</th>
                        <td><input type="datetime-local" id="off_peak_day_from" name="off_peak_day_from" class="form-control" value="" placeholder="Code onsale"></td>
                        <td>To</td>
                        <td><input type="datetime-local" id="off_peak_day_to" name="off_peak_day_to" class="form-control" value="" placeholder="Code onsale"></td>

                    </tr>

                    </tbody>

                </table>
                <button type="button" class="btn btn-success btn-sm" id="btn_create_list"> Create price list</button>
            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-md-12" id="table_price_content">
                <div id="tables-container">
                    <!-- Các bảng hiện tại sẽ được liệt kê ở đây -->
                </div>
                <!-- <table id="tbl_edit_sku" name="tbl_edit_sku" class="table table-bordered table-warning">
                <tbody>
                    <tr>
                        <th scope="col" style="width: 8%;" rowspan="2">Hotel Cat</th>
                        <th scope="col" rowspan="2">Unit</th>
                        <th scope="col" colspan="2">Validity</th>
                        <th scope="col">2 pax</th>
                        <th scope="col">3-4 pax</th>
                        <th scope="col">5-6 pax</th>
                        <th scope="col">7-8 pax</th>
                        <th scope="col">9-10 pax </th>
                        <th scope="col">11-14 pax </th>
                        <th scope="col" rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">2 pax</th>
                        <th scope="col">3-4 pax</th>
                        <th scope="col">5-6 pax</th>
                        <th scope="col">7-8 pax</th>
                        <th scope="col">9x10 pax </th>
                        <th scope="col">9x10 pax </th>
                    </tr>
                    <?php
                    $tt = 0;
                    ?>
                    <tr>
                        <td>
                            <input type="text" id="group_id<?= $tt ?>" name="price_group[]" value="" class="form-control">
                        </td>
                        <td><input type="hidden" id="id_sku_<?= $tt ?>" name="id_sku[]" value="">
                            <input type="text" id="sku_val_<?= $tt ?>" name="price_for[]" value="" class="form-control">
                        </td>

                        <td><input type="date" id="validity_from" name="validity_from[]" class="form-control" value=""></td>
                        <td><input type="date" id="validity_to" name="validity_to[]" class="form-control" value=""></td>
                        </td>
                        <td><input type="number" id="price_pax2<?= $tt ?>" name="price_pax2[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                        <td><input type="number" id="price_pax34<?= $tt ?>" name="price_pax34[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                        <td><input type="number" id="price_pax56<?= $tt ?>" name="price_pax56[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                        <td><input type="number" id="price_pax78<?= $tt ?>" name="price_pax78[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                        <td><input type="number" id="price_pax910<?= $tt ?>" name="price_pax910[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                        <td><input type="text" id="price_pax1114<?= $tt ?>" name="price_pax1114[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                    </tr>

                </tbody>
            </table>

        </div>
        <div class="col-md-12">
            <input type="hidden" id="sku_total" name="sku_total" value="<?= $tt ?>">
            <input type="button" class="btn btn-warning btn-sm" id="form-onsales-addsku-btn" value="Thêm giá">
        </div> -->

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="file_b2b" class="col-form-label"> File b2b: </label>
                        <input type="text" id="file_b2b" name="file_b2b" class="form-control" placeholder="File b2b" minlength="0" maxlength="250" value="">
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
                        <select id="onsales_status" name="onsales_status" class="form-select" required>
                            <option value="0">Inactive</option>
                            <option value="1">Actived</option>
                            <option value="2">Sold out</option>
                        </select>
                    </div>
                </div>

            </div>

</form>
<div class="form-group text-center">
    <div class="btn-group">
        <button type="button" class="btn btn-success mr-2" id="form-onsales-btn" onclick="save_onsale()"><?= lang("App.save") ?></button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
    </div>
</div>


<script>
    var group_price
    var group_price_name;
    var vat
    var peak_day_from;
    var peak_day_to;
    var off_peak_day_from;
    var off_peak_day_to;

    function getOnsalesPriceTemp() {
        group_price = document.getElementById("group_price_temp").value;
        group_price_name = document.getElementById("group_type_temp").value;
        vat = document.getElementById("price_vat_temp").value;
        peak_day_from = document.getElementById("peak_day_from").value;
        peak_day_to = document.getElementById("peak_day_to").value;
        off_peak_day_from = document.getElementById("off_peak_day_from").value;
        off_peak_day_to = document.getElementById("off_peak_day_to").value;
    };

    // Sự kiện nhấn nút tạo bảng
    $('#btn_create_list').on('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định
        e.stopPropagation(); // Ngăn sự kiện nổi bọt
        getOnsalesPriceTemp();
        var vat_html;

        if (vat == 0) {
            vat_html = '<option value="0" selected>Chưa VAT</option><option value="1">Gồm VAT</option>';
        } else {
            vat_html = '<option value="0">Chưa VAT</option><option value="1" selected>Gồm VAT</option>';
        }


        // Tạo một bảng mới
        var tableIndex = $('.tbl-edit-sku').length + 1; // Đếm số bảng hiện tại
        var newTable = document.createElement("TABLE");
        newTable.className = "table table-bordered table-warning tbl-edit-sku table_onsale_price_infor"; // Sử dụng lớp thay vì ID
        newTable.innerHTML = `
 
        <thead> 
        
            <tr>
                <th class="col-md-1" scope="col" style="width:6%" rowspan="2">${group_price_name}</th>
                <th class="col-md-1" scope="col" colspan="2">Validity</th>
                <th scope="col"rowspan="2" style="width:5%">Seat</th>
                <th scope="col"rowspan="2" style="width:10%">B2C price</th>
                <th scope="col"rowspan="2" style="width:10%">B2B price</th>
                <th scope="col"rowspan="2" style="width:9%">VAT </th>
                <th scope="col"rowspan="2">Note </th>
                <th scope="col" rowspan="2" style="width:5%">Action</th>
            </tr>
            <tr>
                <th scope="col">From</th>
                <th scope="col">To</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="price_group[]" value="${group_price}" class="form-control">
                <input type="hidden" name="price_group_name[]" value="${group_price_name}" class="form-control">
                <td><input type="datetime-local" name="validity_from[]" class="form-control" value="${peak_day_from}"></td>
                <td><input type="datetime-local" name="validity_to[]" class="form-control" value="${peak_day_to}"></td>
                <td><input type="number" name="seat[]"  value ="1" class="form-control value="1" float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2c[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2b[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td> <select id="price_vat_0" name="price_vat[]" class="form-select">			
                        ${vat_html}</select></td>
                  <td><input type="text" name="note[]" value="" class="form-control">
                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
            <tr>
                <td><input type="text" name="price_group[]" value="${group_price}" class="form-control">
                <input type="hidden" name="price_group_name[]" value="${group_price_name}" class="form-control">
                <td><input type="datetime-local" name="validity_from[]" class="form-control" value="${peak_day_from}"></td>
                <td><input type="datetime-local" name="validity_to[]" class="form-control" value="${peak_day_to}"></td>
                <td><input type="number" name="seat[]"  value ="0" class="form-control value="1" float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2c[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2b[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
            <td> <select id="price_vat_0" name="price_vat[]" class="form-select">			
                        ${vat_html}</select></td>
                  <td><input type="text" name="note[]" value="" placeholder="Phụ thu" class="form-control">
                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
                 <tr>
                <td><input type="text" name="price_group[]" value="${group_price}" class="form-control">
                <input type="hidden" name="price_group_name[]" value="${group_price_name}" class="form-control">
                <td><input type="datetime-local" name="validity_from[]" class="form-control" value="${off_peak_day_from}"></td>
                <td><input type="datetime-local" name="validity_to[]" class="form-control" value="${off_peak_day_to}"></td>
                <td><input type="number" name="seat[]"  value ="1" class="form-control value="1" float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2c[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2b[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td> <select id="price_vat_0" name="price_vat[]" class="form-select">			
                        ${vat_html}</select></td>
                <td><input type="text" name="note[]" value="" class="form-control">
           <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
                 <tr>
                <td><input type="text" name="price_group[]" value="${group_price}" class="form-control">
                <input type="hidden" name="price_group_name[]" value="${group_price_name}" class="form-control">
                <td><input type="datetime-local" name="validity_from[]" class="form-control" value="${off_peak_day_from}"></td>
                <td><input type="datetime-local" name="validity_to[]" class="form-control" value="${off_peak_day_to}"></td>
                <td><input type="number" name="seat[]"  value ="0" class="form-control value="1" float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2c[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2b[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td> <select id="price_vat_0" name="price_vat[]" class="form-select">			
                        ${vat_html}</select></td>
                <td><input type="text" name="note[]" value="" placeholder="Phụ thu" class="form-control">
                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
            
        </tbody>
    `;

        // Tạo nút "Thêm giá" và nút xóa bảng
        var addButton = document.createElement("DIV");
        addButton.className = "col-md-12";
        addButton.innerHTML = `
        <input type="hidden" name="sku_total" value="0" class="sku-total">
        <input type="button" class="btn btn-warning btn-sm form-onsales-addsku-btn" value="Thêm giá">
        <input type="button" class="btn btn-danger btn-sm form-onsales-remove-table-btn" value="Xóa bảng">
    `;

        var caption = document.createElement("CAPTION");
        caption.innerHTML = `
        <caption><h3>Price ${group_price_name} ${group_price} </h3></caption>
    `;
        // Thêm bảng mới và nút vào form
        var container = document.getElementById("tables-container");
        var newRow = document.createElement("DIV");
        newRow.className = "row";
        newRow.style = "margin:10px 0";
        newRow.append(caption);
        newRow.appendChild(newTable);
        newRow.appendChild(addButton);
        container.appendChild(newRow);
        container.appendChild(newRow);
    });

    // Sự kiện nhấn nút thêm giá cho các bảng tbl_edit_sku
    $('#tables-container').on('click', '.form-onsales-addsku-btn', function(e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định
        e.stopPropagation(); // Ngăn sự kiện nổi bọt

        var group_price = document.getElementById("group_price_temp").value;
        var group_price_name = document.getElementById("group_type_temp").value;
        var vat = document.getElementById("price_vat_temp").value;
        var peak_day_from = document.getElementById("peak_day_from").value;
        var peak_day_to = document.getElementById("peak_day_to").value;
        var off_peak_day_from = document.getElementById("off_peak_day_from").value;
        var off_peak_day_to = document.getElementById("off_peak_day_to").value;
        var vat_html1, var_html2;
        // Tìm bảng `tbl-edit-sku` gần nhất và thêm hàng mới vào bảng đó
        var $table = $(this).closest('.row').find('.tbl-edit-sku');
        var $rows = $table.find('tbody tr').slice(-2);

        // Tách dữ liệu từ các input trong hai hàng gần cuối cùng
        var data1 = $rows.eq(0).find('input').map(function() {
            return $(this).val(); // Lấy giá trị của từng input
        }).get();

        var data2 = $rows.eq(1).find('input').map(function() {
            return $(this).val(); // Lấy giá trị của từng input
        }).get();
        var vat1 = data1[6];
        var vat2 = data2[6];
        if (vat1 == 0) {
            vat_html1 = '<option value="0" selected>Chưa VAT</option><option value="1">Gồm VAT</option>';
        } else {
            vat_html1 = '<option value="0">Chưa VAT</option><option value="1" selected>Gồm VAT</option>';
        }
        if (vat2 == 0) {
            vat_html2 = '<option value="0" selected>Chưa VAT</option><option value="1">Gồm VAT</option>';
        } else {
            vat_html2 = '<option value="0">Chưa VAT</option><option value="1" selected>Gồm VAT</option>';
        }

        $table.each(function() {
            var t = this;
            var r1 = document.createElement("TR");
            var r2 = document.createElement("TR");
            var tt = parseInt($(this).find('.sku-total').val()) || 0;
            tt += 2;
            $(this).find('.sku-total').val(tt); // Cập nhật số lượng hàng
            r1.innerHTML = `
             <td><input type="text" name="price_group[]" value="${data1[0]}" class="form-control">
                <input type="hidden" name="price_group_name[]" value="${group_price_name}" class="form-control">
                <td><input type="datetime-local" name="validity_from[]" class="form-control" value="${data1[1]}"></td>
                <td><input type="datetime-local" name="validity_to[]" class="form-control" value="${data1[2]}"></td>
                <td><input type="number" name="seat[]"  value ="1" class="form-control value="1" float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2c[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2b[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td> <select id="price_vat" name="price_vat[]" class="form-select">			
                        ${vat_html1}</select></td>
                <td><input type="text" name="note[]" value="" placeholder="" class="form-control">
                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa-solid fa-trash"></i></button></td>
        `;
            r2.innerHTML = `
             <td><input type="text" name="price_group[]" value="${data1[0]}" class="form-control">
                <input type="hidden" name="price_group_name[]" value="${group_price_name}" class="form-control">
                <td><input type="datetime-local" name="validity_from[]" class="form-control" value="${data1[1]}"></td>
                <td><input type="datetime-local" name="validity_to[]" class="form-control" value="${data1[2]}"></td>
                <td><input type="number" name="seat[]"  value ="0" class="form-control value="1" float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2c[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td><input type="number" name="price_b2b[]" class="form-control float-end text-end" minlength="0" maxlength="14"></td>
                <td> <select id="price_vat_0" name="price_vat[]" class="form-select">			
                        ${vat_html2}</select></td>
                <td><input type="text" name="note[]" value="" placeholder="Phụ thu" class="form-control">
                <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa-solid fa-trash"></i></button></td>
        `;
            t.tBodies[0].appendChild(r1);
            t.tBodies[0].appendChild(r2);
        });
    });

    // Xóa hàng khỏi bảng
    $('#tables-container').on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
        // Cập nhật số lượng hàng nếu cần
    });

    $('#tables-container').on('click', '.form-onsales-remove-table-btn', function() {
        $(this).closest('.row').remove();
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

    var urlController = '';
    var submitText = '';

    function getUrl() {
        return urlController;
    }

    function getSubmitText() {
        return submitText;
    }


    function save_onsale(id) {
        // $('#data-form-onsales').submit();
        var form = $('#data-form-onsales')[0]; // Get the form element
        var formData = new FormData(form);
        $.ajax({
            url: '<?= base_url("/product/saveOnsales") ?>', // Make sure this URL is correct
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
                    // .
                    // then(function() {
                    //     $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                    //     $('#data-modal').modal('hide');
                    // });
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
                $('#form-btn').html(submitText);
            }
        });


        $('#data-form').validate({});
    }
</script>