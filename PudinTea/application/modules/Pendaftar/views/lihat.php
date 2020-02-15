<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				<?=$this->config->item('base_title_aplikasi');?>
				<small><?=$this->config->item('base_deskripsi_aplikasi');?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?=base_url('User');?>">Data User</a></li>
				<li class="active">Tambah</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Form Tambah User</h3>
						</div>
							<div class="box-body">
							<div class="table-responsive">
								<table id="mytable1" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th width="5%" class="text-center" >No</th>
											<th class="text-center" >Nama</th>
											<th class="text-center" >Tanggal</th>
											<th width="7%" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							</div>
							<div class="box-footer text-right">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
					</div>
				</div>
			</div>
		</section>
	</div>