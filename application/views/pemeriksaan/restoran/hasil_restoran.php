<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemeriksaan Restoran</title>
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
        <p style="font-size:16px; line-height:70%"><b>HASIL PEMERIKSAAN PAJAK RESTORAN</b></p>
        <table>
            <tbody>
                <tr style="line-height:30%">
                    <td>NOMOR PENGAWASAN</td>
                    <td> : </td>
                    <td><?=$row->row()->no_pws?></td>
                </tr>
                <tr>
                    <td>TANGGAL PENGAWASAN</td> 
                    <td> : </td>
                    <td><?=indo_date($row->row()->tgl_pws)?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table border="1" cellspacing="0" cellpadding="2" width="100%" style="font-size: 12px">
            <tr style="text-align:right; background-color:#FCFDAF">
                <th>#</th>
                <th>periode</th>
                <th>Omset SPTPD</th>
                <th>Omset Periksa</th>
                <th>Omset Kurang</th>
                <th>Pajak Kurang</th>
                <th>Denda</th>
                <th>Total Bayar</th>
            </tr>
            <?php $no=1;
            $subtotal_os = $subtotal_op = $subtotal_okur = $subtotal_pkur = $subtotal_denda = $subtotal_total = 0;
            foreach($row->result() as $key => $data) { 
                $subtotal_os += $data->omset_sptpd;
                $subtotal_op += $data->omset_periksa;
                $subtotal_okur += $data->omset_kurang;
                $subtotal_pkur += $data->pajak_kurang;
                $subtotal_denda += $data->denda;
                $subtotal_total += $data->total;     
            ?>
            <tr style="text-align:right">
                <td style="text-align:center"><?= $no++?></td>
                <td style="text-align:center"><?= indo_date($data->periode)?></td>
                <td><?= rupiah($data->omset_sptpd)?></td>
                <td><?= rupiah($data->omset_periksa)?></td>
                <td><?= rupiah($data->omset_kurang)?></td>
                <td><?= rupiah($data->pajak_kurang)?></td>
                <td><?= rupiah($data->denda)?></td>
                <td><?= rupiah($data->total)?></td>
            </tr>
            <?php } ?>
            <tr style="text-align:right; background-color:teal">
                    <td style="text-align:center">#</td>
                    <td style="text-align:center">TOTAL</td>
                    <td class="right"><?=rupiah($subtotal_os)?></td>
                    <td class="right"><?=rupiah($subtotal_op)?></td>
                    <td class="right"><?=rupiah($subtotal_okur)?></td>
                    <td class="right"><?=rupiah($subtotal_pkur)?></td>
                    <td class="right"><?=rupiah($subtotal_denda)?></td>
                    <td class="right"><?=rupiah($subtotal_total)?></td>
                </tr>
        </table>
        <br>
        <table width="100%" style="text-align:center">
            <tr>
                <td width="75%"></td>
                <td style="padding:30px">
                    <p style="text-align:center">Banjarmasin, <?=date('d-m-Y')?><p>
                    <br>
                    Petugas Pemeriksa
                    <br><br><br><br><br>
                    <hr>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>