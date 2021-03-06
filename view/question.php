<?php require "view/header.php"; ?>
<?php $data = json_decode(file_get_contents("question.json"), true); ?>
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

    .cronometro {
        position: relative;
        top: -55%;
        left: -40%;
        background-color: #a24949d9 !important;
    }

    .contenedor {
        width: 500px;
        height: 200px;
        background-color: blueviolet;
        margin-top: 50px;
        margin-left: 50px;
        margin-right: 50px;
        margin-bottom: 20px !important;
    }

    #vidas {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .superior {
        display: flex;
        align-items: center;
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
        display: flex;
        width: 100%;
        gap: 10px;
        justify-content: center;
        font-size: 2rem;
        font-weight: bold;
        text-shadow: -1px -1px black, 1px 1px white;
        color: gray;
        border-radius: 7px;

    }

    .pointter {
        cursor: pointer;
    }

    .opaco {
        opacity: 0%;
    }

    .divs {
        display: flex;
        width: 450px;
        height: 78px;
        max-height: 78px;
        font-size: 1.5rem;
        text-align: center;
        align-items: center;
        justify-content: center;
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
        flex-wrap: nowrap;
    }

    #answer_container {
        display: flex;
        flex-wrap: wrap;

    }

    .teclado {
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
    }

    #writing_container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .answer_writing {
        width: 51vw;
        height: 50px;
    }

    #button_VA {
        padding-top: 10px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .button_1 {
        text-align: center;
        font-weight: bold;
        font-size: 2rem;
        width: 51vw;
        height: auto;
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
    }

    #x2answer {
        display: flex;
        flex-direction: row;
        justify-content: center;
        text-align: center;
        /* justify-content: space-between; */
    }

    .input_x1 {
        width: 20vw;
    }

    .input_x2 {
        width: 20vw;
    }

    .title_x1 {
        display: flex;
        text-align: center;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .title_x2 {
        padding-left: 30px;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .blobstatic {
        transform: scale(1.5);
        background-color: #90caef00 !important;
    }

    .blob {
        transform: scale(1);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
        }

        50% {
            transform: scale(1.5);
            box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
        }

        100% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
        }
    }
</style>
<audio type="audio/mp3" id="audio_answer">
    <!-- <source src="<?php echo $GLOBALS['BASE_URL'] ?>publico/audio/asnwer_correct.mp3" type="audio/mp3"> -->
</audio>
<div class="superior">

    <div class="contenedor container shadow p-3 mb-5 bg-white rounded" id="question">
    </div>
    <div id="example_write"></div>
    <div class="item html" id="idimg">
        <!-- <img src="<?php echo $GLOBALS['BASE_URL'] ?>publico/img/level_1/P1.gif" alt="this slowpoke moves"  width="250" id="idimg"/> -->
    </div>
    <div class="item html" id="cronometro" style="background: #a2494963;border-radius: 100px;margin-left: 20px;">
        <h2>0</h2>
        <svg width="160" height="160" xmlns="http://www.w3.org/2000/svg">
            <g>
                <title>Layer 1</title>
                <circle id="circle" class="circle_animation" r="69.85699" cy="81" cx="81" stroke-width="8" stroke="#6fdb6f" fill="none" />
            </g>
        </svg>
    </div>
</div>

<div id="vidas">
</div>
<div id="medio">
</div>
<div id="letras__contenedor">
</div>
<div id="answer_container"></div>
<div id="writing_container"></div>
<div id="x2answer"></div>
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
                    <h3>Increible respuesta correcta</h3>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="borrarArray();location.reload()" class="btn btn-secondary" data-dismiss="modal">Continuar</button>

            </div>
        </div>
    </div>

