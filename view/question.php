<?php require "view/header.php"; ?>
<style>
    .contenedor {
        width: 500px;
        height: 200px;
        background-color: blueviolet;
        margin: 50px;
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

        display: grid;
        gap: 3px;
        grid-template-columns: repeat(8, 1fr);
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
</style>
<div class="superior">
    <div class="contenedor">

    </div>
</div>
<div id="medio">
</div>
<div id="letras__contenedor">
</div>
<script>
    const letras_respuestas = ['d', 'i', 's', 't', 'a', 'n', 'c', 'i', 'a']
    const letras_abecedario = [...letras_respuestas,'a', 'b', 'c', 'd', 'e', 'f']
    const contenedor = document.querySelector('.contenedor');
    const medio = document.querySelector('#medio');
    const letras__contenedor = document.querySelector('#letras__contenedor');
    let terminado = letras_respuestas.length;
    var letter_id=0;
    while (letras_abecedario.length) {
        const index = Math.floor(Math.random() * letras_abecedario.length);
        const div = document.createElement('div');
        div.className = 'letra shadow p-1 mb-5 bg-white rounded';
        div.id = letter_id;
        div.draggable = true
        div.innerHTML = ("<h3>" + letras_abecedario[index] + "</h3>")
        letras__contenedor.appendChild(div)
        letras_abecedario.splice(index, 1);
        letter_id++
    }
    console.log(medio);
    for (let index = 0; index < terminado; index++) {
        const div = document.createElement('div');
        div.className = 'placeholder ';
        div.dataset.id = index;
        medio.appendChild(div);
    }
    letras__contenedor.addEventListener('dragstart', e =>{
        
        e.dataTransfer.setData('id',e.target.id)
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
        e.target.appendChild(document.getElementById(id))
        terminado--
        if (terminado===0) {
            alert("aca ira un validador")
        }

    })

    /*letra.addEventListener('dragstart', e=>{
        console.log("me empiezan a mover")
    })
    letra.addEventListener('dragend', e=>{
        console.log("me dejaron de mover")
    })
    letra.addEventListener('drag', e=>{
        console.log("me estan moviendo")
    }) */
    /* contenedor.addEventListener('dragenter', e=>{
        console.log("me empiezan a mover")
    })
    contenedor.addEventListener('dragleave', e=>{
        console.log("me empiezan a mover")
    })
    contenedor.addEventListener('dragover', e=>{
        e.preventDefault();
    })
    contenedor.addEventListener('drop', e=>{
        console.log("me empiezan a mover")
        contenedor.appendChild(letra);
    }) */
</script>
<?php require "view/footer.php"; ?>