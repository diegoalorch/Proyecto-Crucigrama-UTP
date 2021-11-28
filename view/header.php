<head>
<audio autoplay  preload=none id="audio" loop="true">
    <source src="<?php echo $GLOBALS['BASE_URL'] ?>publico\audio\fondo_music.mp3" type="audio/mp3" >
    <source src="<?php echo $GLOBALS['BASE_URL'] ?>publico\audio\fondo_music.ogv" type="audio/ogv" >
    Your browser does not support the audio element.
</audio>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script>
        document.documentElement.className = document.documentElement.className + ' yes-js js_active js'
    </script>
    <title>Encuesta</title>
    <meta name="robots" content="max-image-preview:large">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//s.w.org">
    <link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>publico/css/claim.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="icon" href="https://capilezza.com/wp-content/uploads/2021/04/cropped-Logotipo-03-1-32x32.png" sizes="32x32">
    <link rel="icon" href="https://capilezza.com/wp-content/uploads/2021/04/cropped-Logotipo-03-1-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="https://capilezza.com/wp-content/uploads/2021/04/cropped-Logotipo-03-1-180x180.png">
    <meta name="msapplication-TileImage" content="https://capilezza.com/wp-content/uploads/2021/04/cropped-Logotipo-03-1-270x270.png">
</head>



<!-- <script src="<?php echo $GLOBALS['BASE_URL'] ?>direccion.js"></script> -->

<body>
    <div class="music_button">
        <button onclick="play1()" id="design"> <img id="img_sound" src="<?php echo $GLOBALS['BASE_URL'] ?>publico/img/img/fondo_audio.png" width="100%" height="100%" style="filter: hue-rotate(120deg);"> </button>
    </div>
<div class="shadow-none p-3 mb-5 bg-light rounded" style="height: 100vh;padding-top: 20px;">
    <div class="container shadow-lg p-3 mb-5 bg-white rounded" style="background-color:#C19A6B; height: 95vh; padding-top: 15px;border-radius: 30px;">
        <div class="container shadow p-3 mb-5 bg-white rounded" id="fondo" style="height: 85vh;margin-top: 20px;border-radius: 20px; background-repeat: no-repeat;  background-position-x:center; background-position-y:center;background-size: 100% 100%;">