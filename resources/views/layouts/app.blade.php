<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AsetIn - @yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.min.css">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>

        body{
            background:#f4f6f9;
            font-family:'Segoe UI',sans-serif;
            overflow-x:hidden;
        }

        /* =======================
           SIDEBAR
        ======================== */

        .sidebar{
            position:fixed;
            left:0;
            top:0;
            width:260px;
            height:100vh;
            background:linear-gradient(180deg,#0d6efd,#0b5ed7);
            color:white;
            display:flex;
            flex-direction:column;
            box-shadow:4px 0 20px rgba(0,0,0,.08);
            z-index:999;
        }

        .logo{
            border-bottom:1px solid rgba(255,255,255,.15);
        }

        .sidebar-title{
            color:rgba(255,255,255,.65);
            font-size:12px;
            font-weight:bold;
            margin-top:25px;
            margin-bottom:10px;
            padding-left:8px;
            letter-spacing:1px;
        }

        .sidebar-link{
            color:white;
            text-decoration:none;
            display:flex;
            align-items:center;
            gap:12px;
            padding:12px 15px;
            border-radius:10px;
            margin-bottom:6px;
            transition:.25s;
        }

        .sidebar-link i{
            font-size:18px;
        }

        .sidebar-link:hover{
            background:rgba(255,255,255,.15);
            color:white;
            transform:translateX(4px);
        }

        .sidebar-link.active{
            background:white;
            color:#0d6efd;
            font-weight:600;
        }

        .sidebar-link.active i{
            color:#0d6efd;
        }

        /* =======================
           CONTENT
        ======================== */

        .content{
            margin-left:260px;
            min-height:100vh;
        }

        .navbar-custom{
            background:white;
            box-shadow:0 2px 15px rgba(0,0,0,.06);
            padding:15px 25px;
        }

        .page-content{
            padding:30px;
        }

        /* =======================
           CARD
        ======================== */

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 18px rgba(0,0,0,.05);
        }

        .card-header{
            background:white;
            border-bottom:1px solid #eee;
            font-weight:600;
        }

        /* =======================
           BUTTON
        ======================== */

        .btn{
            border-radius:10px;
        }

        /* =======================
           TABLE
        ======================== */

        table{
            border-radius:10px;
            overflow:hidden;
        }

    </style>

</head>

<body>

@include('layouts.sidebar')

<div class="content">

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