<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengawasan Reklame <?=$row->no_pws?></title>
    <style>
        td.atas{
            font-size:15px;
        }
        td.isi{
            font-size:14px;
            border:1px solid;
            padding: 10px;
        }
        th.isi{
            font-size:14px;
            border:1px solid;
            padding: 6px;
        }
        td.nom{
            font-size:12px;
            text-align:center;
            border:1px solid;
            padding: 3px;
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
        <p style="font-size:16px; line-height:70%"><b>SURAT PENGAWASAN PAJAK REKLAME</b></p>
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
                <td class="isi">Nama Penyelenggara</td>
                <td class="isi" colspan="2"><?= ucwords($row->nama_p)?></td>
            </tr>
            <tr>
                <td class="nom">3</td>
                <td class="isi">Alamat Penyelenggara</td>
                <td class="isi" colspan="2"><?= ucwords($row->alamat_p)?></td>
            </tr>    
            <tr>
                <td class="nom">3</td>
                <td class="isi">Nomor Telepon Penyelenggara</td>
                <td class="isi" colspan="2"><?=$row->no_telp_p?></td>
            </tr> 
            <tr>
                <td class="nom">4</td>
                <td class="isi">Tempat Penyelenggaraan Acara</td>
                <td class="isi" colspan="2"><?= ucwords($row->tempat)?></td>
            </tr>       
            <tr> 
                <td class="nom" rowspan="6">5</td>
                <td class="isi" rowspan="6">Tanda Masuk</td>
                <td class="isi">Telah Disahkan (PORPORASI) Pemko Banjarmasin</td>
                <td class="isi"><?= ucwords($row->sah)?></td>
            </tr>
            <tr>
                <td class="isi">Tertera Harga Tanda Masuk (HTM)</td>
                <td class="isi"><?= ucwords($row->harga)?></td>
            </tr>
            <tr>
                <td class="isi">Tertera Nomor Seri / Nomor Urut</td>
                <td class="isi"><?= ucwords($row->seri)?></td>
            </tr>
            <tr>
                <td class="isi">Dilakukan Penyobekan di Bagian Tertentu</td>
                <td class="isi"><?= ucwords($row->sobek)?></td>
            </tr>
            <tr>
                <td class="isi">Menyimpan Bagian / Sobekan Tersebut</td>
                <td class="isi"><?= ucwords($row->simpan)?></td>
            </tr>
            <tr>
                <td class="isi">Dibuat Laporan Penjualan</td>
                <td class="isi"><?= ucwords($row->lapor)?></td>
            </tr>
            <tr>
                <td class="nom">6</td>
                <td class="isi">Tanggal Bayar</td>
                <td class="isi" colspan="2"><?= indo_date($row->tgl_bayar)?></td>
            </tr>
            <tr>
                <td class="nom">5</td>
                <td class="isi">Keterangan</td>
                <td class="isi" colspan="2"><?= ucwords($row->ket)?></td>
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