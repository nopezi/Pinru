<div class="row mt-3 justify-content-md-center">
    <div class="col col-md-5">
        <div class="card hover-card">
            <div class="card-body">
                <p class="h4 text-center">Book Rule</p>
                <p class="card-text">
                    <p id="tampil_peraturan"></p>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editRule" tabindex="-1" role="dialog" aria-labelledby="modaledit"
        aria-hidden="true">
    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel"><p class="h5">Edit Rule</p></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_peraturan">
                    <div class="form-row">
                        <div class="col-md-4">
                            <input type="hidden" name="id_rule" id="id_rule">
                        </div>
                    </div>
                    <div class="form-row md-form mb-2">
                        <div class="col-md-12">
                            <textarea name="peraturan" id="peraturan" class="md-textarea form-control" placeholder="Keterangan Peminjaman Ruangan" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                <button type="button"  class="btn btn-primary btn-sm peraturanEdit">Simpan</button>
            </div>
        </div>
    </div>
</div>
