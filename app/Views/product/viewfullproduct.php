<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('asset/css/rtl/adminlte.rtl.min.css')  ?>">

    <!-- SweetAlert2 Bootstrap or Dark -->
    <link rel="stylesheet" href="<?= base_url('asset/css/sweetalert2-dark.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/index.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/Responsive-2.2.9/css/responsive.bootstrap5.min.css'); ?>">
</head>

<style>
    .onsales {
        padding-bottom: 20px;
        background-color: #f5f5f5;
    }

    .onsales_container {
        padding: 20px 22px;
        max-width: 1440px;
        margin: 0 auto;
    }

    .product_container {
        max-width: 1440px;
        margin: 0 auto;
    }

    /* li {
        color: #aaa;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    } */
    .cut-bread {
        width: 50%;
        background-color: #f5f5f5;
        padding: 5px;
        margin-bottom: 15px;

    }


    .breadcrumb {
        display: flex;
        margin: 0px;
        color: gray;
        gap: 15px;
    }

    .hero_container {
        display: grid;
        border-radius: 8px;
        grid-template-columns: 1fr 0;
        grid-template-rows: repeat(2, 200px);
        overflow: hidden;
        gap: 8px;
        grid-template-areas:
            "img-1 img-2 img-3"
            "img-1 img-4 img-5";
        grid-template-columns: 2.45fr 1fr 1fr;
    }

    .hero_image1 {
        grid-area: img-1;
        overflow: hidden;
    }

    .hero_image2 {
        grid-area: img-2;
        overflow: hidden;
    }

    .hero_image3 {
        grid-area: img-3;
        overflow: hidden;
    }

    .hero_image4 {
        grid-area: img-4;
        overflow: hidden;
    }

    .hero_image5 {
        grid-area: img-5;
        overflow: hidden;
    }

    img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .product_container {
        padding: 20px 0 0 10px;
    }

    .product_location_container {
        display: flex;
    }

    .product_location {
        font-style: italic;
        font-size: 15px;
        margin: 0 10px;
    }

    .min_price_container {
        display: flex;
        flex-direction: column;
        padding: 20px 15px;
        border: solid 1px #c7c8c9;
        border-radius: 8px;
    }

    .min_price {
        font-size: 30px;
    }

    p {
        text-indent: 20px;
    }

    .onsale_container {
        padding: 20px 20px;
        background-color: white;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .onsales_info {
        margin-left: 20px;
        color: gray;
    }

    .text-end {
        text-align: right !important;
    }

    .text-mid {
        text-align: center !important;
    }
</style>

<body>
    <section class="product">
        <div class="product_container">
            <div class="cut-bread">
                <ol class="breadcrumb">
                    <li><a href="#">Trang chủ</a></li>
                    <li><i style="font-size: 12px; line-height: 10px; " class="fa fa-greater-than"></i></li>
                    <li><a href="#"><?= $product_category->categories_name ?></a></li>

                </ol>
            </div>

            <div class="hero">
                <div id="hero_container" class="hero_container">
                    <!-- <div class="hero_image1"><img src="https://image.kkday.com/v2/image/get/h_650%2Cc_fit/s1.kkday.com/product_20446/20201119051608_oXlJm/jpg" alt=""></div>
                    <div class="hero_image2"><img src="https://image.kkday.com/v2/image/get/h_650%2Cc_fit/s1.kkday.com/product_20446/20231208065759_oDXoo/jpg" alt=""></div>
                    <div class="hero_image3"><img src="https://image.kkday.com/v2/image/get/h_650%2Cc_fit/s1.kkday.com/product_20446/20231208065756_Dcu8M/jpg" alt=""></div>
                    <div class="hero_image4"><img src="https://image.kkday.com/v2/image/get/h_650%2Cc_fit/s1.kkday.com/product_20446/20231208065751_WxV7b/jpg" alt=""></div>
                    <div class="hero_image5"><img src="https://image.kkday.com/v2/image/get/h_650%2Cc_fit/s1.kkday.com/product_20446/20231208065739_H1Mf4/jpg" alt=""></div> -->
                    <!-- <div class="col-md-6">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeHjoAoCXwzWDsE1MDo8UKO9ibzC9X-16njg&s" width="100%" alt="">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeHjoAoCXwzWDsE1MDo8UKO9ibzC9X-16njg&s" width="100%" alt=""></div>
                        <div class="col"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeHjoAoCXwzWDsE1MDo8UKO9ibzC9X-16njg&s" width="100%" alt=""></div>
                    </div>
                    <div class="row">
                        <div class="col"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeHjoAoCXwzWDsE1MDo8UKO9ibzC9X-16njg&s" width="100%" alt=""></div>
                        <div class="col"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeHjoAoCXwzWDsE1MDo8UKO9ibzC9X-16njg&s" width="100%" alt=""></div>
                    </div>

                </div> -->
                </div>
            </div>
            <div class="product_container">
                <div class="row">
                    <div class="col-md-8">
                        <h1><?= $product->product_name ?></h1>
                        <div class="product_location_container">
                            <i class="fa fa-map-marker-alt"></i>
                            <h3 class="product_location"><?= $product_location ?></h3>
                            <i class="fa fa-calendar"></i>
                            <h3 class="product_location"><?= $product_duration->value_vi ?></h3>
                        </div>
                        <hr>
                        <div class="product_infor">
                            <h2>Product Introduction</h2>
                            <?= $product->product_intro ?>
                        </div>
                        <hr>
                        <div class="product_infor">
                            <h2>Product Description</h2>
                            <?= $product->product_desc ?>
                        </div>
                        <hr>
                        <div class="product_infor">
                            <h2>Product rules</h2>
                            <?= $product->product_rules ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="min_price_container">
                            <p>Từ <span class="min_price">9,925</span> <sup class="currency">$</sup></p>
                            <button class="btn btn-success" type="button"> Chọn gói dịch vụ</button>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>

    </section>
    <section class="onsales">
        <div class="onsales_container">
            <h3>Chọn dịch vụ</h3>
            <div class="row" id="packet_container">


            </div>

        </div>
    </section>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("Dsadsa");
        // Example JSON data
        const imageData = <?= $product->product_images ?>

        const container = document.getElementById('hero_container');
        const source = "<?= base_url() ?>";
        imageData.forEach((item, index) => {
            // Create a new div element for each image
            const div = document.createElement('div');

            // Set the class of the div according to the index
            div.className = `hero_image${index + 1}`;

            // Create an img element
            const img = document.createElement('img');
            img.src = `${source}/uploads/${item.image_name}`;
            img.alt = '';

            // Append the image to the div
            div.appendChild(img);

            // Append the div to the container
            container.appendChild(div);
        });
    });

    $(document).ready(function() {
        $.ajax({
            url: "<?= base_url($controller . '/loadPacket') ?>",
            type: 'post',
            data: {
                id: <?= $product->id ?>,
            },
            success: function(response) {
                // Handle successful response here
                $('#packet_container').html(response.html);
            },
        })

    });
</script>