$(document).ready(function(){

$("#pru").on("change", "#pru2", function(){

var selec = $("#pru2 option:selected");
var data = selec.data("price");
var data2 = selec.attr("title")
var valor = selec.val();

if(valor){
      $('#graf').attr("src",valor);
      $("#card-title").html(data);
      $("#prueba").html(data2);

}
})


});