/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

function setReturnDate() {
    let borrowDate = new Date(document.getElementById("tgl_peminjaman").value);
    let returnDate = new Date(borrowDate);
    returnDate.setDate(borrowDate.getDate() + 7); // Menambahkan 7 hari

    // Format tanggal pengembalian ke format yyyy-mm-dd
    let formattedDate = returnDate.toISOString().split('T')[0];
    
    document.getElementById("tgl_pengembalian").value = formattedDate;
}
