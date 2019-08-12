<div class="container mb-3" style="margin-top: 70px">
    <!-- waktu -->
    <!-- <div class="row mb-3 justify-content-md-center">
        <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <?=tanggal()?> //
                <span id="jam"></span> : <span id="menit"></span> : <span id="detik"></span>
            </div>
        </div>
        </div>
    </div> -->
    <!-- waktu -->
    
    <!-- total ruang dan jadwal -->
    <?php $this->load->view('admin/count_ruang_jadwal'); ?>
    <!-- total ruang dan jadwal -->

    <!-- edit rule pinjam -->
    <?php //$this->load->view('admin/book_rule_edit'); ?>
    <!-- edit rule pinjam -->

    <!-- Data peminjam -->
    <?php $this->load->view('admin/data_peminjam'); ?>
    <!-- data peminjam -->

</div>
<?php $this->load->view('admin/admin_footer'); ?>

<!-- <script type="text/javascript" src="<?php //echo base_url() ?>assets/js/addons/waktu.js"></script> -->
<?php if(!empty($pesan)): ?>
<script>
swal("Success", "Data berhasil di update", "success").then(function() {
    window.location = "<?=base_url('admin')?>";
});
</script>
<?php endif; ?>
<script>
$(document).ready(function(){
    // setTimeout(function() {
    // location.reload();
    // }, 100000);

    tampil_peminjam();
    // timer = setTimeout("tampil_peminjam()",5000);
    // tampil data peminjam
    $('.dataTables_length').addClass('bs-select');
    
    function tampil_peminjam(){
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url() ?>/admin/tampil_peminjam',
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                var y=0;
                var ada = false;
                for(i=0; i<data.length; i++){
                    var kebutuhan = data[i].kebutuhan.replace(/,/g, "<br>");
                    html += '<tr>' +
                            '<td>'+data[i].nama_peminjam+'</td>' +
                            '<td>'+data[i].nama_ruangan+'</td>' +
                            '<td>'+data[i].tanggal+'</td>' +
                            '<td>'+data[i].kegiatan+'</td>' +
                            '<td>'+data[i].waktu_mulai+' - '+data[i].waktu_selesai+'</td>' +
                            // '<td>'+data[i].waktu_selesai+'</td>' +
                            '<td>'+data[i].jumlah_orang+' Orang</td>' +
                            '<td>'+kebutuhan+ '</td>' +
                            '<td>' +
                                '<a class="btn-floating btn-warning btn-sm btn-rounded" data-toggle="modal" data-target="#editPinjaman'+data[i].id_booking+'"><i class="fas fa-pencil-alt"></i></a>' +
                                '<a data-toggle="modal" data-target="#hapusPinjaman'+data[i].id_booking+'" class="hapusPinjaman btn-floating btn-danger btn-sm btn-rounded"><i class="far fa-trash-alt"></i></a>' +
                            '</td>'
                            '</tr>';
                }
                // console.log(html);
                $('#tampil_peminjam').html(html);
                
                $('#dtHorizontalExample').DataTable(
                    {
                    "scrollX" : true,
                    "searching": false,
                    // "bPaginate": false,
                    "bDestroy": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bInfo": false,
                    "bAutoWidth": true,
                    
                });
            }

        });
        // window.setTimeout(tampil_peminjam, 1000);
    }

    // tambah peminjam
    $('#form_pinjam').submit(function(){
        // e.preventDefault();
        var nama_peminjam  = document.forms["formPeminjam"]["nama_peminjam"].value;
        var id_ruangan   = document.forms["formPeminjam"]["id_ruangan"].value;
        var tanggal        = document.forms["formPeminjam"]["tanggal"].value;
        var jumlah_orang   = document.forms["formPeminjam"]["jumlah_orang"].value;
        var waktu_mulai    = document.forms["formPeminjam"]["waktu_mulai"].value;
        var waktu_selesai  = document.forms["formPeminjam"]["waktu_selesai"].value;
        var kegiatan      = document.forms["formPeminjam"]["kegiatan"].value;
        var kebutuhan = [];  
           $('.get_value').each(function(){  
                if($(this).is(":checked"))  
                {  
                    kebutuhan.push($(this).val());
                }  
           });

        var kebutuhan2 = '';
        var i =0;
        for(i=0; i <kebutuhan.length; i++){
            
            kebutuhan2 += kebutuhan[i]+', ';
        }  
        // console.log(kebutuhan2);
        if(tanggal == ""){
            var pesan;
            pesan = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<strong>Hai, </strong> Tanggal Pinjam nya kapan ya' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>';
            $('#tampil_error').html(pesan);
        }else{
            // console.log(id_ruangan+nama_peminjam+tanggal+' '+kebutuhan+kegiatan);
            $.ajax({
                url : "<?php echo base_url(); ?>/data/tambah_peminjaman?key=nasi", 
                type: "POST",
                data : {
                    id_ruangan : id_ruangan, 
                    nama_peminjam : nama_peminjam, 
                    tanggal : tanggal, 
                    kegiatan : kegiatan, 
                    jumlah_orang : jumlah_orang, 
                    waktu_mulai : waktu_mulai, 
                    waktu_selesai : waktu_selesai, 
                    kebutuhan : kebutuhan2 
                },
                // data : new FormData(this),
                // processData:false,
                // contentType:false,
                // cache:false,
                // async:false,
                success : function(data){
                    $('#tambahPinjaman').modal("hide");
                    // console.log(data);
                    // window.location.reload();
                    // tampil_peminjam();
                    swal("Success", "Data telah di simpan", "success").then(function() {
                        window.location = "<?=base_url('admin')?>";
                    });
                },
                error : function(data){
                    alert('masih error guys ');
                    console.log(data);
                }
            });
        }
        return false;
    });
    
    // hapus data peminjam
    $(document).on('click', '.hapus_pinjaman', function(){
        console.log('masok');
        var row_id = $(this).attr("id");
        $.ajax({
            url     : "<?=base_url()?>/admin/hapus_pinjaman",
            method  : "POST",
            data    : {row_id : row_id},
            success : function(data){
                    swal("Data Deleted!", "Success", "success").then(function() {
                        window.location.reload();
                    });
            }
        });
    });

    // tampil semua peraturan
    tampil_peraturan();

    function tampil_peraturan(){
        $.ajax({
            type : 'ajax',
            url  : '<?php echo base_url() ?>/admin/peraturan',
            dataType : 'JSON',
            success  : function(data){
                var html = '';
                html += data[0].rule +
                        '<p class="card-text"><a href="" data-toggle="modal" data-target="#editRule" id="'+data[0].id_rule+'" class="btn-floating btn-dark btn-sm peraturan_edit"><i class="fas fa-pencil-alt"></i></a></p>'
                ;
                $('#tampil_peraturan').html(html);
            }
            
        });
    }

    // tampil data peraturan per id
    $('#tampil_peraturan').on('click', '.peraturan_edit', function(){
        var id_rule=$(this).attr('id');
        $.ajax({
            url      : "<?php echo base_url(); ?>/admin/peraturan_id",
            dataType : "JSON",
            data     : {id_rule:id_rule},
            success  : function(data){
                $.each(data, function(id_rule, peraturan){
                    $('#editRule').modal('show');
                    $('[name="id_rule"]').val(data.id_rule);
                    $('[name="peraturan"]').val(data.peraturan);
                });
            }
        });
        return false;
    });

    // edit peraturan
    $('.peraturanEdit').click(function(){
        $.ajax({
            url     : "<?php echo base_url(); ?>/admin/edit_peraturan",
            type    : "POST",
            data    : $("#form_edit_peraturan").serialize(),
            success : function(data){
                $('#editRule').modal("hide");
                // window.location.reload();
                // console.log(data);
                tampil_peraturan();
            }
        });
        return false;
    });

});
</script>
<script>
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
    
    var input = $('#manual-operations-input3').pickatime({
        autoclose: true,
        'default': 'now'
    });

    var input = $('#manual-operations-input4').pickatime({
        autoclose: true,
        'default': 'now'
    });

    $('.mdb-select').materialSelect();
    // CKEDITOR.replace('peraturan');
    $.ajax({
        type  : 'ajax',
        url   : '<?php echo base_url() ?>/admin/tampil_peminjam',
        async : true,
        dataType : 'json',
        success : function(data){
            var i = 0;
            for(i=0; i < data.length; i++){
                // console.log(data[i].id_booking);
                var input = $('#manual-operations-input3'+data[i].id_booking).pickatime({
                    autoclose: true,
                    'default': 'now'
                });

                var input = $('#manual-operations-input4'+data[i].id_booking).pickatime({
                    autoclose: true,
                    'default': 'now'
                });
            }
                
        }
    });
</script> 