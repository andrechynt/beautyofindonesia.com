<body class="single-post">
    <!--<![endif]-->

    <div id="page-wrap">
        <div class="preloader" style="display: none;"></div>
    </div>
    <style>
        .page-heading-demo {
            background-image: url(<?php echo base_url() ?>assets/images/img/16.jpg);
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
            float: none;
        }

        @media (min-width: 768px) { 
            #gambar-wisata {
                float: left;
            }
        }

    </style>
    <!-- <title><?php //echo get_phrase(substr(@$detail_berita->berita_judul, 0, 52) . ".. " . "| Artikel"); 
                ?></title> -->

    <section class="awe-parallax page-heading-demo" style="background-position: 50% 12px;">
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="blog-heading-content text-uppercase">
                <h2><?php echo get_phrase('Artikel'); ?></h2>
            </div>
        </div>
    </section>
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-page__content">
                        <div class="post">

                        <?php
                            foreach ($iklan_artikel as $i) {
                                if ($i['berita_id'] == $detail_berita->berita_id) {
                                    $imgSrc = null;
                                    $url = null;
                                    $iklanPosisi = $i['iklan_posisi'];
                                    $berita_deskripsi = $detail_berita->berita_deskripsi;

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
                                                        <a href=" . $url . " class='img-iklan-md mb-2' target='_blank' rel='noopener'>
                                                            " . $imgSrc . "
                                                        </a>
                                                    ";

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
                                                        <a href=" . $url . " class='img-iklan-md mb-2' target='_blank' rel='noopener'>
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
                                                        <a href=" . $url . " class='img-iklan-lg mb-2' target='_blank' rel='noopener'>
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

                            <?php 
                            $get_deskripsi =  $detail_berita->berita_deskripsi;
                            $get_tag_wisata =  strstr($get_deskripsi, "#wisata");
                            $deskripsi_with_wisata = null;

                            if ($get_tag_wisata) {
                                $explode_id= explode("#wisata#", $get_tag_wisata);
                                $id_iklan = array();

                                foreach($explode_id as $i){
                                    $id_iklan[] = strstr($i, '#', true);
                                }

                                foreach($get_wisata as $w) {
                                    if(in_array($w['wisata_id'], $id_iklan)) {
                                        if ($w['url_file_foto'] == '') {
                                            $cover = 'no_image.jpg';
                                        } else {
                                            $cover = $w['url_file_foto'];
                                        }

                                        $wisataNama = $w['wisata_nama'];
                                        $gambar = '<img class ="card-img-top" src="' . base_url() . 'uploads/foto_wisata/' . $cover . '" alt ="' . $w['wisata_nama'].'">';
                                        $link = base_url() . 'Tempat-Wisata/' . $w['kategori_nama'] . '/' . str_replace(' ', '-', $w["nama_provinsi"]) . '/' . str_replace(' ', '-', $w["nama_kota_kabupaten"]) . '/' . str_replace(' ', '-', $wisataNama);
                                        $get_deskripsi = $deskripsi_with_wisata == null ? $get_deskripsi : $deskripsi_with_wisata;
    
                                        $deskripsi_with_wisata = @$deskripsi_with_wisata . "
                                        <div class='post'>
                                            <div class='post-media' id='gambar-wisata' style='width: 18rem;'>
                                                <a class='klik-id' href='". $link ."'>" . $gambar . "</a>
                                            </div>
                                            <div class='post-body'>
                                                <div class='post-title'>
                                                    <form action=" . $link . " method='post'>
                                                        <input type='hidden' name=" . $this->security->get_csrf_token_name() . " value=" . $this->security->get_csrf_hash() . ">

                                                        <input type='hidden' name='id_artikel' value=" . $w['wisata_id'] . ">
                                                        <button style='text-align: left;background: rgba(0,0,0,0.0);border-style: none;'><h2 id='linkSlug'>
                                                                " . $wisataNama . "</h2></button>
                                                    </form>
                                                </div>
                                                
                                                <div class='post-link' style='margin-top: 2rem !important;'>
                                                    <form action=" . $link . " method='post'>
                                                        <input type='hidden' name=" . $this->security->get_csrf_token_name() . " value=" . $this->security->get_csrf_hash() . ">

                                                        <input type='hidden' name='id_artikel' value=" . $w['wisata_id'] . ">
                                                        <button style='text-align: left;background: rgba(0,0,0,0.0);border-style: none;'><a class='awe-btn awe-btn-style2 klik-id'>
                                                                " . get_phrase('Baca Selengkapnya') . "</a></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        ";

                                        $text_replace = '#wisata#' . $w['wisata_id'] . '#';
                                        $deskripsi_with_wisata = str_replace($text_replace, $deskripsi_with_wisata, $get_deskripsi);
                                        $get_deskripsi = $deskripsi_with_wisata;
                                    }
                                }
                            }
                            ?>

                            <?php
                            if ($this->session->userdata('current_language') == 'english') {
                                $gambar = '<img src="' . base_url() . 'uploads/berita/' . $detail_berita_en->berita_foto . '" alt="' . $title . '">';
                                $deskripsi = $deskripsi_with_wisata != null ? $deskripsi_with_wisata : $detail_berita_en->berita_deskripsi;
                                $data =  @$data . "
									<div class='post-meta'>
									<div class='date'>" . longdate_indo($detail_berita_en->berita_tgl) . "</div>
									
									</div>
									<div class='post-title'><h1>" . $detail_berita_en->berita_judul . "</h1></div>
										<div class='post-media'><div class='image-wrap'>" . $gambar . "</div></div>
									<div class='post-body'><div class='post-content'>
									<p>" . $deskripsi . "</p>
									</div></div>
								";
                            } else {
                                $gambar = '<img src="' . base_url() . 'uploads/berita/' . $detail_berita->berita_foto . '" alt="' . $title . '">';
                                $deskripsi = $deskripsi_with_wisata != null ? $deskripsi_with_wisata : $detail_berita->berita_deskripsi;
                                $data =  @$data . "
									<div class='post-meta'>
									<div class='date'>" . longdate_indo($detail_berita->berita_tgl) . "</div>
									
									</div>
									<div class='post-title'><h1>" . $detail_berita->berita_judul . "</h1></div>
										<div class='post-media'><div class='image-wrap'>" . $gambar . "</div></div>
									<div class='post-body'><div class='post-content'>
									<p>" . $deskripsi . "</p>
									</div></div>
								";
                            }
                            ?>

                            <?php echo $data ?>

                            <div style="display: flex; justify-content: center;">
                                <?php echo @$iklanBawah ?>
                            </div>
                        </div>

                        <h3 style="text-align:center; font-size:1.7em; margin-top:-3%"> Artikel Lainnya</h3>

                        <div class="row">
                            <div class="awe-masonry">
                                <?php

                                if ($this->session->userdata('current_language') == 'english') {
                                    foreach ($query as $m) {
                                        if ($m->berita_foto == '') {
                                            $cover = 'no_image.jpg';
                                        } else {
                                            $cover = $m->berita_foto;
                                        }
                                        $row5 = '<img src="' . base_url() . 'uploads/berita/' . $cover . '">';
                                        $link = base_url('Artikel/detail_artikel/' . $m->berita_judul);
                                        $wisatae = @$wisatae . "
													<div class='awe-masonry__item'>
														<a href=" . $link . ">
															<div class='image-wrap image-cover'>
																" . $row5 . "
															</div>
														</a>
														
														<div class='item-available'>
															" . $m->berita_judul . "
														</div>
													</div>
												";
                                    }
                                } else {
                                    foreach ($artikel_lain as $m) {
                                        if ($m->berita_foto == '') {
                                            $cover = 'no_image.jpg';
                                        } else {
                                            $cover = $m->berita_foto;
                                        }
                                        $row5 = '<img src="' . base_url() . 'uploads/berita/' . $cover . '"class="image-rounded" style="width:700px">';
                                        $link = base_url('Artikel/detail_artikel/' . $m->berita_judul);
                                        $linku = url_title($m->berita_judul, '-', TRUE);
                                        $linkslug = base_url('Artikel/' . $linku);
                                        $wisatae = @$wisatae . "
													<div class='awe-masonry__item'>

														<form action=" . $linkslug . " method='post'>
                                                         <input type='hidden' name=" . $this->security->get_csrf_token_name() . " value=" . $this->security->get_csrf_hash() . ">

                                                            <a class='klik-id' href='javascript:void(0)'>
                                                                <div class='row' style='padding:25px'>
                                                                    " . $row5 . "
                                                                </div>
                                                            </a>
                                                            
                                                            <div class='item-available'>
                                                            
                                                            <input type='hidden' name='id_artikel' value=" . $m->berita_id . ">
                                                                
                                                                <button style='text-align: left;background: rgba(0,0,0,0.0);border-style: none;'>
                                                                    " . $m->berita_judul . "</button>
                                                            </div>
														</form>
													</div>
												
												";
                                    }
                                }
                                ?>
                                <?php echo @$wisatae ?>

                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-md-3">
                    <br></br>
                    <div class="page-sidebar">
                        <div class="widget widget_categories">
                            <h3><?php echo get_phrase('Penulis'); ?></h3>
                            <h6><small> <strong><?php echo $detail_berita->penulis_nama ?> </small></strong></h6>
                            <?php
                            $link = base_url('Berita/detail_penulis/' . $detail_berita->penulis_id);
                            $url_title = url_title($detail_berita->penulis_nama, '-', TRUE);
                            $linkslug = base_url('Penulis-Artikel/' . $url_title); ?>

                            <div class="post">
                                <?php echo @$iklanSibeBar ?>
                            </div>

                            <div class='post'>
                                <form action="  <?php echo $linkslug ?>  " method='post'>
                                    <div class='post-title'>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type='hidden' name='penulis_id' value=" <?php $detail_berita->penulis_id ?> ">
                                        <h6> <small><a href='javascript:void(0)' class='klik-id'> Artikel Lainnya (<?php echo count($berita_count); ?>) </a></small></h6>
                                    </div>

                                </form>
                            </div>
                            <?php
                            $linkwst = base_url('Wisata/detail_penulis/' . $penulis_berita->penulis_id);
                            $url_titlewst = url_title($penulis_berita->penulis_nama, '-', TRUE);
                            $linkslugwst = base_url('Penulis-Wisata/' . $url_titlewst); ?>
                            <div class='post'>
                                <form action="  <?php echo $linkslugwst ?>  " method='post'>
                                    <div class='post-title'>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type='hidden' name='penulis_id' value=" <?php $penulis_berita->penulis_id ?> ">
                                        <h6> <small><a href='javascript:void(0)' class='klik-id'> Wisata Lainnya (<?php echo count($wisata_count); ?>) </a></small></h6>
                                    </div>

                                </form>
                            </div>

                            <!-- <h6> <small><a href="<?php echo base_url('Wisata/detail_penulis/' . $penulis_berita->penulis_id) ?>"> Wisata Lainnya (<?php echo count($wisata_count); ?>) </a> </small></h6> -->

                        </div>

                        <div class="widget widget_search">
                            <h3><?php echo get_phrase('Cari Artikel'); ?></h3>
                            <form onsubmit="search_artikel(this);" method="POST">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                <input type="search" required name="cari_artikel" id="cari_artikel" value="<?php echo get_phrase('Masukkan Kata'); ?>">
                            </form>
                        </div>

                        <div class="widget widget_tag_cloud">
                            <h3><?php echo get_phrase('Tags Artikel'); ?></h3>
                            <?php
                            if ($this->session->userdata('current_language') == 'english') {

                                $tag =  @$tag . "<div class='tagcloud'>";


                                $data_awal = $detail_berita_en->berita_tag;
                                $array =  explode(' ', $data_awal);
                                foreach ($array as $item) {
                                    $link = base_url('Artikel/Tags/' . $item);
                                    $tag =  @$tag . "<a href=" . $link . ">" . $item . "</a>";
                                }
                                $tag =  @$tag . "</div>";
                            } else {
                                $tag =  @$tag . "<div class='tagcloud'>";


                                $data_awal = $detail_berita->berita_tag;
                                $array =  explode(' ', $data_awal);
                                foreach ($array as $item) {
                                    $link = base_url('Artikel/Tags/' . $item);
                                    $tag =  @$tag . "<a href=" . $link . ">" . $item . "</a>";
                                }
                                $tag =  @$tag . "</div>";
                            }
                            ?>
                            <?php echo $tag; ?>
                        </div>

                        <div class="widget widget_categories">
                            <h3><?php echo get_phrase('Direktori Artikel'); ?></h3>
                            <ul class="css-treeview">
                                <?php foreach ($tahun as $thn) : ?>
                                    <li>
                                        <input type="checkbox" class="expander" checked>
                                        <span class="expander"></span>
                                        <label><?php echo $thn['thn'] ?></label>

                                        <!-- The child nodes. -->
                                        <?php $bulan = $this->Model->sitemap_bulan($thn['thn'])->result_array();
                                        foreach ($bulan as $bln) {
                                            $bulantags = date('F', mktime(0, 0, 0, $bln['bulan'], 10));
                                        ?>
                                            <ul class="css-treeview">
                                                <li>
                                                    <input type="checkbox" class="expander" disabled>
                                                    <span class="expander"></span>
                                                    <label><a href="<?php echo base_url('Artikel/' . $thn['thn'] . '/' . $bulantags) ?>"><?php echo $bln['bln'] ?></a></label>
                                                </li>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>

                        <div class="post">
                            <?php echo @$iklanSibeBar ?>
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
                    <button type="button" id="btn-close-iklan" class="btn btn-primary disabled" data-bs-dismiss="modal">Tutup Iklan</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        (function() {
            window.onload = function() {
                //openModalIklan();
            };

            function openModalIklan() {
                $("#IklanModal").modal('show');

                setTimeout(() => {
                    $("#btn-close-iklan").removeClass("disabled");
                }, 3000)
            };
        })();
    </script>

    <!-- Mirrored from envato.megadrupal.com/html/gofar/single-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Oct 2017 02:03:01 GMT -->
</body>