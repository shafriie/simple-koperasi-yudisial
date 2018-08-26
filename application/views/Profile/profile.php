<? $header ?>

<div class="container-fluid">
	<div class="row" style="margin-top: 0%">
		<div class="col-md-3">
			<?php $this->load->view('Layout/menubar'); ?>
		</div>
		<div class="col-md-9">
			<ul class="list-group">
			  <li class="list-group-item active"><b>My Profile</b></li>
			</ul>
			<hr>
			<?php foreach ($profile as $key => $value) ?>
			<form method="POST" action="<?= site_url('profile/submit') ?>">
			  <?php if ($this->session->userdata('msg')): ?>
			  	<p class="<?= $this->session->userdata('alert') ?>"><?= $this->session->userdata('msg') ?></p>
			  <?php endif ?>
			  <div class="form-group">
			    <label for="email">NIP:</label>
			    <input type="text" class="form-control" name="nip" readonly value="<?= $value->nip ?>">
			  </div>
			  <div class="form-group">
			    <label for="password">Password:</label>
			    <input type="password" class="form-control" name="password" value="<?= $value->password ?>" required>
			  </div>
			  <div class="form-group">
			    <label for="password">Nama Lengkap:</label>
			    <input type="text" class="form-control" name="nama" required value="<?= $value->nama ?>">
			  </div>
			  <div class="form-group">
			    <label for="password">Alamat:</label>
			    <textarea name="alamat" class="form-control" rows="5" required><?= $value->alamat ?></textarea>
			  </div>
			  <div class="form-group">
			    <label for="password">Tanggal Lahir:</label>
			    <input type="date" name="tgl_lahir" class="form-control" required value="<?= $value->tgl_lahir ?>">
			  </div>
			  <div class="form-group">
			    <label for="password">Nomor Telepon:</label>
			    <input type="text" name="no_telp" required class="form-control" value="<?= $value->no_telp ?>">
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			  <br><br><br>
			</form>
			
		</div>
	</div>	
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#table_id').DataTable();
	});
</script>

<? $footer ?>