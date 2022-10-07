var cari = document.getElementById('cari');
var wadahtabel = document.getElementById('wadahtabel');
var btnclear = document.getElementById('btnclear');

cari.addEventListener('keyup',function(){

//buat obejek ajax
var xhr = new XMLHttpRequest();

//cek kesiapan ajax
xhr.onreadystatechange = function() {
if ( xhr,this.readyState == 4 && xhr.status == 200 ) {
    wadahtabel.innerHTML = xhr.responseText;

}

}

///eksekusi ajax
xhr.open('GET','tabelpp.php?cari=' + cari.value,true);
xhr.send();

})
function clearResult() {
    document.getElementById("wadahtabel").innerHTML = " ";
}
// $document.ready(function() {
// //hilangkan tombol cari
// $('#btnclear').hide();

// //event ketika keywprd ditulis
// $('#cari').on('keyup',function(){
// $.get('tabelpp.php?cari=' + $('#cari').val(), function(data){
// $('#wadahtabel').html(data);
// });
//  });
// });