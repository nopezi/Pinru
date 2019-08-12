<body>
    <div class="container" style="margin-top: 70px">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                <?php if(!empty($this->session->flashdata('sukses'))){ ?>
                <?php echo $this->session->flashdata('sukses'); ?>
                <?php } ?>
                    <form class="form" action="<?=base_url('admin/aksi_edit_admin')?>" method="POST">
                        <div class="md-form">
                            <div class="col-md-12">
                                <input type="hidden" name="id_admin" value="<?=$data_admin[0]->id_admin?>">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="<?=$data_admin[0]->username;?>" required>
                            </div>
                        </div>
                        <div class="md-form">
                        <div class="col-md-12">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" value="<?=$data_admin[0]->password?>" required>
                            </div>
                        </div>
                        <div class="form-row md-form">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</body>

<?php $this->load->view('admin/admin_footer'); ?>