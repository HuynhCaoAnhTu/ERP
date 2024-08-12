<!-- Haeder -->
<?= $this->include('layout/header') ?>
<!--/Haeder -->
  <body class="layout-fixed light-mode" style="height: auto;">
    <div class="wrapper">       
	
        <!-- Navbar -->
        <?= $this->include('layout/navbar') ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
         <?= $this->include('layout/sidebar') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-top: 80px;">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Area for dynamic content <div class='card'> -->
                            <?= $this->renderSection("content") ?>
                            <!-- /Area for dynamic content -->
                        </div>
                        <!--/.col-12 -->
                    </div>
                    <!--/.row -->
                </div>
                <!--/.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    <!-- Footer -->
	<?= $this->include('layout/footer') ?>
    <!-- /Footer -->
    </div>
    <!-- ./wrapper -->
    <!-- Global Script -->
    <?= $this->include('layout/globalscript') ?>
    <!--/Global Script -->
    <!-- PageScript-->
    <?= $this->renderSection("pageScript") ?>
    <!-- /PageScript-->
</body>
</html>