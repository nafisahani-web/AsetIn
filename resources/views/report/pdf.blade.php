<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Aset</title>

    <style>
        @page {
            margin: 25px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #000;
        }

        h2 {
            text-align: center;
            margin: 0;
            padding-bottom: 8px;
            border-bottom: 1px solid #000;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }

        thead {
            display: table-header-group;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th {
            background-color: #9e9e9e;
            font-weight: bold;
            text-align: center;
            padding: 8px 5px;
        }

        td {
            padding: 6px 5px;
            vertical-align: middle;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        /* Lebar kolom */
        .no {
            width: 5%;
        }

        .kode {
            width: 10%;
        }

        .nama {
            width: 18%;
        }

        .kategori {
            width: 11%;
        }

        .merek {
            width: 12%;
        }

        .lokasi {
            width: 14%;
        }

        .pemasok {
            width: 14%;
        }

        .tanggal {
            width: 8%;
        }

        .harga {
            width: 12%;
        }

        .status {
            width: 6%;
        }

        .signature {
            width: 230px;
            margin-left: auto;
            margin-top: 25px;
            text-align: center;
        }

        .space {
            height: 55px;
        }
    </style>

</head>

<body>

    <h2>Laporan Data Aset</h2>

    <table>

        <thead>

            <tr>
                <th class="no">No</th>
                <th class="kode">Kode Aset</th>
                <th class="nama">Nama Aset</th>
                <th class="kategori">Kategori</th>
                <th class="merek">Merek</th>
                <th class="lokasi">Lokasi</th>
                <th class="pemasok">Pemasok</th>
                <th class="tanggal">Tanggal</th>
                <th class="harga">Harga</th>
                <th class="status">Status</th>
            </tr>

        </thead>

        <tbody>

            @forelse($assets as $asset)

                <tr>

                    <td class="center">{{ $loop->iteration }}</td>

                    <td>{{ $asset->kode_aset }}</td>

                    <td>{{ $asset->nama_aset }}</td>

                    <td>{{ $asset->category->nama_kategori ?? '-' }}</td>

                    <td>{{ $asset->brand->nama_brand ?? '-' }}</td>

                    <td>{{ $asset->location->nama_lokasi ?? '-' }}</td>

                    <td>{{ $asset->supplier->nama_supplier ?? '-' }}</td>

                    <td class="center">
                        {{ \Carbon\Carbon::parse($asset->tanggal_pembelian)->format('d-m-Y') }}
                    </td>

                    <td class="right">
                        {{ 'Rp '.number_format($asset->harga_pembelian,0,',','.') }}
                    </td>

                    <td class="center">
                        {{ $asset->status }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="10" class="center">
                        Tidak ada data aset.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="signature">

        Jakarta,
        {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}

        <br><br>

        Administrator

        <div class="space"></div>

        (................................)

    </div>

</body>

</html>