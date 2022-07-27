$("input#search").change(function () {

	var buscador = $("#search").val();
	//console.log(buscador);

	var rutaBuscar  = $(".buscadorB  a").attr("href");
	//console.log(buscador);

	if ($("#search").val() != "") {

		$(".buscadorB  a").attr("href",rutaBuscar+"/"+buscador);
	}
})
// buscador
$("input#search").focus(function () {
	console.log("llego focus");
	$(document).keyup(function (event) {
		event.preventDefault();
		
		var code = (event.keyCode ? event.keyCode : event.which);
		var buscador = $("#search").val();

		if (code == 13 && buscador != "" ) {
			
			var rutaBuscar  = $(".buscadorB  a").attr("href");
			window.location.href= rutaBuscar;

		}
	})
})
