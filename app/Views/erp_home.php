<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>
<!-- code here.. -->
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>10/20</h3>

                <p>Tour</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>x00.000.000<sup style="font-size: 20px">đ</sup></h3>

                <p>Sale</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>x0.000.000<sup style="font-size: 20px">đ</sup></h3>

                <p>Profit</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>x.000.000<sup style="font-size: 20px">đ</sup></h3>

                <p>Debit</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
<!-- TEST TEST TEST -->
<ul class="nav nav-tabs" id="scmTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">Infomation</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="rates-tab" data-bs-toggle="tab" data-bs-target="#rates" type="button" role="tab" aria-controls="rates" aria-selected="false">Rates policy</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions" type="button" role="tab" aria-controls="transactions" aria-selected="false">Transactions</button>
  </li>
</ul>
<div class="tab-content" id="scmTabContent">
  <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
  aaa
  </div>
  <div class="tab-pane fade" id="rates" role="tabpanel" aria-labelledby="rates-tab">
  bbbbbbbbb
  </div>
  <div class="tab-pane fade" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
  cccccccccc
  </div>
</div>


<?= $this->endSection() ?>

<?= $this->section("pageScript") ?>
<!-- write script here.. -->
<?= $this->endSection() ?>