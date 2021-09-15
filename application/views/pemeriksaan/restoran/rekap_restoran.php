<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Hasil Pemeriksaan Restoran</title>
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
        <p style="font-size:16px; line-height:70%"><b>REKAP PEMERIKSAAN PAJAK RESTORAN</b></p>
        <?php if($awal&&$akhir!=null){ ?>
            <p style="font-size:12px; line-height:70%">Periode : <?=indo_date($awal)?> - <?=indo_date($akhir)?></p>
        <?php } ?>
        <table border="1" cellspacing="0" cellpadding="2" width="100%" style="font-size: 12px">
            <tr style="background-color:#FCFDAF">
                <!-- <th>#</th>
                <th>No Pengawasan</th>
                <th>Diperiksa Tanggal</th>
                <th>NPWPD</th>
                <th>Nama WP</th> -->
                <!-- <th>Alamat</th> -->
                <th>NO</th>
                <th>Periode</th>
                <th>Omset SPTPD</th>
                <th>Omset Pemeriksaan</th>
                <th>Omset Kurang</th>
                <th>Pajak Kurang</th>
                <th>Denda</th>
                <th>Total</th>
            </tr>            
                <?php 
                $no=0;
                $subtotal_os = $subtotal_op = $subtotal_okur = $subtotal_pkur = $subtotal_denda = $subtotal_total = 0;
                foreach($row as $key => $data) { 
                    $subtotal_os += $data->omset_sptpd;
                    $subtotal_op += $data->omset_periksa;
                    $subtotal_okur += $data->omset_kurang;
                    $subtotal_pkur += $data->pajak_kurang;
                    $subtotal_denda += $data->denda;
                    $subtotal_total += $data->total; 
                    if($no==0){   
                ?>
                    <tr style="text-align:center">
                        <td colspan="8"><b>Pengawasan Nomor <?=$data->no_pws?> ,  Diperiksa tanggal <?=indo_date($data->dibuat)?></b></td>
                    </tr>
                    <tr style="text-align:center"> 
                        <td colspan="8"><b>Wajib Pajak <?=ucwords($data->nama_wp)?> dengan NPWPD <?=$data->npwpd?></b></td>
                    </tr>
                    <?php $no++; } ?>
                <tr style="text-align:center">
                    <td><?= $no++?></td>
                    <td><?= indo_date($data->periode)?></td>
                    <td><?= rupiah($data->omset_sptpd)?></td>
                    <td><?= rupiah($data->omset_periksa)?></td>
                    <td><?= rupiah($data->pajak_kurang)?></td>
                    <td><?= rupiah($data->pajak_kurang)?></td>
                    <td><?= rupiah($data->denda)?></td>
                    <td><?= rupiah($data->total)?></td>
                </tr>
                <?php if($no==7){ ?>
                <tr style="text-align:center; background-color:teal">
                    <td>#</td>
                    <td>SUB TOTAL</td>
                    <td class="right"><?=rupiah($subtotal_os)?></td>
                    <td class="right"><?=rupiah($subtotal_op)?></td>
                    <td class="right"><?=rupiah($subtotal_okur)?></td>
                    <td class="right"><?=rupiah($subtotal_pkur)?></td>
                    <td class="right"><?=rupiah($subtotal_denda)?></td>
                    <td class="right"><?=rupiah($subtotal_total)?></td>
                </tr>
                <?php 
                $no=0; 
                $subtotal_os = 0;
                $subtotal_op = 0;
                $subtotal_okur = 0;
                $subtotal_pkur = 0;
                $subtotal_denda = 0;
                $subtotal_total = 0;
                } ?>
                <?php } ?>
                <br>
        </table>
        <p style="text-align:right; font-size:12px"><i>Dicetak tanggal : <?=date('d-m-Y')?></i></p>
        <table width="100%" style="text-align:center">
            <tr>
                <td width="68%">
                </td>
                <td style="padding:30px">
                    <p>Tim Pemeriksa Pajak</p>
                    <p>Ketua</p>
                    <br><br>
                    <p><u>H. SUBHAN NOR YAUMIL ,SE, M.Si</u>
                    <b>NIP. 19710421 199803 1 009</b></p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>