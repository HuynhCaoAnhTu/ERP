      <!-- Main Sidebar Container -->
      <!--<aside class="main-sidebar sidebar-bg-dark sidebar-color-primary shadow">-->
      <aside class="main-sidebar sidebar-bg-dark sidebar-dark-success shadow">
        <div class="brand-container">
          <a href="<?= base_url() ?>" class="brand-link">
            <img src="<?= base_url('asset/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image opacity-80 shadow">
            <span class="brand-text fw-light">ERP TRAVEL</span>
          </a>
          <a class="pushmenu mx-1" data-lte-toggle="sidebar-mini" href="javascript:;" role="button"><i class="fas fa-angle-double-left"></i></a>
        </div>
        <!-- Sidebar -->
        <div class="sidebar">
          <nav class="mt-2">
            <!-- Sidebar Menu -->
            <ul class="nav nav-pills nav-sidebar flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
              <!-- <li class="nav-item has-treeview">
                <a href="javascript:;" class="nav-link">
                  <i class="nav-icon fas fa-file-invoice-dollar"></i>
                  <p>
                    ĐANG MỞ BÁN
                    <i class="end fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="<?= base_url() ?>products/outbound" class="nav-link">
                      <i class="nav-icon far fa-circle"></i>
                      <p>Outbound</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>products/noidia" class="nav-link ">
                      <i class="nav-icon far fa-circle"></i>
                      <p>NỘi địa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>products/daily" class="nav-link ">
                      <i class="nav-icon far fa-circle"></i>
                      <p>Daily tours</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>products/inbound" class="nav-link">
                      <i class="nav-icon far fa-circle"></i>
                      <p>Inbound</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?= base_url() ?>products/other" class="nav-link ">
                      <i class="nav-icon far fa-circle"></i>
                      <p>Khác</p>
                    </a>
                  </li>
                </ul>
              </li> -->


              <li class="nav-item">
                <a href="<?= base_url() ?>products" class="nav-link">
                  <i class="nav-icon fas fa-umbrella-beach"></i>
                  <p>PRODUCTS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>upload" class="nav-link">
                  <i class="nav-icon fas fa-umbrella-beach"></i>
                  <p>IMAGES</p>
                </a>
              </li>
              <!--
		<li class="nav-item has-treeview">
          <a href="javascript:;" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>
              ACCOUNTING
              <i class="end fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Agent</p>
              </a>
            </li>
            
          </ul>
        </li>  
		-->
              <li class="nav-item has-treeview">
                <a href="javascript:;" class="nav-link">
                  <i class="nav-icon fas fa-folder-open"></i>
                  <p>
                    LOCATIONS
                    <i class="end fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>category/location" class="nav-link">
                      <i class="nav-icon far fa-circle"></i>
                      <p>Location</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>category/sevices" class="nav-link ">
                      <i class="nav-icon far fa-circle"></i>
                      <p>Dịch vụ</p>
                    </a>
                  </li>

                </ul>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>logout" class="nav-link">
                  <i class="nav-icon far fa-share-from-square"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- /.sidebar -->
      </aside>