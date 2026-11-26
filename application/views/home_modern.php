<?php defined('BASEPATH') OR exit('No direct script access allowed');
$asset = base_url() . 'assets/karir/';
$galeri = array(
	array('g1', 'Pengarahan Pusat Karir oleh Psikolog',  'g1 w2 t2'),
	array('g2', 'Pengarahan oleh Ka. P3M',               ''),
	array('g3', 'Suasana kegiatan pengarahan',           ''),
	array('g4', 'Sambutan Ketua UNIMAR AMNI Semarang',   ''),
	array('g5', 'Taruna menyiapkan peserta',             ''),
	array('g6', 'Psikolog memberikan materi kepada peserta', 'w2'),
	array('g7', 'Ka. P3M memberikan arahan',             ''),
	array('g8', 'Peserta seminar Pusat Karir',           ''),
);
?><!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pusat Karir UNIMAR AMNI Semarang</title>
	<meta name="description" content="Pusat Karir Universitas Maritim AMNI Semarang: info lowongan kerja, kegiatan, dan tracer study alumni.">
	<meta name="theme-color" content="#06142b">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $asset ?>css/modern.css?v=1">
</head>
<body class="km">

<!-- ================= NAVBAR ================= -->
<header class="km-nav" id="kmNav">
	<div class="wrap bar">
		<a class="brand" href="<?php echo base_url() ?>" aria-label="Pusat Karir UNIMAR AMNI Semarang">
			<img src="<?php echo $asset ?>img/logo.png" alt="Pusat Karir UNIMAR AMNI Semarang">
		</a>
		<button class="km-burger" id="kmBurger" aria-label="Buka menu" aria-expanded="false" aria-controls="kmMenu"><span></span></button>
		<ul class="km-menu" id="kmMenu">
			<li><a class="on" href="<?php echo base_url() ?>">Beranda</a></li>
			<li><a href="<?php echo base_url() ?>tentang">Tentang</a></li>
			<li><a href="<?php echo base_url() ?>jobinfo">Job Info</a></li>
			<li><a href="<?php echo base_url() ?>berita">Kegiatan Terkini</a></li>
			<li><a href="<?php echo base_url() ?>kontak">Kontak</a></li>
			<li class="cta"><a href="<?php echo base_url() ?>login/">Tracer Study</a></li>
		</ul>
	</div>
</header>

<main>
<!-- ================= HERO ================= -->
<section class="hero">
	<div class="wrap">
		<span class="tag rv"><i></i> Pusat Karir UNIMAR AMNI Semarang</span>
		<h1 class="rv d1">Wujudkan karir <em>maritim</em> impianmu.</h1>
		<p class="lead rv d2">Temukan lowongan dari perusahaan mitra, ikuti kegiatan pengembangan karir, dan terhubung dengan jejaring alumni Universitas Maritim AMNI Semarang.</p>
		<div class="btns rv d2">
			<a class="btn btn-gold" href="<?php echo base_url() ?>jobinfo">
				Lihat Job Info
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
			</a>
			<a class="btn btn-ghost" href="<?php echo base_url() ?>login/">Isi Tracer Study</a>
		</div>
	</div>
	<span class="scroll-hint" aria-hidden="true"></span>
</section>

<!-- ================= PROGRAM STUDI ================= -->
<div class="strip">
	<div class="wrap">
		<div class="box rv">
			<span class="label">Program Studi</span>
			<div class="chips">
				<span class="chip">Nautika</span>
				<span class="chip">Teknika</span>
				<span class="chip">Transportasi</span>
				<span class="chip">KPN</span>
			</div>
		</div>
	</div>
</div>

<!-- ================= LAYANAN ================= -->
<section class="s" id="layanan">
	<div class="wrap">
		<div class="s-head center rv">
			<span class="eyebrow">Layanan Kami</span>
			<h2>Semua kebutuhan karirmu, di satu tempat</h2>
			<p>Dari informasi lowongan sampai pendataan alumni, Pusat Karir mendampingi langkahmu setelah lulus.</p>
		</div>
		<div class="grid3">
			<article class="card rv">
				<div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 8v4l3 2"/></svg></div>
				<h3>Tentang Pusat Karir</h3>
				<p>Kenali program, layanan, dan segala hal yang berhubungan dengan Pusat Karir UNIMAR AMNI Semarang.</p>
				<a class="more" href="<?php echo base_url() ?>tentang">Selengkapnya &rarr;</a>
			</article>
			<article class="card rv d1">
				<div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 13h18"/></svg></div>
				<h3>Job Info</h3>
				<p>UNIMAR AMNI Semarang telah menjalin MoU dengan berbagai perusahaan. Lowongan terbaru kami bagikan di sini.</p>
				<a class="more" href="<?php echo base_url() ?>jobinfo">Cari lowongan &rarr;</a>
			</article>
			<article class="card rv d2">
				<div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/></svg></div>
				<h3>Tracer Study</h3>
				<p>Pengolahan data alumni untuk memetakan perjalanan karir lulusan dan meningkatkan mutu pendidikan.</p>
				<a class="more" href="<?php echo base_url() ?>login/">Isi sekarang &rarr;</a>
			</article>
		</div>
	</div>
