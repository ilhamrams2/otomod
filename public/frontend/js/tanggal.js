document.addEventListener('DOMContentLoaded', function() {
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth();
    var thisDay = date.getDay();
    thisDay = myDays[thisDay];
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;

    var tanggalElement = document.getElementById('tanggal');
    if (tanggalElement) {
        tanggalElement.innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
    }
});
