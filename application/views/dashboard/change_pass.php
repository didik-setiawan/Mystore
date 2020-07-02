
<div class="page-wrapper">
    <div class="container-fluid">
     <h3 class="text-center">Edit Password</h3>
     <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <?= form_open('dashboard/change_pass'); ?>
                <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Password Lama</label>
                            <input type="password" name="pl" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label>Password Baru</label>
                            <input type="password" name="pb" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="kp" class="form-control">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                      <button type="submit" class="btn btn-info btn-rounded">Simpan</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>
</div>
