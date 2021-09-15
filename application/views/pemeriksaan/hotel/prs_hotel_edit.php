<section class="content-header">
  <h1>
    Pemeriksaan
    <b>Hotel</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Pemeriksaan</li>
    <li class="active">Hotel</li>
    <li class="active">Add</li>
  </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Pemeriksaan</h3>
            <div class="pull-right">
                <a href="<?= site_url('prs_hotel/cek/'.$prs->no_pws)?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="hidden" name="no_pws" id="no_pws" value="<?=$this->input->post('no_pws') ? $this->input->post('no_pws') : $prs->no_pws?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_htl" id="id_htl" value="<?=$this->input->post('id_htl') ? $this->input->post('id_htl') : $prs->id_htl?>">
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="date" name="periode" id="periode" value="<?=$this->input->post('periode') ? $this->input->post('periode') : $prs->periode?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="npwpd" id="npwpd" value="<?=$this->input->post('npwpd') ? $this->input->post('npwpd') : $prs->npwpd?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="pajak" id="pajak" value="<?=$this->input->post('pajak') ? $this->input->post('pajak') : $prs->pajak?>">
                    </div>
                    <div class="form-group">
                        <label for="omset_sptpd">Omset SPTPD</label>
                        <input type="number" name="omset_sptpd" id="omset_sptpd" value="<?=$this->input->post('omset_sptpd') ? $this->input->post('omset_sptpd') : $prs->omset_sptpd?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="omset_periksa">Omset Pemeriksaan</label>
                        <input type="number" name="omset_periksa" id="omset_periksa" value="<?=$this->input->post('omset_periksa') ? $this->input->post('omset_periksa') : $prs->omset_periksa?>" class="form-control" required>
                    </div>
                    <!-- button -->
                    <div class="button-group">
                        <button type="submit" class="btn btn-success btn-flat margin pull-right" name="submit">
                            <i class="fa fa-paper-plane"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-flat margin pull-right">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>