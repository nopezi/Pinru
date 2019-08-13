<div class="container" style="margin-top:100px">
    <div class="row mb-1">
        <?php $this->load->view('list_booked'); ?>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="<?=base_url('home')?>" method="get">
                <div class="form-row md-form">
                    <div class="col-8 col-md-6">
                        <input type="text" name="keyword" placeholder="search" class="form-control">
                    </div>
                    <div class="col-3 col-md-3">
                        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if(!empty($tanda)): ?>
    <div class="row">
        <div class="col-md-12">
        <a href="<?=base_url()?>" class="btn btn-sm btn-info">Back</a>
        </div>
    </div>
    <?php endif; ?>
    <div class="row">
    <?php if(empty($ruangan)): ?>
    <div class="col-12">
        <p class="text-center text-black-50">Ruangan yang anda cari, tidak ada dalam daftar</p>
    </div>
    <?php endif; ?>
    <?php foreach($ruangan as $data_ruangan): ?>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <a data-toggle="modal" data-target="#detailRuangan" class="tombolDetailRuangan" id="<?=$data_ruangan->id_ruangan;?>">
            <div class="view zoom waves-effect waves-light">
            <img src="<?=base_url()?>assets/gambar/<?=$data_ruangan->foto_ruangan?>" width="392" height="192" class="" alt="placeholder">
                <div class="mask pattern-8 flex-left ml-4 mt-3 mr-4">
                    <p class="h6 white-text text-left"><?=$data_ruangan->nama_ruangan?></p>
                    <p class="white-text">Capacity <?=$data_ruangan->kapasitas?> persons</p>
                    <div class="d-flex justify-content-end mr-5 mt-5">
                    <span class="border text-white" style="padding:5px">Detail</span>
                    </div>
                </div>  
            </div>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="detailRuangan" tabindex="1" role="dialog" arial-labelledby="modaledit">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header info-color">
                <p class="modal-title text-center white-text" id="myModalLabel"></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detailRuangan2">
                
            </div>
            <div class="modal-footer" id="tombolPinjam"></div>
        </div>
    </div>
</div>


<?php $this->load->view('footer'); ?>

<script>

$(document).ready(function(){
// tampil ruangan per id

$('.tombolDetailRuangan').on('click', function(){
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
                        lk += '<div class="col-6 col-md-6 col-lg-6 text-black-50">' +
                              '<i class="fas fa-check text-warning"></i> '+ data.fasilitas[i] +
                              '</div>';
                    }

                    var nama_ruangan_html = data.nama_ruangan;
                    var tombolpinjam =  '<button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Close</button>' +
                                        '<a href="<?=base_url()?>/home/pinjam?id_ruangan='+data.id_ruangan+'" type="button" id="submit" class="btn btn-primary btn-sm">Booking</a>'; 
                    
                    html = '<div class="view view-cascade zoom">' +
                            '<img src="<?=base_url()?>/assets/gambar/'+data.foto_ruangan+'" class="card-img-top img-responsive rounded-lg mb-3" alt="photo">' +
                            '</div>' +
                            '<p class="h6">Description</p>' +
                            '<p class="text-black-50">'+data.keterangan+'</p>' +
                            '<p class="h6">Capacity</p>' +
                            '<p class="text-black-50">'+data.kapasitas+' persons</p>' +
                            '<p class="h6">Facilities</p>' +
                            '<p>' +
                            '<div class="row">' +
                               lk +
                            '</div>' +
                            '</p>';
                    $('#detailRuangan2').html(html);
                    $('#myModalLabel').html(nama_ruangan_html)
                    $('#tombolPinjam').html(tombolpinjam);
                    console.log(nama_ruangan_html);
                });
            }
            
        });
    });

});
</script>

<script>
$('#dtHorizontalExample').DataTable({
    "scrollX" : true,
    "searching": false,
    "bPaginate": true,
    "bDestroy": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bAutoWidth": true,
});
$('.dataTables_length').addClass('bs-select');

</script>