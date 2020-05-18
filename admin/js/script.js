var bishead = new Array();
bishead = ["aksi", "Kode Bus", "Tanggal Berangkat","Waktu Berangkat","Harga Tiket", "Harga Pengirman Paket","Supir" ];

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
   // var div2 = document.getElementById("currentjadwal");
   // div2.appendChild(empTable); // add the TABLE to the container.
}

var  supir = new Array();
supir = ["udin", "bambang", "ujang", "busu", "hasan", "abdullah"];

function addRow() {
   var empTab = document.getElementById('empTable');

   var rowCnt = empTab.rows.length;   // table row count.
   var tr = empTab.insertRow(rowCnt); // the table row.
   tr = empTab.insertRow(rowCnt);

   for (var c = 0; c < bishead.length; c++) {
      var td = document.createElement('td'); // table definition.
      td = tr.insertCell(c);

      if (c == 0) {      // the first column.
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
         if (c==1){  //codebus
            var ele = document.createElement('select');
            ele.id = "selectbis";
            ele.className = "ele";
            for (var j = 0; j<11; j++){
               var option = document.createElement('option');
               if (j == 0){
                  option.setAttribute('selected','true');
                  option.setAttribute('disabled', 'true');
                  option.setAttribute('hidden', 'true');
               }
               else{
                  option.value = "AC-0"+j;
                  option.text = "AC-0"+j;
               }
               ele.appendChild(option);
            }
            td.appendChild(ele);
         }
   
         else if (c==2) { //Tanggal Berangkat
            var ele = document.createElement('input');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'date');
            ele.setAttribute('value', '');
            td.appendChild(ele);
         }
         else if (c==3) { //Waktu Berangkat
            var ele = document.createElement('input');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'time');
            ele.setAttribute('value', '');
            td.appendChild(ele);
         }
         else if (c==4) { //Harga Tiket
            var ele = document.createElement('input');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'number');
            ele.setAttribute('value', '');
            td.appendChild(ele);
         }
         else if (c==5) { //Harga Pengirman Paket
            var ele = document.createElement('input');
            ele.setAttribute('class', 'ele');
            ele.setAttribute('type', 'number');
            ele.setAttribute('value', '');
            td.appendChild(ele);
         }
         else if (c==6) { //supir
            var ele = document.createElement('select');
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
