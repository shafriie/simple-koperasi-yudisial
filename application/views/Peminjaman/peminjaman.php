<? $header ?>

<div class="container-fluid">
	<div class="row" style="margin-top: 0%">
		<div class="col-md-3">
			<?php $this->load->view('Layout/menubar'); ?>
		</div>
		<div class="col-md-9">
			<ul class="list-group">
			  <li class="list-group-item active"><b>Peminjaman</b></li>
			</ul>
			<hr>

			<?php if ($this->session->flashdata('msg')): ?>
			<p class="<?= $this->session->flashdata('alert'); ?>"><?= $this->session->flashdata('msg'); ?></p>	
			<?php endif ?>

			<table id="table_id" class="table table-bordered">	
			    <thead>
			        <tr bgcolor="#007BFF" style="color: white">
			            <th>No</th>
			            <th>Tanggal Pinjam</th>
			            <th>Tanggal Jangka Waktu</th>
			            <th>NIP</th>
			            <th>Nama</th>
			            <th>Alamat</th>
			            <th>Nominal</th>
			            <th>Status</th>
			            <th>Menu</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach ($pinjam as $key => $value): ?>
			        	<tr>
			        		<td><?= $key + 1 . ". " ?></td>
			        		<td><?= $value->tanggal_pinjam ?></td>
			        		<td><?= $value->tanggal_jangkawaktu ?></td>
			        		<td><?= $value->nip ?></td>
			        		<td><?= $value->nama ?></td>
			        		<td><?= $value->alamat ?></td>
			        		<td><?= $value->nominal ?></td>
			        		<td><?= ($value->status_pinjam == 1)?'<span class="badge badge-success">Accept</span>':'<span class="badge badge-danger">Not Accept</span>' ?></td>
			        		<td width="130px" align="center">
			        			<a target="_blank" href="<?= base_url('upload/'.$value->file_ktp); ?>" title="Lihat KTP"><i class="fa fa-address-card-o"></i></a>
			        			&nbsp;
			        			<a target="_blank" href="<?= base_url('upload/'.$value->file_slip_gaji); ?>" title="Lihat Slip Gaji"><i class="fa fa-credit-card"></i></a>
			        			&nbsp;
			        			<?php if ($value->status_pinjam == 0): ?>
			        			<a onclick="return confirm('Apakah anda ingin merubah status ini?')" href="<?= site_url('peminjaman/accept/'.$value->status_pinjam.'/'.$value->id_pinjam) ?>" title="Accept"><i class="fa fa-check"></i></a>
			        			<?php else: ?>	
			        			<a onclick="return confirm('Apakah anda ingin merubah status ini?')" href="<?= site_url('peminjaman/accept/'.$value->status_pinjam.'/'.$value->id_pinjam) ?>" title="Not Accept"><i class="fa fa-close"></i></a>
			        			<?php endif ?>
			        			
			        			&nbsp;
			        			<a href="<?= site_url('peminjaman/delete/'.$value->id_pinjam) ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" title="Remove"><i class="fa fa-trash"></i></a>
			        		</td>
			        	</tr>
			        <?php endforeach ?>
			    </tbody>
			</table>
			
		</div>
	</div>	
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#table_id').DataTable();
	});
</script>

<? $footer ?>