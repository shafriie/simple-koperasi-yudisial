<? $header ?>

<div class="container-fluid">
	<div class="row" style="margin-top: 0%">
		<div class="col-md-3">
			<?php $this->load->view('Layout/menubar'); ?>
		</div>
		<div class="col-md-9">
			<ul class="list-group">
			  <li class="list-group-item active"><b>Form Peminjaman</b></li>
			</ul>
			<hr>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#home">Form Peminjaman</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#menu1">List Peminjaman Saya</a>
			  </li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  
			  <div class="tab-pane container active" id="home">
			  	<?php foreach ($profile as $key => $value){ ?>
				<form enctype="multipart/form-data" method="POST" action="<?= site_url('peminjaman/submit') ?>">
				  <?php if ($this->session->flashdata('msg')): ?>
				  <p class="<?= $this->session->flashdata('alert'); ?>"><?= $this->session->flashdata('msg'); ?></p>	
				  <?php endif ?>
				  <div class="form-group">
				    <label for="nip">NIP:</label>
				    <input type="text" class="form-control" name="nip" id="nip" readonly required value="<?= $value->nip ?>">
				  </div>
				  <div class="form-group">
				    <label for="nama">Nama:</label>
				    <input type="text" class="form-control" id="nama" name="nama" required value="<?= $value->nama ?>">
				  </div>
				  <div class="form-group">
				    <label for="alamat">Alamat:</label>
				    <textarea id="alamat" name="alamat" required rows="4" class="form-control"><?= $value->alamat ?></textarea>
				  </div>
				  <div class="form-group">
				    <label for="nominal">Nominal Yang Dipinjam:</label>
				    <input type="number" class="form-control" id="nominal" name="nominal" required> 
				  </div>
				  <div class="form-group">
				    <label for="tanggal_pinjam">Tanggal Pinjam:</label>
				    <input type="date" class="form-control" id="tanggal_pinjam" value="<?= date('Y-m-d') ?>" name="tanggal_pinjam" required readonly>
				  </div>
				  <div class="form-group">
				    <label for="tanggal_jangkawaktu">Tanggal Jangka Waktu:</label>
				    <input type="date" class="form-control" id="tanggal_jangkawaktu" name="tanggal_jangkawaktu" required>
				  </div>
				  <div class="form-group">
				    <label for="file_ktp">Upload KTP:</label>
				    <input type="file" class="form-control" id="file_ktp" name="file_ktp" required>
				  </div>
				  <div class="form-group">
				    <label for="file_slip_gaji">Upload Slip Gaji:</label>
				    <input type="file" class="form-control" id="file_slip_gaji" name="file_slip_gaji" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				  <br><br><br>
				</form>
				<?php } ?>
			  </div>

			  <div class="tab-pane container fade" id="menu1">
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
			            <th>Lihat Dokumen</th>
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
			        		<td align="center" width="120px">
			        			<a target="_blank" href="<?= base_url('upload/'.$value->file_ktp); ?>" class="btn btn-info btn-sm">KTP</a>
			        			<a target="_blank" href="<?= base_url('upload/'.$value->file_slip_gaji); ?>" class="btn btn-danger btn-sm">Slip Gaji</a>
			        		</td>
			        	</tr>
			        <?php endforeach ?>
			    </tbody>
			</table>
			  </div>

			</div>


			
		</div>
	</div>	
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#table_id').DataTable();
	});
</script>

<? $footer ?>	