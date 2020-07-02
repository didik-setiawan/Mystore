
<div class="page-wrapper">
    <div class="container-fluid">
        
       <h3 class="text-center">Dashboard</h3>
       <h5><?= date('l d M Y'); ?></h5>
       
       <div class="row">
        <div class="col-12">
            <div class="card shadow">
               <div class="card-body">
                  <?= $this->session->userdata('pesan'); ?>
                  <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow bg-info text-light">
                            <div class="card-body">
                                <h5>Jumlah User</h5>
                                <hr>
                                <h1><i class="fa fa-user"></i></h1>
                                <hr>
                                <h5><?= $user; ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow bg-primary text-light">
                            <div class="card-body">
                                <h5>Jumlah Barang</h5>
                                <hr>
                                <h1><i class="fas fa-gift"></i></h1>
                                <hr>
                                <h5><?= $barang; ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow bg-danger text-light">
                            <div class="card-body">
                                <h5>Jumlah Order Bulan Ini</h5>
                                <hr>
                                <h1><i class="fa fa-box"></i></h1>
                                <hr>
                                <h5><?= $order; ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow bg-warning text-light">
                            <div class="card-body">
                                <h5>Penghasilan Bulan Ini</h5>
                                <hr>
                                <h1><i class="fas fa-dollar-sign"></i></h1>
                                <hr>
                                <h5>Rp. <?= $jumlah; ?></h5>
                            </div>
                        </div>
                    </div>

                </div>

                <?php 

                $bulan = $this->db->get('bulan')->result_array();
                $m = date('m');
                $y = date('Y');

                ?>

                <div class="col-lg-12">
                    <h5>Tahun <?= date('Y'); ?></h5>
                 <table class="table table-striped">
                     <thead class="bg-dark text-light">
                         <tr>
                             <th>Bulan</th>
                             <th>Jumlah Penjualan</th>
                             <th>Total Penghasilan</th>
                         </tr>
                     </thead>
                     <tbody>
                        <?php foreach($bulan as $b) { ?>
                            <?php $no = $b['no'];
                            $jumlah = $this->db->query("SELECT SUM(total) AS jumlah FROM tb_order WHERE year(tgl_pesan) = $y AND month(tgl_pesan) = $no")->row()->jumlah;
                             ?>

                         <tr>
                             <td><?= $b['bulan']; ?></td>
                             <td><?= $this->db->query("SELECT * FROM tb_order WHERE year(tgl_pesan) = $y AND month(tgl_pesan) = $no")->num_rows(); ?></td>
                             <?php if($jumlah == NULL): ?>
                                <td>Rp.0</td>
                                <?php else: ?>
                             <td>Rp. <?= $jumlah; ?></td>
                         <?php endif; ?>
                         </tr>
                     <?php } ?>

                 </tbody>
             </table>
         </div>

     </div>
 </div>
</div>
</div>
</div>
