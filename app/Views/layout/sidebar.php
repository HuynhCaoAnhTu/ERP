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
              <li class="nav-item has-treeview">
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
              </li>


              <li class="nav-item">
                <a href="<?= base_url() ?>products" class="nav-link">
                  <i class="nav-icon fas fa-umbrella-beach"></i>
                  <p>SẢN PHẨM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>upload" class="nav-link">
                  <i class="nav-icon fas fa-umbrella-beach"></i>
                  <p>HÌNH ẢNH</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url() ?>bookings" class="nav-link">
                  <i class="nav-icon fas fa-ticket"></i>
                  <p>ĐƠN HÀNG</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url() ?>operator" class="nav-link">
                  <i class="nav-icon fas fa-list-check"></i>
                  <p>ĐIỀU HÀNH</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url() ?>customers" class="nav-link">
                  <i class="nav-icon fas fa-person-walking-luggage"></i>
                  <p>KHÁCH HÀNG</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url() ?>agents" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>

                  <p>ĐẠI LÝ B2B</p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="javascript:;" class="nav-link">
                  <i class="nav-icon fas fa-handshake"></i>
                  <p>
                    NHÀ CUNG CẤP
                    <i class="end fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>scm/ks" class="nav-link">
                      <i class="nav-icon fas fa-hotel"></i>
                      <p>Hotel</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>scm/nh" class="nav-link ">
                      <i class="nav-icon fas fa-utensils"></i>
                      <p>Restaurant</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>scm/vc" class="nav-link ">
                      <i class="nav-icon fas fa-car"></i>
                      <p>Transportation</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>scm/hd" class="nav-link ">
                      <i class="nav-icon fas fa-street-view"></i>
                      <p>Tour guide</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>scm/tq" class="nav-link ">
                      <i class="nav-icon fas fa-ticket"></i>
                      <p>Sightseeing tickets</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>scm/lt" class="nav-link ">
                      <i class="nav-icon fas fa-umbrella-beach"></i>
                      <p>Packed tour</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>scm/dv" class="nav-link ">
                      <i class="nav-icon fas fa-concierge-bell"></i>
                      <p>Other services</p>
                    </a>
                  </li>
                </ul>
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
                    DANH MỤC
                    <i class="end fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>category/location" class="nav-link">
                      <i class="nav-icon far fa-circle"></i>
                      <p>Địa điểm</p>
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
                <a href="<?= base_url() ?>lockscreen" class="nav-link">
                  <i class="nav-icon far fa-clock"></i>
                  <p>Lock screen</p>
                </a>
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