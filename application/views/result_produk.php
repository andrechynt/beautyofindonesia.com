<style>
.login-page-demo {
	background-image: url(<?php echo base_url()?>assets/images/bg/1.jpg);
}
</style>
<section class="awe-parallax login-page-demo" style="background-position: 50% 12px;">
    <div class="awe-overlay"></div>
    <div class="container">
    <div class="blog-heading-content text-uppercase">
        <h2><?php echo get_phrase('Tempat Wisata : '. $this->uri->segment(3));?></h2>
    </div>
    </div>
</section>

<section class="masonry-section-demo">
		<div class="container">
			<div class="destination-grid-content">
				<div class="row">
					<div class="awe-masonry">
						<?php
							if ($this->session->userdata('current_language')=='english'){
								foreach ($query_en as $p){ 
									if($p['url_foto']==''){ $cover = 'no_image.jpg'; }else{ $cover = $p['url_foto']; }
									$row5 = '<img src="'.base_url().'uploads/foto_produk/'.$cover.'">';
									if (strpos($p["nama_produk"], '-') !== false) {
										$produkNama = str_replace('-', '_', $p["nama_produk"]);
								}else{
									$produkNama = $p["nama_produk"];
								}
								$link = base_url().'Produk/'.$p['nama_kategori'].'/'.str_replace(' ', '-', $p["nama_provinsi"]).'/'.str_replace(' ', '-', $p["nama_kota"]).'/'.str_replace(' ', '-', $produkNama);
								$wisatane = @$wisatane."
									<div class='awe-masonry__item'>
										<a href=".$link.">
											<div class='image-wrap image-cover'>
												".$row5."
											</div>
										</a>
										
										<div class='item-available'>
											".$m['wisata_nama']."
										</div>
									</div>
								";
								}
							}else{
								foreach ($query as $p){ 
									if($p['url_foto']==''){ $cover = 'no_image.jpg'; }else{ $cover = $p['url_foto']; }
									$row5 = '<img src="'.base_url().'uploads/foto_produk/'.$cover.'">';
									if (strpos($p["nama_produk"], '-') !== false) {
										$produkNama = str_replace('-', '_', $p["nama_produk"]);
								}else{
									$produkNama = $p["nama_produk"];
								}
								$link = base_url().'Produk/'.$p['nama_kategori'].'/'.str_replace(' ', '-', $p["nama_provinsi"]).'/'.str_replace(' ', '-', $p["nama_kota"]).'/'.str_replace(' ', '-', $produkNama);
								$produke = @$produke."
									<div class='awe-masonry__item'>
										<a href=".$link.">
											<div class='image-wrap image-cover'>
												".$row5."
											</div>
										</a>
										<div class='item-available'>
											".$p['nama_produk']."
										</div>
									</div>
								";
								}
							}	
						?>
					
						<?php echo @$produke?>
						
					</div>
					<div class="page__pagination" align="center">
						<?php echo $halaman;?>
				    </div>
				</div>
			</div>
		</div>
</section>