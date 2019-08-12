<?php $this->load->view('admin/admin_header'); ?>

    <div class="container mb-4" style="margin-top: 70px">
        <div class="row justify-content-md-center">
            <div class="col-lg-12 col-md-11">     
                <div class="card">
                    <div class="card-body">
                        <!-- <center><p class="h4 mb-4">Data Ruangan</p></center> -->
                        <a data-toggle="modal" data-target="#tambahData" class="btn btn-primary btn-sm btn-rounded"><i class="fas fa-plus"></i></a>
                        <table id="dtHorizontalExample" class="table table-hover table-sm table-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Ruangan</th>
                                    <th>Nama Ruangan</th>
                                    <th>Status</th>
                                    <th>Fasilitas</th>
                                    <th>Keterangan</th>
                                    <th>Setting</th>
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
                        <h4 class="modal-title w-100" id="myModalLabel"><p class="h4 mb-4">Tambah Data Ruangan</p></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_ruangan">
                            <div class="form-row md-form mb-2">
                                <div class="col-md-9">
                                    <input type="text" name="nama_ruangan" id="defaultRegisterFormFirstName" class="form-control" placeholder="Nama Ruangan">
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-9">
                                    <select class="mdb-select md-form colorful-select dropdown-primary" name="status">
                                        <option value="" disabled selected>Status</option>
                                        <option value="1">digunakan</option>
                                        <option value="2">dibooking</option>
                                        <option value="3">kosong</option>
                                    </select>
                                    <label class="mdb-main-label">Status Penggunaan</label>
                                </div>
                            </div>
                            <div class="chips chips-placeholder"></div>
                            <div class="form-row md-form mt-2 mb-2">
                                <div class="col-md-12">
                                    <textarea name="keterangan" class="md-textarea form-control" id=""  placeholder="Keterangan" rows="2"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" id="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal tambah data -->

        <!-- Modal edit data -->
        <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="modaledit"
        aria-hidden="true">
            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel"><p class="h4">Edit Data Ruangan</p></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_edit_ruangan">
                            <div class="form-row md-form mb-2">
                                <div class="col-md-4">
                                    <input type="hidden" name="id_ruangan_edit" id="id_ruangan">
                                </div>
                            </div>
                            <div class="form-row md-form mb-2">
                                <div class="col-md-9">
                                    <input type="text" name="nama_ruangan_edit" id="nama_ruangan2" class="form-control" placeholder="Nama Ruangan">
                                </div>
                            </div>
                            <div class="form-row md-form mb-2">
                                <div class="col-md-9">
                                    <select class="mdb-select md-form colorful-select dropdown-primary" name="status_edit" id="status2">
                                        <option value="" disabled selected>Status</option>
                                        <option value="digunakan">digunakan</option>
                                        <option value="diboking">diboking</option>
                                        <option value="kosong">kosong</option>
                                    </select>
                                    <label class="mdb-main-label">Status Penggunaan</label>
                                </div>
                            </div>
                            <div class="chips chips-placeholder"></div>
                            <div class="form-row md-form mb-2">
                                <div class="col-md-12">
                                    <textarea name="keterangan_edit" class="md-textarea form-control" id="keterangan2"  placeholder="Keterangan"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="button"  class="btn btn-primary btn-sm submitedit" data-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal edit data -->

    </div> <!-- container --> 
    
<?php $this->load->view('admin/admin_footer'); ?>

