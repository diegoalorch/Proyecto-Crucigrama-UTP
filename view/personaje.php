<?php require "view/header.php"; ?>
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>publico/css/personaje.css">
<div class="container">
  <div class="block1">
    <div class="block_name">
      <div class="form__div">
          <input type="text" class="form__input" placeholder="apodo" id="input_nickname">
          <label for="" class="form__label">Apodo</label>
      </div>
    </div>
    <div class="block_select">
      <select class="form-control select" id="id_select" onchange="show();">
          <option selected>Seleccione la dificultad</option>
          <option value="0">Facil</option>
          <option value="1">Normal</option>
          <option value="2">Dificil</option>
      </select>  
    </div>
  </div>

  <div class="block2">
    <div class="block2_img">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="img1" onclick="validar(1)"></div>
    </div>
    <div class="block2_img">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="img2" onclick="validar(2)"></div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/personaje.js"></script>
<?php require "view/footer.php"; ?>