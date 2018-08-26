<? $header ?>
<div class="row" style="margin-top: 0%">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-4">

		<div class="alert" style="padding:50px;border-radius: 30px">
			<h2 class="text-center">Silahkan Register</h2>
			<hr>
			<form method="POST" action="<?= site_url('register/submit') ?>">
			  <?php if ($this->session->flashdata('msg')): ?>
			  	<p class="<?= $this->session->flashdata('alert'); ?>"><?= $this->session->flashdata('msg'); ?></p>
			  <?php endif ?>
			  <div class="form-group">
			    <label for="nip">NIP:</label>
			    <input type="number" class="form-control" name="nip" required autofocus>
			  </div>
			  <div class="form-group">
			    <label for="password">Password:</label>
			    <input type="password" class="form-control" name="password" required>
			  </div>
			  <button type="submit" class="btn btn-primary">Register</button>
			  <br><br>
			  <span>Sudah punya akun? <a href="<?= site_url('login') ?>">login</a> sebagai anggota</span>
			</form>	
		</div>
	</div>
	<div class="col-md-4">
		
	</div>
</div>

<? $footer ?>