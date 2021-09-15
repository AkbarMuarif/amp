<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengawasan Hotel <?=$row->no_pws?></title>
    <style>
        td.atas{
            font-size:15px;
        }
        td.isi{
            font-size:14px;
            border:1px solid;
            padding: 8px;
        }
        th.isi{
            font-size:14px;
            border:1px solid;
            padding: 4px;
        }
        td.nom{
            font-size:12px;
            text-align:center;
            border:1px solid;
            padding: 2px;
        }
        table.isi{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div style="width: 95%; margin-left: auto; margin-right: auto;">
        <table width="100%">
            <tbody>
                <tr>
                    <td style="text-align:center">
                        <img src="uploads/dinas.png" alt="logo" width="110px" height="110px">
                    </td>
                    <td width="90%" style="text-align:center">
                        <p style="text-align:center; font-size:18px; line-height: 1em">PEMERINTAH KOTA BANJARMASIN</p>
                        <p style="text-align:center; font-size:24px; line-height: 1em"><b>BADAN KEUANGAN DAERAH</b></p>
                        <p style="text-align:center; font-size:15px; line-height: 1em">Jalan Pramuka Tirtha Dharma Komplek PDAM Bandarmasih No.17 RT 9 Banjarmasin</p>
                    </td>
                </tr>
            <tbody>
        </table>
        <hr style="margin-top: -3px;">
        <p style="text-align:right; line-height:0%; margin-top:20px">Banjarmasin, <?=date('d-m-Y')?>
        <p style="font-size:16px; line-height:70%"><b>FORM PENGAWASAN PAJAK HOTEL</b></p>
        <table>
            <tbody>
                <tr style="line-height:30%">
                    <td class="atas">NOMOR PENGAWASAN</td>
                    <td class="atas"> : </td>
                    <td class="atas"><?= $row->no_pws?></td>
                </tr>
                <tr>
                    <td class="atas">TANGGAL PENGAWASAN</td> 
                    <td class="atas"> : </td>
                    <td class="atas"><?= indo_date($row->tgl_pws)?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="100%" class="isi">
            <tr>
                <th class="isi" width="5%">NO.</th>
                <th class="isi">URAIAN</th>
                <th class="isi" colspan="2">KETERANGAN</th>
            </tr>
            <tr>
                <td class="nom">1</td>
                <td class="isi">NPWPD</td>
                <?php if($row->npwpd != null) {?>
                    <td class="isi" colspan="2"><?= $row->npwpd?></td>
                <?php } else { ?>
                    <td class="isi" colspan="2"> - </td>
                <?php } ?>
            </tr>
            <tr>
                <td class="nom">2</td>
                <td class="isi">Nama Wajib Pajak</td>
                <td class="isi" colspan="2"><?= ucwords($row->nama_wp)?></td>
            </tr>
            <tr>
                <td class="nom">3</td>
                <td class="isi">Izin</td>
                <td class="isi" colspan="2"><?= ucwords($row->izin)?></td>
            </tr>    
            <tr>
                <td class="nom">3</td>
                <td class="isi">Tarif Pajak <?=$row->pajak?>%</td>
                <td class="isi" colspan="2"><?=ucwords($row->tarif)?></td>
            </tr> 
            <tr>
                <td class="nom">4</td>
                <td class="isi">SPTPD</td>
                <?php if($row->sptpd != null) { ?>
                    <td class="isi" colspan="2"> Ada </td>
                <?php } else { ?>
                    <td class="isi" colspan="2"> Tidak Ada </td>
                <?php } ?>
            </tr>       
            <tr> 
                <td class="nom">5</td>
                <td class="isi">Rekap Penerimaan Bulanan ybs</td>  
                <td class="isi" colspan="2"><?= ucwords($row->rekap_terima)?></td>
            </tr>
            <tr>
                <td class="nom">6</td>
                <td class="isi">Rekap Penggunaan Bill/Bon</td>
                <td class="isi" colspan="2"><?= ucwords($row->rekap_bill)?></td>
            </tr>
            <tr>
                <td class="nom">7</td>
                <td class="isi">SSPD</td>
                <?php if($row->sspd != null) { ?>
                    <td class="isi" colspan="2"> Ada </td>
                <?php } else { ?>
                    <td class="isi" colspan="2"> Tidak Ada </td>
                <?php } ?>
            </tr>
            <tr>
                <td class="nom">8</td>
                <td class="isi">Bill/Bon Penjualan</td>
                <td class="isi" colspan="2"><?= ucwords($row->bill)?></td>
            </tr>
            <tr>
                <td class="nom" rowspan="4">9</td>
                <td class="isi" rowspan="4">Jenis Pembayaran</td>
                <td class="isi">Uang Kontan (Cash)</td>
                <td class="isi"><?= ucwords($row->cash)?></td>
            </tr>
            <tr>
                <td class="isi">Kartu Debit/Kredit (EDC)</td>
                <td class="isi"><?= ucwords($row->edc)?></td>
            </tr>
            <tr>
                <td class="isi">E-Money</td>
                <td class="isi"><?= ucwords($row->emoney)?></td>
            </tr> 
            <tr>
                <td class="isi">Online Travel Agent (OTA)</td>
                <td class="isi"><?= ucwords($row->ota)?></td>
            </tr>
            <tr>
                <td class="nom">10</td>
                <td class="isi">Tanggal Bayar Terakhir</td>
                <td class="isi" colspan="2"><?= indo_date($row->tgl_bayar)?></td>
            </tr>
            <tr>
                <td class="nom">11</td>
                <td class="isi">Keterangan</td>
                <td class="isi" colspan="2"><?=$row->ket?></td>
            </tr>
        </table>
        <br><br>
        <table width="100%" style="text-align:center">
            <tr>
                <td style="padding:30px">
                    TANDA TANGAN DAN CAP
                    <br><br><br><br><br>
                    <hr>
                </td>
                <td style="padding:30px">
                    TANDA TANGAN PETUGAS PEMERIKSA
                    <br><br><br><br><br>
                    <hr>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>