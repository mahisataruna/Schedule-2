function kirimPesan() {
	var tanggal = document.getElementById("tanggal");
	var kegiatan = document.getElementById("kegiatan");
	var jam = document.getElementsById("jam");
	var lokasi = document.getElementById("lokasi");
	var judul = document.getElementById("judul");

	var gabungan =
		"<b>CATATAN%20HARIAN%0A</b>" +
		"%0ATanggal%20%3A%20" +
		tanggal.value +
		"%20%20Pukul%20%3A%20" +
		jam.value +
		"%20%20Lokasi%20%3A%20" +
		lokasi.value +
		"%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A" +
		"%0AJudul%20%3A%20" +
		judul.value +
		"%0A%0AKegiatan%20%3A%0A%0A" +
		kegiatan.value +
		"%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%0A" +
		"%23CatatanHarian" +
		"%20%23FromWebsite";

	var token = "YOUR TELEGRAM TOKEN BOT"; // Ganti dengan token bot yang kamu buat
	var grup = "YOUR GROUP / CHANNEL ID"; // Ganti dengan chat id dari bot yang kamu buat

	$.ajax({
		url: `https://api.telegram.org/bot${token}/sendMessage?chat_id=${grup}&text=${gabungan}&parse_mode=html`,
		method: `POST`,
		success: function (response) {
			window.location = "/";
		},
		error: function () {
			console.log("Mohon maaf ada kesalahan!");
		},
	});
}
