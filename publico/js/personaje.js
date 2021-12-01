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
        localStorage.removeItem("character");
        switch (showSelect) {
            case 'Facil':
                localStorage.setItem("ids", ids1)
                localStorage.setItem('scoreFacil', 0)
                break;
            case 'Normal':
                localStorage.setItem("ids", ids2)
                localStorage.setItem('scoreNormal', 0)
                break;
            case 'Dificil':
                localStorage.setItem("ids", ids3)
                localStorage.setItem('scoreDificil', 0)
                break;
            default:
                localStorage.setItem("ids", ids1)
                localStorage.setItem('scoreFacil', 0)
                break;
        }

        localStorage.setItem("nivel", showSelect)
        localStorage.setItem("character", character)
        console.log(localStorage.getItem("ids1"))
        alert("Nickname validado y el select");
        location.href = url + 'quiestion';
    } else {
        alert("Ingrese su apodo y/o seleccione una dificultad");
    }
}