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

    <div class="item html">
        <h2>30</h2>
        <svg width="160" height="160" xmlns="http://www.w3.org/2000/svg">
            <g>
                <title>Layer 1</title>
                <circle id="circle" class="circle_animation" r="69.85699" cy="81" cx="81" stroke-width="8" stroke="#6fdb6f" fill="none" />
            </g>
        </svg>
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
                <button type="button" onclick="location.reload()" class="btn btn-secondary" data-dismiss="modal">Reintentar</button>
                <button type="button" onclick="location.reload()" class="btn btn-primary">Continuar</button>
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
            //responder con cuadro de texto
            console.log('hola')
            const contenedor = document.querySelector('.contenedor');
            const medio = document.querySelector('#medio');
            const letras__contenedor = document.querySelector('#letras__contenedor');
            const div = document.createElement('div');
            div.innerHTML = ("<h3> at Work </h3>")
            write_answer();
            //letras_respuestas.splice(index, 1);
            // Writing answer


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
                alert("Lo lograste rick");
                ShowModal(true);
            } else {    
                ShowModal(false);
                alert("A comprar otro morthy");
            }
        })
        
        document.getElementById('answer_container').appendChild(divNew);
    }
    /*End Options*/
    
    /*Start Write Answer*/
    
    function write_answer(){
        const writing = document.createElement('input');
        document.getElementById('writing_container').appendChild(writing);
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
                console.log(data[0])
                $.ajax({
                    type: "POST",
                    url: "quiestion/filtrador",
                    data: {
                        data: data[0]
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