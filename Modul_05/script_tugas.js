$(document).ready(function () {
  // 1. Fade-in semua gambar saat halaman dimuat
  $(".gallery img").each(function (index) {
    $(this)
      .delay(200 * index)
      .fadeIn(600);
  });

  // 2. Klik gambar untuk menampilkan modal
  $(".gallery img").on("click", function () {
    const src = $(this).attr("src");
    $(".modal img").attr("src", src);
    $(".modal").fadeIn();
  });

  // 3. Tutup modal saat tombol "Close" diklik
  $(".modal .close").on("click", function () {
    $(".modal").fadeOut();
  });

  // 4. Tutup modal saat area luar gambar diklik
  $(".modal").on("click", function (e) {
    if ($(e.target).is(".modal")) {
      $(".modal").fadeOut();
    }
  });
});
