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
           SIDEBAR
        ======================= */

        .sidebar{
            position:fixed;
            top:0;
            left:0;
            width:260px;
            height:100vh;
            overflow-y:auto;
            overflow-x:hidden;
            background:linear-gradient(180deg,#0d6efd,#0b5ed7);
            color:#fff;
            display:flex;
            flex-direction:column;
            z-index:1000;
            box-shadow:4px 0 20px rgba(0,0,0,.08);
        }

        .sidebar::-webkit-scrollbar{
            width:6px;
        }

        .sidebar::-webkit-scrollbar-thumb{
            background:rgba(255,255,255,.25);
            border-radius:10px;
        }

        .logo{
            border-bottom:1px solid rgba(255,255,255,.15);
        }

        .sidebar-title{
            color:rgba(255,255,255,.65);
            font-size:12px;
            font-weight:bold;
            margin:20px 0 10px;
            letter-spacing:1px;
        }

        .sidebar-link{
            display:flex;
            align-items:center;
            gap:12px;
            padding:12px 15px;
            margin-bottom:6px;
            border-radius:10px;
            color:#fff;
            text-decoration:none;
            transition:.2s;
        }

        .sidebar-link:hover{
            background:rgba(255,255,255,.12);
            color:#fff;
        }

        .sidebar-link.active{
            background:#fff;
            color:#0d6efd;
            font-weight:600;
        }

        .sidebar-link i{
            font-size:18px;
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
            background:#fff;
            min-height:70px;
            padding:0 25px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            box-shadow:0 2px 15px rgba(0,0,0,.06);
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

/* Kolom Nama Asset */
#warrantyTable th:nth-child(2),
#warrantyTable td:nth-child(2){
    text-align:left;
    min-width:280px;
    white-space:nowrap;
}

/* Kolom No Garansi */
#warrantyTable th:nth-child(3){
    width:180px;
}

/* Kolom Status */
#warrantyTable th:nth-child(6),
#warrantyTable td:nth-child(6){
    width:120px;
}

/* Kolom Aksi */
#warrantyTable th:last-child,
#warrantyTable td:last-child{
    width:170px;
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

.btn-warning,
.btn-danger{
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

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.min.js"></script>

@stack('scripts')

</body>
</html>