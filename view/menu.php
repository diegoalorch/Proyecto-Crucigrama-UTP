<?php require "view/header.php"; ?>
<style>
    .start-btn {
        width: 400px;
        height: 70px;
        font-size: 2rem;
        text-align: center;
        display: inline-block;
        margin: 20px;
        font-weight: bold;
        padding: 10px 0 10px 0;
        background-color: lightgray;
        text-shadow: -1px -1px black, 1px 1px white;
        color: gray;
        -webkit-border-radius: 7px;
        -moz-border-radius: 7px;
        -o-border-radius: 7px;
        border-radius: 7px;
        box-shadow: 0 .2em gray;
        cursor: pointer;

    }

    .video-game-button:active,
    .start-btn:active {
        box-shadow: none;
        position: relative;
        top: .2em;
    }
</style>
<div class="row d-flex justify-content-center">
    <h1>Fisiquiando Ando</h1>
    
</div>
<div class="col-12" style="margin-top: 50px;">
    <div class="row justify-content-center"><span onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>menu/personaje';play1()" class="start-btn">Jugar</span></div>
    <div class="row justify-content-center"><span onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>niveles';play1()" class="start-btn">Niveles</span></div>
    <div class="row justify-content-center"><span onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>menu/score'" class="start-btn">Salir</span></div>
</div>


<?php require "view/footer.php"; ?>