
    <div class="col-12 col-md-12">
        <table id="dtHorizontalExample" class="display table table-striped table-hover" cellspacing="0" width="100%">
        <p class="text-center h4">List Booked Room</p>
            <thead class="info-color white-text">
                <tr>
                    <th>Room</th>
                    <th>Name</th>
                    <th>Date Booking</th>
                    <th>Meeting Time</th>
                    <th>Activity</th>
                </tr>
            </thead>
            
            <tbody>
                <?php rsort($peminjaman); ?>
            <?php foreach($peminjaman as $data_peminjaman): ?>
                <tr>
                    <td><?=$data_peminjaman->nama_ruangan?></td>
                    <td><?=$data_peminjaman->nama_peminjam?></td>
                    <td><?=$data_peminjaman->tanggal?></td>
                    <td><?=$data_peminjaman->waktu_mulai?> - <?=$data_peminjaman->waktu_selesai?></td>
                    <td><?=$data_peminjaman->kegiatan?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
    </div>
