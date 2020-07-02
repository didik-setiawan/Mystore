<footer class="bg-dark text-light">
  <?php 
  $this->db->limit(10);
  $merk = $this->db->get('tb_merk')->result_array();
  $produk = $this->db->get('tb_produk')->result_array();
   ?>
  <div class="container mt-5">
    <div class="col-lg-12 mt-5 mb-3">
      <h4 class="text-center mt-3">Mystore Online Shopping</h4>
    </div>
    <div class="row text-center">
      <div class="col-lg-4">
        <h5>Merk</h5>
        <?php foreach ($merk as $m) { ?>
        | <small><?= $m['merk']; ?></small>
      <?php } ?>
      </div>
      <div class="col-lg-4">
        <h5>Produk</h5>
        <?php foreach ($produk as $p) { ?>
          | <small><?= $p['produk']; ?></small>
       <?php } ?>
      </div>
      <div class="col-lg-4">
        <h5>Sosial Media</h5>
        <i class="fab fa-youtube"> Youtube</i> 
        <i class="fab fa-facebook ml-2"> Facebook</i>
        <i class="fab fa-instagram ml-2"> Instagram</i>
        <i class="fab fa-github ml-2"> Github</i>
      </div>
    </div>
    <div class="row justify-content-center mt-3">
      <h5 class="mb-4">Copyright &copy <?= date('Y'); ?></h5>
    </div>
  </div>
</footer>
<!-- jQuery -->
<script type="text/javascript" src="<?= base_url('assets/mdb/'); ?>js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?= base_url('assets/mdb/'); ?>js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?= base_url('assets/mdb/'); ?>js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?= base_url('assets/mdb/'); ?>js/mdb.min.js"></script>
<!-- Your custom scripts (optional) -->

<script type="text/javascript"></script>

</body>
</html>
