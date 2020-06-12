function simpansemua(id){
   var hidden = document.getElementById(id);
   hidden.style.display = "block";
}

function kembali(id){
   var hidden = document.getElementById(id);
   hidden.style.display = "none";
}

window.onclick = function(event) {
   if (event.target == document.getElementById("modal")) {
      modal.style.display = "none";
   }
   else if (event.target == document.getElementById("modalDELETE")) {
      modalDELETE.style.display = "none";
   }
}