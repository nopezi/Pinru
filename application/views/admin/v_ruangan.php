<div class="container mb-4" style="margin-top: 70px">
    <div class="row justify-content-md-center">
        <div class="col-lg-12 col-md-11">     
            <div class="card">
                <div class="card-body">
                    <!-- <center><p class="h4 mb-4">Data Ruangan</p></center> -->
                    <a data-toggle="modal" data-target="#tambahData" class="btn btn-primary btn-sm btn-rounded"><i class="fas fa-plus"></i></a>
                    <table id="dtHorizontalExample" class="table table-hover table-sm table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Room Name</th>
                                <th class="text-center">Capacity</th>
                                <th class="text-center">Facilities</th>
                                <th class="text-center">Image Room</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Setting</th>
                            </tr>
                        </thead>
                        <tbody id="tampil_data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Modal tambah data -->
    <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title w-100" id="myModalLabel"><p class="h5 text-center">Tambah Data Ruangan</p></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_ruangan" name="myForm">
                        <p id="tampil_error"></p>
                        <div class="form-row md-form mb-2">
                            <div class="col-7 col-md-7">
                                <label for="namaRuangan">Meeting Room Name</label>
                                <input type="text" name="nama_ruangan" id="namaRuangan" class="form-control" aria-describedby="inputGroupPrepend23" required>
                                
                            </div>
                            <div class="col-3 col-md-3">
                                <label for="kapasitas">Capacity</label>
                                <input type="number" name="kapasitas" id="kapasitas" class="form-control" required>
                            </div>
                            <div class="col-2 col-md-2 mt-1"><p>Orang</p></div>
                        </div>
                        <div class="form-row md-form">
                            <!-- <label for="fasilitas">Fasilitas</label>  -->
                            <!-- <div class="chips chips-placeholder" name="fasilitas" id="fasilitas" required></div> -->
                            <input type="" name="fasilitas" id="fasilitas" class="form-control chips chips-placeholder" data-role="tagsinput" required>Facilities
                        </div>
                        <div class="form-row md-form">
                            <div class="file-field">
                                <div class="mb-2">
                                    <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" id="gambar_nodin" height="100px" width="100px" class="img-responsive img-fluid z-depth-1-half avatar-pic" alt="Preview Gambar">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-mdb-color btn-sm btn-rounded float-left">
                                        <span>Image Room</span>
                                        <input type="file" name="foto_ruangan" id="preview_gambar" required>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <input type="file" name="foto_ruangan" class="form-control" id="preview_gambar">
                                <img src="#" id="gambar_nodin" width="400" alt="Preview Gambar" />
                            </div> -->
                        </div>
                        <div class="form-row md-form mt-2 mb-2">
                            <div class="col-md-12">
                                <label for="keterangan">Description</label>
                                <textarea name="keterangan" class="md-textarea form-control" id="keterangan"  rows="2" required></textarea>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary btn-sm">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal tambah data -->

<?php foreach($semua_ruangan as $data_edit_ruangan): ?>
    <!-- modal edit ruangan -->
    <div class="modal fade" id="editData<?=$data_edit_ruangan->id_ruangan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"><p class="h5">Edit data Ruangan</p></div>
                <div class="modal-body">
                <form id="form_ruangan" name="myForm">
                        <p id="tampil_error"></p>
                        <div class="form-row md-form mb-2">
                            <div class="col-7 col-md-7">
                                <label for="namaRuangan">Meeting Room Name</label>
                                <input type="text" name="nama_ruangan" id="namaRuangan" class="form-control" aria-describedby="inputGroupPrepend23" required>
                                
                            </div>
                            <div class="col-3 col-md-3">
                                <label for="kapasitas">Capacity</label>
                                <input type="number" name="kapasitas" id="kapasitas" class="form-control" required>
                            </div>
                            <div class="col-2 col-md-2 mt-1"><p>Persons</p></div>
                        </div>
                        <div class="form-row md-form">
                            <!-- <label for="fasilitas">Fasilitas</label>  -->
                            <!-- <div class="chips chips-placeholder" name="fasilitas" id="fasilitas" required></div> -->
                            <input type="" name="fasilitas" id="fasilitas" class="form-control chips chips-placeholder" data-role="tagsinput" required>Facilities
                        </div>
                        <div class="form-row md-form">
                            <div class="file-field">
                                <div class="mb-2">
                                    <img src="<?=base_url()?>assets/gambar/<?=$data_edit_ruangan->foto_ruangan?>" id="gambar_nodin" height="100px" width="100px" class="img-responsive img-fluid z-depth-1-half avatar-pic" alt="Preview Gambar">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-mdb-color btn-sm btn-rounded float-left">
                                        <span>Image Room</span>
                                        <input type="file" name="foto_ruangan" id="preview_gambar" required>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <input type="file" name="foto_ruangan" class="form-control" id="preview_gambar">
                                <img src="#" id="gambar_nodin" width="400" alt="Preview Gambar" />
                            </div> -->
                        </div>
                        <div class="form-row md-form mt-2 mb-2">
                            <div class="col-md-12">
                                <label for="keterangan">Description</label>
                                <textarea name="keterangan" class="md-textarea form-control" id="keterangan"  rows="2" required></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-white btn-sm" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-info btn-sm edit_ruangan" id="">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit ruangan -->
