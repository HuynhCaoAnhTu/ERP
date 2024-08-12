<form id="data-form-onsales" class="pl-3 pr-3">
    <h2>Onsales Information</h2>

    <div class="row">
        <input type="hidden" id="id_onsales" name="id_onsales" value="">
        <input type="hidden" id="id_product" name="id_product" value="<?php echo $id_product ?>">
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table table_onsale_information">
                <tbody id="table_body_onsale">
                    <tr>
                        <th>Code</th>
                        <td><input type="text" id="onsales_code" name="onsales_code" class="form-control" value="" placeholder="Code onsale" required></td>
                    </tr>
                    <tr>
                        <th>Onsale name</th>
                        <td><input type="text" id="onsales_name" name="onsales_name" class="form-control" placeholder="Onsales over" value="" minlength="0" required></td>

                    </tr>

                    <tr>
                        <th>Total seats</th>
                        <td><input type="number" id="onsales_slot" name="onsales_slot" class="form-control" placeholder="Onsales slot" value="" minlength="0" maxlength="3" required></td>
                    </tr>
                    <tr>
                        <th> Onsale type

                        </th>
                        <td> <select class="form-select valid_days_temp" id="tempSelect" onchange="select_temp()">
                                <option value="">--Choose temp--</option>
                                <?php
                                foreach ($temp as $tmp) { ?>
                                    <option value="<?= $tmp->id ?>" data-count="<?= $tmp->valid_days_count ?>"><?= $tmp->temp_name ?></option>
                                <?php } ?>
                            </select>
                            <button class="btn btn-success" type="button" onclick="loadTableData()">Create price table</button>
                        </td>


                    </tr>
                    <tr>
                        <table class="table table_onsale_information" id="input_valid_temp"></table>
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
                <td style="width: 3%;">Action</td>
            </thead>
            <tbody id="black_out_content">
                <tr>
                    <td><input type="text" name="blackout_name[]" class="form-control" value="" required></td>
                    <td><input type="date" name="blackout_from[]" class="form-control" required></td>
                    <td><input type="date" name="blackout_to[]" class="form-control" required></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>

            </tbody>

        </table>
        <button type="button" style="width: fit-content;" id="addRow" class="btn btn-success"><i class="fa-solid fa-plus"></i> New black-out</button>
    </div>
    <hr>
    <h2>Onsales Price</h2>

    <div class="row">

        <div class="col-md-12 " id="table_price_content">
            <div id="tables-container">


                <table id="tbl_edit_sku" name="tbl_edit_sku" class="table table-bordered table-warning table_onsale_price_infor">
                    <thead id="priceTableHead">

                    </thead>
                    <tbody id="priceTableBody">

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="file_b2b" class="col-form-label"> File b2b: </label>
                <input type="text" id="file_b2b" name="file_b2b" class="form-control" placeholder="File b2b" minlength="0" maxlength="250" value="" required>
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
        <button type="submit" class="btn btn-success mr-2" id="form-onsales-btn" onclick="save_onsale()"><?= lang("App.save") ?></button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
    </div>
</div>


