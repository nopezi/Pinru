<?php $this->load->view('admin/admin_header'); ?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-10 col-md-11">
            <center><h3>Data Ruangan yang di gunakan</h3></center>
            <div class="jumbotron">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ruangan</th>
                            <th>Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Status</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ruang Rapat</td>
                            <td>Rapat Mingguan</td>
                            <td>19-07-2019</td>
                            <td>13.00</td>
                            <td>0</td>
                            <td>digunakan</td>
                            <td>
                                <button class="btn btn-success btn-rounded waves-effect btn-sm">
                                <i class="fas fa-check"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ruang Rapat</td>
                            <td>Rapat Mingguan</td>
                            <td>19-07-2019</td>
                            <td>13.00</td>
                            <td>15.00</td>
                            <td>Selesai</td>
                            <td>
                            <i class="fas fa-check"></i>
                            <button class="btn btn-danger btn-rounded waves-effect btn-sm">Cancel</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/admin_footer'); ?>
</body>
</html>