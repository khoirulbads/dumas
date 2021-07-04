<h3>Halo, admin dumas.pkmsukorame.com !</h3>

<p>
	Nama : {{$nama}}
	<br>
	Email : {{$email}} 
	<br><br><br>
	Judul Pengaduan : {{$judul}} 
	<br>
	Lokasi Pengaduan : {{$lokasi}} 
	<br>
	Tanggal Pengaduan : <?= date('d M Y H:i',strtotime($tanggal)); ?>
	<br>
	Kategori Pengaduan : {{$kat}} 
	<br>
	Isi Pengaduan : {{$isi}}

</p>
 
