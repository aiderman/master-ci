<!DOCTYPE html>
<html>

<head>
    <title>Logbook</title>
    <style>
        @page {
            size: 11in 8.5in;
            margin: 0.5in;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #fff;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 26px;
            text-align: center;
            margin-bottom: 30px;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            table-layout: fixed;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
            color: #333;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 10px;
            word-wrap: break-word;
            max-width: 120px;
        }

        td {
            font-size: 12px;
            color: #555;
            word-wrap: break-word;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        tbody {
            page-break-inside: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perawat</th>
                <th>Tanggal</th>
                <th>PK</th>
                <th>Nama Kewenangan</th>
                <th>No Rekam Medis</th>
                <th>Tindakan Keperawatan</th>
                <th>Nilai</th>
                <th>Piket</th>
                <th>Ruangan</th>
                <th>Status</th>
                <th>karu</th>
                <th>karo</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody><?php $no = 1;
                foreach ($logbook as $log): ?><tr>
                    <td><?= $no++; ?></td>
                    <td><?= $log->nama_perawat; ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($log->tanggal)); ?></td>
                    <td><?= $log->PK; ?></td>
                    <td><?= $log->nama_kewenangan; ?></td>
                    <td><?= $log->no_rekam_medis; ?></td>
                    <td><?= $log->tindakan_keperawatan; ?></td>
                    <td><?= $log->nilai; ?></td>
                    <td><?= $log->piket; ?></td>
                    <td><?= $log->ruangan_logbook; ?></td>
                    <td><?= $log->status == 1 ? 'Selesai' : 'Belum Selesai'; ?></td>
                    <td><?= $log->status == 3 ? '✔' : '✘'; ?></td>
                    <td><?= $log->status == 3 ? '✔' : '✘'; ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($log->created)); ?></td>
                </tr><?php endforeach; ?></tbody>
    </table>
    <footer>laporan Logbook | <?= date('d-m-Y H:i:s'); ?></footer>
</body>

</html>