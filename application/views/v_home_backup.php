<?php $this->load->view('header'); ?>
<body>
<div class="container-fluid">
    <!-- jam -->
    <!-- <div class="row mt-3 justify-content-md-center">
        <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center text-primary"> -->
                <?//=tanggal()?> //
                <!-- <span id="jam"></span> : <span id="menit"></span> : <span id="detik"></span> -->
            <!-- </div>
        </div>
        </div>
    </div> -->
    <!-- jam -->

    <!-- list booking ruangan -->
    <div class="row mt-3 mb-2">
            <div class="col-md-8">
                <!-- list ruangan yang di booking -->
                <?php $this->load->view('list_booked'); ?>
                <!-- list ruangan yang di booking -->
                
                <div class="row mt-3">
                    <!-- booking rule -->
                    <?php $this->load->view('booking_rule'); ?>
                    <!-- booking rule -->
                    <!-- tombol list ruangan -->
                    <?php $this->load->view('list_tombol_ruangan'); ?>
                    <!-- tombol list ruangan -->
                </div>
            </div>
            <!-- detail ruangan -->
            <div class="col-md-4">
                <div class="card card-cascade">
                    <div id="detailRuangan"></div>
                </div>
            </div>
            <!-- detail ruangan -->
    </div>
    <!-- list booking ruangan -->

</div>
<?php $this->load->view('footer.php'); ?>
<!-- waktu -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/addons/waktu.js"></script> 

<script>
$(document).ready(function(){

    $('#dtHorizontalExample').DataTable({
                    "scrollX" : true,
                    "searching": false,
                    "bPaginate": false,
                    "bDestroy": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bInfo": false,
                    "bAutoWidth": false
                });
                $('.dataTables_length').addClass('bs-select');           
    // tampil data ruangan
    tampil_data_ruangan();
    function tampil_data_ruangan(){
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url() ?>/data?key=nasi',
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                var y=0;
                for(i=0; i<data.length; i++){
                    html += '<div class="col-6 col-md-6">'+
                                '<div class="card">' +
                                '<button class="btn btn-md btn-primary tombolDetailRuangan" id="'+data[i].id_ruangan+'">'+data[i].nama_ruangan+'</button>' +
                                '</div>' +
                            '</div>';
                    
                }
                $('#tampil_data').html(html);
                // console.log(html);
            }

        });
    }

    // tampil ruangan per id

    $('#tampil_data').on('click','.tombolDetailRuangan',function(){
        var id_ruangan=$(this).attr('id');
        console.log('id ruangan '+id_ruangan);
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('data?key=nasi&id_ruangan=')?>"+id_ruangan,
            dataType : "JSON",
            data : {id_ruangan:id_ruangan},
            success: function(data){
                // console.log(data);
                $.each(data,function(id_ruangan, nama_ruangan, kapasitas, fasilitas, foto_ruangan, keterangan){
                    var html;
                    var i;
                    var lk = "";
                    // console.log(data.fasilitas.length);
                    for(i=0; i < data.fasilitas.length; i++){
                        lk += '<div class="col-3 col-md-3">' +
                              '<i class="fas fa-check text-warning"></i> '+ data.fasilitas[i] +
                              '</div>';
                    }
                    console.log(lk);
                    html = '<div class="card-header">' +
                            '<p class="h5 text-center">Detail Ruangan</p>' +
                            '</div>' +
                            '<div class="view view-cascade zoom">' +
                                '<img src="<?=base_url()?>/assets/gambar/'+data.foto_ruangan+'" class="card-img-top img-responsive" alt="photo">' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<h4 class="card-title">'+data.nama_ruangan+'</h4>' +
                            '<p class="card-text">'+data.keterangan+'</p>' +
                            '<p>Kapasitas</p>' +
                            '<p class="card-text">'+data.kapasitas+' Orang</p>' +
                            '<p>fasilitas</p>' +
                            '<p>' +
                                '<div class="row card-text">' + 
                                    lk +
                                '</div>' +
                            '</p>' +
                            '<a href="<?=base_url('home/pinjam/')?>'+data.id_ruangan+'" class="btn btn-primary">Pinjam</a>' +
                            '</div>'
                            ;
                    $('#detailRuangan').html(html);
                    // console.log(html);
                });
            }
            
        });
    });

});
</script>

</body>
</html>