var showSelect;
const select = document.querySelector('.select');
select.addEventListener('change', (event) => {
    showSelect = event.target.value;
})

function validar(character) {
    let input_nickname = document.getElementById('input_nickname').value;
    if (input_nickname.length > 0 && showSelect.length >= 0) {
        localStorage.removeItem("ids");
        localStorage.removeItem("nivel");
        switch (showSelect) {
            case 'Facil':
                localStorage.setItem("ids", ids1)
                break;
            case 'Normal':
                localStorage.setItem("ids", ids2)
                break;
            case 'Dificil':
                localStorage.setItem("ids", ids3)
                break;
            default:
                localStorage.setItem("ids", ids1)
                break;
        }

        localStorage.setItem("nivel", showSelect)
        console.log(localStorage.getItem("ids1"))
        alert("Nickname validado y el select");
        location.href = 'http://proyecto_utp.test/quiestion';
    } else {
        alert("Ingrese su apodo y/o seleccione una dificultad");
    }
}