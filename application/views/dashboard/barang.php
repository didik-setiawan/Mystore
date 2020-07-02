
<div class="page-wrapper">
    <div class="container-fluid">
       <h3 class="text-center">Management Barang</h3>
       <div class="row">
        <div class="col-12">
            <div class="card shadow">
               <div class="card-body">

                <div class="row">
                    <div class="col-lg-7">
                        <?= $this->session->flashdata('pesan'); ?>
                    </div>
                    <div class="col-lg-5">
                        <form action="" method="post">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control border-primary small" placeholder="Cari Barang..." aria-label="Search" aria-describedby="basic-addon2" name="cari">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
<?php if(empty($barang)): ?>
    <div class="alert alert-danger">Data Kosong</div>
    <?php else: ?>
                <table class="table table-hover">
                 <thead class="bg-dark text-light">
                    <tr>
                       <th>No</th>
                       <th>Barang</th>
                       <th>Harga</th>
                       <th>Stok</th>
                       <th>Tgl Upload</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                <?php 
                $i = 1;
                foreach ($barang as $b): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $b['barang']; ?></td>
                        <td>Rp. <?=  $b['harga']; ?></td>
                        <td><?= $b['stok']; ?></td>
                        <td><?= date('d M Y',$b['tgl_upload']); ?></td>
                        <td>
                         <div class="btn-group">
                            <button type="button" class="btn btn-info btn-rounded btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="<?= base_url('dashboard/detail_barang/') . $b['id']; ?>"><i class="fas fa-arrow-right"></i> Detail</a>
                              <a class="dropdown-item" href="<?= base_url('dashboard/edit_barang/') . $b['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                              <a class="dropdown-item" href="<?= base_url('dashboard/hapus_barang/') . $b['id']; ?>" onclick="return confirm('Apakah anda yakin?');"><i class="fa fa-trash"></i> Hapus</a>
                          </div>
                      </div>
                  </td>
              </tr>
          <?php endforeach; ?>
      </tbody>
  </table>
<?php endif; ?>
  <div class="row justify-content-end fixed-bottom mb-5 mr-5">
     <a href="<?= base_url('dashboard/add_barang'); ?>" class="btn btn-info btn-rounded"><i class="fa fa-plus"></i></a>
 </div> 

</div>
</div>
</div>
</div>
</div>
