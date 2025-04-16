var camere;
function aggiungi_camera()
{
	document.getElementById("prova").innerHTML = "aggiungi_camera";
	if(typeof camere != "Array")
	{
		camere = new Array();
	}
		var numero = document.getElementById("n_camera");
		var metratura = document.getElementById("metratura_camera");
		var tipo = document.getElementById("tipo_camera");
		var nuova = new Array();
		nuova.push(numero.value);
		nuova.push(metratura.value);
		nuova.push(tipo.value);
		event.stopPropagation();
}

function controllo_immobili()
{
	/*
	var metratura =document.getElementById("metratura_immobile");
	var tipo =document.getElementById("tipo_immobile");
	var indirizzo =document.getElementById("indirizzo_immobile");
	var descrizione =document.getElementById("descrizione_immobile");
	
	if(metratura.value =='' || tipo.value==''  || indirizzo.value=='')//campi obbligatori
	{
		return false;
	}
	else
	{
		return true;
	}
*/
document.getElementById("prova").innerHTML = "controllo_immobili";
	if(typeof camere !== 'undefined')
	{
		document.getElementById("prova").innerHTML = "typeof";
		document.getElementById("prova").innerHTML = a.length;
	}
	return false;
}