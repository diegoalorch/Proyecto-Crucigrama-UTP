<?php require "view/header.php"; ?>
<?php $data = json_decode(file_get_contents("question.json"), true);?>
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>publico/css/personaje.css">
<div class="container">
  <div class="block1">
    <div class="block_name">
      <div class="form__div">
        <input type="text" class="form__input" placeholder="apodo" id="input_nickname">
        <label for="" class="form__label">Apodo</label>
      </div>
    </div>
      <div class="block_select" >
        <select class="form-control select" id="id_select" name="id_select" >
          <option selected>Selecciona el Nivel</option>
          <option value="0">Nivel 1</option>
          <option value="1">Nivel 2</option>
          <option value="2">Nivel 3</option>
        </select>
      </div>
  </div>

  <div class="block2">
    <div class="card block2_img">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="img1"  style="background-image: url(<?php echo $GLOBALS['BASE_URL'] ?>publico/img/img/first_character.png)" onclick="validar(1);play1()"></div>
    </div>
    <div class="card block2_img">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="img2" style="background-image: url(<?php echo $GLOBALS['BASE_URL'] ?>publico/img/img/second_character.png)" onclick="validar(2);play1()"></div>
    </div>
  </div>
</div>
<script>
  var audio = document.getElementById("audio");
  var time_audio = localStorage.getItem("audio");
  console.log("Audio= "+time_audio)
  audio.currentTime = time_audio;
  audio.play();
  const ids1 = [<?php foreach ($data["Facil"] as $valor) { ?>
          <?php echo $valor["id"] . "," ?>
      <?php } ?>
  ]
    
</script>


<script type="text/javascript" src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/personaje.js"></script>
<?php require "view/footer.php"; ?>