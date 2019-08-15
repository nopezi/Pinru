<div class="row mt-4 justify-content-md-center">
        <div class="col-md-12">
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingOne1">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                        aria-controls="collapseOne1">
                        <h5 class="mb-0">Data Peminjam<i class="fas fa-angle-down rotate-icon"></i></h5>
                    </a>
                    </div>
                    <!-- Card body -->
                    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                        <div class="card-body">
                            <a class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#tambahPinjaman"><b><i class="fas fa-plus"></i></b></a>
                            <table id="dtHorizontalExample" class="table table-hover table-sm table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Pemesan</th>
                                        <th>Ruangan</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Kegiatan</th>
                                        <th>Waktu</th>
                                        <!-- <th>Selesai</th> -->
                                        <th>Jumlah Tamu</th>
                                        <th>Kebutuhan</th>
                                        <th>Setting</th>
                                    </tr>
                                </thead>
                                <tbody id="tampil_peminjam">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal tambah pinjam ruangan -->
    <div class="modal fade" id="tambahPinjaman" tabindex="1" role="dialog" arial-labelledby="modaledit">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="myModalLabel">Tambah data Peminjam</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_pinjam" name="formPeminjam">
                        <p id="tampil_error"></p>
                        <div class="form-row md-form">
                            <div class="col-6 col-md-6">
                                <label for="nama_peminjam">nama peminjam</label>
                                <input type="text" name="nama_peminjam" class="form-control" id="nama_peminjam" required>
                            </div>
                            <div class="col-6 col-md-6">
                                <select name="id_ruangan" id="" class="mdb-select colorful-select dropdown-primary" required>
                                    <option value="" disabled selected>Pilih Ruangan</option>
                                    <?php foreach($ruangan as $list_ruangan): ?>
                                    <option value="<?=$list_ruangan->id_ruangan?>"><?=$list_ruangan->nama_ruangan?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <label class="mdb-main-label">Ruangan</label> -->
                            </div>
                        </div>
                        <div class="form-row md-form">
                            <div class="col-6 col-md-6">
                            <input name="tanggal" placeholder="Tanggal Pinjam" type="text" id="date-picker-example" class="form-control datepicker" required>
                            <!-- <label for="date-picker-example">Tanggal Pinjam</label> -->
                            </div>
                            <div class="col-6 col-md-6">
                                <label for="jumlahorang">Jumlah Tamu</label>
                                <input type="number" class="form-control" name="jumlah_orang" id="jumlahorang">
                            </div>
                        </div>
                        <div class="form-row md-form">
                            <div class="col-6 col-md-6">
                                <input name="waktu_mulai" type="text" id="manual-operations-input" class="form-control" placeholder="Mulai" required>
                            </div>
                            <div class="col-6 col-md-6">
                                <input name="waktu_selesai" type="text" id="manual-operations-input2" class="form-control" placeholder="Selesai" required>
                            </div>
                        </div>
                        <div class="form-row md-form">
                            <div class="col col-md-12">
                                <label for="kegiatan">Kegiatan</label>
                                <input type="text" name="kegiatan" id="kegiatan" class="form-control" required>
                            </div>
                        </div>
                        <label for="">Kebutuhan</label>
                        <div class="form-row">
                            <div class="col-4">
                                <div class="md-form">
                                    <input name="kebutuhan" class="get_value form-check-input" type="checkbox" id="inlineFormCheckMD" value="Snack Kering">
                                    <label class="form-check-label" for="inlineFormCheckMD">Snack Kering</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="md-form">
                                    <input name="kebutuhan" class="get_value form-check-input" type="checkbox" id="inlineFormCheckMD2" value="Snack Basah">
                                    <label class="form-check-label" for="inlineFormCheckMD2">Snack Basah</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="md-form">
                                    <input name="kebutuhan" class="get_value form-check-input" type="checkbox" id="inlineFormCheckMD3" value="Lunch">
                                    <label class="form-check-label" for="inlineFormCheckMD3">Lunch</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="md-form">
                                    <input name="kebutuhan" class="get_value form-check-input" type="checkbox" id="inlineFormCheckMD4" value="Minum">
                                    <label class="form-check-label" for="inlineFormCheckMD4">Minum</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="md-form">
                                    <input name="kebutuhan" class="get_value form-check-input" type="checkbox" id="inlineFormCheckMD5" value="Buah">
                                    <label class="form-check-label" for="inlineFormCheckMD5">Buah</label>
                                </div>
                            </div>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" id="simpan" class="btn btn-info btn-sm">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal tambah pinjam peminjaman -->
<?php foreach($peminjaman as $data_hapus_peminjaman): ?>    
    <!-- modal hapus pinjam peminjaman -->
    <div class="modal fade" id="hapusPinjaman<?=$data_hapus_peminjaman->id_booking?>" tabindex="1" role="dialog" arial-labelledby="modaledit">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-info hapus_pinjaman" id="<?=$data_hapus_peminjaman->id_booking?>">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal hapus pinjam peminjaman -->
<?php endforeach; ?>

