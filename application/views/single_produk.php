<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFTimIhQoFCg8bF7PAMgDWi38QqqvaCx8">
</script>
<style>
    .login-page-demo {
        background-image: url(<?php echo base_url('assets/images/bg/1.jpg') ?>);
    }


    .floating-box {
        float: left;
        width: 151px;
        height: 318px;
        margin: 29px;
    }

    .btn {
        background: #3498db;
        background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
        background-image: -moz-linear-gradient(top, #3498db, #2980b9);
        background-image: -ms-linear-gradient(top, #3498db, #2980b9);
        background-image: -o-linear-gradient(top, #3498db, #2980b9);
        background-image: linear-gradient(to bottom, #3498db, #2980b9);
        -webkit-border-radius: 28;
        -moz-border-radius: 28;
        border-radius: 28px;
        font-family: Arial;
        color: #ffffff;
        font-size: 20px;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
    }

    fieldset,
    label {
        margin: 0;
        padding: 0;
    }

    /****** Style Star Rating Widget *****/

    .rating {
        border: none;
        float: left;
    }

    .rating>input {
        display: none;
    }

    .rating>label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    .rating>label {
        color: #ddd;
        float: right;
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating>input:checked~label,
    /* show gold star when clicked */
    .rating:not(:checked)>label:hover,
    /* hover current star */
    .rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    /* hover previous stars in list */

    .rating>input:checked+label:hover,
    /* hover current star when changing rating */
    .rating>input:checked~label:hover,
    .rating>label:hover~input:checked~label,
    /* lighten current selection */
    .rating>input:checked~label:hover~label {
        color: #FFED85;
    }


    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .star-rating {
        line-height: 32px;
        font-size: 1.25em;
    }

    .star-rating .fa-star {
        color: #f7d106;
    }

    #star {
        float: left;
        padding-right: 10px;
    }

    #star span {
        padding: 3px;
        font-size: 14px;
    }

    .on {
        color: #f7d106
    }

    .off {
        color: #ddd;
    }

    .img-iklan-md {
        width: 200px;
        height: 50px;
    }

    .img-iklan-lg {
        width: 450px;
    }

    .img-iklan-md,
    .img-iklan-lg {
        object-fit: cover;
        background-position: center;
        overflow: hidden;
    }

    .img-iklan-md img,
    .img-iklan-lg img {
        width: 100%;
        height: 100%;
    }

    #gambar-wisata {
        width: 100%;
        margin: 0 auto;
    }

    @media (min-width: 768px) { 
        #gambar-wisata {
            width: 80%;
        }
    }

    @media (min-width: 992px) { 
        #gambar-wisata {
            width: 60%;
        }
    }
</style>

<title><?php
        $judul = @$wisata->wisata_nama;
        $kota = @$wisata->nama_kota_kabupaten;
        $prov = @$wisata->nama_provinsi;
        echo get_phrase(@$prov . " " . @$kota . " " . @$judul . "| Tempat Wisata"); ?></title>
<section class="awe-parallax login-page-demo" style="background-position: 50% 12px;">
    <div class="awe-overlay"></div>
    <div class="container">
        <div class="blog-heading-content text-uppercase">
            <h2><?php echo get_phrase('Produk oleh-oleh'); ?></h2>
        </div>
    </div>
</section>