</div>
<div id="button_VA"></div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    localStorage.setItem('background', "<?php echo $GLOBALS['BASE_URL'] ?>publico/img/play_background.png");
    var audio = document.getElementById("audio");
    var time_audio = localStorage.getItem("audio");
    const scoreFacil = localStorage.getItem('scoreFacil');
    const scoreNormal = localStorage.getItem('scoreNormal');
    const scoreDificil = localStorage.getItem('scoreDificil');
    const character = localStorage.getItem('character');
    var viditas = 3;
    var viditasPerdidas = 0;
    var currentQuestion;
    var nivel = localStorage.getItem('nivel');
    console.log("Audio= " + time_audio);
    audio.currentTime = time_audio;
    audio.play();
    var imgAnsword = '';

    function ShowModal(gano) {
        var audio_answer = document.getElementById("audio_answer");
        if (!gano) {
            audio_answer.src = "<?php echo $GLOBALS['BASE_URL'] ?>publico/audio/answer_incorrect.mp3";
            audio_answer.play();
            // audio_answer.currentTime = 
            console.log("1")
            // $('#modalWin').modal('show')
            Swal.fire({
                title: 'Respuesta incorrecta!',
                text: 'Mejor suerte para la proxima!',
                imageUrl: imgAnsword.length <= 0 ? '<?php echo $GLOBALS['BASE_URL'] ?>publico/img/character'+character+'/sad.png' : '<?php echo $GLOBALS['BASE_URL'] ?>' + imgAnsword,
                imageHeight: 300,
                imageAlt: 'Custom image',
                confirmButtonText: 'Continuar',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    borrarArray();
                    location.reload()
                }
            })
        } else {
            setScore();
            audio_answer.src = "<?php echo $GLOBALS['BASE_URL'] ?>publico/audio/asnwer_correct.mp3";
            audio_answer.play();
            console.log("2")
            // $('#modalLost').modal('show')
            Swal.fire({
                title: 'Congratulations!',
                text: 'Increible respuesta correcta!',
                imageUrl: imgAnsword.length <= 0 ? '<?php echo $GLOBALS['BASE_URL'] ?>publico/img/character'+character+'/happy.png' : '<?php echo $GLOBALS['BASE_URL'] ?>' + imgAnsword,
                imageHeight: 300,
                imageAlt: 'Custom image',
                confirmButtonText: 'Continuar',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    borrarArray();
                    location.reload()
                }
            })
        }
    }
    var letras_respuestas;
    var completado;

    function iniciarJuego(result) {
        console.log(result)
        const question = document.querySelector('#question');
        question.innerHTML = (result.question)
        if (result.img) {
            const questionWithImagen = document.createElement('img')
            questionWithImagen.setAttribute('src', result.img)
            questionWithImagen.setAttribute('height', "150px")
            question.appendChild(questionWithImagen)
        }
        if (result.answerImg) {
            imgAnsword = result.answerImg
        }
        const imagen1 = document.querySelector('#idimg');
        imagen1.innerHTML = ('<img src=<?php echo $GLOBALS['BASE_URL'] ?>' + result.imagen + ' width=250/>')

        if (result.tipoPregunta == 1) {
            setVidas()
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
                div.id = 'divLetra' + letter_id;
                div.innerHTML = ("<h3 style='font-weight: bold !important;'>" + letras_abecedario[index] + "</h3>")
                div.setAttribute('onclick', "validacaionText('" + letras_abecedario[index] + "','divLetra" + letter_id + "')")
                letras__contenedor.classList.add('teclado');
                letras__contenedor.appendChild(div)
                letras_abecedario.splice(index, 1);
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
        } else if (result.tipoPregunta == 3) {
            const question = document.querySelector('#example_write');
            const contenedor = document.querySelector('.contenedor');
            const medio = document.querySelector('#medio');
            const letras__contenedor = document.querySelector('#letras__contenedor');
            const div = document.createElement('div');
            div.innerHTML = ("<h3> Escribe tu respuesta </h3>")
            write_answer(result);
            medio.appendChild(div);
        } else {
            const x1 = document.createElement('input');
            const x2 = document.createElement('input');
            const x11 = document.createElement('span');
            const x21 = document.createElement('span');
            const button1 = document.createElement('button');
            document.getElementById('x2answer').appendChild(x11);
            document.getElementById('x2answer').appendChild(x1);
            document.getElementById('x2answer').appendChild(x21);
            document.getElementById('x2answer').appendChild(x2);
            x1.placeholder = "Ingresa tu valor";
            x2.placeholder = "Ingresa tu valor";
            x11.innerHTML = "x1";
            x21.innerHTML = "x2";
            x1.className = "form-control input_x1";
            x2.className = "form-control input_x2";
            x11.className = "title_x1";
            x21.className = "title_x2";
            document.getElementById('button_VA').appendChild(button1);
            button1.setAttribute('onclick', 'validardoblerespuesta()');
            button1.className = "btn btn-outline-secondary button_1";
            button1.innerHTML = "Siguiente";
            answer_doble(result);
        }

    }

    function setVidas() {
        if (viditasPerdidas <= 3) {
            const vidas = document.querySelector('#vidas')
            while (vidas.firstChild) {
                vidas.removeChild(vidas.firstChild);
            }
            for (let i = 0; i < viditas; i++) {
                const o = document.createElement('h3')
                o.textContent = 'O'
                vidas.appendChild(o)
            }
            for (let i = 0; i < viditasPerdidas; i++) {
                const x = document.createElement('h3')
                x.textContent = 'X'
                vidas.appendChild(x)
            }
        } else {
            ShowModal(false)
        }
    }

    function validacaionText(letra, idDiv) {
        console.log(letra, idDiv)

        if (validarArray(letra)) {
            document.getElementById(idDiv).remove();
            let id = idDiv.slice(8, idDiv.length);
            console.log(id)
            try {
                document.querySelector("." + letra).className = "letra shadow p-1 bg-white rounded"
            } catch (error) {
                console.log(error)
            }
            validarRespuesta();
        } else {
            viditasPerdidas++;
            viditas--;
            setVidas()
            console.log('respuesta incorecta')
        }
    }
    /*Start Options*/
    function loopDivs(result2) {
        for (let i = 0; i < result2.length; i++) {
            addDivs(result2[i]);
        }
    }

    function addDivs(nameDiv) {
        let divNew = document.createElement('div');
        divNew.classList.add('divs');
        divNew.innerHTML = nameDiv.option;
        divNew.addEventListener('click', function() {
            play1();
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

    function write_answer(result2) {
        const writing = document.createElement('input');
        document.getElementById('writing_container').appendChild(writing);
        writing.className = "form-control answer_writing";
        writing.setAttribute('placeholder', 'Ingresar respuesta')
        // writing.classList.add('form-control answer_writing');

        condition_text(result2);
    }
    var cadena = "";

    function condition_text(result) {
        cadena = result.answer;
        if (result.answer.match(/,.*/)) {
            const question = document.querySelector('#question');
            question.removeChild;
            question.innerHTML = ("<span>" + result.question + "</span><br><br> Respuesta en orden alfabetico, ejemplo : La almendra, epidemia y los mamiferos");
            answer_with_comma();
            const button1 = document.createElement('button');
            document.getElementById('button_VA').appendChild(button1);
            button1.setAttribute('onclick', 'validarAnswert2()');
            button1.className = "btn btn-outline-secondary button_1";
            button1.innerHTML = "Siguiente 2";
            // button_Va.innerHTML = ("<button class= onclick=validarAnswert2()>Next Level 2</button>");
        } else {
            const button2 = document.createElement('button');
            document.getElementById('button_VA').appendChild(button2);
            button2.setAttribute('onclick', 'validarAnswert1()');
            button2.className = "btn btn-outline-secondary button_1";
            button2.innerHTML = "Siguiente 1 ";
            // button_Va.innerHTML = ("<button onclick=validarAnswert1()>Next Level</button>");
            answer_without_comma(cadena);
        }
    }

    var keyword = "";
    var keyword_1 = "";
    var keyword_2 = "";
    var keyword_3 = "";

    function answer_without_comma(cadena) {
        var arrayCadenas = separador(cadena, " ")
        console.log(arrayCadenas);
        for (var i = 0; i < arrayCadenas.length; i++) {
            if (arrayCadenas[i].length > 2) {
                console.log(arrayCadenas[i]);
                keyword = keyword + " " + arrayCadenas[i];
            } else {
                console.log("No eres apto" + arrayCadenas[i]);
            }
        }
    }

    function answer_with_comma() {
        var arrayOne = separador(cadena, ",");
        for (var i = 0; i < arrayOne.length; i++) {
            if (arrayOne[i].match(/y.*/)) {
                console.log("testando");
                var arrayTwo = separador(arrayOne[i], "y");
                console.log(arrayTwo);
                for (let i2 = 0; i2 < arrayTwo.length; i2++) {
                    var arrayFinal = separador(arrayTwo[i2], " ");
                    console.log(arrayFinal);
                    for (let i3 = 0; i3 < arrayFinal.length; i3++) {
                        if (arrayFinal[i3].length > 2) {
                            if (i2 == 0) {
                                keyword_2 = keyword_2 + " " + arrayFinal[i3];
                            } else if (i2 == 1) {
                                keyword_3 = keyword_3 + " " + arrayFinal[i3];
                            }
                        }
                    }
                }
            } else {
                var array_key1 = separador(arrayOne[i], " ");
                test(array_key1);
            }
        }
        console.log("======================");
        console.log("key 1 = " + keyword_1);
        console.log("key 2 = " + keyword_2);
        console.log("key 3 = " + keyword_3);
    }

    function test(array_key1) {
        for (var i = 0; i < array_key1.length; i++) {
            if (array_key1[i].length > 2) {
                keyword_1 = keyword_1 + " " + array_key1[i];
            }
        }
    }

    function validarAnswert1() {
        console.log("test");
        console.log(keyword);
        var input = $(".answer_writing").val();
        var newinput = "l " + input + " l"
        console.log(newinput);
        console.log("====================");
        if (newinput.toLowerCase().match(keyword.toLowerCase())) {
            ShowModal(true);
        } else {
            ShowModal(false);
        }
    }

    function validarAnswert2() {
        var writing_1 = "";
        var writing_2 = "";
        var writing_3 = "";
        var input = $(".answer_writing").val();
        input = input.replace(", ", " ");
        input = input.replace(" y ", " ");
        newinput = separador(input, " ");
        console.log("===========")
        console.log(newinput);
        let i2 = 0;
        for (let i = 0; i < newinput.length; i++) {
            if (newinput[i].length > 2) {
                i2 = i2 + 1;
                if (i2 == 1) {
                    writing_1 = " t " + newinput[i];
                } else if (i2 == 2) {
                    writing_2 = " t " + newinput[i];
                } else if (i2 == 3) {
                    writing_3 = " t " + newinput[i];
                } else if (i2 == 4) {
                    writing_3 = writing_3 + " " + newinput[i];
                }
            }
        }
        console.log("==================WRITING ========")
        console.log(writing_1)
        console.log(writing_2)
        console.log(writing_3)
        console.log("==================aNSWER ========")
        console.log(keyword_1)
        console.log(keyword_2)
        console.log(keyword_3)

        if (writing_1.toLowerCase().match(keyword_1.toLowerCase())) {
            console.log("Primer ");
            if (writing_2.toLowerCase().match(keyword_2.toLowerCase())) {
                console.log("Segundo");
                if (writing_3.toLowerCase().match(keyword_3.toLowerCase())) {
                    console.log("Tercera");
                    ShowModal(true);
                } else {
                    ShowModal(false);
                }
            } else {
                ShowModal(false);
            }
        } else {
            ShowModal(false);
        }
    }

    function separador(cadena1, indicador) {
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
                if (data[0].length > 0) {
                    $.ajax({
                        type: "POST",
                        url: "quiestion/filtrador",
                        data: {
                            data: data[0],
                            nivel: nivel
                        },
                        dataType: 'json',
                        success: function(result) {
                            console.log("==================================");
                            console.log(result);
                            console.log(result.length);
                            if (result.length <= 0) {
                                nivel_complete();
                            } else {
                                iniciarJuego(result[data[0]])
                                currentQuestion = result[data[0]]
                            }
                        },
                        error: function(error) {
                            alert(error);
                            console.log(error);
                        }
                    });
                }else{
                    nivel_complete();
                }
            },
            error: function(error) {
                alert(error);
                console.log(error);
            }
        });
    };
    local();

    setTimeout(function() {

        var time = 30; /* how long the timer will run (seconds) */
        var initialOffset = '440';
        var i = 1

        /* Need initial run as interval hasn't yet occured... */
        $('.circle_animation').css('stroke-dashoffset', initialOffset - (1 * (initialOffset / time)));

        var interval = setInterval(function() {
            $('h2').text(i);
            if (i == 25) {
                $('#cronometro').addClass("blob")
            }
            if (i == 28) {
                $('#cronometro').removeClass(' blob ').addClass('cronometro blobstatic').empty().prepend('<img id="theImg" style="height: 70vh;" src="https://acegif.com/wp-content/uploads/gif-explosion-20.gif" />')

            }
            if (i == 30) {
                ShowModal(false)
            }
            if (i == time) {
                clearInterval(interval);
                return;
            }
            $('.circle_animation').css('stroke-dashoffset', initialOffset - ((i + 1) * (initialOffset / time)));
            i++;
        }, 1000);

    }, 0)

    function setScore() {
        console.log('entro????????? o no1?')
        switch (nivel) {

            case 'Facil':
                console.log('entro????????? o no2?')
                localStorage.setItem('scoreFacil', Number(scoreFacil) + 2);
                break;
            case 'Normal':
                localStorage.setItem('scoreNormal', Number(scoreNormal) + 2);
                break;
            case 'Dificil':
                switch (currentQuestion.id) {
                    case 0:
                        localStorage.setItem('scoreDificil', Number(scoreDificil) + 6);
                        break;
                    case 1:
                        localStorage.setItem('scoreDificil', Number(scoreDificil) + 6);
                        break;
                    case 2:
                        localStorage.setItem('scoreDificil', Number(scoreDificil) + 8);
                        break;

                    default:
                        break;
                }
                // localStorage.setItem('scoreDificil', Number(scoreDificil) + 2)
                break;
            default:
                break;
        }

    }

    // function nivel_complete() {
    //     switch (nivel) {

    //         case 'Facil':
    //             console.log('entro????????? o no2?')
    //             localStorage.setItem('scoreFacil', Number(scoreFacil) + 2);
    //             break;
    //         case 'Normal':
    //             localStorage.setItem('scoreNormal', Number(scoreNormal) + 2);
    //             break;
    //         case 'Dificil':
    //             switch (currentQuestion.id) {
    //                 case 0:
    //                     localStorage.setItem('scoreDificil', Number(scoreDificil) + 6);
    //                     break;
    //                 case 1:
    //                     localStorage.setItem('scoreDificil', Number(scoreDificil) + 6);
    //                     break;
    //                 case 2:
    //                     localStorage.setItem('scoreDificil', Number(scoreDificil) + 8);
    //                     break;

    //                 default:
    //                     break;
    //             }
    //             // localStorage.setItem('scoreDificil', Number(scoreDificil) + 2)
    //             break;
    //         default:
    //             break;
    //     }
    // }

    function nivel_complete() {
        Swal.fire({
            title: 'Nivel ' + nivel + ' Completado!',
            text: 'Nivel ' + nivel + ' Completado!',
            imageUrl: (nivel == "Facil") ?
                '<?php echo $GLOBALS['BASE_URL'] ?>publico/img/score/' + 1 + '-' + scoreFacil + '.png' : (nivel == "Normal") ?
                '<?php echo $GLOBALS['BASE_URL'] ?>publico/img/score/' + 2 + '-' + scoreNormal + '.png' : '<?php echo $GLOBALS['BASE_URL'] ?>publico/img/score/' + 3 + '-' + scoreDificil + '.png',
            imageHeight: 150,
            imageAlt: 'Custom image',
            confirmButtonText: 'Continuar',
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.isConfirmed) {
                if (nivel == "Facil") {
                    const ids2 = [<?php foreach ($data["Normal"] as $valor) { ?>
                            <?php echo $valor["id"] . "," ?>
                        <?php } ?>
                    ]
                    localStorage.setItem("ids", ids2)
                    localStorage.setItem("nivel", "Normal")
                    localStorage.setItem('scoreNormal', 0)
                    location.reload();
                } else if (nivel == "Normal") {
                    const ids3 = [<?php foreach ($data["Dificil"] as $valor) { ?>
                            <?php echo $valor["id"] . "," ?>
                        <?php } ?>
                    ]
                    localStorage.setItem("nivel", "Dificil")
                    localStorage.setItem("ids", ids3)
                    localStorage.setItem('scoreDificil', 0)
                    location.reload();
                } else {
                    location.href = url + 'menu';
                }
            }
        })
    }
    var datax1x2;

    function answer_doble(result) {
        // x1.className = "input_x1";
        // x2.className = "input_x2";
        // x11.className = "title_x1";
        // x21.className = "title_x2";
        datax1x2 = separador(result.answer, ",");
    }

    function validardoblerespuesta() {
        var input1 = $(".input_x1").val();
        var input2 = $(".input_x2").val();
        console.log(input1);
        console.log(input2);
        console.log("data 1 " + datax1x2[0]);
        console.log("data 2 " + datax1x2[1]);
        if (input1 == datax1x2[0]) {
            if (input2 == datax1x2[1]) {
                ShowModal(true)
            } else {
                ShowModal(false);
            }
        } else if (input2 == datax1x2[0]) {
            if (input1 == datax1x2[1]) {
                ShowModal(true)
            } else {
                ShowModal(false);
            }
        } else {
            ShowModal(false);
        }
    }
</script>
<?php require "view/footer.php"; ?>