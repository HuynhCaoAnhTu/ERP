<!--  <nav class="main-header navbar navbar-expand navbar-dark"> !-->
<nav class="main-header navbar navbar-expand navbar-light fixed-top" style="height: auto;">
  <div class="container-fluid">
    <!-- Start navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar-full" href="/" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="" class="nav-link"><strong><?= esc($pagetitle) ?></strong></a>
      </li>
	  <li class="nav-item d-block d-sm-none">
        <a href="" class="nav-link"><strong><?= esc($pagetitle_mobile) ?></strong></a>
      </li>
	  
 </ul>
    <!-- End navbar links -->
    <ul class="navbar-nav ms-auto">
     <li class="nav-item dropdown list-group-item-success">
	 <?php
		if(session('lang')=="vi"){
	 ?>
        <a class="nav-link btn rounded" data-bs-toggle="dropdown"><strong>Việt Nam - VNĐ</strong></a>
	<?php
		}else{
	 ?>
        <a class="nav-link btn rounded" data-bs-toggle="dropdown"><strong>English - USD</strong></a>
	<?php } 
	?>
        <div class="dropdown-menu">
          <a href="" id="lang_vi" class="dropdown-item">Việt Nam - VNĐ
		  </a>
          <div class="dropdown-divider"></div>
          <a href="" id="lang_en" class="dropdown-item">English - USD
          </a>
        </div>		
      </li>
	 
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge bg-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="d-flex">
              <div class="flex-shrink-0">
                <img src="<?= base_url('asset/img/user.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle me-3">
              </div>
              <div class="flex-grow-1">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-end fs-7 text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="fs-7">Call me whenever you can...</p>
                <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="d-flex">
              <div class="flex-shrink-0">
                <img src="<?= base_url('asset/img/user.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle me-3">
              </div>
              <div class="flex-grow-1">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-end fs-7 text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="fs-7">I got your message bro</p>
                <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="d-flex">
              <div class="flex-shrink-0">
                <img src="<?= base_url('asset/img/user.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle me-3">
              </div>
              <div class="flex-grow-1">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-end fs-7 text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="fs-7">The subject goes here</p>
                <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge bg-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope me-2"></i> 4 new messages
            <span class="float-end text-muted fs-7">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users me-2"></i> 8 friend requests
            <span class="float-end text-muted fs-7">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file me-2"></i> 3 new reports
            <span class="float-end text-muted fs-7">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img src="<?= session('img');?>" class="user-image img-circle shadow" alt="<?= session('name');?>">
          <span class="d-none d-md-inline"><strong><?= session('name');?></strong></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="<?= session('img');?>" class="img-circle shadow" alt="<?= session('name');?>">

            <p>
			  <?= session('name');?>
              <small><?= session('email');?></small>
			  <small><?= session('userof');?></small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="<?=base_url()?>profile" class="btn btn-default btn-flat">Profile</a>
            <a href="<?=base_url()?>logout" class="btn btn-default btn-flat float-end">Sign out</a>
          </li>
        </ul>
      </li>
      <!-- TODO tackel in v4.1 -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </div>
</nav>
