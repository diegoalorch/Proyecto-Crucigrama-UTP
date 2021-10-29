let showSelect;
console.log(ids)

function show() {
    var data = document.getElementById("id_select").value;
    showSelect = data;
}

function validar(character) {
    let input_nickname = document.getElementById('input_nickname').value;
    if (input_nickname.length > 0 && showSelect >= 0) {
        localStorage.setItem("ids", ids)
        console.log(localStorage.getItem("ids"))
        alert("Nickname validado y el select");
        location.href = 'http://proyecto_utp.test/quiestion';
    } else {
        alert("Ingrese su apodo y/o seleccione una dificultad");
    }
}