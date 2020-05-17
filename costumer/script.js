function load_home() {
   document.getElementById("content").innerHTML='<object type="text/html" data="home.html" ></object>';
}

function toggleDp(dpId){
   var element = document.getElementById(dpId);
   element.classList.toggle('opened');
}

var foo = 1;
function dudukan(id){
   if(foo == 0){
      document.getElementById(id).style.display = "none";
      foo = 1;
   }
   else {
      document.getElementById(id).style.display = "block";
      foo = 0;
   }
}

function setValue(inputId, value){
   input = document.getElementById(inputId);
   input.value = value;
   input.click();
}

function setNum(buttonId, valId){
   obj = document.getElementById(valId);
   var val = parseInt(obj.value);
   if (buttonId == "tambah"){
      obj.value = val+1;
   }
   else{
      if (obj.value>1){
         obj.value = val-1;
      }
   }
   // obj.click();
}

function ambil(inputId, valId){
   value = document.getElementById(inputId).innerHTML;
   objto = document.getElementById(valId);
   objto.value = value;
}

function berinilai (no, nama, kelamin, telepon, penjemputan, bangku, pesan ){
   value1 = document.getElementById(nama).value;
   value2 = document.getElementById(kelamin).value;
   value3 = document.getElementById(telepon).value;
   value4 = document.getElementById(penjemputan).value;
   value5 = document.getElementById(bangku).value;
   value6 = document.getElementById(pesan).value;

   document.getElementById("namaoke"+no).value = value1;
   document.getElementById("kelamikoke"+no).value = value2;
   document.getElementById("teleponoke"+no).value = value3;
   document.getElementById("jemputoke"+no).value = value4;
   document.getElementById("bangkuoke"+no).value = value5;
   document.getElementById("pesanoke"+no).value = value6;
}

function doublecheck(){
   console.log("udin");
   document.getElementById("modal").style.display = "block";
}
function closedoublecheck(){
   console.log("udin");
   document.getElementById("modal").style.display = "none";
}

window.onclick = function(event) {
   if (event.target == document.getElementById("modal")) {
     modal.style.display = "none";
   }
 }