<script>
    // var currency = 'vi'; // OR USD


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



    function loadTableData() {
        var temp_id = $('#tempSelect').val();
        $.ajax({
            url: '<?= base_url("product/getPricesTemp") ?>', // Đường dẫn tới phương thức AJAX
            type: 'POST',
            data: {
                temp_id: temp_id
            },
            dataType: 'json',
            success: function(data) {

                let tableHead = $('#priceTableHead');
                tableHead.empty(); // Xóa dữ liệu hiện tại
                tableHead.append(`
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

                        </tr>`);
                let tableBody = $('#priceTableBody');
                tableBody.empty(); // Xóa dữ liệu hiện tại
                $.each(data, function(index, item) {
                    if (item.price_vat == 0) {
                        tableBody.append(
                            `<tr>
                                    <td><input type="text" name="price_for[]" value="${item.price_for}" class="form-control" readonly></td>
                                    <td><input type="text" name="price_note[]" value="${item.price_notes}" class="form-control" required></td>
                                    <td><input type="date" name="validity_from[]" class="form-control valid_from_${item.date_order}readonly" ></td>
                                    <td><input type="date" name="validity_to[]" class="form-control valid_to_${item.date_order}" readonly></td>
                                    <input type="hidden" name="price_currency[]" value="${item.price_currency}">
                                    <td><input type="number" name="price_3[]" class="form-control float-end text-end" minlength="0" maxlength="14"  required><input type="hidden" name="price_group3[]" value="3*" class="form-control"></td>
                                    <td><input type="number" name="price_4[]" class="form-control float-end text-end" minlength="0" maxlength="14"  required><input type="hidden" name="price_group4[]" value="4*" class="form-control"></td>
                                    <td><input type="number" name="price_5[]" class="form-control float-end text-end" minlength="0" maxlength="14"  required><input type="hidden" name="price_group5[]" value="5*" class="form-control"></td>
                                    <td> <input class="form-check-input" type="checkbox" value="0" name="price_vat[]"  ></td>
                                    <td><input type="number" name="price_seat[]" readonly class="form-control text-center" value="${item.price_seat}" minlength="0" maxlength="14"></td>
                                    <td><input type="text" name="price_unit[]" readonly class="form-control text-center" value="${item.price_unit}" minlength="0" maxlength="14"></td>
                                    <td><input type="text" name="select_min[]" readonly class="form-control text-center" value="${item.select_min}" minlength="0" maxlength="14"></td>
                                    <td><input type="text" name="select_max[]" readonly class="form-control text-center" value="${item.select_max}" minlength="0" maxlength="14"></td>
                                </tr>`
                        );
                    } else {
                        tableBody.append(
                            `<tr>
                                    <td><input type="text" name="price_for[]" value="${item.price_for}" class="form-control" readonly></td>
                                    <td><input type="text" name="price_note[]" value="${item.price_notes}" class="form-control" required></td>
                                    <td><input type="date" name="validity_from[]" class="form-control valid_from_${item.date_order}" readonly ></td>
                                    <td><input type="date" name="validity_to[]" class="form-control valid_to_${item.date_order}" readonly ></td>
                                    <input type="hidden" name="price_currency[]" value="${item.price_currency}">
                                    <td><input type="number" name="price_3[]" class="form-control float-end text-end" minlength="0" maxlength="14"  required><input type="hidden" name="price_group3[]" value="3*" class="form-control"></td>
                                    <td><input type="number" name="price_4[]" class="form-control float-end text-end" minlength="0" maxlength="14"  required><input type="hidden" name="price_group4[]" value="4*" class="form-control"></td>
                                    <td><input type="number" name="price_5[]" class="form-control float-end text-end" minlength="0" maxlength="14"  required><input type="hidden" name="price_group5[]" value="5*" class="form-control"></td>
                                    <td> <input class="form-check-input" type="checkbox" value="1" name="price_vat[]" checked  ></td>
                                    <td><input type="number" name="price_seat[]" readonly class="form-control text-center" value="${item.price_seat}" minlength="0" maxlength="14"></td>
                                    <td><input type="text" name="price_unit[]" readonly class="form-control text-center" value="${item.price_unit}" minlength="0" maxlength="14"></td>
                                    <td><input type="text" name="select_min[]" readonly class="form-control text-center" value="${item.select_min}" minlength="0" maxlength="14"></td>
                                    <td><input type="text" name="select_max[]" readonly class="form-control text-center" value="${item.select_max}" minlength="0" maxlength="14"></td>
                                </tr>`
                        );
                    }

                });
                fillValidDays();
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
            }
        });

    }

    function fillValidDays() {
        const selectElement = document.getElementById('tempSelect');
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const count = selectedOption.dataset.count;
        for (let i = 1; i <= count; i++) {
            const fromData = document.querySelector('.valid_from_temp_' + i).value;
            const toData = document.querySelector('.valid_to_temp_' + i).value;
            const tableFromInputs = document.querySelectorAll('.valid_from_' + i);
            const tableToInputs = document.querySelectorAll('.valid_to_' + i);

            // Chuyển dữ liệu vào các ô nhập tương ứng
            tableFromInputs.forEach(input => input.value = fromData);
            tableToInputs.forEach(input => input.value = toData);
        }



        // Lấy tất cả các ô nhập có class 'table_from' và 'table_to'

    }


    function save_onsale(id) {
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


        $('#data-form').validate({});
    }

    function select_temp() {
        const selectElement = document.getElementById('tempSelect');
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const count = selectedOption.dataset.count;
        let container = document.getElementById('input_valid_temp');

        // Loop to create new rows

        container.innerHTML = '';
        for (let i = 1; i <= count; i++) {
            container.innerHTML += `
        <tr class="valid_container">
            <th>Valid days</th>
            <td><input type="date" id="peak_day_from_${i}" name="peak_day_from_${i}" class="form-control valid_from_temp_${i}" value="" placeholder="From"></td>
            <td style="vertical-align: middle; padding: 0 10px;">To</td>
            <td><input type="date" id="peak_day_to_${i}" name="peak_day_to_${i}" class="form-control valid_to_temp_${i}" value="" placeholder="To"></td>
        </tr>
    `;
        }
    }
    $('#addRow').click(function() {
        var newRow = `
                    <tr>
                      <td><input type="text"  name="blackout_name[]" class="form-control" value="" required></td>
                        <td><input type="date" name="blackout_from[]" class="form-control" required></td>
                        <td><input type="date" name="blackout_to[]" class="form-control" required></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
       `;
        $('.table_onsale_black_out tbody').append(newRow);
    });



    // Xóa hàng khi nút "Xóa" được nhấn
    $('.table_onsale_black_out').on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
    });
    $('.summernote').summernote();
</script>