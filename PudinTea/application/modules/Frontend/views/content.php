<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Anibar Studio">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title><?=$this->config->item('base_title_aplikasi');?> | <?=$this->config->item('base_deskripsi_aplikasi');?></title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="<?=base_url('wp-content/frontend');?>/images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="<?=base_url('wp-content/frontend');?>/images/favicon.ico" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="<?=base_url('wp-content/frontend');?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url('wp-content');?>/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url('wp-content/frontend');?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url('wp-content/frontend');?>/css/linearicons.css">
    <link rel="stylesheet" href="<?=base_url('wp-content/frontend');?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=base_url('wp-content/frontend');?>/css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="<?=base_url('wp-content/frontend');?>/css/normalize.css">
    <link rel="stylesheet" href="<?=base_url('wp-content/frontend');?>/style.css">
    <link rel="stylesheet" href="<?=base_url('wp-content/frontend');?>/css/responsive.css">
    <script src="<?=base_url('wp-content/frontend');?>/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".mainmenu-area">
    <!-- Preloader-content -->
    <div class="preloader">
        <span><i class="lnr lnr-sun"></i></span>
    </div>
    <!-- MainMenu-Area -->
    <nav class="mainmenu-area" data-spy="affix" data-offset-top="200">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="<?=base_url('wp-content/frontend');?>/images/logo.png" alt="Logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="primary_menu">
                <ul class="nav navbar-nav mainmenu">
                    <li class="active"><a href="#home_page">Home</a></li>
                    <li><a href="#mendaftar">Form Pendaftaran</a></li>
                    <li><a href="#features_page">Features</a></li>
                    <li><a href="#gallery_page">Gallery</a></li>
                    <li><a href="#download_area">Download</a></li>
                    <li><a href="#contact_page">Contacts</a></li>
                    <li><a href="<?=base_url('login');?>">Login</a></li>
                </ul>
                <div class="right-button hidden-xs">
                    <a href="#download_area">Download App</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- MainMenu-Area-End -->
    <!-- Home-Area -->
    <header class="home-area overlay" id="home_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <figure class="mobile-image wow fadeInUp" data-wow-delay="0.2s">
                        <img src="<?=base_url('wp-content/frontend');?>/images/header-mobile.png" alt="">
                    </figure>
                </div>
                <div class="col-xs-12 col-md-7">
                    <div class="space-80 hidden-xs"></div>
                    <h1 class="wow fadeInUp" data-wow-delay="0.4s">Penerimaan Murid Baru Sekolah Islam Al Azhar</h1>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                    </div>
                    <div class="space-20"></div>
                    <a href="#mendaftar" class="bttn-white wow fadeInUp" data-wow-delay="0.8s"><i class="lnr lnr-download"></i>Mendaftar</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Home-Area-End -->
	<!-- Progress-Area -->
    <section class="progress-area gray-bg" id="mendaftar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="page-title section-padding">
                        <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s">Silahkan mengisi form dibawah ini</h3>
                        <div class="space-5"></div>
                        <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                            <?php echo form_open_multipart(base_url('Frontend/save'), 'class="form parsley-form" role="form" id="FormNajzmig" onsubmit="return validateForm()" role="form" '); ?>
								<div class="form-group">
									<label for="nama">Nama</label>
									<div class="input-group nama">
										<div class="input-group-addon">
											<i class="fa fa-pencil"></i>
										</div>
										<input type="text" class="form-control" id="nama" name="nama" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<div class="input-group email">
										<div class="input-group-addon">
											<i class="fa fa-google"></i>
										</div>
										<input type="email" class="form-control" id="email" name="email" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="telpon">Telpon</label>
									<div class="input-group telpon">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input type="text" class="form-control" id="telpon" name="telpon" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="tingkat">Tingkat</label>
									<div class="input-group tingkat">
										<div class="input-group-addon">
											<i class="fa fa-bank"></i>
										</div>
										<select type="text" class="form-control" id="tingkat" name="tingkat" required>
											<option value="">- Pilih -</option>
											<?php if (!empty($list_tingkat)){ 
												foreach($list_tingkat as $pdn_lt){
											?>
											<option value="<?=$pdn_lt->id_tingkat;?>"><?=$pdn_lt->tingkat_nama;?></option>
											<?php }} ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="sekolah">Sekolah Tujuan</label>
									<div class="input-group sekolah">
										<div class="input-group-addon">
											<i class="fa fa-tags"></i>
										</div>
										<select type="text" class="form-control" id="sekolah" name="sekolah" required>
											<option value="">- Belum ada data -</option>
										</select>
									</div>
								</div>
								<div class="space-50 text-right"></div>
								<button class="bttn-default wow fadeInUp" data-wow-delay="0.8s">Simpan</button>
							<?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Progress-Area-End -->
    <!-- Feature-Area -->
    <section class="feature-area section-padding-top" id="features_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title text-center">
                        <h5 class="title">Features</h5>
                        <div class="space-10"></div>
                        <h3>Pwoerful Features As Always</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <h4>Fast &amp; Powerful</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box-icon">
                            <i class="lnr lnr-paperclip"></i>
                        </div>
                        <h4>Easily Editable</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="lnr lnr-cloud-download"></i>
                        </div>
                        <h4>Cloud Storage</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                </div>
                <div class="hidden-xs hidden-sm col-md-4">
                    <figure class="mobile-image">
                        <img src="<?=base_url('wp-content/frontend');?>/images/feature-image.png" alt="Feature Photo">
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-clock"></i>
                        </div>
                        <h4>Easy Notifications</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box-icon">
                            <i class="lnr lnr-laptop-phone"></i>
                        </div>
                        <h4>Fully Responsive</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="lnr lnr-cog"></i>
                        </div>
                        <h4>Editable Layout</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature-Area-End -->
    <!-- Gallery-Area -->
    <section class="gallery-area section-padding" id="gallery_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 gallery-slider">
                    <div class="gallery-slide">
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-3.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-4.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-3.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-3.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-4.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="<?=base_url('wp-content/frontend');?>/images/gallery-3.jpg" alt=""></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-lg-3">
                    <div class="page-title">
                        <h5 class="white-color title wow fadeInUp" data-wow-delay="0.2s">Screenshots</h5>
                        <div class="space-10"></div>
                        <h3 class="white-color wow fadeInUp" data-wow-delay="0.4s">Screenshot 01</h3>
                    </div>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                    </div>
                    <div class="space-50"></div>
                    <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.8s">Learn More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery-Area-End -->
    <!-- How-To-Use -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="page-title">
                        <h5 class="title wow fadeInUp" data-wow-delay="0.2s">Our features</h5>
                        <div class="space-10"></div>
                        <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s">Aour Approach of Design is Prety Simple and Clear</h3>
                    </div>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                    </div>
                    <div class="space-50"></div>
                    <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.8s">Learn More</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1">
                    <div class="space-60 hidden visible-xs"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-clock"></i>
                        </div>
                        <h4>Easy Notifications</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    </div>
                    <div class="space-50"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-laptop-phone"></i>
                        </div>
                        <h4>Fully Responsive</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    </div>
                    <div class="space-50"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-cog"></i>
                        </div>
                        <h4>Editable Layout</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How-To-Use-End -->
    <!-- Download-Area -->
    <div class="download-area overlay" id="download_area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 hidden-sm">
                    <figure class="mobile-image">
                        <img src="<?=base_url('wp-content/frontend');?>/images/download-image.png" alt="">
                    </figure>
                </div>
                <div class="col-xs-12 col-md-6 section-padding">
                    <h3 class="white-color">Download The App</h3>
                    <div class="space-20"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam possimus eaque magnam eum praesentium unde.</p>
                    <div class="space-60"></div>
                    <a href="#" class="bttn-white sq"><img src="<?=base_url('wp-content/frontend');?>/images/apple-icon.png" alt="apple icon"> Apple Store</a>
                    <a href="#" class="bttn-white sq"><img src="<?=base_url('wp-content/frontend');?>/images/play-store-icon.png" alt="Play Store Icon"> Play Store</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Download-Area-End -->
    <!-- Footer-Area -->
    <footer class="footer-area" id="contact_page">
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title text-center">
                            <h5 class="title">Contact US</h5>
                            <h3 class="dark-color">Find Us By Bellow Details</h3>
                            <div class="space-60"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-map-marker"></span>
                            </div>
                            <p>Komplek Masjid Agung Al Azhar <br /> Jl.Sisingamangaraja, Keb. Baru, Jakarta Selatan 12110</p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-phone-handset"></span>
                            </div>
                            <p>(021) 7396232 <br /> (021) 7261233</p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-envelope"></span>
                            </div>
                            <p>humas@al-azhar.or.id <br /> info@al-azhar.or.id
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <span>Copyright &copy; 2019 - <?=date('Y')?> <?=$this->config->item('base_copyright_aplikasi');?> All rights reserved.</span>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Testimonial</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom-End -->
    </footer>
    <!-- Footer-Area-End -->
    <!--Vendor-JS-->
    <script src="<?=base_url('wp-content/frontend');?>/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?=base_url('wp-content/frontend');?>/js/vendor/jquery-ui.js"></script>
    <script src="<?=base_url('wp-content/frontend');?>/js/vendor/bootstrap.min.js"></script>
    <!--Plugin-JS-->
    <script src="<?=base_url('wp-content/frontend');?>/js/owl.carousel.min.js"></script>
    <script src="<?=base_url('wp-content/frontend');?>/js/contact-form.js"></script>
    <script src="<?=base_url('wp-content/frontend');?>/js/ajaxchimp.js"></script>
    <script src="<?=base_url('wp-content/frontend');?>/js/scrollUp.min.js"></script>
    <script src="<?=base_url('wp-content/frontend');?>/js/magnific-popup.min.js"></script>
    <script src="<?=base_url('wp-content/frontend');?>/js/wow.min.js"></script>
    <!--Main-active-JS-->
    <script src="<?=base_url('wp-content/frontend');?>/js/main.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tingkat').change(function(){
				var id = $(this).val();
				$.ajax({
					url : "<?=base_url('Frontend/json_sub_tingkat');?>",
					method : "POST",
					data : {id_sub: id},
					async : false,
					dataType : 'json',
					success: function(data){
						var html = '<option value="">- Pilih -</option>';
						var i;
						for(i=0; i<data.length; i++){
							 html += '<option value="'+data[i]['id_sub']+'">'+data[i]['nama_sub']+'</option>';
						}
						$('#sekolah').html(html);
						 
					}
				});
			});
		});
	</script>
</body>

</html>
