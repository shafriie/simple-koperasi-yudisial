<?php 
	$menu = $this->uri->segment(2); 
	$status = $this->session->userdata('status');
?>

<ul class="list-group">
			  <li class="list-group-item active text-center"><b>Menu Bar</b></li>
			  <li class="list-group-item">Anda login sebagai <b><?= ucfirst($this->session->userdata('ket_status')); ?></b></li>

			  <?php if ($status != 2): ?>
			  <li class="list-group-item <?= ($menu == 'dashboard')?'activeMenu':'' ?>"><a style="color: black" href="<?= site_url('app/dashboard') ?>">Dashboard</a></li>
			  <?php else: ?>	
			  <?php endif ?>
			  
			  <?php if ($status == 1): ?>
			  <li class="list-group-item <?= ($menu == 'anggota')?'activeMenu':'' ?>"><a style="color: black" href="<?= site_url('app/anggota') ?>">Anggota</a></li>	
			  <?php endif ?>
			  <?php if ($status == 1 || $status == 2): ?>
			  <li class="list-group-item <?= ($menu == 'peminjaman')?'activeMenu':'' ?>"><a style="color: black" href="<?= site_url('app/peminjaman') ?>">Peminjaman</a></li>
			  <li class="list-group-item <?= ($menu == 'pengembalian')?'activeMenu':'' ?>"><a style="color: black" href="<?= site_url('app/pengembalian') ?>">Pengembalian</a></li>	
			  <?php endif ?>
			  
			  <?php if ($status == 1 || $status == 3): ?>
			  <li class="list-group-item <?= ($menu == 'laporan')?'activeMenu':'' ?>"><a style="color: black" href="<?= site_url('app/laporan') ?>">Laporan</a></li>	
			  <?php endif ?>
			  
			  <li class="list-group-item <?= ($menu == 'profile')?'activeMenu':'' ?>"><a style="color: black" href="<?= site_url('app/profile') ?>">My Profile</a></li>
			  <li class="list-group-item"><a style="color: black" href="<?= site_url('logout') ?>">Logout</a></li>
			</ul>