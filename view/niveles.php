<?php require "view/header.php"; ?>


<div class="row justify-content-between">
    <spam type="button" class="btn btn-link" onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>menu.php';play1()">Volver</spam>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" style="height: 70vh;margin-top: 20px;border-radius: 20px; background-repeat: no-repeat;  background-position-x:center; background-position-y:center;background-size: 100% 100%;" src="<?php echo $GLOBALS['BASE_URL'] ?>publico/img/instrucciones/instruccion.png" alt="...">
            <!-- <div class="carousel-caption d-none d-md-block">
                <h2>Nivel 1</h2>
                <ol >
                    <li>Registrarse con un Nombre y seleccionar el nivel a jugar</li>
                    <li>Escoger el personaje</li>
                    <li>El juego consiste de tres niveles</li>
                    <li>Cada nivel consta de 10 preguntas, excepto el nivel 3</li>
                    <li>La respuesta de las preguntas son para juntar letra por letra o seleccionar la alternativa correcta</li>
                    <li>Cada pregunta tendrá un tiempo límite para responder</li>
                    <li>Cada nivel tendrá un puntaje de calificación</li>
                </ol>
            </div> -->
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" style="height: 70vh;margin-top: 20px;border-radius: 20px; background-repeat: no-repeat;  background-position-x:center; background-position-y:center;background-size: 100% 100%;" src="<?php echo $GLOBALS['BASE_URL'] ?>publico/img/instrucciones/nivel1instruccion.png" alt="...">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" style="height: 70vh;margin-top: 20px;border-radius: 20px; background-repeat: no-repeat;  background-position-x:center; background-position-y:center;background-size: 100% 100%;" src="<?php echo $GLOBALS['BASE_URL'] ?>publico/img/instrucciones/nivel2instruccion.png" alt="...">

        </div>
        <div class="carousel-item">
            <img class="d-block w-100" style="height: 70vh;margin-top: 20px;border-radius: 20px; background-repeat: no-repeat;  background-position-x:center; background-position-y:center;background-size: 100% 100%;"  src="<?php echo $GLOBALS['BASE_URL'] ?>publico/img/instrucciones/nivel3instruccion.png" alt="...">

        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<script>
    localStorage.setItem('background',"<?php echo $GLOBALS['BASE_URL'] ?>publico/img/img/fondojugadores.png");
    var audio = document.getElementById("audio");
    var time_audio = localStorage.getItem("audio");
    console.log("Audio= "+time_audio)
    audio.currentTime = time_audio;
    audio.play();
</script>
<?php require "view/footer.php"; ?>