<section class="product-detail" style="transform: none;">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="post">
                    <?php
                    if ($this->session->userdata('current_language') == 'english') {
                        $judul = @$wisata_en->wisata_nama;
                        $kota = @$wisata_en->nama_kota_kabupaten;
                        $prov = @$wisata_en->nama_provinsi;
                    } else {
                        $judul = @$produk->nama_produk;
                        $kota = @$produk->nama_kota;
                        $prov = @$produk->nama_provinsi;
                    }
                    ?>
                    <div class="post-title">
                        <h1><?php echo @$judul; ?></h1>
                    </div>
                    <div class="product-detail__info">
                        <div class="row" style="margin-bottom:10px;">
                            <!-- <div class="col-md-12">
			<span class=" " style="font-size: 14px;"><i class="fa fa-eye"></i> <?= $wisata->wisata_tampil; ?> kali</span>
		</div> -->
                        </div>
                    </div>
                    <div id="tm-video-container">
                        <div class="main_slider">
                            <?php
                            if ($this->session->userdata('current_language') == 'english') {
                                foreach ($sliders as $slider) {
                                    $gambar = base_url() . 'uploads/foto_produk/' . $slider['url_foto'];
                                    // $link = base_url('Event/event_detail/'.$slider['event_id']);
                                    $slidere =  @$slidere . "
								<li data-slotamount='7' data-masterspeed='500' data-title=''>
									<img src=" . $gambar . " data-bgposition='left center' data-duration='14000' data-bgpositionend='right center' alt=''>
								</li>
							";
                                }
                            } else {
                                foreach ($sliders as $slider) {
                                    $gambar = base_url() . 'uploads/foto_produk/' . $slider['url_foto'];
                                    // $link = base_url('Event/event_detail/'.$slider['event_id']);
                                    $slidere =  @$slidere . "
							<div class='slide'>
							<img src=" . $gambar . " alt=''>
						</div>
							";
                                }
                            }
                            ?>
                            <?php echo $slidere; ?>
                        </div>
                    </div>
                    <br>


                    <?php $key = $this->uri->segment(3); ?>
                    <?php $ip = $_SERVER['REMOTE_ADDR']; ?>
                    <?php $tgl = date('Y-m-d'); ?>
                    <div class="post-body">
                        <div class="post-content">
                            <?php
                            if ($this->session->userdata('current_language') == 'english') {
                                $deskripsi = @$wisata_en->wisata_deskripsi;
                            } else {
                                $deskripsi = @$produk->deskripsi_produk;
                            }
                            ?>

                            <?php
                            foreach ($iklan_produk as $i) {
                                if ($i['id_produk'] == $produk->id_produk) {
                                    $imgSrc = null;
                                    $url = null;
                                    $iklanPosisi = $i['iklan_posisi'];

                                    switch ($iklanPosisi) {
                                        case 'popup':
                                            if ($i['url_foto'] == '') {
                                                $img = 'no_image.jpg';
                                            } else {
                                                $img = $i['url_foto'];
                                            }

                                            $imgSrc = '<img src="' . base_url() . 'uploads/foto_iklan/' . $img . '">';
                                            $url = $i['iklan_url'];

                                            $iklanPopUp = @$iklanPopUp . "
                                                        <a href=" . $url . " class='img-iklan-md' target='_blank' rel='noopener'>
                                                            " . $imgSrc . "
                                                        </a>
                                                    ";

                                            break;
                                        case 'tengah':
                                            if ($i['url_foto'] == '') {
                                                $img = 'no_image.jpg';
                                            } else {
                                                $img = $i['url_foto'];
                                            }

                                            $imgSrc = '<img src="' . base_url() . 'uploads/foto_iklan/' . $img . '">';
                                            $url = $i['iklan_url'];

                                            $iklanTengahDesc = @$iklanTengahDesc . "
                                                <br>
                                                <div class='post'>
                                                    <div class='post-media' id='gambar-wisata'>
                                                        <a class='klik-id' href='". $url ."'>" . $imgSrc . "</a>
                                                    </div>
                                                </div>
                                                <br>
                                            ";

                                            $get_tag_iklan = strstr($deskripsi ,"#iklan");
                                            $explode = explode("#iklan#", $get_tag_iklan);
                                            
                                            $replace_id_iklan = '#iklan#' . strstr($explode[1], '#', true) . '#';
                                            $deskripsi = str_replace($replace_id_iklan, $iklanTengahDesc, $deskripsi);

                                            break;
                                        case 'sidebar':
                                            if ($i['url_foto'] == '') {
                                                $img = 'no_image.jpg';
                                            } else {
                                                $img = $i['url_foto'];
                                            }

                                            $imgSrc = '<img src="' . base_url() . 'uploads/foto_iklan/' . $img . '">';
                                            $url = $i['iklan_url'];

                                            $iklanSibeBar = @$iklanSideBar . "
                                                        <a href=" . $url . " class='img-iklan-md' target='_blank' rel='noopener'>
                                                            " . $imgSrc . "
                                                        </a>
                                                    ";

                                            break;
                                        case 'bawah':
                                            if ($i['url_foto'] == '') {
                                                $img = 'no_image.jpg';
                                            } else {
                                                $img = $i['url_foto'];
                                            }

                                            $imgSrc = '<img src="' . base_url() . 'uploads/foto_iklan/' . $img . '">';
                                            $url = $i['iklan_url'];

                                            $iklanBawah = @$iklanBawah . "
                                                        <a href=" . $url . " class='img-iklan-lg' target='_blank' rel='noopener'>
                                                            " . $imgSrc . "
                                                        </a>
                                                    ";

                                            break;
                                        default:
                                    }
                                } else {
                                }
                            }
                            ?>

                            <p style="font-size: 13px;"><?php echo $deskripsi ?></p>
                        </div>
                    </div>


                    <div class="product-detail__info">

                        <div class="col-md-12">
                            <!-- <div class="product-tabs tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
		<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
			<li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true">
				<a href="#tabs-1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1"><?php echo get_phrase('Wahana'); ?></a>
			</li>
			<li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false">
				<a href="#tabs-2" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2"><?php echo get_phrase('Fasilitas Wisata'); ?></a>
			</li>
			<li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false">
				<a href="#tabs-3" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3"><?php echo get_phrase('Fasilitas Pendukung'); ?></a>
			</li>
		</ul>
	<div class="product-tabs__content" style="min-height: 150px;">
			<div id="tabs-1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">
				<div class="product-detail__info">
				<div class="property-highlights">
					<div class="property-highlights__content">
					
					</div><br /><br />
				</div>	
				</div>
			</div>
			<div id="tabs-2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
				<div class="product-detail__info">
				<div class="property-highlights">
					<div class="property-highlights__content">
			
					</div>
				</div>
				</div>
			</div>
			<div id="tabs-3" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
				<div class="product-detail__info">
				<div class="property-highlights">
					<div class="property-highlights__content">
						
						
						<div class="modal fade" id="myModal2<?= @$fas['faspen_id'] ?>" tabindex="-1" role="dialog">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div style="text-align:center;">
								<form class="contact-form">	
								</form>  
							  </div>
							</div>
						  </div>
						</div>
						
						
					</div>
				</div>
				</div>
			</div>
	</div>
