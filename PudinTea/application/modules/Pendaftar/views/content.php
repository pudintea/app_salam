<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				<?=$this->config->item('base_title_aplikasi');?>
				<small><?=$this->config->item('base_deskripsi_aplikasi');?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<a href="<?=base_url('Pendaftar/export_pendaftar');?>" class="btn btn-success" target="_blank" ><i class="fa fa-download" aria-hidden="true"></i> Export</a>
						</div>
						<div class="box-header">
							<table class="table">
								<tbody>
									<?php echo form_open_multipart(base_url('Pendaftar/lihat'), 'class="form parsley-form" role="form" id="FormNajzmig" onsubmit="return validateForm()" role="form" '); ?>
									<tr>
										<td width="45%" class="text-center" style="vertical-align:middle;"><input type="date" height="12px" class="form-control" id="dari_tgl" name="dari_tgl" placeholder="Dari Tanggal" required/></td>
										<td width="40%" class="text-center" style="vertical-align:middle;"><input type="date" height="12px" class="form-control" id="sampai_tgl" name="sampai_tgl" placeholder="Sampai Tanggal" required/></td>
										<td class="text-center" style="vertical-align:middle;" ><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"> Lihat</button></td>
									</tr>
									<?php echo form_close();?>
								</tbody>
							</table>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table id="mytable" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th width="5%"class="text-center" >No</th>
											<th >Hari, Tanggal</th>
											<th class="text-center" >Sekolah</th>
											<th >Nama</th>
											<th class="text-center" >Email</th>
											<th class="text-center" >Telpon</th>
											<th class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
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
<script type="text/javascript">
/* Datatables */
	  var humas_it = $("#mytable").DataTable({
	  "order" 			: [], //Initial no order.
      "ordering" 		: true,
      "info"			: true,
      "scrollX"			: false,
      "searching"		: true,
	  "bLengthChange"   : true,
      "processing"		: true,
      "serverSide"		: true,
	  "Filter"          : true,
      "Sort"            : true,
	  "AutoWidth"       : false,
      "paging"          : true,
	  "serverSide"		: true,
      "Sorting"         : [],
      "ajax" 			: {
        "url": "<?=base_url('Pendaftar/data_json');?>",
        "type":'POST',
      },
	  "oLanguage"        : {
            "sProcessing":   "Sedang memproses...",
			"sLengthMenu":   "Tampilkan _MENU_ entri data",
			"sZeroRecords":  "Tidak ditemukan data yang sesuai",
			"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri data",
			"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
			"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
			"sInfoPostFix":  "",
			"sSearch":       "Cari:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst":    "Pertama",
				"sPrevious": "Sebelumnya",
				"sNext":     "Selanjutnya",
				"sLast":     "Terakhir"
			}
        },
	  
	  "columnDefs"	: [{
            "sClass": "text-center",
			"targets": [ 0, 6 ],
            "orderable": false
        },
		{
            "sClass": "text-center",
			"targets": [ 3, 4, 5 ]
        }
		],
  });
</script>