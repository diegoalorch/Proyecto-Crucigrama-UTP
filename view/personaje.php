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
  width: : 100%;
}
/*******************  CONTAINER BLOCK 1 *****************/
.block1{
  margin-top:1em;
  width: 100%;
  height: 13%;
  display:flex;
  box-shadow: 3px 3px 8px -1px #c1c1bd;
  border: 0.5px var(--border-color);
  border-radius: .5rem;

}
.block_name{
  flex: 8;
  margin-top: 1em;
  margin-right: 1em;
  margin-left: 1em;
  height: 50%;
}
.block_select{
  flex: 4;
  margin-top: 1em;
  margin-right:1em;
  height: 50%;
  radius: .5rem;
}

/************************ Input text nickname  *****************/
.form__div{
  position: relative;
  height: 6.5vh;
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


/*Select*/
.select{
  width: 100%;
  height: 48px;
  border-radius: .5rem;
}
/********************** BLOCK 2 **************************/
.block2{
  /* background-color: green; */
  display: flex;
  margin-top:0.5em;
  padding:1em;
  width: 100%;
  height: 80%;
  float: left;
  border: 0.5 var(--first-color);
  border-radius: .5rem;
  box-shadow: 3px 3px 8px -1px #c1c1bd;
  justify-content: space-between;
}
.men{
  position:relative;
  height:100%;
  width:49.5%;
  
  border: 0.5 var(--first-color);
  border-radius: .5rem;
  box-shadow: 3px 3px 8px -1px #c1c1bd;
}
.woman{
  position:relative;
  height:100%;
  width:49.5%;
  margin-left:1%;
  border: 0.5 var(--first-color);
  border-radius: .5rem;
  box-shadow: 3px 3px 8px -1px #c1c1bd;
}

/* Images */
.img_men{
  display: block;
  width:100%;
  height:100%;
  border: 0.5 var(--first-color);
  border-radius: .5rem;
  shadow: 10px 10px 101px;
  transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -ms-transition:all 0.5s ease;
  overflow: hidden;
  cursor: pointer;
}

.img_men:hover {
  backface-visibility: hidden;
  transform:scale(1.15,1.15);
  opacity: 1;
  padding: 3px;
  width:98%;
  height:98%;
}

@media screen and (max-width:600px){
  .block1{
    flex-direction:column;
  }
} 
</style>
<div class="container">
  <div class="block1">
    <div class="block_name">
      <div class="form__div">
          <input type="text" class="form__input" placeholder=" ">
          <label for="" class="form__label">Apodo</label>
      </div>
    </div>
    <div class="block_select">
      <select class="form-control select" id="inputGroupSelect01">
          <option selected>Seleccione la dificultad</option>
          <option value="1">Facil</option>
          <option value="2">Normal</option>
          <option value="3">Dificil</option>
      </select>  
    </div>
  </div>

  <div class="block2">
    <div class="men">
      <img class="img_men" src="https://cdn.forbes.co/2020/09/Lionel-Messi-EFE-1280X720.jpg" onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>quiestion'">
    </div>
    <div class="woman">
      <img class="img_men" src="https://i1.wp.com/elpoli.pe/wp-content/uploads/2015/09/Nata1.jpg?fit=799%2C523&ssl=1" onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>quiestion'" >
    </div>
  </div>

</div>


<?php require "view/footer.php"; ?>