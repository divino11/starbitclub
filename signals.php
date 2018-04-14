<?php
session_start();
require_once 'db.php';
mysqli_set_charset($link, 'utf8');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="js/device.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Долгосрочные сигналы</title>
    <style>
        .col-md-4 {
            height: 50px;
        }
    </style>
</head>
<body>
<div class="reg-page">
    <?php require_once "template/menu.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <img src="img/logo-main-new.png" class="logo-reg" alt="">
        <div class="form-white-reg">
            <div class="default-field">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $sql = "SELECT * FROM `long_signal` ORDER BY id DESC";
                        mysqli_set_charset($link, 'utf8');
                        $result = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $long_signal = $row['long_signal'];
                            $date = $row['date'];
                            ?>
                            <div class="col-md-4 pageSignals">
                                <p><?php echo $id; ?>.</p>
                            </div>
                            <div class="col-md-4 pageSignals">
                                <p><?php echo $long_signal; ?></p>
                            </div>
                            <div class="col-md-4 pageSignals">
                                <p><?php echo $date; ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117114324-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-117114324-1');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter48373727 = new Ya.Metrika({
                    id:48373727,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/48373727" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script data-skip-moving="true">
    (function(w,d,u){
        var s=d.createElement('script');s.async=1;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://cdn.bitrix24.ru/b6766487/crm/site_button/loader_2_7nsjuk.js');
</script>
</body>
</html>
