<h3>Halo, Pengguna Dumas!</h3>

<p>
	Perihal : Pengaduan {{$judul}} telah {{$hal}} {{$nama}}
	<br>
	Keterangan : {{$ket}}
	<br>
	Tanggal {{$hal}} : <?= date('d M Y H:i',strtotime($tanggal)); ?>
	<br><br>
	Berikut adalah informasi seputar pengaduan yang  diajukan
	<br><br>
	Judul  : {{$judul}} 
	<br>
	Kategori : {{$kat}} 
	<br>
	Lokasi : {{$lokasi}} 
	<br>
	Isi : <pre style="font-family: Arial;white-space: pre-line;">{{$isi}}</pre>

</p>
 