</section>

<!-- ================= JOB INFO ================= -->
<section class="s jobs" id="jobinfo">
	<div class="wrap">
		<div class="top">
			<div class="s-head rv">
				<span class="eyebrow">Lowongan Terbaru</span>
				<h2>Job Info untuk taruna &amp; alumni</h2>
			</div>
			<a class="btn btn-gold rv" href="<?php echo base_url() ?>jobinfo">Semua lowongan &rarr;</a>
		</div>

		<?php if (!empty($last)): foreach ($last as $row): ?>
		<article class="job rv">
			<div class="pic">
				<?php if (empty($row->file)): ?>
					<img src="<?php echo base_url() ?>assets/upload/jobinfo/no_image_thumb.png" alt="" loading="lazy">
				<?php else: ?>
					<img src="<?php echo base_url() . 'assets/upload/jobinfo/' . html_escape($row->file . $row->file_type) ?>" alt="<?php echo html_escape($row->nama) ?>" loading="lazy">
				<?php endif; ?>
			</div>
			<div class="body">
				<span class="badge">LOWONGAN BARU</span>
				<h3><?php echo html_escape($row->nama) ?></h3>
				<p><?php echo html_escape(mb_strimwidth(trim(strip_tags($row->keterangan)), 0, 280, '…', 'UTF-8')) ?></p>
				<div><a class="btn btn-gold" href="<?php echo base_url() ?>jobinfo">Lihat detail &rarr;</a></div>
			</div>
		</article>
		<?php endforeach; else: ?>
		<div class="empty rv">Belum ada lowongan yang dipublikasikan. Pantau terus halaman ini.</div>
		<?php endif; ?>
	</div>
</section>

<!-- ================= GALERI ================= -->
<section class="s" id="kegiatan">
	<div class="wrap">
		<div class="s-head rv">
			<span class="eyebrow">Kegiatan Terkini</span>
			<h2>Momen dari kegiatan Pusat Karir</h2>
			<p>Dokumentasi pengarahan dan seminar yang kami selenggarakan bersama psikolog, P3M, dan pimpinan kampus.</p>
		</div>
		<div class="gallery">
			<?php foreach ($galeri as $g): ?>
			<figure class="g <?php echo $g[2] ?> rv" role="button" tabindex="0" data-full="<?php echo $asset ?>img/<?php echo $g[0] ?>.jpg" data-alt="<?php echo html_escape($g[1]) ?>" style="margin:0">
				<img src="<?php echo $asset ?>img/<?php echo $g[0] ?>.jpg" alt="<?php echo html_escape($g[1]) ?>" loading="lazy">
				<figcaption><?php echo html_escape($g[1]) ?></figcaption>
			</figure>
			<?php endforeach; ?>
		</div>
		<div style="margin-top:34px;text-align:center">
			<a class="btn btn-gold" href="<?php echo base_url() ?>berita">Lihat semua kegiatan &rarr;</a>
		</div>
	</div>
</section>

<!-- ================= CTA ================= -->
<section class="cta-band">
	<div class="wrap">
		<div class="cta-box rv">
			<div>
				<h2>Alumni UNIMAR AMNI? Bantu kami lewat Tracer Study.</h2>
				<p>Data karirmu membantu kampus meningkatkan kualitas pendidikan dan membuka lebih banyak peluang kerja bagi adik tingkat.</p>
			</div>
			<a class="btn btn-gold" href="<?php echo base_url() ?>login/">Mulai isi Tracer Study</a>
		</div>
	</div>
</section>
</main>

<!-- ================= FOOTER ================= -->
<footer class="km-foot">
	<div class="wrap">
		<div class="cols">
			<div>
				<img src="<?php echo $asset ?>img/logo.png" alt="Pusat Karir UNIMAR AMNI Semarang">
				<p>Pusat Karir Universitas Maritim AMNI Semarang, menghubungkan taruna dan alumni dengan dunia kerja.</p>
			</div>
			<div>
				<h4>Menu</h4>
				<ul>
					<li><a href="<?php echo base_url() ?>tentang">Tentang</a></li>
					<li><a href="<?php echo base_url() ?>jobinfo">Job Info</a></li>
					<li><a href="<?php echo base_url() ?>berita">Kegiatan Terkini</a></li>
				</ul>
			</div>
			<div>
				<h4>Layanan</h4>
				<ul>
					<li><a href="<?php echo base_url() ?>login/">Tracer Study</a></li>
					<li><a href="<?php echo base_url() ?>kontak">Kontak</a></li>
				</ul>
			</div>
		</div>
		<div class="copy">
			<span>&copy; <?php echo date('Y') ?> Pusat Karir UNIMAR AMNI Semarang.</span>
			<span>Universitas Maritim AMNI Semarang</span>
		</div>
	</div>
</footer>

<div class="lb" id="kmLb" role="dialog" aria-label="Pratinjau foto"><button aria-label="Tutup">&times;</button><img alt=""></div>

<script src="<?php echo $asset ?>js/modern.js?v=1"></script>
</body>
</html>
