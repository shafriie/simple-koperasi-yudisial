<? $header ?>

<div class="container-fluid">
	<div class="row" style="margin-top: 0%">
		<div class="col-md-3">
			<?php $this->load->view('Layout/menubar'); ?>
		</div>
		<div class="col-md-9">
			<ul class="list-group">
			  <li class="list-group-item active"><b>Dashboard</b></li>
			</ul>
			<hr>
			<h3>Selamat Datang di Sistem Koperasi Kami</h3>

			<br>
			<div class="row">
				<div class="col-md-4">
					<div class="card bg-primary" style="color: white;font-weight: bold;padding:20px">
					  <div class="card-body">Jumlah Anggota = <?= @$anggota ?></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card bg-success" style="color: white;font-weight: bold;padding:20px">
					  <div class="card-body">Jumlah Pinjaman Acc = <?= @$pinjamanACC ?></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card bg-danger" style="color: white;font-weight: bold;padding:20px">
					  <div class="card-body">Pinjaman Belum Acc = <?= @$pinjamanNotACC ?></div>
					</div>
				</div>
			</div>
			
			<br><br>

			<div class="row">
				<div class="col-md-6">
					<div class="card bg-warning" style="color: white;font-weight: bold;padding:20px">
					  <div class="card-body">Jumlah Pengembalian Sudah Lunas = <?= @$pengembalianACC ?></div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card bg-secondary" style="color: white;font-weight: bold;padding:20px">
					  <div class="card-body">Jumlah Pengembalian Belum Lunas = <?= @$pengembalianNotACC ?></div>
					</div>
				</div>
			</div>

		</div>
	</div>	
</div>


<? $footer ?>