<?php endforeach; ?>

<?php foreach($semua_ruangan as $data_ruangan): ?>
    <!-- modal hapus data -->
    <div class="modal fade" id="hapusData<?=$data_ruangan->id_ruangan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="h6">Apakah anda yakin akan menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-info hapus_ruangan" type="button" id="<?=$data_ruangan->id_ruangan?>">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal hapus data -->
<?php endforeach; ?>

</div>
<!-- container -->

<?php $this->load->view('admin/admin_footer'); ?>

<script>
$(document).ready(function(){

    function bacaGambar(input) {
        console.log('data input'+input);
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function (e) {
                $('#gambar_nodin').attr('src', e.target.result);
            }
        
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function(){
        bacaGambar(this);
    });

    tampil_data_ruangan();
    $('.dataTables_length').addClass('bs-select');
    function tampil_data_ruangan(){
        $.ajax({
            type  : 'post',
            url   : '<?php echo base_url() ?>/admin/tampil_ruangan',
            async : true,
            dataType : 'json',
            data : {key : '8799e0aa00bba9e6a0d7050c2c65b6134a3f4865'},
            success : function(data){
                var html = '';
                var i;
                var y=0;
                for(i=0; i<data.length; i++){
                    y++;

                    if(data[i].keterangan.length > 50){
                        var keterangan = data[i].keterangan;
                        var keterangan = keterangan.substr(0, 40) + '<br>' + 
                                            keterangan.substr(40, 60) + ' ...';
                    }else if(data[i].keterangan.length < 50){
                        var keterangan = data[i].keterangan;
                        // var keterangan = keterangan.substr(0, 5) + '<br>' + keterangan;
                    }

                    var fasilitas = data[i].fasilitas.replace(/,/gi, "<br>");

                    html += '<tr>' +
                            '<td class="text-center">' +y+ '</td>' +
                            '<td>' +data[i].nama_ruangan+ '</td>' +
                            '<td class="text-center">' +data[i].kapasitas+ ' Orang</td>' +
                            '<td>' +fasilitas+ '</td>' +
                            '<td class="text-center"><img src="<?=base_url()?>assets/gambar/' +data[i].foto_ruangan+ '" width="100px" height="100px" class="img-fluid img-rounded"></td>' +
                            '<td>' +keterangan+ '</td>' +
                            '<td>' + 
                            '<a data-toggle="modal" data-target="#editData'+data[i].id_ruangan+'" class="btn-floating btn-warning btn-sm item_edit"><i class="fas fa-pencil-alt"></i></a> ' +
                            '<a data-toggle="modal" data-target="#hapusData'+data[i].id_ruangan+'" class=" btn-floating btn-danger btn-sm"><i class="far fa-trash-alt"></i></a> ' +        
                            '</td>'
                            '</tr>';
                }
                $('#tampil_data').html(html);
                $('#dtHorizontalExample').DataTable({
                    "scrollX" : true,
                    "scrollY" : false,
                    "searching": true,
                    // "bPaginate": false,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bInfo": true,
                    "bAutoWidth": true
                });
            }
        });   
    }

    // simpan data ruangan

    $("#form_ruangan").submit(function(e){
        e.preventDefault();
        var nama_ruangan = document.forms["myForm"]["nama_ruangan"].value;
        var kapasitas = document.forms["myForm"]["kapasitas"].value;
        var fasilitas = document.forms["myForm"]["fasilitas"].value;
        var foto_ruangan = document.forms["myForm"]["foto_ruangan"].value;
        var keterangan = document.forms["myForm"]["keterangan"].value;
        console.log(foto_ruangan);
        if(nama_ruangan == "" || kapasitas == "" || fasilitas == "" || keterangan == ""){
            // alert("kosong");
            var pesan;
            pesan = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<strong>Hai, </strong> isi datanya yang lengkap ya' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>';
            $('#tampil_error').html(pesan);
            // return false;
        }else{
                        
            $.ajax({
            
            url : "<?php echo base_url(); ?>/admin/tambah_ruangan", 
            type: "POST",
            data : new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data) {
                    $('#tambahData').modal("hide");
                    swal("Data Added!", "Success", "success").then(function() {
                        window.location.reload();
                    });
                    // console.log('datanya '+data);
                    // tampil_data_ruangan();
                }
            });
            
        return false;
        }
        
    });

    // hapus data ruangan
    $(document).on('click', '.hapus_ruangan', function(){
        var row_id = $(this).attr("id");
        $.ajax({
            url     : "<?=base_url()?>/admin/hapus_ruangan",
            method  : "POST",
            data    : {row_id : row_id},
            success : function(data){
                swal("Data Deleted!", "Success", "success").then(function() {
                    window.location.reload();
                });
                tampil_data_ruangan();
            }
        });
    });

    
    
});
</script>

<script type="text/javascript">
    $('.chips-placeholder').materialChip({
        placeholder: 'Fasilitas',
        secondaryPlaceholder: '+Fasilitas',
    });
</script>