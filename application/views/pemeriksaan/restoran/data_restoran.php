<section class="content-header">
  <h1>
    Pemeriksaan
    <b>Restoran</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Pemeriksaan</li>
    <li class="active">Restoran</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pemeriksaan Pajak Restoran Nomor : <?= $prs2->no_pws?></h3>
            <div class="pull-right">
                <a href="<?= site_url('prs_restoran')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <?php $this->view('pesan')?>
            <table class="table table-bordered table-striped" style="width:90%" align="center">
                <thead>
                    <th>#</th>
                    <th>periode</th>
                    <th>Omset SPTPD</th>
                    <th>Omset Periksa</th>
                    <th>Omset Kurang</th>
                    <th>Pajak Kurang</th>
                    <th>Denda</th>
                    <th>Total</th>
                    <th class="text-center" width="150px">Actions</th>
                </thead>
                <tbody>
                    <?php $no=1;
                    $subtotal_os = $subtotal_op = $subtotal_okur = $subtotal_pkur = $subtotal_denda = $subtotal_total = 0;
                    foreach($prs as $key => $data) { 
                        $subtotal_os += $data->omset_sptpd;
                        $subtotal_op += $data->omset_periksa;
                        $subtotal_okur += $data->omset_kurang;
                        $subtotal_pkur += $data->pajak_kurang;
                        $subtotal_denda += $data->denda;
                        $subtotal_total += $data->total;
                    ?>
                    <tr>
                        <td style="text-align:center"><?= $no++?></td>
                        <td style="text-align:center"><?= indo_date($data->periode)?></td>
                        <td style="text-align:right"><?= rupiah($data->omset_sptpd)?></td>
                        <td style="text-align:right"><?= rupiah($data->omset_periksa)?></td>
                        <td style="text-align:right"><?= rupiah($data->omset_kurang)?></td>
                        <td style="text-align:right"><?= rupiah($data->pajak_kurang)?></td>
                        <td style="text-align:right"><?= rupiah($data->denda)?></td>
                        <td style="text-align:right"><?= rupiah($data->total)?></td>
                        <td class="text-center">
                            <a href="<?= site_url('prs_restoran/edit/'.$data->id_rst)?>" class="btn btn-info btn-sm">
                                <i class="fa fa-pencil"></i> Update
                            </a> 
                        </td>
                    </tr>
                    <?php } ?>
                    <tr style="text-align:right; background-color:#FCFDAF">
                        <td style="text-align:center">#</td>
                        <td style="text-align:center">TOTAL</td>
                        <td style="text-align:right"><?=rupiah($subtotal_os)?></td>
                        <td style="text-align:right"><?=rupiah($subtotal_op)?></td>
                        <td style="text-align:right"><?=rupiah($subtotal_okur)?></td>
                        <td style="text-align:right"><?=rupiah($subtotal_pkur)?></td>
                        <td style="text-align:right"><?=rupiah($subtotal_denda)?></td>
                        <td style="text-align:right"><?=rupiah($subtotal_total)?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="box-body">
            <div class="pull-right">
                <a href="<?= site_url('prs_restoran/hasil/'.$data->no_pws)?>" target="blank" class="btn bg-green btn-flat">
                    <i class="fa fa-print"></i> CETAK
                </a>
            </div>
        </div>
    </div>
</section>