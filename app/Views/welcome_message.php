<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/dist/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>template/dist/assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>template/dist/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/dist/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/dist/assets/css/vertical-light-layout/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url(); ?>img/logo-mastatv-head.png" />
    <style>
        body {
            background-image: url('linen-texture.jpg');
            /* Ganti 'linen-texture.jpg' dengan nama file gambar tekstur linen Anda */
            background-repeat: repeat;
            background-color: #f5f5f5;
            /* Warna putih tulang sebagai latar belakang */
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            font-size: 8rem;
            color: #333;
            /* Hitam */
        }

        span {
            color: #006400;
            /* Hijau tua */
        }

        p {
            font-size: 1.1rem;
            font-style: italic;
            color: #333;
            /* Hitam */
        }

        .btn-hijau-tua {
            background-color: #006400;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .btn-hijau-tua:hover {
            background-color: #007b00;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .row {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="row align-content-center">
        <div class="col">
            <h1>MASTA
                <span>TV</span>
            </h1>
            <p>"Media dakwah Pondok Pesantren Imam Syafi'i Tulungagung"</p>
            <a href="<?= base_url('login'); ?>" class="btn btn-hijau-tua">Mulai sekarang</a>
        </div>
    </div>
</body>

</html>