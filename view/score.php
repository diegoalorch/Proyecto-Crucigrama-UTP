<?php require "view/header.php"; ?>
<style>
    ::-webkit-scrollbar {display: none;}
    .scoreTemplate {
        width: 100%;
        max-height: 500px;
        padding-top: 340px;
        justify-content: center;
        display: flex;
        flex-direction: column;
        gap: 10px;
        overflow-x: visible;
        overflow-y: scroll;
    }

    .score {
        display: flex;
        justify-content: center;
    }
</style>
<div class="scoreTemplate">
    <div class="row justify-content-between">
        <spam type="button" class="btn btn-link" onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>menu.php';play1()">Volver</spam>
    </div>
    <div class="score" id="scoreFacil"></div>
    <div class="score" id="scoreNormal"></div>
    <div class="score" id="scoreDificil"></div>
</div>
<script type="text/javascript" src="<?php echo $GLOBALS['BASE_URL'] ?>direccion.js"></script>
<script>
    const scoreFacil = localStorage.getItem('scoreFacil') ? localStorage.getItem('scoreFacil') : 0;
    const scoreDivFacil = document.querySelector('#scoreFacil');
    const scoreNormal = localStorage.getItem('scoreNormal') ? localStorage.getItem('scoreNormal') : 0;
    const scoreDivNormal = document.querySelector('#scoreNormal');
    const scoreDificil = localStorage.getItem('scoreDificil') ? localStorage.getItem('scoreDificil') : 0;
    const scoreDivDificil = document.querySelector('#scoreDificil');
    var urlImgFacil = "publico/img/score/1-" + scoreFacil + ".png";
    var urlImgNormal = "publico/img/score/2-" + scoreNormal + ".png";
    var urlImgDificil = "publico/img/score/3-" + scoreDificil + ".png";
    console.log(url + urlImgFacil)
    const imgScoreFacil = document.createElement('img')
    imgScoreFacil.setAttribute('src', url + urlImgFacil)
    imgScoreFacil.style.width = '80%'
    scoreDivFacil.appendChild(imgScoreFacil)
    const imgScoreNormal = document.createElement('img')
    imgScoreNormal.setAttribute('src', url + urlImgNormal)
    imgScoreNormal.style.width = '80%'
    scoreDivNormal.appendChild(imgScoreNormal)
    const imgScoreDificil = document.createElement('img')
    imgScoreDificil.setAttribute('src', url + urlImgDificil)
    imgScoreDificil.style.width = '80%'
    scoreDivDificil.appendChild(imgScoreDificil)
</script>
<?php require "view/footer.php"; ?>