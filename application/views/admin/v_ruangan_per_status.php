<div class="row mt-5">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Ruangan</th>
                                <th>Nomor Ruangan</th>
                                <th>Kegiatan</th>
                                <th>Mulai digunakan</th>
                                <th>Penanggung Jawab</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($penggunaan as $list): ?>
                                <?php if($list->status == "diboking"){
                                    $warnaTable = "warning-color";
                                }else if($list->status == "digunakan"){
                                    $warnaTable = "danger-color";
                                } 
                                ?>
                            <tr class="<?=$warnaTable?>">
                                <td><?=$list->nama_ruangan?></td>
                                <td><?=$list->no_ruangan?></td>
                                <td><?=$list->nama_kegiatan?></td>
                                <td><?=$list->tanggal?></td>
                                <td><?=$list->penanggung_jawab?></td>
                                <td><b><?=$list->status?></b></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-responsive">
                        <p class="h5 text-center">Ruangan kosong</p>
                        <thead>
                            <th>Nomor</th>
                            <th>Ruangan</th>
                            <!-- <th>Mulai digunakan</th>
                            <th>Penanggung Jawab</th> -->
                        </thead>
                        <tbody>
                            <?php foreach($data as $ruangan): ?>
                            <?php if($ruangan->status == "kosong" || empty($ruangan->status)): ?>
                            <tr>
                                <td><?=$ruangan->no_ruangan?></td>
                                <td><?=$ruangan->nama_ruangan?></td>
                            </tr>
                            <?php endif;?>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>