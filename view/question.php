<?php require "view/header.php"; ?>
<style>
    .item {
        position: relative;
        float: left;
    }

    .item h2 {
        text-align: center;
        position: absolute;
        line-height: 125px;
        width: 100%;
    }

    svg {
        -webkit-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .circle_animation {
        stroke-dasharray: 440;
        /* this value is the pixel circumference of the circle */
        stroke-dashoffset: 440;
        transition: all 1s linear;
    }

    .contenedor {
        width: 500px;
        height: 200px;
        background-color: blueviolet;
        margin: 50px;
    }

    .superior {
        display: flex;
    }

    .letra {
        width: 50px;
        height: 50px;
        font-size: .8rem;
        text-align: center;
        border-radius: 10px;
        text-transform: uppercase;
    }

    #letras__contenedor {

        display: flex;
        gap: 27px;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .placeholder {
        width: 50px;
        height: 50px;
        background-color: limegreen;
        transition: 1s;
    }

    #medio {
        background-color: orchid !important;
        display: flex;
        width: 100%;
        gap: 10px;
        justify-content: center;
    }

    .hover {
        background: orange;
    }

    .pointter {
        cursor: pointer;
    }

    .opaco {
        opacity: 0%;
    }

    .divs{
        width: 400px;
        height: auto;
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
</style>
<div class="superior">

    <div class="contenedor container shadow p-3 mb-5 bg-white rounded" id="question">
    </div>
    <div id="example_write"></div>
    <div class="item html" id="idimg">
        <!-- <img src="<?php echo $GLOBALS['BASE_URL'] ?>publico/img/level_1/P1.gif" alt="this slowpoke moves"  width="250" id="idimg"/> -->
    </div>
</div>
<div id="medio">
</div>
<div id="letras__contenedor">
</div>
<div id="answer_container"></div>
<div id="writing_container"></div>
<div class="modal fade bd-example-modal-lg" id="modalWin" tabindex="-1" role="dialog" aria-labelledby="modalWinLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalWinLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="flex-wrap: nowrap !important;">
                    <img width="50%" src="<?php echo $GLOBALS['BASE_URL'] ?>publico/img/img/first_charcter_B.jpg" alt="" srcset="">
                    <h3>Mejor suerte para la proxima</h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="borrarArray();location.reload()" class="btn btn-primary">Continuar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="modalLost" tabindex="-1" role="dialog" aria-labelledby="modalLostLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLostLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="flex-wrap: nowrap !important;">
                    <img width="50%" src="<?php echo $GLOBALS['BASE_URL'] ?>publico/img/img/first_character.png" alt="" srcset="">
                    <h3>Increible respuesta correta</h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="borrarArray();location.reload()" class="btn btn-secondary" data-dismiss="modal">Continuar</button>

            </div>
        </div>
    </div>

</div>
<div id="button_VA"></div>
<button onclick="borrarArray()"></button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    function ShowModal(gano) {
        if (!gano) {
            console.log("1")
            $('#modalWin').modal('show')
        } else {
            console.log("2")
            $('#modalLost').modal('show')
        }
    }
    var letras_respuestas;
    var completado;
    function iniciarJuego(result) {
        console.log(result)
        const question = document.querySelector('#question');
        question.innerHTML = (result.question)
        const imagen1 = document.querySelector('#idimg');
        imagen1.innerHTML = ('<img src=<?php echo $GLOBALS['BASE_URL'] ?>'+result.imagen+' width=250/>')   

        if (result.tipoPregunta == 1) {
            //cricigrama
            console.log(result)
            letras_respuestas = (result.answer).split('');
            const letras_abecedario = [...letras_respuestas, 'z', 'x', 'v', 'g', 'h', 'k']
            const contenedor = document.querySelector('.contenedor');
            const medio = document.querySelector('#medio');
            const letras__contenedor = document.querySelector('#letras__contenedor');
            let terminado = letras_respuestas.length;
            var letter_id = 0;
            while (letras_abecedario.length) {
                const index = Math.floor(Math.random() * letras_abecedario.length);
                const div = document.createElement('div');
                div.className = 'letra shadow p-1 bg-white rounded pointter';
                div.id = letter_id;
                div.innerHTML = ("<h3>" + letras_abecedario[index] + "</h3>")
                letras__contenedor.appendChild(div)
                letras_abecedario.splice(index, 1);
                $(".pointter").on("click", function(event) {
                    console.log(event.target.textContent)
                    if (validarArray(event.target.textContent)) {
                        $(this).remove();
                        try {
                            document.querySelector("." + event.target.textContent).className = "letra shadow p-1 bg-white rounded"
                            alert("asd")
                        } catch (error) {
                            console.log(error)
                        }
                        validarRespuesta();
                    }
                    /* else{
                                    alert("Esta letra no se encuentra en la palabra")
                                } */

                    event.preventDefault();
                });
                letter_id++
            }
            console.log(medio);
            for (let index = 0; index < terminado; index++) {
                const div = document.createElement('div');
                div.className = 'placeholder ';
                div.id = index;
                const letraopacada = document.createElement('div');
                letraopacada.className = 'letra shadow p-1 bg-white rounded opaco ' + letras_respuestas[index];
                letraopacada.innerHTML = ("<h3>" + letras_respuestas[index] + "</h3>")
                div.appendChild(letraopacada)
                //letras_respuestas.splice(index, 1);
                medio.appendChild(div);
            }
            completado = document.getElementsByClassName("opaco");
        } else if (result.tipoPregunta == 2) {
            //respuesta multiple
            const contenedor = document.querySelector('.contenedor');
            const medio = document.querySelector('#medio');
            const letras__contenedor = document.querySelector('#letras__contenedor');
            
            loopDivs(result.answer);
            //letras_respuestas.splice(index, 1);
            // medio.appendChild(div);
        } else {
            const question = document.querySelector('#example_write');
            const contenedor = document.querySelector('.contenedor');
            const medio = document.querySelector('#medio');
            const letras__contenedor = document.querySelector('#letras__contenedor');
            const div = document.createElement('div');
            div.innerHTML = ("<h3> at Work </h3>")
            write_answer(result);
            medio.appendChild(div);
        }

    }

    /*Start Options*/
    function loopDivs(result2){
        for (let i = 0; i < result2.length; i++) {
            addDivs(result2[i]);
        }
    }

    function addDivs(nameDiv){
        let divNew = document.createElement('div');
        divNew.classList.add('divs');
        divNew.innerHTML = nameDiv.option;
        divNew.addEventListener('click',function(){
            if (nameDiv.iscorrect == true) {
                ShowModal(true);
            } else {    
                ShowModal(false);
            }
        })
        
        document.getElementById('answer_container').appendChild(divNew);
    }
    /*End Options*/
    
    /*Start Write Answer*/
    
    function write_answer(result2){          
        const writing = document.createElement('input');
        document.getElementById('writing_container').appendChild(writing);
        writing.classList.add('answer_writing');
        condition_text(result2);
    }
    var cadena="";
    function condition_text(result){
        cadena = result.answer;
        if (result.answer.match(/,.*/)) {
            const question = document.querySelector('#question');
            question.removeChild;
            question.innerHTML = ("<span>"+result.question+"</span><br><br> Respuesta en orden alfabetico, ejemplo : La almendra, epidemia y los mamiferos");
            console.log("tiene coma : Ejemplo y palabras clave");
            const button_Va = document.querySelector('#button_VA');
            answer_with_comma();
            button_Va.innerHTML = ("<button onclick=validarAnswert2()>Next Level 2</button>");
        } else {
            const button_Va = document.querySelector('#button_VA');
            button_Va.innerHTML = ("<button onclick=validarAnswert1()>Next Level</button>");     
            answer_without_comma(cadena);
        }
    }

    var keyword="";
    var keyword_1="";
    var keyword_2="";
    var keyword_3="";
    function answer_without_comma(cadena){        
        var arrayCadenas = separador(cadena," ")
        console.log(arrayCadenas);
        for (var i=0; i < arrayCadenas.length; i++){
            if (arrayCadenas[i].length > 2 ) {
                console.log(arrayCadenas[i]);
                keyword = keyword +" "+ arrayCadenas[i];
            }else{
                console.log("No eres apto" + arrayCadenas[i]);
            }
        }
    }

    function answer_with_comma(){
        var arrayOne = separador(cadena,",");
        for (var i=0; i < arrayOne.length; i++){
            if (arrayOne[i].match(/y.*/)) {
                console.log("testando");
                var arrayTwo = separador(arrayOne[i],"y");
                console.log(arrayTwo);
                for (let i2 = 0; i2 < arrayTwo.length; i2++) {
                    var arrayFinal = separador(arrayTwo[i2]," ");
                    console.log(arrayFinal);
                    for (let i3 = 0; i3 < arrayFinal.length; i3++) {
                        if (arrayFinal[i3].length > 2) {
                            if (i2 == 0) {
                                keyword_2 = keyword_2 +" "+ arrayFinal[i3];
                            }else if(i2 == 1){
                                keyword_3 = keyword_3 +" "+ arrayFinal[i3];
                            }
                        }
                    }
                }
            }else{
                var array_key1 = separador(arrayOne[i]," ");
                test(array_key1);
            }
        }
        console.log("======================");
        console.log("key 1 = " + keyword_1);
        console.log("key 2 = " + keyword_2);
        console.log("key 3 = " + keyword_3);
    }

    function test(array_key1){
        for (var i=0; i < array_key1.length; i++){
            if (array_key1[i].length > 2 ) {
                keyword_1 = keyword_1 +" "+ array_key1[i];
            }
        }
    }

    function validarAnswert1(){
        console.log("test");
        console.log(keyword);
        var input = $(".answer_writing").val();
        var newinput = "l "+input+" l" 
        console.log(input);
        console.log("====================");
        if (newinput.toLowerCase().match(keyword.toLowerCase())){
            console.log("ponwer el modal de correcto")
        }
    }

    function validarAnswert2(){
        var writing_1 = "";
        var writing_2 = "";
        var writing_3 = "";
        var input = $(".answer_writing").val();
        input = input.replace(", "," ");
        input = input.replace(" y "," ");
        newinput = separador(input," ");
        console.log("===========")
        console.log(newinput);
        let i2 = 0 ;
        for (let i = 0; i < newinput.length; i++){
            if(newinput[i].length > 2){
                i2= i2 + 1;
                console.log("Hola please");
                if (i2 == 1) {
                    writing_1 ="t "+ newinput[i];
                }else if(i2 == 2){
                    writing_2 ="t "+ newinput[i];
                }else if(i2 == 3){
                    writing_3 ="t "+ newinput[i];                    
                }
            }
        }
        if (writing_1.toLowerCase().match(keyword_1.toLowerCase())){
            console.log("Primer ");
            if (writing_2.toLowerCase().match(keyword_2.toLowerCase())){
                console.log("Segundo");
                if (writing_3.toLowerCase().match(keyword_3.toLowerCase())){
                    console.log("Tercera");
                    ShowModal(true);
                }else{
                    ShowModal(false);
                }
            }else{
                ShowModal(false);
            }
        }else{
            ShowModal(false);
        }  
    }
    function separador(cadena1,indicador){
        var arrayCadenas = cadena1.split(indicador);
        return arrayCadenas;
    }
    /*End Write Answer*/

    function borrarArray() {
        var ids = localStorage.getItem("ids")
        console.log(ids)
        var newIds = ids.slice(2)
        localStorage.setItem("ids", newIds)
    }

    function validarArray(letra) {
        var encontrado = false;
        for (let i = 0; i < letras_respuestas.length; i++) {
            const comparador = letras_respuestas[i];
            if (comparador == letra) {
                encontrado = true
            }
        }
        return encontrado;

    }

    function validarRespuesta() {
        completado
        if (completado.length == 0) {
            ShowModal(true)
            //console.log("se acabaron manooooooooo");
            //console.log($("#medio").text());
        }
    }

    function local() {
        var con = localStorage.getItem('ids'); 
        var nivel = localStorage.getItem('nivel'); 
        $.ajax({
            type: "POST",
            url: "quiestion/json",
            data: {
                data: con
            },
            dataType: 'json',
            success: function(data) {
                console.log("data");
                console.log(data);
                $.ajax({
                    type: "POST",
                    url: "quiestion/filtrador",
                    data: {
                        data: data[0],
                        nivel: nivel
                    },
                    dataType: 'json',
                    success: function(result) {
                        iniciarJuego(result[data[0]])
                    },
                    error: function(error) {
                        alert(error);
                        console.log(error);
                    }
                });
            },
            error: function(error) {
                alert(error);
                console.log(error);
            }
        });
    };
    local();
    /* letras__contenedor.addEventListener('dragstart', e => {

        e.dataTransfer.setData('id', e.target.id)
    })
    medio.addEventListener('dragover', e => {
        e.preventDefault();
        e.target.classList.add('hover');
    })
    medio.addEventListener('dragleave', e => {
        e.target.classList.remove('hover');
    })
    medio.addEventListener('drop', e => {
        const id = e.dataTransfer.getData('id')
        e.target.classList.remove('hover');
        if (!e.target.textContent) {
            e.target.appendChild(document.getElementById(id))
            terminado--
        }
        if (terminado === 0) {
            let contenedor = document.getElementsByClassName('placeholder');
            let answord = "";
            for (let i = 0; i < contenedor.length; i++) {
                const element = contenedor[i];
                answord += element.textContent
            }

            ShowModal(answord == "distancia")

        }

    }) */
    setTimeout(function() {

        var time = 30; /* how long the timer will run (seconds) */
        var initialOffset = '440';
        var i = 30

        /* Need initial run as interval hasn't yet occured... */
        $('.circle_animation').css('stroke-dashoffset', initialOffset - (1 * (initialOffset / time)));

        var interval = setInterval(function() {
            $('h2').text(i);
            if (i == 0) {
                clearInterval(interval);
                return;
            }
            $('.circle_animation').css('stroke-dashoffset', initialOffset - ((i + 1) * (initialOffset / time)));
            i--;
        }, 1000);

    }, 0)


</script>
<?php require "view/footer.php"; ?>