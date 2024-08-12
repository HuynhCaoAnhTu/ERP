<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>
<!-- Main content -->
<style>
    .select2-container {
        z-index: 2000 !important;

    }
</style>
<div class="row">
    <div class="col-md col-md-offset-0">
        <div class="panel panel-primary">

            <div class="panel-body">
                <form action='<?php echo base_url($controller . "/upload") ?>' method="post" enctype="multipart/form-data">
                    <!-- <div class="form-information">
                        <div class="form-group">
                            <label for="images" class="col-form-label">Images</label>
                            <input style="width:100px" type="file" name="images[]" id="images" style="width:50%" multiple class="form-control" required>
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="product_location" class="col-form-label"> Travel location: <span class="text-danger">*</span> </label>
                            <select id="product_location" name="product_location[]" multiple="multiple" class="form-select select2" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="image_preview" style="width:100%;">
                    
                    </div> -->


                    <button style="margin-bottom:20px ;" class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10 mt-2">
                <h3 class="card-title">images</h3>
            </div>
            <div class="col-2">
                <button type="button" class="btn float-right btn-success" onclick="save()" title="<?= lang("App.new") ?>"> <i class="fa fa-plus"></i> <?= lang('App.new') ?></button>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="data_table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id_location</th>
                    <th>Image</th>
                    <th>Image name</th>
                    <th>Keyword</th>
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
                        <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="10" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <div class="form-information">
                                    <div class="form-group" id="input-file">
                                        <label for="images" class="col-form-label">Images</label>
                                        <input style="width:200px" type="file" name="images[]" id="images" style="width:50%" multiple class="form-control" required>
                                    </div>
                                    <div class="form-group" style="width: 200px;" id="modal-location">
                                        <label for="product_location" class="col-form-label "> Travel location: <span class="text-danger">*</span> </label>
                                        <select style="width: 200px;" id="product_location" name="product_location[]" multiple="multiple" class="form-control form-select select2 " required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <div class="form-group" id="image_preview" style="width:100%;">
                                    <!-- Các div chứa ảnh sẽ được thêm vào đây bởi JavaScript -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3">
                                <label for="images" class="col-form-label">Keyword</label>
                                <textarea name="keyword" id="keyword" cols="1" class="form-control" placeholder="Keyword" rows="2" required></textarea>
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
    $(document).ready(function() {
        var fileArr = [];
        $("#images").change(function() {
            if (fileArr.length > 0) fileArr = [];
            $('#image_preview').html("");
            var total_file = document.getElementById("images").files;
            if (!total_file.length) return;
            if (total_file.length > 10) {
                Swal.fire({
                    title: "File upload limit",
                    text: "File upload limit is 10 images",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: "Choose again"
                  
                })
                $('#images').val('');
            } else {
                for (var i = 0; i < total_file.length; i++) {
                    fileArr.push(total_file[i]);
                    $('#image_preview').append("<div class='img-div' id='img-div" + i + "'><img src='" + URL.createObjectURL(total_file[i]) + "' class='image img-thumbnail' title='" + total_file[i].name + "'><div class='middle'><button id='action-icon' value='img-div" + i + "' class='btn btn-danger' role='" + total_file[i].name + "'><i class='fa fa-trash'></i></button></div></div>");

                }
            }

        });

        $('body').on('click', '#action-icon', function(evt) {
            var divName = this.value;
            var fileName = $(this).attr('role');
            $(`#${divName}`).remove();

            for (var i = 0; i < fileArr.length; i++) {
                if (fileArr[i].name === fileName) {
                    fileArr.splice(i, 1);
                }
            }
            document.getElementById('images').files = FileListItem(fileArr);
            evt.preventDefault();
        });

        function FileListItem(file) {
            file = [].slice.call(Array.isArray(file) ? file : arguments)
            for (var c, b = c = file.length, d = !0; b-- && d;) d = file[b] instanceof File
            if (!d) throw new TypeError("expected argument to FileList is File or array of File objects")
            for (b = (new ClipboardEvent("")).clipboardData || new DataTransfer; c--;) b.items.add(file[c])
            return b.files
        }
        getLocation();
    });

    function getLocation() {
        $.ajax({
            url: '<?php echo base_url($controller . "/getData") ?>',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $.each(response.location, function(index, data) {
                    $('#product_location').append('<option value="' + data['id'] + '">' + data['name'] + '</option>');

                });
            }

        });
        $('.select2').select2();
    }
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
            "order": [],
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

    function save(id) {

        $('#input-file').show();
        $('#product_location').html("");
        $('#image_preview').html("");
        $("#data-form")[0].reset();
        getLocation();
        $("#data-form")[0].reset();
        $(".form-control").removeClass('is-invalid').removeClass('is-valid');

        if (typeof id === 'undefined' || id < 1) { // add
            urlController = '<?= base_url($controller . "/upload") ?>';
            submitText = '<?= lang("App.save") ?>';
            $('#model-header').removeClass('bg-info').addClass('bg-success');
            $("#info-header-modalLabel").text('<?= lang("App.add") ?>');
            $("#form-btn").text(submitText);
            $('#data-modal').modal('show');

        } else { // edit
            urlController = '<?= base_url($controller . "/edit") ?>';
            submitText = '<?= lang("App.save") ?>';
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
                    $('#input-file').hide();
                    const formInformation = document.querySelector('.form-information');
                    const firstFormGroup = formInformation.querySelector('.form-group');

                    // Insert data to form
                    $("#data-form #id").val(response.image.id);
                    $("#data-form #keyword").val(response.image.keyword);


                    var selectedLocations = JSON.parse(response.image.id_location);

                    $.each(response.location, function(index, location) {
                        var selected = selectedLocations.includes(location.id.toString()) ? 'selected' : '';
                        $('#product_location').append('<option value="' + location.id + '" ' + selected + '>' + location.name + '</option>');
                    });

                    $('#product_location').trigger('change');
                }
            });
        }

        $.validator.setDefaults({
            highlight: function(element) {
                // $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                // $(element).removeClass('is-invalid').addClass('is-valid');
            },
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else if ($(element).is('.select')) {
                    element.next().after(error);
                } else if (element.hasClass('select2')) {
                    error.insertAfter(element.next());
                } else if (element.hasClass('selectpicker')) {
                    error.insertAfter(element.next());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                var formData = new FormData(form);
                var locations = $('#product_location').val();
                formData.append('locations', JSON.stringify(locations));

                $(".text-danger").remove();
                $.ajax({
                    url: urlController, // Make sure this URL is correct
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
                            }).then(function() {
                                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                                $('#data-modal').modal('hide');
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
                        $('#form-btn').html(submitText);
                    }
                });
                return false;
            }
        });

        $('#data-form').validate({});
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
                        id: id
                    },
                    dataType: 'json',
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
                            })
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
                });
            }
        })
    }
</script>


<?= $this->endSection() ?>