<? $header ?>

<div class="container-fluid">
	<div class="row" style="margin-top: 0%">
		<div class="col-md-3">
			<?php $this->load->view('Layout/menubar'); ?>
		</div>
		<div class="col-md-9">
			<ul class="list-group">
			  <li class="list-group-item active"><b>Laporan</b></li>
			</ul>
			<hr>

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
			            <!-- <th>Menu</th> -->
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach ($laporan as $key => $value): ?>
			        	<tr>
			        		<td><?= $key + 1 . ". " ?></td>
			        		<td><?= $value->nip ?></td>
			        		<td><?= $value->nama ?></td>
			        		<td><?= $value->alamat ?></td>
			        		<td><?= $value->tanggal_pinjam ?></td>
			        		<td><?= $value->tanggal_jangkawaktu ?></td>
			        		<td><?= $value->nominal ?></td>
			        		<td><?= ($value->status_pengembalian == 1)?'<span class="badge badge-success">Lunas</span>':'<span class="badge badge-danger">Belum Lunas</span>' ?></td>
			        		<!-- <td width="100px" align="center">
			        			<a href="" title="Lihat Dokumen"><i class="fa fa-external-link"></i></a>
			        			&emsp;
			        			<a href="" title="Edit"><i class="fa fa-pencil"></i></a>
			        			&emsp;
			        			<a href="<?= site_url('anggota/delete/'.$value->id_pinjam) ?>" onclick="return confirm('Apakah anda ingin menghapus anggota ini?')" title="Remove"><i class="fa fa-trash"></i></a>
			        		</td> -->
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