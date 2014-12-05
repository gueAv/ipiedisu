<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>I PIEDI SU TV</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link href='http://fonts.googleapis.com/css?family=Actor' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    <?php
        //mainvideo deve essere il primo
        $ids = array(
            'YSNIXmQdCxk',
            '9jw4hseHvsE',
            'IuKBRxnl_40',
            'CWslLwRha14'
            );
    ?>
        <header>
            <img src="img/ipiedisu-logo.png">
        </header>
        <div class="mainvideo_cont">
            <div class="main_video_limit">
                <div class="mainvideo">
                    <div class="to_play full_size" style="background-image: url('http://img.youtube.com/vi/<?php echo $ids[0];?>/0.jpg')">
                        <div class="layer_play full_size" data-idvideo="<?php echo $ids[0];?>"></div>
                    </div>
                    <div id="mainplayer" class="full_size"></div>

                </div>
            </div>
        </div>
        <div class="intro">
            <h1>CONCEPT</h1>
            <p>Esistono innumerevoli variazioni dei passaggi del Lorem Ipsum, ma la maggior parte hanno subito delle variazioni del tempo, a causa dell’inserimento di passaggi ironici, o di sequenze casuali di caratteri palesemente poco verosimili. Se si decide di utilizzare un passaggio del Lorem Ipsum, è bene essere certi che non contenga nulla di imbarazzante. In genere, i generatori di testo segnaposto disponibili su internet tendono a ripetere paragrafi predefiniti, rendendo questo il primo vero generatore automatico su intenet. Infatti utilizza un dizionario di oltre 200 vocaboli latini, combinati con un insieme di modelli di strutture di periodi, per generare passaggi di testo verosimili. Il testo così generato è sempre privo di ripetizioni, parole imbarazzanti o fuori luogo ecc.</p>
        </div>
        <?php if(count($ids) > 1){
            $count = 0;
            ?>
            <div class="thumb_cont">
                <h2> GUARDA GLI ALTRI VIDEO</h2>
                <?php foreach ($ids as $video){ ?>
                    <div class="thumb thumb_<?php echo $video; if($count == 0){ echo ' hide';} ?>">
                        <div class="to_play full_size" style="background-image: url('http://img.youtube.com/vi/<?php echo $video;?>/0.jpg')">
                        <div class="layer_play full_size" data-idvideo="<?php echo $video;?>"></div>
                    </div>
                    </div>

                <?php $count++; } ?>
            </div>
        <?php }?>

        <footer>
             <span>&copy; All right reserved to I PIEDI SU team. </span>
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script-->
    </body>
</html>
