<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASETIN - @yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#f4f6f9;
            font-family:'Segoe UI',sans-serif;
            overflow-x:hidden;
        }

        /* =======================
   SIDEBAR PREMIUM
======================= */

.sidebar{
    position:fixed;
    top:0;
    left:0;
    width:260px;
    height:100vh;
    overflow-y:auto;
    overflow-x:hidden;

    background:linear-gradient(
        180deg,
        #0f172a 0%,
        #1e3a8a 55%,
        #2563eb 100%
    );

    color:#fff;

    display:flex;
    flex-direction:column;

    z-index:1000;

    box-shadow:
        6px 0 25px rgba(0,0,0,.15);

    transition:.3s;
}

.sidebar::-webkit-scrollbar{
    width:6px;
}

.sidebar::-webkit-scrollbar-thumb{
    background:rgba(255,255,255,.25);
    border-radius:30px;
}

.sidebar::-webkit-scrollbar-track{
    background:transparent;
}

/* =======================
   LOGO
======================= */

.logo{

    padding:30px 20px;

    border-bottom:1px solid rgba(255,255,255,.12);

    background:rgba(255,255,255,.04);

    backdrop-filter:blur(5px);

}

.logo i{

    font-size:58px;

    color:#fff;

    margin-bottom:10px;

}

.logo h2{

    font-size:30px;

    font-weight:700;

    letter-spacing:1px;

    margin-bottom:3px;

}

.logo small{

    font-size:13px;

    color:rgba(255,255,255,.70);

}

/* =======================
   TITLE
======================= */

.sidebar-title{

    color:rgba(255,255,255,.55);

    font-size:11px;

    font-weight:700;

    letter-spacing:2px;

    margin:24px 0 12px;

    padding-left:10px;

}

/* =======================
   MENU
======================= */

.sidebar-link{

    display:flex;

    align-items:center;

    gap:14px;

    padding:13px 16px;

    margin-bottom:7px;

    border-radius:14px;

    text-decoration:none;

    color:#fff;

    transition:all .25s ease;

}

.sidebar-link i{

    font-size:19px;

    min-width:22px;

    text-align:center;

}

.sidebar-link span{

    font-size:15px;

    font-weight:500;

}

/* Hover */

.sidebar-link:hover{

    background:rgba(255,255,255,.12);

    color:#fff;

    transform:translateX(6px);

}

/* Active */

.sidebar-link.active{

    background:#fff;

    color:#2563eb;

    font-weight:600;

    box-shadow:

        0 8px 20px rgba(0,0,0,.15);

}

.sidebar-link.active i{

    color:#2563eb;

}

/* Logout */

.sidebar form .sidebar-link{

    color:#fff;

}

.sidebar form .sidebar-link:hover{

    background:rgba(255,255,255,.10);

}

        /* =======================
           CONTENT
        ======================= */

        .main-content{
    margin-left:260px;
    width:calc(100vw - 260px);
    min-height:100vh;
    display:block;
}
        /* =======================
           NAVBAR
        ======================= */

       .navbar-custom{
    background:#ffffff;
    min-height:80px;
    padding:0 30px;

    display:flex;
    align-items:center;
    justify-content:space-between;

    border-bottom:1px solid #eef2f7;

    box-shadow:0 6px 20px rgba(0,0,0,.05);

    position:sticky;
    top:0;
    z-index:999;
}
.dropdown-menu{
    border-radius:18px;
    box-shadow:0 12px 30px rgba(0,0,0,.10);
}

.dropdown-item{
    border-radius:10px;
    transition:.2s;
}

.dropdown-item:hover{
    background:#f4f7fb;
}

.navbar-custom h3{
    font-size:26px;
}

.navbar-custom small{
    font-size:13px;
}

        /* =======================
           PAGE
        ======================= */

       .page-content{
    padding:25px;
    width:100%;
}

        /* =======================
           CARD
        ======================= */

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 18px rgba(0,0,0,.05);
        }

        .card-header{
            background:#fff;
            border-bottom:1px solid #eee;
            font-weight:600;
        }

        .btn{
            border-radius:10px;
        }

        table{
    width:100%;
    border-collapse:collapse;
}

/* ==========================
   DATATABLES
========================== */

/* Hilangkan garis vertikal */
table.dataTable td,
table.dataTable th{
    border-left:none !important;
    border-right:none !important;
}

