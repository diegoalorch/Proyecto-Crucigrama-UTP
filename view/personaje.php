<?php require "view/header.php"; ?>
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>publico/css/personaje.css">
<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");
:root{
  /*===== Colores =====*/
  --first-color: #1A73E8;
  --input-color: #80868B;
  --border-color: #DADCE0;
  --border-block2:#ffbf00;
  --color-oro:#ffbf00;

  /*===== Fuente y tipografia =====*/
  --body-font: 'Roboto', sans-serif;
  --normal-font-size: 1rem;
  --small-font-size: .75rem;
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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
  margin-bottom: 1.5em;
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
  height: 6.5vh;
  border-radius: .5rem;
}
/********************** BLOCK 2 **************************/
.block2{
  display: flex;
  margin-top:0.5em;
  padding:1em;
  width: 100%;
  height: 80%;
  border: 0.5 var(--first-color);
  border-radius: .5rem;
  box-shadow: 3px 3px 8px -1px #c1c1bd;
  justify-content: space-between;
}

.block2_img{
  height: 100%;
  width: 49%;
  background-color: #eef0d5;
  justify-content: center;
  position: relative;
  align-items: center;
  display: inline-block;
  overflow: hidden;
  transition: 0.5s;
}
.img1{
  height: 100%;
  width: 100%;
  margin-bottom:-100%;
  background:url(../publico/img/img/first_character.png);
  background-repeat: no-repeat;
  background-position: center;
  background-size:40%;
  transition: 0.5s;
}

.img1:hover{
  background-size: 55%;;
  background-position: center;
}
.img2{
  height: 100%;
  width: 100%;
  /* margin-left:-6%; */
  margin-bottom:-100%;
  background:url(../publico/img/img/second_character.png);
  background-position: center;
  background-repeat: no-repeat;
  background-size:60%;
  transition: 0.5s;
}

.img2:hover{
  background-size: 80%;;
  background-position: center;
}


/*container block2_img effect border*/

.block2_img:hover{
    background-color:var(--border-block2);
    color: var(--background-color);
    box-shadow: 0 0 5px var(--border-block2),
                0 0 25px var(--border-block2),
                0 0 30px var(--border-block2);
                /* 0 0 200px var(--border-block2); */
}

span{
  position: absolute;
  display:block;
}
span:nth-child(1){
  top: 0;;
  left:0;
  width: 100%;
  height: 2px;
  background:linear-gradient(90deg,transparent,var(--color-oro));
  animation: animate1 1s linear infinite;
  /* animation-delay:0.10s; */
}
@keyframes animate1 {
  0%{
    left:-100%;
  }
  50%,100%{
    left:100%;
  }
}
span:nth-child(2){
  top: -100%;
  right:0;
  width: 2px;
  height: 100%;
  background:linear-gradient(180deg,transparent,var(--color-oro));
  animation: animate2 1s linear infinite;
  animation-delay:0.25s;
}
@keyframes animate2 {
  0%{
    top:-100%;
  }
  50%,100%{
    top:100%;
  }
}
span:nth-child(3){
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background:linear-gradient(270deg,transparent,var(--color-oro));
  animation: animate3 1s linear infinite;
  animation-delay:0.5s;
}
@keyframes animate3 {
  0%{
    right:-100%;
  }
  50%,100%{
    right:100%;
  }
}
span:nth-child(4){
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background:linear-gradient(180deg,transparent,var(--color-oro));
  animation: animate4 1s linear infinite;
  animation-delay:0.75s;
}
@keyframes animate4 {
  0%{
    bottom:-100%;
  }
  50%,100%{
    bottom:100%;
  }
}


/* Responsive Block 1 */
@media screen and (max-width:600px){
  .block1{
    flex-direction:column;
    height:26%;    
  }
  .block_select{
    margin-left:1em;
    margin-top: -0.5em;
  }
  .block2{
    flex-direction:column;
    height:70%;
  }
  .block2_img{
    width: 100%;
    height: 49%;
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
    <div class="block2_img">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="img1" onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>quiestion'"></div>
    </div>
    <div class="block2_img">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <div class="img2" onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>quiestion'"></div>
    </div>
  </div>

</div>


<?php require "view/footer.php"; ?>