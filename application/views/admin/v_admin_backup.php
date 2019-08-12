<?php $this->load->view('admin/admin_header'); ?>

 <!-- BODY CONTENT -->

 <!-- JAM -->
 <div class="container">
     
<!-- RUANGAN TERPAKAI & TIDAK TERPAKAI -->

    <?php $this->load->view('admin/v_ruangan_per_status'); ?>

<!-- RUANGAN TERPAKAI & TIDAK TERPAKAI -->

    <div class="row mt-5 mb-4">
         
         <!-- LIST RUANGAN -->
         <div class="col-lg-4">
             <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <p class="h4">List ruangan</p>
                        <div id="tampil_data"></div>
                    </div>
                </div>
             </div>
         </div>
 
         <!-- /LIST RUANGAN -->
     
         <!-- SIDE LIST RUANGAN -->
         <div class="col-lg-6 offset-md-2">
             <div class="card light">
                 <div class="card-body">
                    <!-- <p class="text-center h5">Detail Ruangan</p> -->
                    <div id="detailRuangan"></div>
                    
                 </div>
             </div>

             <div class="collapse multi-collapse mt-3" id="multiCollapseExample1">
                <div class="card card-body">
                   <form action="" class="form">
                        <input type="hidden" id="materialRegisterFormEmail" class="form-control">
                        <div class="form-row">
                            <div class="col">
                                <!-- First name -->
                                <div class="md-form">
                                    <input type="text" id="materialRegisterFormFirstName" class="form-control">
                                    <label for="materialRegisterFormFirstName">Nama Pengguna</label>
                                </div>
                            </div>
                            <div class="col">
                                <!-- Last name -->
                                <div class="md-form">
                                    <input type="email" id="materialRegisterFormLastName" class="form-control">
                                    <label for="materialRegisterFormLastName">Penanggung jawab</label>
                                </div>
                            </div>
                        </div>
                        <div class="md-form mt-0">
                            <input type="text" id="materialRegisterFormEmail" class="form-control">
                            <label for="materialRegisterFormEmail">Kegiatan</label>
                        </div>
                        <div class="md-form">
                            <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker">
                            <label for="date-picker-example">Tanggal Pinjam</label>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="md-form">
                                <input type="text" id="manual-operations-input" class="form-control" placeholder="Now">
                                    <label for="input_starttime">waktu mulai</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form">
                                    <input type="text" id="manual-operations-input2" class="form-control" placeholder="Now">
                                    <label for="input_starttime">waktu selesai</label>
                                </div>
                            </div>
                        </div>
                        <div class="md-form mt-0">
                            <button class="btn btn-info btn-sm btn-rounded">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
         </div>
 
     </div>

     <!-- Collapsible content -->

<!--/ Collapsible content -->

 </div>   

<?php $this->load->view('admin/admin_footer'); ?>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/addons/waktu.js"></script> 
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

    // Manually toggle to the minutes view
    $('#check-minutes').click(function(e){
        e.stopPropagation();
        input.pickatime('show').pickatime('toggleView', 'minutes');
    });

    // tampil data tombol

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
                            var ruangan = '<button data-toggle="collapse" data-target="#multiCollapseExample2" class="btn btn-red waves-effect btn-rounded tombolDetailRuangan" disabled>'+data[i].no_ruangan+'</button>';
                        }else if(data[i].status == "diboking"){
                            var ruangan = '<button class="btn btn-warning waves-effect btn-rounded tombolDetailRuangan" id="'+data[i].id_ruangan+'">'+data[i].no_ruangan+'</button>';
                        }else if(data[i].status == "kosong" || data[i].status == ""){
                            var ruangan = '<button  class="btn btn-outline-primary waves-effect btn-rounded tombolDetailRuangan" id="'+data[i].id_ruangan+'">'+data[i].no_ruangan+'</button>';
                        }

                        html += ruangan;
                    }
                    $('#tampil_data').html(html);
                }
            });
        }

    $('#tampil_data').on('click','.tombolDetailRuangan',function(){
        var id_ruangan=$(this).attr('id');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('admin/get_ruangan')?>",
            dataType : "JSON",
            data : {id_ruangan:id_ruangan},
            success: function(data){
                $.each(data,function(id_ruangan, no_ruangan, nama_ruangan, keterangan){
                    // $('#detailRuangan').collapse('show');
                    var namauangan;
                    html = '<p class="h8 mb-3 text-uppercase text-danger    ">'+data.nama_ruangan+'</p>' +
                            '<p class="font-weight-normal">'+data.keterangan +'</p>' +
                            '<a class="btn btn-danger btn-sm btn-rounded" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Pinjam</a>'
                    ;
                    $('#detailRuangan').html(html);
                });
            }
        });
        return false;
    });

    
});
</script>
</body>
</html>