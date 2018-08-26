<? $header ?>

<div class="container-fluid">
	<div class="row" style="margin-top: 0%">
		<div class="col-md-3">
			<?php $this->load->view('Layout/menubar'); ?>
		</div>
		<div class="col-md-9">
			<ul class="list-group">
			  <li class="list-group-item active"><b>Anggota</b></li>
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
		            <th>Password</th>
		            <th>Nama</th>
		            <th>Alamat</th>
		            <th>Tanggal Lahir</th>
		            <th>No Telepon</th>
		            <th>Menu</th>
		        </tr>
		    </thead>
		    <tbody>
		        <?php foreach ($anggota as $key => $value): ?>
		        	<tr>
		        		<td><?= $key + 1 . ". " ?></td>
		        		<td><?= $value->nip ?></td>
		        		<td><?= $value->password ?></td>
		        		<td><?= $value->nama ?></td>
		        		<td><?= $value->alamat ?></td>
		        		<td><?= $value->tgl_lahir ?></td>
		        		<td><?= $value->no_telp ?></td>
		        		<td align="center">
		        			
		        			<a href="<?= site_url('anggota/delete/'.$value->nip) ?>" onclick="return confirm('Apakah anda ingin menghapus anggota ini?')" title="Remove"><i class="fa fa-trash"></i></a>
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