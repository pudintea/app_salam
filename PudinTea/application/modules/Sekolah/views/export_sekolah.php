<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?=$this->config->item('base_title_aplikasi');?> | <?=$this->config->item('base_deskripsi_aplikasi');?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="shortcut icon" href="http://maps.al-azhar.or.id/wp-content/img/favicon.ico" type="image/x-icon"/>
		<meta name="title" content="<?=$this->config->item('base_deskripsi_aplikasi');?>" />
  		<meta name="description" content="Diciptakan dengan sepenuh hati, untuk para pecinta kopi." />
  		<meta name="format-detection" content="telephone=yes">
  		<meta property="og:title" content="<?=$this->config->item('base_deskripsi_aplikasi');?>"/>
  		<meta property="og:description" content="Diciptakan dengan sepenuh hati, untuk para pecinta kopi.">
  		<meta property="og:site_name" content="<?=$this->config->item('base_deskripsi_aplikasi');?>"/>
  		<meta property="og:url" content="https://anibarstudio.blogspot.com/">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url('wp-content');?>/font-awesome/css/font-awesome.min.css">

		<script src="<?=base_url('wp-content');?>/jquery/dist/jquery.min.js"></script>
		<script src="<?=base_url('wp-content');?>/bootstrap/dist/js/bootstrap.min.js"></script>

	  <!-- Google Font -->
		<link rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body>
	<?php
		header("Content-type: application/vnd-ms-excel");
		$nama_filenya = 'export_data_sekolah_'.date('d-m-Y-H-i-s').'.xls';
		header("Content-Disposition: attachment; filename=$nama_filenya");
	?>
							<div class="table-responsive">
								<table id="mytable" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th class="text-center" >No</th>
											<th class="text-center" >Nama Sekolah</th>
											<th class="text-center" >Email</th>
											<th class="text-center" >Telpon</th>
											<th class="text-center" >Tingkat</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($list_sekolah)){
										$no = 0;
										foreach($list_sekolah as $pdn){
										$no++;
										?>
										<tr>
											<td><?=$no;?></td>
											<td><?=$pdn->sekolah_nama;?></td>
											<td><?=$pdn->sekolah_email;?></td>
											<td><?=$pdn->sekolah_telpon;?></td>
											<td><?=$pdn->tingkat_nama;?></td>
										</tr>
										<?php }} ?>
									</tbody>
								</table>
							</div>
	</body>						
</html>