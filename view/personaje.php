<?php require "view/header.php"; ?>
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>publico/css/personaje.css">
<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");
:root{
  /*===== Colores =====*/
  --first-color: #1A73E8;
  --input-color: #80868B;
  --border-color: #DADCE0;

  /*===== Fuente y tipografia =====*/
  --body-font: 'Roboto', sans-serif;
  --normal-font-size: 1rem;
  --small-font-size: .75rem;
}
.container {
  height: 100%;
  width: : 100;
}
/* Containers BLOCK 1*/
.block1{
  margin-top:1em;
  width: 100%;
  height: 20%;

  float: left;
}
.block_name{
  margin-top: 1em;
  margin-right: 1em;
  margin-left: 1em;
  width: 60%;
  height: 50%;
  float: left;
}
.block_select{
  margin-top: 1em;
  width: 28%;
  height: 50%;
  float: left;
}

/************************ Input text nickname  *****************/
.form__div{
  position: relative;
  height: 48px;
  margin-bottom: 1.5rem;
}
.form__input{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  font-size: var(--normal-font-size);
  border: 1px solid var(--border-color);
  border-radius: .5rem;
  outline: none;
  padding: 1rem;
  background: none;
  z-index: 1;
}
.form__label{
  position: absolute;
  left: 1rem;
  top: 0.8rem;
  padding: 0 .28rem;
  background-color: #fff;
  color: var(--input-color);
  font-size: var(--normal-font-size);
  transition: .3s;
}
.form__button{
  display: block;
  margin-left: auto;
  padding: .75rem 2rem;
  outline: none;
  border: none;
  background-color: var(--first-color);
  color: #fff;
  font-size: var(--normal-font-size);
  border-radius: .5rem;
  cursor: pointer;
  transition: .3s;
}
.form__button:hover{
  box-shadow: 0 10px 36px rgba(0,0,0,.15);
}

/*Input focus move up label*/
.form__input:focus + .form__label{
  top: -.5rem;
  left: .8rem;
  color: var(--first-color);
  font-size: var(--small-font-size);
  font-weight: 500;
  z-index: 10;
}

/*Input focus sticky top label*/
.form__input:not(:placeholder-shown).form__input:not(:focus)+ .form__label{
  top: -.5rem;
  left: .8rem;
  font-size: var(--small-font-size);
  font-weight: 500;
  z-index: 10;
}

/*Input focus*/
.form__input:focus{
  border: 1.5px solid var(--first-color);
}


/********************************select ***************/
.select{
  width: 100%;
  height: 48px;
}
</style>
<div class="container">
  <div class="block1">
    <div class="block_name">
      <div class="form__div">
          <input type="text" class="form__input" placeholder=" ">
          <label for="" class="form__label">Nickname</label>
      </div>
    </div>
    <div class="block_select">
      <select class="form-control select" id="inputGroupSelect01">
          <option selected>Dificultad</option>
          <option value="1">Facil</option>
          <option value="2">Normal</option>
          <option value="3">Dificil</option>
      </select>  
    </div>
  </div>
</div>


<?php require "view/footer.php"; ?>