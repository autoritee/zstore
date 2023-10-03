<?php
session_start(); //Koneksi ke Database
$koneksi = new mysqli("localhost","root","","zstore");
?>
<!DOCTYPE html>
<html>
<head>
  <title>toko zstore</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>



 <!-- navbar -->
 <nav class="navbar navbar-default">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <!-- jika sudah login(ada session pelanggan) -->
            <?php if (isset($_SESSION["pelanggan"])): ?>
            <li><a href="logout.php">logout</a></li>
            <!-- selain itu(belum login||ada session pelanggan) -->
            <?php else: ?>
              <li><a href="login.php">Login</a></li>
            <?php endif ?>

          <li><a href="checkout.php">Checkout</a></li>
        </ul>
    </div>
</nav>

<!-- konten -->
<section class="konten">
  <div class="container">
    <h1>produk terbaru</h1>

    <div class="row">
      
      <?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
      <?php while($perproduk = $ambil->fetch_assoc()) { ?>
        
      <div class="col-md-3">
          <div class="thumbnail">
            <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
            <div class="caption">
              <h3><?php echo $perproduk['nama_produk']; ?></h3>
              <h5>rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
              <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">beli</a>
            </div>
          </div>
      </div>
      <?php } ?>


    </div>
  </div>
</section>

<video width="400" loop muted autoplay="autoplay">   
    <source src="animasi.mp4" type="video/mp4"/>
    
    
  </video>
  <p><a href="https://www.nike.com/id/w/jordan-shoes-37eefzy7ok">iklan</a></p>
  
</body>
</html>