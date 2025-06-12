<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
    include "../admin/koneksi.php";
    $selectedCategory = isset($_GET['kategori']) ? $_GET['kategori'] : '';

    //get produk by keyword
    if (isset($_GET['keyword'])) {
        $qproduk = mysqli_query($k, "SELECT * FROM produk WHERE nama_produk LIKE '%" . $_GET['keyword'] . "%'");

    //get produk by kategori
    }elseif(isset($_GET['kategori'])){
        $qgetkategory = mysqli_query($k, "SELECT id_kategori FROM kategori WHERE nama='$_GET[kategori]'");
        $qkid = mysqli_fetch_array($qgetkategory);
        
        $qproduk = mysqli_query($k, "SELECT * FROM produk WHERE kategori_id='$qkid[id_kategori]'");
        
    
    //get produk default
    }else{
        $qproduk = mysqli_query($k, "SELECT * FROM produk");
    }

    
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Goocar Ecommerce</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Bootie Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- //Fonts -->

</head>

<body>

    <!-- mian-content -->
    <div class="main-banner inner" id="home">
        <!-- header -->
        <header class="header">
            <div class="container-fluid px-lg-5">
                <!-- nav -->
                <nav class="py-4">
                    <div id="logo">
                        <h1> <a href="index.php"><span class="fa fa-glide" aria-hidden="true"></span>oocar</a></h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="about.php">Tentang Kami</a></li>
                        <li class="active"><a href="produk.php">Produk</a></li>
                    </ul>
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->

    </div>
    <!--//main-content-->
    <!---->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Beranda</a>
        </li>
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <!---->
    <!-- banner -->
    <section class="ab-info-main py-md-5 py-4">
        <div class="container py-md-3">
            <!-- top Products -->
            <div class="row">
                <!-- product left -->
                <div class="side-bar col-lg-4">

                    <div class="search-bar w3layouts-newsletter">
                        <h3 class="sear-head">Cari Disini..</h3>
                        <form action="#" method="get" class="d-flex">
                            <input type="search" placeholder="Nama produk..." name="keyword" class="form-control"
                                required="" value="<?php if(isset($_GET['keyword'])){echo $_GET['keyword'];}?>">
                            <button class="btn1"><span class="fa fa-search" aria-hidden="true"></span></button>
                        </form>
                    </div>

                    <!--preference -->
                    <div class="left-side my-4">
                        <h3 class="sear-head">Kategori</h3>
                        <ul class="w3layouts-box-list">
                            <?php 
                                $qkategori = "SELECT * FROM kategori";
                                $q = mysqli_query($k,$qkategori);
                                while($r = mysqli_fetch_assoc($q)){
                                $isActive = ($selectedCategory == $r['nama']) ? 'font-weight-bold' : '';
                            ?>
                            <a href="produk.php?kategori=<?php echo $r['nama']; ?>">
                                <li>
                                    <span class="span <?php echo $isActive; ?>"><?php echo $r['nama']?></span>
                                </li>
                            </a>
                            <?php } ?>
                        </ul>
                    </div>

                    <!-- //deals -->

                </div>
                <!-- //product left -->
                <!-- product right -->
                <div class="left-ads-display col-lg-8">
                    <div class="row">
                        <?php while($produk = mysqli_fetch_array($qproduk)){?>
                        <div class="col-md-4 product-men mb-4">
                            <a href="produk-detail.php?nama=<?php echo $produk['nama_produk']?>">
                            <div class="product-shoe-info shoe text-center">
                                <div class="men-thumb-item-p">
                                    <img src="../gambar/<?=$produk['gambar']?>" class="img-fluid" alt="Card image cap">
                                </div>
                                <div class="item-info-product">
                                    <h4>
                                        <a
                                            href="produk-detail.php?nama=<?php echo $produk['nama_produk']?>"><?=$produk['nama_produk']?></a>
                                    </h4>

                                    <div class="product_price">
                                        <div class="grid-price">
                                            <span class="money">Rp.<?=$produk['harga']?></span>
                                        </div>
                                    </div>
                                    <ul class="stars">
                                        <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                        <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                        <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a>
                                        </li>
                                        <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a>
                                        </li>
                                        <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            </a>
                        </div>
                        
                        <?php } ?>

                    </div>
                    <div class="grid-img-right mt-4 text-right">
                        <span class="money">Diskon 50%
                        </span>
                        <a href="shop-single.html" class="btn">Belanja Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //contact -->
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row footer-top">
                <div class="col-lg-4 footer-grid_section_w3layouts">
                    <h2 class="logo-2 mb-lg-4 mb-3">
                        <a href="index.php"><span class="fa fa-glide" aria-hidden="true"></span>oocar</a>
                    </h2>
                    <p> Goocar adalah destinasi online terbaik untuk para pencinta mobil.
                    </p>
                    <h4 class="sub-con-fo ad-info my-4">Sosial media Kami</h4>
                    <ul class="w3layouts_social_list list-unstyled">
                        <li>
                            <a href="#" class="w3pvt_facebook">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="w3pvt_twitter">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="w3pvt_dribble">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                        <li class="ml-2">
                            <a href="#" class="w3pvt_google">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 footer-right">
                    <div class="row">
                        <div class="col-md-4 footer-grid_section_w3layouts">
                            <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Halaman</h3>
                            <ul class="list-unstyled w3layouts-icons">
                                <li>
                                    <a href="index.php">Beranda</a>
                                </li>
                                <li class="mt-3">
                                    <a href="about.php">Tentang Kami</a>
                                </li>
                                <li class="mt-3">
                                    <a href="produk.php">Produk</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 footer-grid_section_w3layouts">
                            <!-- social icons -->
                            <div class="agileinfo_social_icons">
                                <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Sponsor kami</h3>
                                <ul class="list-unstyled w3layouts-icons">

                                    <li>
                                        <a href="#">Lamborghini</a>
                                    </li>
                                    <li class="mt-3">
                                        <a href="#">Ferrari</a>
                                    </li>
                                    <li class="mt-3">
                                        <a href="#">BMW</a>
                                    </li>
                                    <li class="mt-3">
                                        <a href="#">Mercedes Benz</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- social icons -->
                        </div>
                        <div class="col-md-4 footer-grid_section_w3layouts my-md-0 my-5">
                            <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Kontak Kami</h3>
                            <div class="contact-info">
                                <div class="footer-address-inf">
                                    <h4 class="ad-info mb-2">No HP</h4>
                                    <p>+62 867 8907 9987</p>
                                </div>
                                <div class="footer-address-inf my-4">
                                    <h4 class="ad-info mb-2">Email </h4>
                                    <p><a href="mailto:info@example.com">goocar@gmail.com</a></p>
                                </div>
                                <div class="footer-address-inf">
                                    <h4 class="ad-info mb-2">Lokasi</h4>
                                    <p>Kraksaan, Probolinggo</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="cpy-right text-left row">
                        <p class="col-md-10">© 2023 Goocar. Toko Mobil
                        </p>
                        <!-- move top icon -->
                        <a href="#home" class="move-top text-right col-md-2"><span class="fa fa-long-arrow-up"
                                aria-hidden="true"></span></a>
                        <!-- //move top icon -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
</body>

</html>