<script type="text/javascript">
$('.chips-placeholder').materialChip({
placeholder: 'Fasilitas',
secondaryPlaceholder: '+Fasilitas',
});
    $(document).ready(function(){
        $('.mdb-select').materialSelect();
        tampil_data_ruangan();
        function tampil_data_ruangan(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url() ?>/admin/tampil_ruangan',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var y=0;
                    for(i=0; i<data.length; i++){
                        y++;

                        if(data[i].status == "digunakan"){
                            var status = '<p class="text-danger"><span class="badge badge-danger">'+data[i].status+'</span></p>';
                        }else if(data[i].status == "diboking"){
                            var status = '<p class="text-warning"><span class="badge badge-warning">'+data[i].status+'</span></p>';
                        }else if(data[i].status == "kosong" || data[i].status == ""){
                            var status = '<p class="text-primary"><span class="badge badge-light">'+data[i].status+'</span></p>';
                        }

                        if(data[i].keterangan.length > 50){
                            var keterangan = data[i].keterangan;
                            var keterangan = keterangan.substr(0, 70) + '<br>' + 
                                             keterangan.substr(70, 60) + ' ...';
                        }else if(data[i].keterangan.length < 50){
                            var keterangan = data[i].keterangan;
                            // var keterangan = keterangan.substr(0, 5) + '<br>' + keterangan;
                        }

                        html += '<tr>' +
                                '<td>' +y+ '</td>' +
                                '<td>' +data[i].no_ruangan+'</td>' +
                                '<td>' +data[i].nama_ruangan+ '</td>' +
                                '<td>' +status+ '</td>' +
                                '<td></td>' +
                                '<td>' +keterangan+ '</td>' +
                                '<td>' + 
                                '<a data-toggle="modal" data-target="#editData" id="'+data[i].id_ruangan+'" class="btn-floating btn-warning btn-sm item_edit"><i class="fas fa-pencil-alt"></i></a> ' +
                                '<a id="'+data[i].id_ruangan+'" class="hapus_ruangan btn-floating btn-danger btn-sm"><i class="far fa-trash-alt"></i></a> ' +        
                                '</td>'
                                '</tr>';
                    }
                    $('#tampil_data').html(html);
                }
            });
        }

        // tampil data
        // $('#tampil_data').load("<?php//base_url()?>/admin/tampil_ruangan");

        // simpan data ruangan

        $("#submit").click(function(){
                        
            $.ajax({
                
                url : "<?php echo base_url(); ?>/admin/tambah_ruangan", 
                type: "POST", 
                data: $("#form_ruangan").serialize(),
                success: function(data) {

                // $('#tampil_data').html(data);
                    $('#tambahData').modal("hide");
                    // $('#dtHorizontalExample').ajax.reload();
                    window.location.reload();
                    tampil_data_ruangan();
                }
            });
                
            return false;
            
        });

        // tampil data per id

        $('#tampil_data').on('click','.item_edit',function(){
            var id_ruangan=$(this).attr('id');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('admin/get_ruangan')?>",
                dataType : "JSON",
                data : {id_ruangan:id_ruangan},
                success: function(data){
                    $.each(data,function(id_ruangan, no_ruangan, nama_ruangan, keterangan){
                        $('#editData').modal('show');
                        $('[name="id_ruangan_edit"]').val(data.id_ruangan);
                        $('[name="no_ruangan_edit"]').val(data.no_ruangan);
                        $('[name="nama_ruangan_edit"]').val(data.nama_ruangan);
                        $('[name="keterangan_edit"]').val(data.keterangan);
                        $('[name="status_edit"]').val(data.status);
                    });
                }
            });
            return false;
        });

        // edit data

        $(".submitedit").click(function(){
       
            $.ajax({
                
                url : "<?php echo base_url(); ?>/admin/edit_ruangan", 
                type: "POST", 
                data: $("#form_edit_ruangan").serialize(),
                success: function(data) {
                    $('#editData').modal("hide");
                    tampil_data_ruangan();
                }
            });
                
            return false;
            
        });

        // hapus data ruangan

        $(document).on('click', '.hapus_ruangan', function(){
            var row_id = $(this).attr("id");
            $.ajax({
                url     : "<?=base_url()?>/admin/hapus_ruangan",
                method  : "POST",
                data    : {row_id : row_id},
                success : function(data){
                    // $('#dtHorizontalExample').ajax.reload();
                    window.location.reload();
                    tampil_data_ruangan();
                }
            });
        });

        $('#dtHorizontalExample').DataTable({
            // "scrollX" : true,
            "searching": false
        });
        $('.dataTables_length').addClass('bs-select');

    });
</script>

</body>
</html>