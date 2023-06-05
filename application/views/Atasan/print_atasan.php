<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    <style type="text/css" media="print">
        @media print {
            @page {
                size: landscape
            }
        }

        p {
            float: right;
        }
    </style>
</head>

<body>
    <div>
        <img src="<?= base_url('assets/dist/img/forApps/logo.png'); ?>" width="350" height="130" alt="">
        <p> <b>PT SIGAP PRIMA ASTREA</b>
            <br>Gedung Koperasi Astra :<br> Jl. Jenderal Ahmad Yani No. 66 <br> Cempaka Putih Timur <br>Jakarta Pusat 10510
        </p>
    </div>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>No.Polisi</th>
                <th>Tanggal Berangkat</th>
                <th>Bulan</th>
                <th>Nama User</th>
                <th>Departemen</th>
                <th>Nama Driver</th>
                <th>Tujuan</th>
                <th>Keperluan</th>
                <th>Km Awal</th>
                <th>Km Akhir</th>
                <th>Biaya GRAB</th>
                <th>Biaya Bensin</th>
                <th>Biaya Tol</th>
                <th>Biaya Parkir</th>
                <th>Biaya Tambal Ban</th>
                <th>Biaya Cuci Mobil</th>
                <th>Biaya Lain-lain</th>
                <th>Total Keseluruhan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($laporanatasan as $row) {
                if ($row->status == 'Done') { ?>
                    <tr>
                        <td><?= $i; ?>.</td>
                        <?php if ($row->id_mobil == '1') { ?>
                            <td>-</td>
                        <?php } else { ?>
                            <td><?php echo $row->nopolisi; ?></td>
                        <?php } ?>
                        <td><?php echo $row->berangkat; ?></td>
                        <td><?php echo $row->bulan_berangkat; ?></td>
                        <td><?php echo $row->createdby_name; ?></td>
                        <td><?php echo $row->dept; ?></td>
                        <?php if ($row->id_mobil == '1' || $row->driver == 'Tidak') { ?>
                            <td>-</td>
                        <?php } else { ?>
                            <td><?php echo $row->nama; ?></td>
                        <?php } ?>
                        <td><?php echo $row->tujuan; ?></td>
                        <td><?php echo $row->keperluan; ?></td>
                        <?php if ($row->id_mobil == '1') { ?>
                            <td>-</td>
                        <?php } else { ?>
                            <td><?php echo $row->km_berangkat; ?></td>
                        <?php } ?>
                        <td><?php echo $row->km_akhir; ?></td>
                        <td>
                            <?php echo $this->function->Rupiah($row->total_biaya_grab); ?>
                        </td>
                        <td>
                            <?php echo $this->function->Rupiah($row->total_biaya_bensin); ?>
                        </td>
                        <td>
                            <?php echo $this->function->Rupiah($row->total_biaya_tol); ?>
                        </td>
                        <td>
                            <?php echo $this->function->Rupiah($row->total_biaya_parkir); ?>
                        </td>
                        <td>
                            <?php echo $this->function->Rupiah($row->total_biaya_tambalban); ?>
                        </td>
                        <td>
                            <?php echo $this->function->Rupiah($row->total_biaya_cucimobil); ?>
                        </td>
                        <td>
                            <?php echo $this->function->Rupiah($row->total_biaya_lainlain); ?>
                        </td>
                        <td>
                            <?php echo $this->function->Rupiah($row->total_keseluruhan); ?>
                        </td>

                    </tr>
                    <?php $i++; ?>
            <?php }
            } ?>
        </tbody>

    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>