$(document).ready(function() {
    // Fade-in efek untuk semua gambar saat halaman dimuat
    $('.gallery img').each(function(index) {
        $(this).delay(index * 200).animate({ opacity: 1 }, 1000);
    });

    // Menampilkan gambar dalam modal saat diklik
    $('.gallery img').click(function() {
        const imgSrc = $(this).attr('src');
        $('#modal img').attr('src', imgSrc);
        $('#modal').css('display', 'flex').hide().fadeIn();
    });

    // Menutup modal saat tombol "Close" diklik
    $('#closeModal').click(function() {
        $('#modal').fadeOut();
    });

    // Menutup modal saat area di luar gambar diklik
    $('#modal').click(function(event) {
        if (event.target === this) {
            $(this).fadeOut();
        }
    });
});