</div> -->
                            <br />
                            <!-- <h3>Foto Wisata</h3> -->
                            <hr />
                            <!-- <section class="masonry-section-demo">
<div class="destination-grid-content">
				<div class="row">
					<div class="awe-masonry">
						<?php foreach ($sliders as $m) {
                            if ($m['url_foto'] == '') {
                                $cover = 'no_image.jpg';
                            } else {
                                $cover = $m['url_foto'];
                            }
                            $row5 = '<a href="' . base_url() . 'uploads/foto_profuk/' . $cover . '" target="_blank"><img src="' . base_url() . 'uploads/foto_profuk/' . $cover . '" alt ="' . $m['nama_produk'] . ' ' . $m['nama_kota'] . '"></a>';
                        ?>
						
						<div class="awe-masonry__item">
								<div class="image-wrap image-cover">
									<?php echo $row5; ?>
								</div>
						</div>
						<?php } ?>
					</div>
				</div>
</div>
</section> -->
                            <div class="product-detail__info">
                                <div class="rating-trip-reviews">
                                    <div class="post">
                                        <div style="display: flex; justify-content: center;" class="mb-4">
                                            <?php echo @$iklanBawah ?>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <span class="badge" style="font-size: 14px;"><i class="fa fa-eye"></i> <?= $produk->produk_tampil; ?> kali</span>
                                            </div>
                                        </div>
                                        <h5>Rating & Komentar</h5>
                                        <?php $key = $this->uri->segment(5); ?>
                                        <?php $ip = $_SERVER['REMOTE_ADDR']; ?>
                                        <?php $tgl = date('Y-m-d'); ?>

                                        <div class="row">
                                            <div class="col-sm-3 text-left">
                                                <h5 class="text-warning mt-4 mb-4">
                                                    <b><span id="average_rating"><?= $avg_rating; ?></span> / 5</b>
                                                </h5>

                                                <div id="star">
                                                    <?php
                                                    for ($i = 0; $i < $avg_rating; $i++) {
                                                        echo '<span class="on"><i class="fa fa-star"></i></span>';
                                                    }

                                                    for ($i = 5; $i > $avg_rating; $i--) {
                                                        echo '<span class="off"><i class="fa fa-star"></i></span>';
                                                    }
                                                    ?>
                                                </div>
                                                <br>
                                                <h5>
                                                    <span id="total_review"><?= $jumlah_komentar; ?></span>
                                                    Komentar
                                                </h5>
                                            </div>

                                            <div class="col-sm-9 text-center">
                                                <h5 class="mt-8 mb-3">Tulis Komentar Kamu Disini</h5>
                                                <div class="add_review">
                                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#basicModal">Ulas Produk Oleh-oleh Ini</button>
                                                </div>
                                            </div>
                                            <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
                                            <script type="text/javascript">
                                                function modal_show() {
                                                    $('#basicModal').modal('show');
                                                }
                                            </script>
                                            <div id="basicModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <form name="formKomentar" action="<?= base_url() . "Produk/tambah_ratingproduk" ?>" method="post" onsubmit="return validateForm()">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Masukkan Review</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                                <input type='hidden' name='id_produk' id='id_produk' value="<?php echo $key; ?>">
                                                                <input type='hidden' name='komentar_ip' id='komentar_ip' value="<?php echo $ip; ?>">
                                                                <input type='hidden' name='komentar_tgl' id='komentar_tgl' value="<?php echo $tgl; ?>">
                                                                <input type="hidden" name="_token" value="">
                                                                <div class="form-group">

                                                                    <div class="star-rating">
                                                                        <!-- <fieldset class="rating">
                                        Rating :
                                        <input type="radio" id="star5" name="rating" value="5" data-toggle="modal"/><label class="full" for="star5"></label>
                                        <input type="radio" id="star4" name="rating" value="4" data-toggle="modal"/><label class="full" for="star4"></label>
                                        <input type="radio" id="star3" name="rating" value="3" data-toggle="modal"/><label class="full" for="star3"></label>
                                        <input type="radio" id="star2" name="rating" value="2" data-toggle="modal"/><label class="full" for="star2"></label>
                                        <input type="radio" id="star1" name="rating" value="1" data-toggle="modal"/><label id="myBtn2" class="full" for="star1"></label>

                                    </fieldset> -->
                                                                        <p class="text" style="font-size:15px;"><b>Rating</b> <span style="color:red;font-weight:bold">*</span> :
                                                                            <span class="fa fa-star-o" id="rating" name="rating" value="1" data-rating="1" style="font-size:20px"></span>
                                                                            <span class="fa fa-star-o" id="rating" name="rating" value="2" data-rating="2" style="font-size:20px"></span>
                                                                            <span class="fa fa-star-o" id="rating" name="rating" value="3" data-rating="3" style="font-size:20px"></span>
                                                                            <span class="fa fa-star-o" id="rating" name="rating" value="4" data-rating="4" style="font-size:20px"></span>
                                                                            <span class="fa fa-star-o" id="rating" name="rating" value="5" data-rating="5" style="font-size:20px"></span>
                                                                            <input required type="hidden" id="rating" name="rating" class="rating-value" value="0">
                                                                        </p>
                                                                    </div>


                                                                </div>
                                                                <div class="form-group">
                                                                    <div>
                                                                        <label>Nama <span style="color:red;font-weight:bold">*</span></label>
                                                                        <input required type="text" class="form-control" id="nama" name="nama">
                                                                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div>
                                                                        <label>Email <span style="color:red;font-weight:bold">*</span></label>
                                                                        <input required type="email" class="form-control" id="email" name="email">
                                                                        <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div>
                                                                        <label>Website</label><br>
                                                                        <input type="text" class="form-control" id="website" name="website">
                                                                        <small class="form-text text-danger"><?= form_error('website'); ?></small>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div>
                                                                        <label>Komentar <span style="color:red;font-weight:bold">*</span></label>
                                                                        <textarea required class="form-control" id="komentar_deskripsi" name="komentar_deskripsi"></textarea>
                                                                        <small class="form-text text-danger"><?= form_error('komentar_deskripsi'); ?></small>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div>
                                                                        <span>Captcha</span><br>

                                                                        <div class="g-recaptcha" data-sitekey="<?= $this->config->item('google_key'); ?>"></div>
                                                                        <!-- <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Maukkan captcha"> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Kirim</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>


                                        </div>




                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <hr />
                                    <div class="review-block">
                                        <?php foreach ($data_komentar as $dt) { ?>
                                            <div class="row post-komen">
                                                <div class="col-sm-3">
                                                    <div class="review-block-date"><label><?php echo $dt['nama'] ?></label></div>
                                                    <div class="post-meta"><i><?php echo $dt['website'] ?></i></div>
                                                    <div class="review-block-date"><?php echo longdate_indo($dt['komentar_tgl']) ?></div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="review-block-description"><?php echo $dt['komentar_deskripsi'] ?></div>
                                                    <div>
                                                        <p class="text-right">
                                                            <?php
                                                            for ($i = 0; $i < $dt['komentar_nilai_rating']; $i++) {
                                                                echo '<span class="on"><i class="fa fa-star"></i></span>';
                                                            }

                                                            for ($i = 5; $i > $dt['komentar_nilai_rating']; $i--) {
                                                                echo '<span class="off"><i class="fa fa-star"></i></span>';
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (count($data_komentar) < 1) :
                            ?>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="post-link">
                                            <!-- <a class="awe-btn awe-btn-style2" id="btn-load-more">Belum ada komentar</a> -->
                                            <span>Jadilah orang pertama yang berkomentar :)</span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            else :
                            ?>
                                <!-- <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="post-link">
                                            <a class="awe-btn awe-btn-style2 load-more">Muat Komentar Lain</a>
                                            <input type="hidden" id="row" value="0">
                                            <input type="hidden" id="idkomenpro" value="<?php echo $produk->id_produk; ?>">
                                            <input type="hidden" id="all" value="<?php echo $jumlah_komentar; ?>">
                                        </div>
                                    </div>
                                </div> -->
                            <?php
                            endif;
                            ?>

                        </div>






                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="page-sidebar">
                    <div class="widget widget_author">
                        <h3><?php echo get_phrase('Produsen'); ?></h3>
                        <h6 style="font-size: 20px;"><small> <strong><?php echo $produsen_produk->nama_produsen ?> </small></strong></h6>

                        <?php
                        $link = base_url('Berita/detail_produsen/' . $produsen_produk->id_produk);
                        $url_title = url_title($produsen_produk->nama_produsen, '-', TRUE);
                        $linkslug = base_url('Produsen-produk/' . $url_title); ?>

                        <div class="post mb-2">
                            <?php echo @$iklanSibeBar ?>
                        </div>

                        <div class='post'>
                            <form action="  <?php echo $linkslug ?>  " method='post'>
                                <div class='post-title'>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <input type='hidden' name='id_produsen' value=" <?php $produsen_produk->id_produsen ?> ">
                                    <h6 style="font-size: 17px;"> <small><a href='javascript:void(0)' class='klik-id'> Produk Lainnya (<?php echo count($produk_count); ?>) </a></small></h6>
                                </div>
                            </form>
                        </div>

                        <!-- <h6> <small><a href="<?php echo base_url('Wisata/detail_penulis/' . $penulis_wisata->penulis_id) ?>"> Wisata Lainnya (<?php echo count($wisata_count); ?>) </a> </small></h6> -->

                    </div>
                    <div class="widget widget_search">
                        <h3><?php echo get_phrase('Produk'); ?></h3>
                        <form class="form-search" onsubmit="searching(this);" method="POST">
                            <div class="form-item">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input type="text" name="search" id="search" placeholder="Masukkan Nama Produk">
                            </div>
                        </form>
                    </div>
                    <div class="widget widget_tag_cloud">
                        <h3><?php echo get_phrase('Tags produk Oleh-oleh'); ?></h3>
                        <div class="tagcloud">
                            <?php
                            $data_awal = @$produk->tag_produk;
                            $array =  explode(' ', $data_awal);

                            foreach ($array as $item) {
                            ?>
                                <a href="<?php echo base_url('Produk/Tags/' . $item) ?>"><?php echo $item; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Produk oleh-oleh lainnya di <?= $produk->nama_kota ?></h3>

                        <ol style="color: '#666675'; list-style-type: circle; padding-left:20px;">
                            <?php foreach ($produklain as $pro) : ?>
                                <?php
                                if ($pro['id_produk'] == $produk->id_produk) {
                                    continue;
                                };
                                ?>
                                <li style="margin-top:10px;" ;>
                                    <?php $link = base_url() . 'Produk/' . url_title($pro["nama_kategori"], "dash", false) . '/' . url_title($pro["nama_provinsi"], "dash", false) . '/' . url_title($pro["nama_kota"], "dash", false) . '/' . url_title($pro["nama_produk"], "dash", false); ?>
                                    <a href="<?= $link; ?>">
                                        <?php echo $pro['nama_produk']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ol>

                        <div class="post mb-2">
                            <?php echo @$iklanSibeBar ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<?php if (@$iklanPopUp) { ?>
    <!-- Modal -->
    <div class="modal fade" id="IklanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="post">
                        <?php echo @$iklanPopUp ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-close-iklan" class="btn btn-primary disabled" data-bs-dismiss="modal"></button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Mirrored from envato.megadrupal.com/html/gofar/single-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Oct 2017 02:03:01 GMT -->
</body>






<script>
    function validateForm() {
        if (document.forms["formKomentar"]["rating"].value == 0) {
            swal('Forbiden', 'Rating Bintang Belum diisi', 'error');
            document.forms["formKomentar"]["rating"].focus();
            return false;
        }
    }
</script>
<script>
    function searching(form) {
        form.action = '<?= site_url('Produk/Kata-Kunci/'); ?>' + document.getElementById("search").value;
    }
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<script>
    $(document).ready(function() {

        // Load more datakomentar
        $('.load-more').click(function() {
            var row = Number($('#row').val());
            var allcount = Number($('#all').val());
            var idkomenpro = Number($('#idkomenpro').val());
            var rowperpage = 3;
            row = row + rowperpage;
            console.log(allcount, row, idkomenpro);
            if (row <= allcount) {
                $("#row").val(row);

                $.ajax({
                    // url: 'getData.php',
                    url: '<?= base_url() ?>Produk/loadMoreKomentar',
                    type: 'post',
                    data: {
                        row: row,
                        idkomepro: idkomenpro
                    },
                    beforeSend: function() {
                        $(".load-more").text("Memuat.....");
                    },
                    success: function(response) {

                        // Setting little delay while displaying new content
                        setTimeout(function() {
                            // appending posts after last post with class="post"
                            $(".post-komen:last").after(response).show().fadeIn("slow");

                            var rowno = row + rowperpage;

                            // checking row value is greater than allcount or not
                            if (rowno > allcount) {

                                // Change the text and background
                                $('.load-more').text("Sembunyikan");
                            } else {
                                $(".load-more").text("Muat Komentar");
                            }
                        }, 2000);

                    }
                });
            } else {
                $('.load-more').text("Memuat...");

                // Setting little delay while removing contents
                setTimeout(function() {

                    // When row is greater than allcount then remove all class='post' element after 3 element
                    $('.post-komen:nth-child(3)').nextAll('.post-komen').remove();

                    // Reset the value of row
                    $("#row").val(0);

                    // Change the text and background
                    $('.load-more').text("Muat Komentar");


                }, 2000);


            }

        });

    });
</script>

<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<script type="text/javascript">
    (function() {
        window.onload = function() {
            openModalIklan();

            var map;
            //Parameter Google maps
            var options = {
                zoom: 16, //level zoom
                //posisi tengah peta
                center: new google.maps.LatLng('<?php echo @$wisata->wisata_latitude ?>', '<?php echo @$wisata->wisata_longitude ?>'),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // Buat peta di 
            var map = new google.maps.Map(document.getElementById('peta'), options);
            // Tambahkan Marker 
            var locations = [
                ['<?php echo @$wisata->wisata_nama ?>', '<?php echo @$wisata->wisata_latitude ?>', '<?php echo @$wisata->wisata_longitude ?>'],
            ];
            var infowindow = new google.maps.InfoWindow();

            var marker, i;
            /* kode untuk menampilkan banyak marker */
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                });
                /* menambahkan event clik untuk menampikan
                infowindows dengan isi sesuai denga
                marker yang di klik */

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        };

        function openModalIklan() {
            let count = 5;
            let timer = null;
            $("#IklanModal").modal('show');
          
            (function countDown(){
                // Display counter and start counting down
                $("#btn-close-iklan").text(count);
                
                // Run the function again every second if the count is not zero
                if(count !== 0){
                    timer = setTimeout(countDown, 1000);
                    count--; // decrease the timer
                } else {
                    // Enable the button
                    $("#btn-close-iklan").text("Tutup iklan");
                    $("#btn-close-iklan").removeClass("disabled");
                }
            }());
        };

    })();
</script>


<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    function highlightStar(obj, id) {
        removeHighlight(id);
        $('#rate-' + id + ' li').each(function(index) {
            $(this).addClass('highlight');
            if (index == $('#rate-' + id + ' li').index(obj)) {
                return false;
            }
        });
    }

    // event yang terjadi pada saat kita mengarahkan kursor kita ke sebuah object
    function removeHighlight(id) {
        $('#rate-' + id + ' li').removeClass('selected');
        $('#rate-' + id + ' li').removeClass('highlight');
    }

    function addRating(obj, id) {
        $('#rate-' + id + ' li').each(function(index) {
            $(this).addClass('selected');
            $('#rate-' + id + ' #rating').val((index + 1));
            if (index == $('#rate-' + id + ' li').index(obj)) {
                return false;
            }
        });
        var id = $("#id").val();
        var rating = $('#rating').val();
        var wisata_id = $('#id_produk').val();
        var komentar_ip = $('#komentar_ip').val();
        $.ajax({
            url: "<?php echo base_url('produk/tambah_ratingproduk'); ?>",
            data: {
                id: id,
                rating: rating,
                id_produk: id_produk,
                komentar_ip: komentar_ip
            },
            type: "POST"
        });
    }

    function resetRating(id) {
        if ($('#rate-' + id + ' #rating').val() != 0) {
            $('#rate-' + id + ' li').each(function(index) {
                $(this).addClass('selected');
                if ((index + 1) == $('#rate-' + id + ' #rating').val()) {
                    return false;
                }
            });
        }
    }

    function save() {

        url = "<?php echo site_url('produk/tambah_ratingproduk') ?>";

        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(result) {

                $('#basicModal').modal('hide');


            },
            error: function(jqXHR, textStatus, errorThrown) {
                setTimeout(function() {
                    $('#btn_close').click();
                }, 1000);
            }
        });
    }
    // star js
    var $star_rating = $('.star-rating .fa');

    var SetRatingStar = function() {
        return $star_rating.each(function() {
            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                return $(this).removeClass('fa-star-o').addClass('fa-star');
            } else {
                return $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
    };

    $star_rating.on('click', function() {
        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar();
    });

    SetRatingStar();
    $(document).ready(function() {

    });
</script>