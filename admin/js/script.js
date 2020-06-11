var bishead = new Array();
bishead = ["Kode Bus","Kota Asal", "Kota Tujuan", "Tanggal Berangkat","Waktu Berangkat","Harga Tiket", "Harga Pengirman Paket","Supir","aksi" ];

function createTable() {
   var empTable = document.createElement('table');
   empTable.setAttribute("class", "tabelbis");
   empTable.setAttribute('id', 'empTable'); // table id.
   var tr = empTable.insertRow(-1);
   for (var h = 0; h < bishead.length; h++) {
      var th = document.createElement('th'); // create table headers
      th.innerHTML = bishead[h];
      tr.appendChild(th);
   }
   var div = document.getElementById("jadwal");
   div.appendChild(empTable);
}

function addRow() {
   document.getElementById("jadwal").className = "jadwal";
   var empTab = document.getElementById('empTable');

   var rowCnt = empTab.rows.length;   // table row count.
   var tr = empTab.insertRow(rowCnt); // the table row.
   tr = empTab.insertRow(rowCnt);

   for (var c = 0; c < bishead.length; c++) {
      var td = document.createElement('td'); // table definition.
      td = tr.insertCell(c);

      if (c == bishead.length-1) {      // the first column.
         // add a button in every new row in the first column.
         var button = document.createElement('input');

         // set input attributes.
         button.setAttribute('type', 'button');
         button.setAttribute('value', 'hapus');
         button.setAttribute('class', 'hapus')

         // add button's 'onclick' event.
         button.setAttribute('onclick', 'removeRow(this)');

         td.appendChild(button);
      }
      else{
         if (c==0){  //codebus
            var ele = document.createElement('select');
            ele.id = "selectbis";
            ele.setAttribute('name', "selectbis[]")
            ele.setAttribute("required","")
            ele.className = "ele";
            for (var j = 0; j<11; j++){
               var option = document.createElement('option');
               if (j == 0){
                  option.setAttribute('selected','true');
                  option.setAttribute('disabled', 'true');
                  option.setAttribute('hidden', 'true');
               }
               else{
                  option.value = "ac"+j;
                  option.text = "AC-0"+j;
               }
               ele.appendChild(option);
            }
            td.appendChild(ele);
         }
   
         else if (c==1) { //asal
            var ele = document.createElement('input');
            ele.setAttribute('name',  "asal[]");
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'text');
            ele.setAttribute('value', '');
            ele.setAttribute("required","")
            td.appendChild(ele);
         }
         else if (c==2) { //tujuan
            var ele = document.createElement('input');
            ele.setAttribute('name', 'tujuan[]');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'text');
            ele.setAttribute('value', '');
            ele.setAttribute("required","")
            td.appendChild(ele);
         }
         else if (c==3) { //Waktu Berangkat
            var ele = document.createElement('input');
            ele.setAttribute('name', 'waktu[]');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'date');
            ele.setAttribute('value', '');
            ele.setAttribute("required","")
            td.appendChild(ele);
         }
         else if (c==4) { //jam Berangkat
            var ele = document.createElement('input');
            ele.setAttribute('name', 'jam[]');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'time');
            ele.setAttribute('value', '');
            ele.setAttribute("required","")
            td.appendChild(ele);
         }
         else if (c==5) { //Harga Tiket
            var ele = document.createElement('input');
            ele.setAttribute('name', 'tiket[]');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'number');
            ele.setAttribute('value', '');
            ele.setAttribute("required","")
            td.appendChild(ele);
         }
         else if (c==6) { //Harga Pengirman Paket
            var ele = document.createElement('input');
            ele.setAttribute('name', 'paket[]');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'number');
            ele.setAttribute('value', '');
            ele.setAttribute("required","")
            td.appendChild(ele);
         }
         else if (c==7) { //supir
            var ele = document.createElement('select');
            ele.setAttribute('name', 'supir[]');
            ele.setAttribute('required', '');
            ele.id = "selectsupir";
            ele.className = "ele";
            for (var j = 0; j<supir.length; j++){
               var option = document.createElement('option');
               if (j == 0){
                  option.setAttribute('selected','true');
                  option.setAttribute('disabled', 'true');
                  option.setAttribute('hidden', 'true');
               }
               else{
                  option.value = supir[j];
                  option.text = supir[j];
               }
               ele.appendChild(option);
            }
            td.appendChild(ele);
         }
      }
      
   }
}

function removeRow1(oButton) {
   var empTab = document.getElementById('current');
   empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // button -> td -> tr.
}

function removeRow(oButton) {
   var empTab = document.getElementById('empTable');
   empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // button -> td -> tr.
}

function cancel(idtujuan, tableid){
   var show = document.getElementById(idtujuan);
   show.className = "hidden";
   var elmtTable = document.getElementById(tableid);
   var tableRows = elmtTable.getElementsByTagName('tr');
   var rowCount = tableRows.length;
   for (var x=rowCount-1; x>0; x--) {
      elmtTable.deleteRow(x);
   }
}


var supirhead = new Array();
supirhead =  ["Nama", "No.Hp", "Aksi" ];

function createTableSupir() {
   console.log(supirhead[0]);
   var empTable = document.createElement('table');
   empTable.setAttribute("class", "tabelbis");
   empTable.setAttribute('id', 'tabelsupir'); // table id.

   var tr = empTable.insertRow(-1);
   for (var h = 0; h < supirhead.length; h++) {
      var th = document.createElement('th'); // create table headers
      th.innerHTML = supirhead[h];
      tr.appendChild(th);
   }
   var div = document.getElementById("divsupir");
   div.appendChild(empTable);
}

function addsupirrow() {
   document.getElementById("divsupir").className = "jadwal";
   var empTab = document.getElementById('tabelsupir');
   var rowCnt = empTab.rows.length;   // table row count.
   var tr = empTab.insertRow(rowCnt); // the table row.
   tr = empTab.insertRow(rowCnt);

   for (var c = 0; c < supirhead.length; c++) {
      var td = document.createElement('td'); // table definition.
      td = tr.insertCell(c);
   
      if (c == supirhead.length-1) {   
         var button = document.createElement('input');
   
         // set input attributes.
         button.setAttribute('type', 'button');
         button.setAttribute('value', 'hapus');
         button.setAttribute('class', 'hapus')
   
         // add button's 'onclick' event.
         button.setAttribute('onclick', 'removeRowSupir(this)');
   
         td.appendChild(button);
      }

      else{


         if (c==0){
            var ele = document.createElement('input');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'text');
            ele.setAttribute('name', "nama[]");
            ele.setAttribute('required', "");
            td.appendChild(ele);
         }
         else if (c==1){   
            var ele = document.createElement('input');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'number');
            ele.setAttribute('required', "");
            ele.setAttribute('name', "hp[]")
            td.appendChild(ele);
         }
      }
   }
}

function removeRowSupir(oButton) {
   var empTab = document.getElementById('tabelsupir');
   empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // button -> td -> tr.
}

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
}
