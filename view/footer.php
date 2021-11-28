</div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/web/register.js"></script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/web/claim_steps.js"></script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>direccion.js"></script>
<script>
    $("#myButton").trigger("click");
    var timeAudio = localStorage.getItem("audio");
    var audio = document.getElementById("audio");
    audio.currentTime = timeAudio;
    // audio.muted !=audio.muted;
    console.log(timeAudio);
    audio.volume = 0.5;
    audio.muted = false;
    audio.play();

    function play1() {
        if (document.getElementById("img_sound").src == url + "publico/img/img/fondo_audio.png") {
            document.getElementById("img_sound").src = url + "publico/img/img/audio_muted.png"
        } else {
            document.getElementById("img_sound").src = url + "publico/img/img/fondo_audio.png"
        }
        var audio2 = document.getElementById("audio");
        localStorage.removeItem("audio");
        localStorage.setItem("audio", audio2.currentTime);
        console.log(audio2.muted);
        audio2.play();
        audio2.muted = !audio2.muted;
        audio2.loop = true;
    }

    function setBackground(){
        document.getElementById("fondo").style.backgroundImage = "url("+localStorage.getItem("background")+")";
    }
    setBackground();
</script>