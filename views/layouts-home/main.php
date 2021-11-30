<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
// \app\assets\HomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <?php
    $setting = \app\models\Setting::find()->one();
    ?>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="<?= $setting->nama_web ?>">
    <link href="<?= Yii::$app->urlManager->baseUrl . '/uploads/setting/' . $setting->logo ?>" rel="icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($setting->judul_web) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php \app\assets\HomeAsset::register($this); ?>
    <script>
        var baseUrl = "<?= Yii::$app->urlManager->baseUrl ?>";
    </script>
    <?php $this->head() ?>
    <style>
        #modal-registrasi .modal-header .close {
            padding: 0;
            margin: 0;
        }

        #modal-registrasi {
            background: rgba(0, 0, 0, .65);
        }

        #modal-registrasi .modal-content,
        #modal-registrasi .modal-header {
            background: transparent;
            border: 0;
            border-radius: 0;
        }

        #modal-registrasi .modal-header,
        #modal-registrasi .modal-header h2 {
            color: #fff;
        }

        #modal-registrasi .modal-body {
            background: whitesmoke;
            border-radius: 2rem;
            margin-bottom: 2rem;
        }

        #modal-registrasi .close {
            color: white;
        }
        

        #modal-login .modal-header .close {
            padding: 0;
            margin: 0;
        }

        #modal-login {
            background: rgba(0, 0, 0, .65);
        }

        #modal-login .modal-content,
        #modal-login .modal-header {
            background: transparent;
            border: 0;
            border-radius: 0;
        }

        #modal-login .modal-header,
        #modal-login .modal-header h2 {
            color: #fff;
        }

        #modal-login .modal-body {
            background: whitesmoke;
            border-radius: 2rem;
            margin-bottom: 2rem;
        }

        #modal-login .close {
            color: white;
        }
    </style>

</head>

<body>
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <?= $this->render('header') ?>
        <?= $this->render(
            'content.php',
            [
                'content' => $content,
            ]
        ) ?>
    </div>
    <?= $this->render('footer') ?>
    <button id="scrollTopBtn"><i class="fas fa-chevron-circle-up"></i></button>

    <?php $this->endBody() ?>
    <?php $this->registerJsFile("https://maps.googleapis.com/maps/api/js?key=AIzaSyCV6HOHjE9XM8IbEaL6ZMZdW8e0tavsOL8&libraries=places&region=id&language=en&sensor=false"); ?>
</body>

<?php
\app\components\Modal::begin([
    'id' => 'modal-registrasi',
    'header' => '<div style=\'text-align:center;width:100%\'><h2>Mendaftar</h2> <p>Silahkan mengisi Data anda untuk mendaftar</p></div>'
]);
?>
<div id="modal-body"></div>
<?php \app\components\Modal::end() ?>

<?php
\app\components\Modal::begin([
    'id' => 'modal-login',
    'header' => '<div style=\'text-align:center;width:100%\'><h2>Login</h2> <p>Silahkan mengisi Data anda untuk login</p></div>'
]);
?>
<div id="modal-body2"></div>
<?php \app\components\Modal::end() ?>
<script>
    var marker;

    function initialize() {

        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;

        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php

        $nama = $setting->nama_web;
        $lat = $setting->latitude;
        $lon = $setting->longitude;

        echo ("addMarker('<b>$nama</b>');\n");

        ?>

        // Proses membuat marker 
        function addMarker(info) {
            var lat = <?php echo $lat ?>;
            var lng = <?php echo $lon ?>;
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });
            // map.fitBounds(bounds);
            map.setCenter(bounds.getCenter());
            map.setZoom(16);
            bindInfoWindow(marker, map, infoWindow, info);
        }

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                if (map.getZoom() > 16) map.setZoom(16);
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }

    }
    google.maps.event.addDomListener(window, 'load', initialize);
    $(document).ready(function() {
        var success = "<?= \Yii::$app->session->getFlash('success') ?>";
        var error = "<?= \Yii::$app->session->getFlash('error') ?>";
        if (error !== "") {
            Swal.fire("Peringatan!", "<?= \Yii::$app->session->getFlash('error') ?>", "error");
        }
        if (success !== "") {
            Swal.fire("Peringatan!", "<?= \Yii::$app->session->getFlash('success') ?>", "success");
        }
    });
</script>

<script>
    $(window).ready(() => {
        try {

            $('#btn-registrasi').on('click', async () => {
                let response = await fetch("<?= Url::to(['/registrasi'], false) ?>", {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                response = await response.text();
                var parser = new DOMParser();
                var doc = parser.parseFromString(response, 'text/html');
                $("#modal-body").html(response);
                // $("#modal-registrasi").modal("show")
                $("#modal-registrasi").attr("style", "padding-right: 17px; display: block;overflow:auto")
                $("#modal-registrasi").attr("class", "fade modal show");
                document.querySelector("#modal-registrasi .close").addEventListener("click", () => {
                    $("#modal-registrasi").removeAttr("style")
                    $("#modal-registrasi").attr("class", "fade modal");
                })
            });

            $('#btn-login').on('click', async () => {
                let response = await fetch("<?= Url::to(['/login'], false) ?>", {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                response = await response.text();
                var parser = new DOMParser();
                var doc = parser.parseFromString(response, 'text/html');
                console.log(response)
                $("#modal-body2").html(response);
                // $("#modal-login").modal("show")
                $("#modal-login").attr("style", "padding-right: 17px; display: block;overflow:auto")
                $("#modal-login").attr("class", "fade modal show");
                document.querySelector("#modal-login .close").addEventListener("click", () => {
                    $("#modal-login").removeAttr("style")
                    $("#modal-login").attr("class", "fade modal");
                })
            });
        } catch (error) {
            console.log(error)
        }
    })

</script>

</html>
<?php $this->endPage() ?>