<? $header ?>

<div class="container-fluid">
	<div class="row" style="margin-top: 0%">
		<div class="col-md-3">
			<?php $this->load->view('Layout/menubar'); ?>
		</div>
		<div class="col-md-9">
			<ul class="list-group">
			  <li class="list-group-item active"><b>Form Pengembalian</b></li>
			</ul>
			<hr>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#home">Form Pengembalian</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#menu1">List Pengembalian Saya</a>
			  </li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  
			  <div class="tab-pane container active" id="home">
			  	
				<form enctype="multipart/form-data" method="POST" action="<?= site_url('pengembalian/submit') ?>">
				  <?php if ($this->session->flashdata('msg')): ?>
				  <p class="<?= $this->session->flashdata('alert'); ?>"><?= $this->session->flashdata('msg'); ?></p>	
				  <?php endif ?>
				  <div class="form-group">
				    <label for="id_pinjam">ID Pinjam:</label>
				    <select name="id_pinjam" id="id_pinjam" class="form-control" required>
				    	<option value="">-- Pilih --</option>
				    	<?php foreach ($pinjam as $key => $value): ?>
				    		<option value="<?= $value->id_pinjam ?>"><?= $value->id_pinjam  ?></option>
				    	<?php endforeach ?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="nominal">Nominal Yang Dipinjam:</label>
				    <input type="number" class="form-control" id="nominal" name="nominal" required readonly>  
				  </div>
				  <div class="form-group">
				    <label for="tanggal_pinjam">Tanggal Pinjam:</label>
				    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required readonly>
				  </div>
				  <div class="form-group">
				    <label for="tanggal_jangkawaktu">Tanggal Jangka Waktu:</label>
				    <input type="date" class="form-control" id="tanggal_jangkawaktu" name="tanggal_jangkawaktu" required readonly>
				  </div>
				  <div class="form-group">
				    <label for="file_buktitransfer">Upload Bukti Transfer:</label>
				    <input type="file" class="form-control" id="file_buktitransfer" name="file_buktitransfer" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				  <br><br><br>
				</form>
				
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
			        <?php foreach ($pengembalian as $key => $value): ?>
			        	<tr>
			        		<td><?= $key + 1 . ". " ?></td>
			        		<td><?= $value->tanggal_pinjam ?></td>
			        		<td><?= $value->tanggal_jangkawaktu ?></td>
			        		<td><?= $value->nip ?></td>
			        		<td><?= $value->nama ?></td>
			        		<td><?= $value->alamat ?></td>
			        		<td><?= $value->nominal ?></td>
			        		<td><?= ($value->status_pengembalian == 1)?'<span class="badge badge-success">Lunas</span>':'<span class="badge badge-danger">Belum Lunas</span>' ?></td>
			        		<td align="center" width="120px">
			        			<a target="_blank" href="<?= base_url('upload/'.$value->file_buktitransfer); ?>" class="btn btn-info btn-sm">File Bukti Transfer</a>
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

		$('body').on('change', '#id_pinjam', function(event) {
			event.preventDefault();
			var id_pinjam = $(this).val();
			$.ajax({
				url: '<?= site_url('peminjaman/getDataWhere') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {id_pinjam: id_pinjam},
			})
			.done(function(xxx) {
				console.log(xxx);
				$('input[name="nominal"]').val('');
				$('input[name="tanggal_pinjam"]').val('');
				$('input[name="tanggal_jangkawaktu"]').val('');

				$('input[name="nominal"]').val(xxx.nominal);
				$('input[name="tanggal_pinjam"]').val(xxx.tanggal_pinjam);
				$('input[name="tanggal_jangkawaktu"]').val(xxx.tanggal_jangkawaktu);
			});
			
		});
	});
</script>

<? $footer ?>	