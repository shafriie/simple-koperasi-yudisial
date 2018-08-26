<? $header ?>

<div class="container-fluid">
	<div class="row" style="margin-top: 0%">
		<div class="col-md-3">
			<?php $this->load->view('Layout/menubar'); ?>
		</div>
		<div class="col-md-9">
			<ul class="list-group">
			  <li class="list-group-item active"><b>Pengembalian</b></li>
			</ul>
			<hr>

			<?php if ($this->session->flashdata('msg')): ?>
			<p class="<?= $this->session->flashdata('alert'); ?>"><?= $this->session->flashdata('msg'); ?></p>
			<?php endif ?>

			<table id="table_id" class="table table-bordered">	
			    <thead>
			        <tr bgcolor="#007BFF" style="color: white">
			            <th>No</th>
			            <th>NIP</th>
			            <th>Nama</th>
			            <th>Alamat</th>
			            <th>Tanggal Pinjam</th>
			            <th>Tanggal Jangka Waktu</th>
			            <th>Nominal</th>
			            <th>Status</th>
			            <th>Menu</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach ($pengembalian as $key => $value): ?>
			        	<tr>
			        		<td><?= $key + 1 . ". " ?></td>
			        		<td><?= $value->nip ?></td>
			        		<td><?= $value->nama ?></td>
			        		<td><?= $value->alamat ?></td>
			        		<td><?= $value->tanggal_pinjam ?></td>
			        		<td><?= $value->tanggal_jangkawaktu ?></td>
			        		<td><?= $value->nominal ?></td>
			        		<td><?= ($value->status_pengembalian == 1)?'<span class="badge badge-success">Lunas</span>':'<span class="badge badge-danger">Belum Lunas</span>' ?></td>
			        		<td width="100px" align="center">
			        			<a target="_blank" href="<?= base_url('upload/'.$value->file_buktitransfer) ?>" title="Lihat Bukti Transfer"><i class="fa fa-calculator"></i></a>
			        			&emsp;
			        			<?php if ($value->status_pengembalian): ?>
			        			<a onclick="return confirm('Apakah anda ingin merubah status ini?')" href="<?= site_url('pengembalian/changeStatus/'.$value->status_pengembalian.'/'.$value->id_pengembalian) ?>" title="Not Accept"><i class="fa fa-close"></i></a>
			        			<?php else: ?>	
			        			<a onclick="return confirm('Apakah anda ingin merubah status ini?')" href="<?= site_url('pengembalian/changeStatus/'.$value->status_pengembalian.'/'.$value->id_pengembalian) ?>" title="Accept"><i class="fa fa-check"></i></a>
			        			<?php endif ?>
			        			
			        			&emsp;
			        			<a href="<?= site_url('pengembalian/delete/'.$value->id_pengembalian) ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" title="Remove"><i class="fa fa-trash"></i></a>
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