/* Search Box */
.dataTables_filter input{
    border-radius:10px !important;
    padding:8px 12px !important;
    border:1px solid #dee2e6 !important;
}

/* Dropdown Entries */
.dataTables_length select{
    border-radius:10px !important;
}

/* Pagination */
.page-link{
    border-radius:8px !important;
    margin:0 2px;
}

/* ==========================
   BUTTON
========================== */

.btn-warning,
.btn-danger{
    transition:.2s ease;
}

.btn-warning:hover,
.btn-danger:hover{
    transform:translateY(-2px);
}

table.dataTable thead th{
    background:#212529 !important;
    color:#fff !important;
    border-color:#343a40 !important;
    text-align:center;
    vertical-align:middle;
    font-weight:600;
    white-space:nowrap;
}
/* ==========================
   WARRANTY TABLE
========================== */

#warrantyTable thead th{
    text-align:center;
    vertical-align:middle;
    font-weight:600;
    white-space:nowrap;
    padding:12px;
}

#warrantyTable tbody td{
    text-align:center;
    vertical-align:middle;
    padding:12px;
}

/* Kolom No */
#warrantyTable th:first-child,
#warrantyTable td:first-child{
    width:60px;
}

/* No */
#warrantyTable th:nth-child(1),
#warrantyTable td:nth-child(1){
    width:60px;
}

/* Nama Asset */
#warrantyTable th:nth-child(2),
#warrantyTable td:nth-child(2){
    width:28%;
    text-align:left;
    white-space:normal;
}

/* No Garansi */
#warrantyTable th:nth-child(3),
#warrantyTable td:nth-child(3){
    width:12%;
}

/* Tanggal Mulai */
#warrantyTable th:nth-child(4),
#warrantyTable td:nth-child(4){
    width:14%;
}

/* Tanggal Berakhir */
#warrantyTable th:nth-child(5),
#warrantyTable td:nth-child(5){
    width:14%;
}

/* Status */
#warrantyTable th:nth-child(6),
#warrantyTable td:nth-child(6){
    width:10%;
}

/* Aksi */
#warrantyTable th:nth-child(7),
#warrantyTable td:nth-child(7){
    width:90px;
    text-align:center;
    white-space:nowrap;
}

/* Hover */
#warrantyTable tbody tr{
    transition:.2s;
}

#warrantyTable tbody tr:hover{
    background:#f5f9ff;
}


/* ==========================
   BADGE STATUS
========================== */

.badge{
    padding:8px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
    letter-spacing:.3px;
}

/* ==========================
   BUTTON
========================== */

.btn{
    border-radius:10px;
}

.table-action-btn{
    width:40px;
    height:40px;
    border-radius:50%;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    transition:.2s ease;
}


/* ==========================
   CARD
========================== */

.card{
    border:none;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}


/* ==========================
   ALERT
========================== */

.alert-success{
    border:none;
    border-left:5px solid #198754;
    border-radius:12px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
}
#assetTable{
    width:100% !important;
}

#assetTable th{
    white-space: nowrap;
    vertical-align: middle;
}

#assetTable td{
    vertical-align: middle;
    white-space: normal;
    word-break: break-word;
}

#assetTable td:nth-child(3){
    min-width:220px;
}

#assetTable td:nth-child(6){
    max-width:170px;
}

#assetTable td:nth-child(7){
    max-width:150px;
}

#assetTable td:nth-child(9){
    white-space:nowrap;
}

#assetTable td:nth-child(10){
    white-space:nowrap;
}
    </style>

</head>

<body>

@include('layouts.sidebar')

<div class="main-content">

    @include('layouts.navbar')

    <div class="page-content">

        @yield('content')

    </div>

</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.min.js"></script>

@stack('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.querySelector('.sidebar');

    if (!sidebar) return;

    // Scroll ke menu yang sedang aktif
    const activeMenu = document.querySelector('.sidebar-link.active');

    if (activeMenu) {
        activeMenu.scrollIntoView({
            block: 'center'
        });
    }

    // Kembalikan posisi scroll sebelumnya
    const savedScroll = sessionStorage.getItem('sidebarScroll');

    if (savedScroll !== null) {
        sidebar.scrollTop = parseInt(savedScroll);
    }

    // Simpan posisi scroll
    sidebar.addEventListener('scroll', function () {
        sessionStorage.setItem('sidebarScroll', sidebar.scrollTop);
    });

});
</script>

</body>
</html>