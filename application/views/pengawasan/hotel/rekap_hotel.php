<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Hasil Pengawasan Hotel</title>
</head>
<body>
    <div style="width: 100%; margin-left:-5px ; margin-right:-5px">
        <table width="100%">
            <tbody>
                <tr>
                    <td width="20%"></td>
                    <td style="text-align:center">
                        <img src="uploads/dinas.png" alt="logo" width="90px" height="90px">
                    </td>
                    <td width="50%" style="text-align:center">
                        <p style="text-align:center; font-size:16px; line-height: 0.5em">PEMERINTAH KOTA BANJARMASIN</p>
                        <p style="text-align:center; font-size:22px; line-height: 1em"><b>BADAN KEUANGAN DAERAH</b></p>
                        <p style="text-align:center; font-size:14px; line-height: 1em">Jalan Pramuka Tirtha Dharma Komplek PDAM Bandarmasih No.17 RT 9 Banjarmasin</p>
                    </td>
                    <td width="20%"></td>
                </tr>
            <tbody>
        </table>
        <hr style="margin-top: -3px;">
        <p style="font-size:16px; line-height:70%"><b>REKAP PENGAWASAN PAJAK HOTEL</b></p>
        <?php if($awal&&$akhir!=null){ ?>
            <p style="font-size:12px; line-height:70%">Periode : <?=indo_date($awal)?> - <?=indo_date($akhir)?></p>
        <?php } ?>
        <table border="1" cellspacing="0" cellpadding="2" width="100%" style="font-size: 12px">
            <tr style="background-color:#FCFDAF">
                <th>#</th>
                <th>No Pengawasan</th>
                <th>Tanggal</th>
                <th>NPWPD</th>
                <th>Nama WP</th>
                <th>Izin</th>
                <th>Tarif Pajak</th>
                <th>SPTPD</th>
                <th>Rekap Terima</th>
                <th>Rekap Guna Bill</th>
                <th>SSPD</th>
                <th>Bill/Bon</th>
                <th>Tanggal Bayar</th>
                <th>Keterangan</th>
            </tr>
            <?php $no=1; 
            foreach($row->result() as $key => $data) { ?>
                <tr style="text-align:center">
                    <td><?= $no++?></td>
                    <td><?= $data->no_pws?></td>
                    <td><?= indo_date($data->tgl_pws)?></td>
                    <td><?= $data->npwpd?></td>
                    <td><?= ucwords($data->nama_wp)?></td>
                    <td><?= ucwords($data->izin)?></td>
                    <td><?= ucwords($data->tarif)?></td>
                    <?php if($data->sptpd != null) { ?>
                        <td> Ada </td>
                    <?php } else { ?>
                        <td> Tidak Ada </td>
                    <?php } ?>
                    <td><?= ucwords($data->rekap_terima)?></td>
                    <td><?= ucwords($data->rekap_bill)?></td>
                    <?php if($data->sspd != null) { ?>
                        <td> Ada </td>
                    <?php } else { ?>
                        <td> Tidak Ada </td>
                    <?php } ?>
                    <td><?= ucwords($data->bill)?></td>
                    <td><?= indo_date($data->tgl_bayar)?></td>
                    <td><?= $data->ket?></td>
                </tr>
            <?php } ?>
        </table>
        <p style="text-align:right; font-size:12px"><i>Dicetak tanggal : <?=date('d-m-Y')?></i></p>
    </div>
    <div>
        <table width="100%" style="text-align:center">
            <tr>
                <td width="68%">
                </td>
                <td style="padding:30px">
                    <p>Tim Pemeriksa Pajak</p>
                    <p>Ketua</p>
                    <br><br><br>
                    <p><u>H. SUBHAN NOR YAUMIL ,SE, M.Si</u>
                    <b>NIP. 19710421 199803 1 009</b></p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>