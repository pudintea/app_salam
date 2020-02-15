<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');?>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				APLIKASI
				<small>Rapat Sub Bag. TI</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Data Ekstrakurikuler</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<table class="table">
								<tbody>
									<?php echo form_open_multipart(base_url('Admin_home/save'), 'class="form parsley-form" role="form" id="FormNajzmig" onsubmit="return validateForm()" role="form" '); ?>
									<tr>
										<td width="90%" class="text-center" style="vertical-align:middle;"><input type="text" height="12px" class="form-control" id="judul" name="judul" placeholder="Tambah Judul" required/></td>
										<td class="text-center" style="vertical-align:middle;" ><button type="submit" class="btn btn-primary btn-sm">Tambah</button></td>
									</tr>
									<?php echo form_close();?>
								</tbody>
							</table>
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
        "url": "<?=base_url('Judul_rapat/data_json');?>",
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
			"targets": [ 0, 2, 3 ],
            "orderable": false
        }
		],
  });
</script>