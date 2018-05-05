<!DOCTYPE HTML>

<html>
	<head>
		<title>{{ env('APP_NAME')}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/main.css" />
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/favicon.jpg') }}">
		<style>
			#sidebar nav a:before {
			    background: #e65935 !important;
			}
		</style>
	</head>
	<body>

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<img src="{{ asset('frontend/images/logo-malaria.png')}}" style="height:50px;filter: saturate(3); margin-top:-100px;" alt=""  />
					<nav style="margin-top: 50px;">
						<ul>
							<li><a href="#intro">Beranda</a></li>
							<li><a href="#one">Tentang Aplikasi</a></li>
							<li><a href="#two">Tentang Malaria</a></li>
							<li><a href="#three">Registrasi</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>APLIKASI DIAGNOSA PENYAKIT MALARIA</h1>
							<p>Aplikasi Sistem Pakar Diagnosa Penyakit Mata Menggunakan Metode Demster Shafer</a>.</p>
							<ul class="actions">
								<li><a href="{{ url('membership') }}" class=" scrolly" style="background: #FFF; color:red; border-radius: 50px; padding: 20px; font-weight:bold;">Proses Diagnosa</a></li>
							</ul>
						</div>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style2 spotlights">
						<section>
							<a href="#" class="image"><img src="{{ asset('frontend/images/background.png')}}" alt="" data-position="center center" /></a>
							<div class="content">
								<div class="inner">
									<h2>Tentang Aplikasi</h2>
									<p>Aplikasi ini di khususkan untuk mempresentasikan hasil diagnosa penyakit khususnya penyakit malaria</p>
									<br><p>Sistem Pakar(dalam bahasa Inggris :expert system) adalah sistem informasi yang berisi dengan pengetahuan dari pakar sehingga dapat digunakan untuk konsultasi. Pengetahuan dari pakar di dalam sistem ini digunakan sebagi dasar oleh Sistem Pakar untuk menjawab pertanyaan (konsultasi).</p>
									<p></p>
									
								</div>
							</div>
						</section>
						
						
					</section>

				<!-- Two -->
					<section id="two" class="wrapper style3 spotlights">
						<section>
							<a href="#" class="image"><img src="{{ asset('frontend/images/malaria-blood.jpg')}}" alt="" data-position="center center" /></a>
							<div class="content">
								<div class="inner">
									<h2>Tentang Malaria</h2>
									<p>
Malaria
Malaria.jpg
Sebuah Plasmodium dari air ludah nyamuk betina bergerak melalui sel nyamuk
Klasifikasi dan rujukan luar
Spesialisasi	Penyakit infeksi
ICD-10	B50.-B54.
ICD-9-CM	084
OMIM	248310
DiseasesDB	7728
MedlinePlus	000621
eMedicine	med/1385 emerg/305 ped/1357
Patient UK	Malaria
MeSH	C03.752.250.552
Orphanet	673
[sunting di Wikidata]
Malaria adalah penyakit yang ditularkan oleh nyamuk dari manusia dan hewan lain yang disebabkan oleh protozoa parasit (sekelompok mikroorganisme bersel tunggal) dalam tipe Plasmodium.[1] Malaria menyebabkan gejala yang biasanya termasuk demam, kelelahan, muntah, dan sakit kepala. Dalam kasus yang parah dapat menyebabkan kulit kuning, kejang, koma, atau kematian.[2] Gejala biasanya muncul sepuluh sampai lima belas hari setelah digigit. Jika tidak diobati, penyakit mungkin kambuh beberapa bulan kemudian.[1] Pada mereka yang baru selamat dari infeksi, infeksi ulang biasanya menyebabkan gejala ringan. resistensi parsial ini menghilang selama beberapa bulan hingga beberapa tahun jika orang tersebut tidak terpapar terus-menerus dengan malaria.[2]</p>
									<p></p>
									<ul class="actions">
										<li><a href="https://id.wikipedia.org/wiki/Malaria">Baca Selanjutnya</a></li>
									</ul>
								</div>
							</div>
						</section>
					</section>

				<!-- Three -->
					<section id="three" class="wrapper style1 fade-up">
						<div class="inner">
							<h2>Registrasi </h2>
							<p>sebelum anda melakukan proses diagnosa diwajibkan anda memiliki akun agar sistem dapat anda akses form di bawah ini merupakan pendaftaran pasien yang terjangkit</p>
							<div class="split style1">
								<section>
									<form method="get" action="{{ url('membership/register') }}">
										{{ csrf_field() }}
										<div class="field half first">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" />
										</div>
										<div class="field half">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" />
										</div>
										<div class="field half first">
											<label for="name">Umur</label>
											<input type="text" name="umur" id="name" />
										</div>
										<div class="field half">
											<label for="email">Password</label>
											<input type="password" name="password" id="email" />
										</div>
										<div class="field">
											<label for="message">Alamat</label>
											<textarea name="alamat" id="message" rows="5"></textarea>
										</div>
										<ul class="actions">
											<li><a href="" class="button submit">Registrasi</a></li>
										</ul>
									</form>
								</section>
								<section>
									
								</section>
							</div>
						</div>
					</section>

			</div>

		<!-- Footer -->
			

		<!-- Scripts -->
			<script src="{{ asset('frontend/assets') }}/js/jquery.min.js"></script>
			<script src="{{ asset('frontend/assets') }}/js/jquery.scrollex.min.js"></script>
			<script src="{{ asset('frontend/assets') }}/js/jquery.scrolly.min.js"></script>
			<script src="{{ asset('frontend/assets') }}/js/skel.min.js"></script>
			<script src="{{ asset('frontend/assets') }}/js/util.js"></script>
			<script src="{{ asset('frontend/assets') }}/js/main.js"></script>

	</body>
</html>