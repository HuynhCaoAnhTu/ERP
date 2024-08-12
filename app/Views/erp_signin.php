 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ERP Travel Login</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
			<div class="col-sm-8 d-none d-sm-block">
			<img src="<?= base_url('./asset/img/thisway.png') ?>" class="card-img-top" alt="vietnamsic.com">
			</div>
			<div class="col-12 col-sm-4">
				<div class="card align-self-center" style="width:100%; margin-top:50px">
					<img src="<?= base_url('./asset/img/ERPlogin.png') ?>" class="card-img-top" alt="vietnamsic.com">
					<div class="card-body gx-5">
						<h3 class="card-title">ERP Login </h3>
						<?php if(session()->getFlashdata('msg')):?>
							<div class="alert alert-warning">
							   <?= session()->getFlashdata('msg') ?>
							</div>
						<?php endif;?>
						<form action="<?php echo base_url(); ?>SigninController/loginAuth" method="post">
							<?= csrf_field() ?>
							<input type="hidden" id="loginTO" name ="loginTO" value="ERP">
							<div class="form-group mb-3">
								<input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
							</div>
							<div class="form-group mb-3">
								<input type="password" name="password" placeholder="Password" class="form-control" >
							</div>
							<div class="d-grid">
								 <button type="submit" class="btn btn-success">Signin</button>
							</div>     
						</form>
					</div>
				</div>
            </div>
        </div>
    </div>
  </body>
</html>