<?php foreach($peminjaman as $data_peminjaman): ?>
    <!-- modal edit pinjam peminjaman -->
    <div class="modal fade" id="editPinjaman<?php echo $data_peminjaman->id_booking; ?>" tabindex="1" role="dialog" arial-labelledby="modaledit">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="myModalLabel">Ubah data Peminjam <?php $kebutuhan = strtolower(str_replace(",", "", $data_peminjaman->kebutuhan));?></p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_edit_pinjaman" action="<?=base_url()?>/admin/edit_pinjaman" method="post">
                        <div class="form-row md-form">
                            <div class="col-6 col-md-6">
                                <input type="hidden" name="id_peminjam" value="<?=$data_peminjaman->id_booking?>">
                                <input type="text" name="nama_peminjam" class="form-control" id="defaultRegisterFormFirstName" value="<?=$data_peminjaman->nama_peminjam?>" required>
                                <label for="defaultRegisterFormFirstName">Nama Peminjam</label>
                            </div>
                            <div class="col-6 col-md-6">
                                <label for="jumlahorang">jumlah tamu</label>
                                <input type="number" class="form-control" name="jumlah_orang" id="jumlahorang" value="<?=$data_peminjaman->jumlah_orang?>">
                            </div>
                        </div>
                        <div class="form-row md-form">
                            <div class="col-6 col-md-6">
                            <input name="tanggal" placeholder="Tanggal Pinjam" type="text" id="date-picker-example" class="form-control datepicker" value="<?=$data_peminjaman->tanggal?>" required>
                            <!-- <label for="date-picker-example">Tanggal Pinjam</label> -->
                            </div>
                            <div class="col-6 col-md-6">
                                <select name="ruangan" id="" class="mdb-select colorful-select dropdown-primary" required>
                                    <option value="<?=$data_peminjaman->id_ruangan?>" selected><?=$data_peminjaman->nama_ruangan?></option>
                                    <?php foreach($ruangan as $list_ruangan): ?>
                                    <option value="<?=$list_ruangan->id_ruangan?>"><?=$list_ruangan->nama_ruangan?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <label class="mdb-main-label">Ruangan</label> testing -->
                            </div>
                        </div>
                        <div class="form-row md-form">
                            <div class="col-6 col-md-6">
                                <input name="waktu_mulai" type="text" id="manual-operations-input3<?php echo $data_peminjaman->id_booking; ?>" class="form-control timepicker" value="<?php echo $data_peminjaman->waktu_mulai; ?>">
                                <label for="manual-operations-input3<?php echo $data_peminjaman->id_booking; ?>">Waktu Mulai</label>
                            </div>
                            <div class="col-6 col-md-6">
                                <input name="waktu_selesai" type="text" id="manual-operations-input4<?php echo $data_peminjaman->id_booking; ?>" class="form-control" value="<?php echo $data_peminjaman->waktu_selesai; ?>">
                                <label for="manual-operations-input4<?php echo $data_peminjaman->id_booking; ?>">Waktu Selesai</label>
                            </div>
                        </div>
                        <div class="form-row md-form">
                            <div class="col col-md-12">
                                <label for="kegiatan">Kegiatan</label>
                                <input type="text" name="kegiatan" id="kegiatan" class="form-control" value="<?=$data_peminjaman->kegiatan?>" required>
                            </div>
                        </div>
                        <label for="">Kebutuhan</label>
                        <?php
                        $check = "";
                        $check2 = "";
                        $check3 = "";
                        $check4 = "";
                        $check5 = "";

                        if($kebutuhan == "snack," || (strstr($kebutuhan, "snack basah"))){ 
                            $check = "checked";
                            $nama_kebutuhan = "Snack Basah";    
                        }

                        if((strstr($kebutuhan, "kletikan")) || (strstr($kebutuhan, "snack kering"))){
                            $check2 = "checked";
                            $nama_kebutuhan2 = "Snack Kering";
                        }
                        
                        if(strstr($kebutuhan, "lunch")){
                            $check3 = "checked";
                            $nama_kebutuhan3 = "Lunch";
                        }

                        if(strstr($kebutuhan, "minum")){
                            $check4 = "checked";
                            $nama_kebutuhan4 = "Minum";
                        }

                        if(strstr($kebutuhan, "buah")){
                            $check5 = "checked";
                            $nama_kebutuhan5 = "Buah";
                        }
                        
                        ?>
                        <div class="form-row">
                            <div class="col-4">
                                <div class="md-form">
                                    <input name="kebutuhan[]" class="form-check-input" type="checkbox" id="inlineFormCheckMDedit<?php echo $data_peminjaman->id_booking; ?>" value="Snack Basah" <?=$check?>>
                                    <label class="form-check-label" for="inlineFormCheckMDedit<?php echo $data_peminjaman->id_booking; ?>">Snack Basah</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="md-form">
                                    <input name="kebutuhan[]" class="form-check-input" type="checkbox" id="inlineFormCheckMDedit2<?php echo $data_peminjaman->id_booking; ?>" value="Snack Kering" <?=$check2?>>
                                    <label class="form-check-label" for="inlineFormCheckMDedit2<?php echo $data_peminjaman->id_booking; ?>">Snack Kering</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="md-form">
                                    <input name="kebutuhan[]" class="form-check-input" type="checkbox" id="inlineFormCheckMDedit3<?php echo $data_peminjaman->id_booking; ?>" value="Lunch" <?=$check3?>>
                                    <label class="form-check-label" for="inlineFormCheckMDedit3<?php echo $data_peminjaman->id_booking; ?>">Lunch</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="md-form">
                                    <input name="kebutuhan[]" class="form-check-input" type="checkbox" id="inlineFormCheckMDedit4<?php echo $data_peminjaman->id_booking; ?>" value="Minum" <?=$check4?>>
                                    <label class="form-check-label" for="inlineFormCheckMDedit4<?php echo $data_peminjaman->id_booking; ?>">Minum</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="md-form">
                                    <input name="kebutuhan[]" class="form-check-input" type="checkbox" id="inlineFormCheckMDedit5<?php echo $data_peminjaman->id_booking; ?>" value="Buah" <?=$check5?>>
                                    <label class="form-check-label" for="inlineFormCheckMDedit5<?php echo $data_peminjaman->id_booking; ?>">Buah</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit pinjam peminjaman -->
<?php endforeach; ?>