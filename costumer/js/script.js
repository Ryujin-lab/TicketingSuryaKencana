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

   var send = document.getElementById("bayartotal");
   var tiket = document.getElementById("hargapaket").innerHTML;

   send.value = parseInt(tiket) * parseInt(obj.value) ;
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
   document.getElementById("modal").style.display = "block";
}

function closedoublecheck(){
   document.getElementById("modal").style.display = "none";
}

window.onclick = function(event) {
   if (event.target == document.getElementById("modal")) {
      modal.style.display = "none";
   }
}

function find(){
   var input01, input02, filter, ul, li, a, b, i, txtValue;
   input01 = document.getElementById("input-01").value;
   input02 = document.getElementById("input-02").value;
   ul = document.getElementById("buss");
   li = ul.getElementsByTagName("li");
   for (i = 0; i<li.length;i++){
      a = document.getElementById("asal"+i).innerHTML;
      b = document.getElementById("tujuan"+i).innerHTML;
      if(input01 === "" && input02 === ""){
         document.getElementById("listbus"+i).style.display = "block";
      }
      else if (input01 === a && input02 === b){
         document.getElementById("listbus"+i).style.display = "block";
      }
      else if (input01 === a && input02 === ""){
         document.getElementById("listbus"+i).style.display = "block";
      }
      else if (input02 === b && input01 ===""){
         document.getElementById("listbus"+i).style.display = "block";
      }
      else{
         document.getElementById("listbus"+i).style.display = "none";
      }
   }
}

