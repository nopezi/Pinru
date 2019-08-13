<?php $this->load->view('header'); ?>

<div class="body">
    <div class="container-fluid mb-4" style="margin-top:65px">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header info-color"><p class="h6 white-text text-center">Input Pinjaman</p></div>
                    <div class="card-body">
                        <a class="btn btn-white btn-sm" href="<?=base_url()?>"><i class="fas fa-arrow-left"></i></a>
                        <?php if(!empty($pesan_error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?=$pesan_error;?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($data_ruangan)): ?>
                        <form action="<?=base_url()?>/home/pinjam?key=nasi&id_ruangan=<?=$data_ruangan['id_ruangan']?>" class="form" method="POST">
                            <input type="hidden" id="materialRegisterFormEmail" class="form-control">
                            <div class="form-row">
                                <div class="col-12 col-md-6">
                                    <?php //print_r($data_ruangan); ?>
                                    <input type="hidden" name="id_ruangan" value="<?=$data_ruangan['id_ruangan']?>">
                                    <!-- First name -->
                                    <div class="md-form">
                                        <input name="nama_peminjam" type="text" id="materialRegisterFormFirstName" class="form-control" required>
                                        <label for="materialRegisterFormFirstName">Name</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- Last name -->
                                    <div class="md-form">
                                        <input type="number" name="jumlah_orang" id="numberExample" class="form-control" required>
                                        <label for="NumberExample">Jumlah Orang</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row md-form mt-0">
                                <div class="col">
                                    <input type="text" name="kegiatan" id="materialRegisterFormEmail" class="form-control" required>
                                    <label for="materialRegisterFormEmail">Kegiatan</label>
                                </div>
                            </div>
                            <div class="form-row md-form">
                                <div class="col">
                                    <input placeholder="Selected date" name="tanggal" type="text" id="date-picker-example" class="form-control datepicker" required>
                                    <label for="date-picker-example">Tanggal Pinjam</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="md-form">
                                    <input type="text" name="waktu_mulai" id="manual-operations-input" class="form-control" placeholder="Start" required>
                                        <label for="input_starttime">waktu mulai</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form">
                                        <input type="text" name="waktu_selesai" id="manual-operations-input2" class="form-control" placeholder="End" required>
                                        <label for="input_starttime">waktu selesai</label>
                                    </div>
                                </div>
                            </div>
                            <label for="">kebutuhan</label>
                            <div class="form-row md-form">
                                <!-- <div class="col col-md-4">
                                    <div class="md-form">
                                        <input class="form-check-input" name="kebutuhan[]" type="checkbox" id="inlineFormCheckMD" value="Snack">
                                        <label class="form-check-label" for="inlineFormCheckMD">Snack Basah</label>
                                        <input class="form-check-input" name="kebutuhan[]" type="checkbox" id="inlineFormCheckMD2" value="Kletikan">
                                        <label class="form-check-label" for="inlineFormCheckMD2">Snack Kering</label>
                                        <input class="form-check-input" name="kebutuhan[]" type="checkbox" id="inlineFormCheckMD3" value="Lunch">
                                        <label class="form-check-label" for="inlineFormCheckMD3">Lunch</label>
                                        <input class="form-check-input" name="kebutuhan[]" type="checkbox" id="materialUnchecked" value="Minum">
                                        <label class="form-check-label" for="materialUnchecked">Minum</label>
                                    </div>
                                </div> -->
                                <div class="col-6 col-md-4">
                                    <div class="md-form">
                                        <input class="form-check-input" name="kebutuhan[]" type="checkbox" id="inlineFormCheckMD3" value="Snack Basah">
                                        <label class="form-check-label" for="inlineFormCheckMD3">Snack Basah</label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="md-form">
                                        <input class="form-check-input" name="kebutuhan[]" type="checkbox" id="inlineFormCheckMD2" value="Snack Kering">
                                        <label class="form-check-label" for="inlineFormCheckMD2">Snack Kering</label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="md-form">
                                        <input class="form-check-input" name="kebutuhan[]" type="checkbox" id="inlineFormCheckMD1" value="Lunch">
                                        <label class="form-check-label" for="inlineFormCheckMD1">Lunch</label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="md-form">
                                        <input class="form-check-input" name="kebutuhan[]" type="checkbox" id="materialUnchecked4" value="Minum">
                                        <label class="form-check-label" for="materialUnchecked4">Minum</label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="md-form">
                                        <input class="form-check-input" name="kebutuhan[]" type="checkbox" id="materialUnchecked" value="Minum">
                                        <label class="form-check-label" for="materialUnchecked">Buah</label>
                                    </div>
                                </div>
                            </div>
                            <p>Note :</p>
                            <div class="form-row md-form">
                                <div class="col-12 col-md-7 card-text">Meeting 1 - 2 jam</div>
                                <div class="col-12 col-md-5 card-text text-info">Kletikan (Snack kering)</div>
                                <div class="col-12 col-md-7 card-text">Meeting Lebih Dari 2 Jam</div>
                                <div class="col-12 col-md-5 card-text text-info">Snack Basah</div>
                                <div class="col-12 col-md-7 card-text">Meeting Pagi Melebihi Jam Makan Siang</div>
                                <div class="col-12 col-md-5 card-text text-info">Snack Basah dan Lunch</div>
                                <div class="col-12 col-md-7 card-text">Fullday  Meeting</div>
                                <div class="col-12 col-md-5 card-text text-info">Snack Basah, Lunch dan Buah</div>
                                <div class="col-12 col-md-7 card-text">Booking maksimal jam 16:00 WIB agar bisa disiapkan snack</div>
                            </div>
                            <div class="md-form mt-0 mr-3">
                                <button type="submit" name="tampil" class="btn btn-info col-md-12">Save</button>
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center mt-4">
            <div class="col-md-6">
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingOne1">
                        <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                            aria-controls="collapseOne1">
                            <h4 class="mb-0 text-black-50 text-center"><i class="fas fa-info-circle"></i> <b>Meeting Rule</b><i class="fas fa-angle-down rotate-icon"></i></h4>
                        </a>
                        </div>
                        <!-- Card body -->
                        <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                            <div class="card-body text-black-50">
                                <!-- <?//=//$peraturan[0]->rule?> -->
                                <p class="h6"><i class="fas fa-clock"></i> Tepat Waktu</p>
                                <p class="h6"><i class="fas fa-users"></i> Mulai dengan Wise dan Foqual Contact</p>
                                <p class="h6"><i class="fas fa-chair"></i> Rapihkan Meja dan Kursi</p>
                                <p class="h6 text-left"><i class="fas fa-broom"></i> Bersihkan Meja & Buanglah sampah pada tempatnya</p>
                                <p class="h6"><i class="fas fa-power-off"></i> Matikan Lampu, AC dan LCD / Monitor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('footer'); ?>
<?php if(!empty($berhasil)): ?>
<script>
swal("Success", "Data telah di simpan", "success").then(function() {
    window.location = "<?=base_url()?>";
});
</script>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function(){
 
 // Data Picker Initialization
 $('.datepicker').pickadate();
    var input = $('#manual-operations-input').pickatime({
        autoclose: true,
        'default': 'now'
    });

    var input = $('#manual-operations-input2').pickatime({
        autoclose: true,
        'default': 'now'
    });
    $('.mdb-select').materialSelect();    
    // CKEDITOR.replace('peraturan');

});
</script>  