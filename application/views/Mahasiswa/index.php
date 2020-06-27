<main>
	<div class="container pt-5">
		<div class="row">
			<div class="col-lg-6 m-auto">
				<?php if (validation_errors()): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?= validation_errors() ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif ?>
				<?php if ($this->session->flashdata('insert')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Mahasiswa <strong><?= $this->session->flashdata('insert') ?></strong> ditambahkan!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php elseif ($this->session->flashdata('update')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Mahasiswa <strong><?= $this->session->flashdata('update') ?></strong> diupdate!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php elseif ($this->session->flashdata('delete')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Mahasiswa <strong><?= $this->session->flashdata('delete') ?></strong> dihapus!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif ?>
			</div>
		</div>
		<section id="header" class="mb-3">
			<h1 class="display-4 text-center font-weight-bold">
				Daftar Mahasiswa
			</h1>
<!--			<h4 class="text-muted mt-0 mb-3 text-center">Selamat datang, --><?//= $_SESSION['username'] ?><!--. Status: --><?php //if ($_SESSION['role'] === '0'): ?><!--User--><?php //else: ?><!--Admin--><?php //endif ?><!--</h4>-->
			<button type="button" class="btn btn-primary d-block m-auto font-weight-bold insert" data-toggle="modal" data-target="#insertModal">
				Insert
			</button>
		</section>
		<section id="search">
			<div class="row">
				<div class="col-lg-4">
					<form action="<?= base_url() ?>Mahasiswa" method="post">
						<div class="input-group mb-3">
							<input type="text" id="keyword" name="keyword" autocomplete="off" class="form-control" placeholder="Cari Mahasiswa" aria-label="Cari Mahasiswa" aria-describedby="button-addon2">
							<div class="input-group-append">
								<input class="btn btn-outline-success" type="submit" id="search" name="search" value="Search">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<?php if(empty($students)): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Data yang kamu cari tidak ditemukan!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php else: ?>
						<div class="alert alert-info alert-dismissible fade show" role="alert">
							Results: <?= /** @var int $total_rows */ $total_rows ?> data
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif ?>
				</div>
			</div>
		</section>
		<section id="main">
			<table class="table table-striped">
				<thead class="thead-dark">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Foto</th>
					<th scope="col">Nama</th>
					<th scope="col">NIM</th>
					<th scope="col">Jurusan</th>
					<th scope="col">Angkatan</th>
					<th scope="col"></th>
				</tr>
				</thead>
				<tbody>
				<?php
				$i = $this->uri->segment(3);
				/** @var array $students */
				foreach ($students as $student):?>
					<tr>
						<th scope="row"><?= ++$i ?></th>
						<td><img src="<?= base_url() ?>assets/img/<?= $student['foto'] ?>" alt="<?= $student['nama']?>" width="100" class="img-fluid"></td>
						<td><p><?= $student['nama'] ?></p></td>
						<td><p><?= $student['nim'] ?></p></td>
						<td><p><?= $student['jurusan'] ?></p></td>
						<td><p><?= $student['angkatan'] ?></p></td>
						<td class="d-flex flex-column align-items-center justify-content-center">
							<h5><button type="button" class="btn badge badge-info mb-2 mt-3 detail" data-toggle="modal" data-target="#detailModal" data-id="<?= $student['id'] ?>" data-baseurl="<?= base_url() ?>">Detail</button></h5>
							<h5><button type="button" class="btn badge badge-warning mt-2 mb-2 update" data-toggle="modal" data-target="#updateModal" data-id="<?= $student['id'] ?>" data-baseurl="<?= base_url() ?>">Update</button></h5>
							<h5><button type="button" class="btn badge badge-danger mt-2 delete" data-toggle="modal" data-target="#deleteModal" data-id="<?= $student['id'] ?>" data-baseurl="<?= base_url() ?>">Delete</button></h5>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?= $this->pagination->create_links() ?>
		</section>
	</div>

	<!-- Insert Modal -->
	<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<?= form_open('Mahasiswa/index', 'enctype="multipart/form-data"') ?>
					<div class="modal-header">
						<h5 class="modal-title" id="insertModalLabel">Insert Data Mahasiswa</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nim">NIM</label>
							<input type="text" class="form-control" maxlength="8" id="nim" autocomplete="off" name="nim">
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" maxlength="30" id="nama" autocomplete="off" name="nama">
						</div>
						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<select class="form-control custom-select" id="jurusan" autocomplete="off" name="jurusan">
								<option selected></option>
								<option value="Teknik Elektro">Teknik Elektro</option>
								<option value="Teknik Informatika">Teknik Informatika</option>
								<option value="Teknik Mesin">Teknik Mesin</option>
								<option value="Teknik Industri">Teknik Industri</option>
								<option value="Teknik Sipil">Teknik Sipil</option>
								<option value="Teknik Lingkungan">Teknik Lingkungan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="angkatan">Angkatan</label>
							<input type="text" class="form-control" min="0" max="3000" maxlength="4" id="angkatan" autocomplete="off" name="angkatan">
						</div>
						<div class="custom-file">
							<label for="foto">Foto</label>
							<input type="file" class="form-control-file" id="foto" name="foto">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" name="insert" value="Insert">
					</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>

	<!-- Update Modal -->
	<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<?= form_open('Mahasiswa/index', 'enctype="multipart/form-data"') ?>
					<div class="modal-header">
						<h5 class="modal-title" id="updateModalLabel">Update Data Mahasiswa</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="update_nim">NIM</label>
							<input type="text" class="form-control" maxlength="8" id="update_nim" autocomplete="off" name="nim">
						</div>
						<div class="form-group">
							<label for="update_nama">Nama</label>
							<input type="text" class="form-control" maxlength="30" id="update_nama" autocomplete="off" name="nama">
						</div>
						<div class="form-group">
							<label for="update_jurusan">Jurusan</label>
							<select class="form-control custom-select" id="update_jurusan" autocomplete="off" name="jurusan">
								<option></option>
								<option value="Teknik Elektro">Teknik Elektro</option>
								<option value="Teknik Informatika">Teknik Informatika</option>
								<option value="Teknik Mesin">Teknik Mesin</option>
								<option value="Teknik Industri">Teknik Industri</option>
								<option value="Teknik Sipil">Teknik Sipil</option>
								<option value="Teknik Lingkungan">Teknik Lingkungan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="update_angkatan">Angkatan</label>
							<input type="text" class="form-control" min="0" max="3000" maxlength="4" id="update_angkatan" autocomplete="off" name="angkatan">
						</div>
						<div class="custom-file">
							<label for="update_foto">Foto</label>
							<input type="file" class="form-control-file" id="update_foto" name="foto_baru">
							<img src="" alt="" class="img-fluid foto-lama" width="250px">
							<input type="hidden" id="fotolama" name="fotolama">
							<input type="hidden" id="update_id" name="id">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" name="update" value="Update">
					</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>

	<!--  Delete Modal  -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Delete Data Mahasiswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah kamu yakin untuk menghapus data?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<a href="<?= base_url() ?>Mahasiswa/delete/" class="btn btn-primary" data-baseurl="<?= base_url() ?>">Delete Data</a>
				</div>
			</div>
		</div>
	</div>

	<!--  Detail Modal  -->
	<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detailModalLabel">Detail Data Mahasiswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="detail_nim">NIM</label>
						<input type="text" class="form-control" disabled id="detail_nim" name="nim">
					</div>
					<div class="form-group">
						<label for="detail_nama">Nama</label>
						<input type="text" class="form-control" disabled id="detail_nama" name="nama">
					</div>
					<div class="form-group">
						<label for="detail_jurusan">Jurusan</label>
						<input class="form-control" disabled id="detail_jurusan" name="jurusan">
					</div>
					<div class="form-group">
						<label for="detail_angkatan">Angkatan</label>
						<input type="number" class="form-control" disabled id="detail_angkatan" name="angkatan">
					</div>
					<div class="custom-file">
						<label for="detail_foto">Foto</label>
						<img src="" alt="" class="img-fluid" width="250" id="detail_foto">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</main>
