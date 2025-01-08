<!DOCTYPE html>
<html>

<head>
    <title>Logbook</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
        }

        .kop {
            text-align: center;
            margin-bottom: 20px;
        }

        .kop img {
            width: 80px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <div class="kop"><img src="data:image/png;base64,<?= base64_encode(file_get_contents(base_url('assets/images/logo-mini.png'))); ?>" alt="Logo">
        <h2>Laporan Logbook</h2>
    </div>
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
                    <td><?= $log->status == 3 ? 'Selesai' : 'Di Tolak'; ?></td>
                </tr><?php endforeach; ?></tbody>
    </table>
    <footer style="text-align: center; margin-top: 20px;">Laporan Logbook | <?= date('d-m-Y H:i:s'); ?></footer>
</body>

</html>