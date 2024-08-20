<div class="row onsale_container">
    <div class="col-md-5 onsale_infor">
        <div class="row">
            <h4>[<?= $items->onsales_code ?>] <?= $items->onsales_name ?></h4>
        </div>
        <div class="row onsales_info"><?= $items->onsales_info ?></div>

    </div>
    <div class="col-md-7">
        <h4>Onsales Prices</h4>
        <table id="onsales_price_table" class="table table-bordered">
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
                        <td class="text-mid"><?= $sku->price_group ?></td>
                        <td class="text-mid"><?= $sku->price_valied_from ?></td>
                        <td class="text-mid"><?= $sku->price_valied_to ?></td>
                        <td class="text-end"><?= $price_2_pax ?></td>
                        <td class="text-end"><?= $price_3_4_pax ?></td>
                        <td class="text-end"><?= $price_5_6_pax ?></td>
                        <td class="text-end"><?= $price_7_8_pax ?></td>
                        <td class="text-end"><?= $price_9_10_pax ?></td>
                        <td class="text-end"><?= $price_11_14_pax ?></td>
                        <td class="text-end"><?= $price_supp_add ?></td>
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
        if (count($blackouts) > 0) {
        ?>
            <table class="table table-bordered">
                <h4>Onsales Blackout</h4>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>From</th>
                        <th>To </th>

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
</div>