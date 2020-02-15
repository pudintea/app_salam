<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				<?=$this->config->item('base_title_aplikasi');?>
				<small><?=$this->config->item('base_deskripsi_aplikasi');?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?=base_url('Sekolah');?>">Data Sekolah</a></li>
				<li class="active">Edit</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Form Edit Sekolah</h3>
						</div>
						<?php echo form_open_multipart(base_url('Sekolah/update'), 'class="form parsley-form" role="form" id="FormNajzmig" onsubmit="return validateForm()" role="form" ');
							echo form_hidden('kode_sekolah',base64_encode($edit_sekolah->id_sekolah));
						?>
							<div class="box-body">
								<div class="form-group">
									<label for="tingkat">Tingkat</label>
									<div class="input-group tingkat">
										<div class="input-group-addon">
											<i class="fa fa-tags"></i>
										</div>
										<select type="text" class="form-control" id="tingkat" name="tingkat">
										<option value="<?=$edit_sekolah->id_tingkat;?>">--  <?=$edit_sekolah->tingkat_nama;?>  --</option>
										<?php if (!empty($list_tingkat)){ 
											foreach ($list_tingkat as $lt){
										?>
											<option value="<?=$lt->id_tingkat;?>"><?=$lt->tingkat_nama;?></option>
										<?php }} ?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label for="nama">Nama Sekolah</label>
									<div class="input-group nama">
										<div class="input-group-addon">
											<i class="fa fa-pencil"></i>
										</div>
										<input type="text" class="form-control" id="nama" name="nama" value="<?=$edit_sekolah->sekolah_nama;?>" required/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="email">Email</label>
									<div class="input-group email">
										<div class="input-group-addon">
											<i class="fa fa-google"></i>
										</div>
										<input type="email" class="form-control" id="email" name="email" value="<?=$edit_sekolah->sekolah_email;?>" />
									</div>
								</div>
								
								<div class="form-group">
									<label for="telpon">Telpon</label>
									<div class="input-group telpon">
										<div class="input-group-addon">
											<i class="fa fa-pencil"></i>
										</div>
										<input type="text" class="form-control" id="telpon" name="telpon" value="<?=$edit_sekolah->sekolah_telpon;?>" />
									</div>
								</div>
					  
							</div>
							<div class="box-footer text-right">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
					<div class="">
						<?php
						if ($this->session->flashdata('success')) {
							echo '<div class="alert alert-dismissable alert-success">'
								.'  <button type="button" class="close" data-dismiss="alert">×</button>'
								.   $this->session->flashdata('success')
								.'</div>';
						}
						if ($this->session->flashdata('error')) {
							echo '<div class="alert alert-dismissable alert-danger">'
								.'  <button type="button" class="close" data-dismiss="alert">×</button>'
								.   $this->session->flashdata('error')
								.'</div>';
						}
						?>
					</div>
				</div>
			</div>
		</section>
	</div>