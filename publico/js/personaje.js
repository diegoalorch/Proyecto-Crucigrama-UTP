var showSelect;
  const select = document.querySelector('.select');
  select.addEventListener('change',(event)=>{
    showSelect = event.target.value;
  })
function validar(character) {
    let input_nickname = document.getElementById('input_nickname').value;
    if (input_nickname.length > 0 && showSelect >= 0) {
        localStorage.removeItem("ids");
        localStorage.setItem("ids", ids1)
        console.log(localStorage.getItem("ids1"))
        alert("Nickname validado y el select");
        location.href = 'http://localhost/quiestion';
    } else {
        alert("Ingrese su apodo y/o seleccione una dificultad");
    }
}