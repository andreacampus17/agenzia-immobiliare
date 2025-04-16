function controllo_vendita()
{
	var check = true;
	var casella;
	//rimozione qualsiasi oggetto dentro il <div id=errors>
	var a = document.getElementById("errors");
	while (a.firstChild)
	{
        a.removeChild(a.firstChild);
    }
	//controllo campi e inserimento messaggio errore
	//controllo codice immobile
	casella = document.getElementById("codice_immobile");
	if (!casella.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,casella,"Codice immobile sbagliato");
	}
	else
	{
		casella.style= "";
	}
	//controllo codice fiscale acquirente
	casella = document.getElementById("c_f_acquirente");
	if (!casella.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,casella,"Codice fiscale acquirente sbagliato");
	}
	else
	{
		casella.style= "";
	}
	//controllo nome acquirente
	casella = document.getElementById("nome_acquirente");
	if (!casella.value.match(/^[a-zA-Z]+$/))
	{
		check = false;
		newError(a,casella,"Nome acquirente sbagliato");
	}
	else
	{
		casella.style= "";
	}
	//controllo cognome acquirente
	casella = document.getElementById("cognome_acquirente");
	if (!casella.value.match(/^[a-zA-Z]+$/))
	{
		check = false;
		newError(a,casella,"Cognome acquirente sbagliato");
	}
	else
	{
		casella.style= "";
	}
	return check;
}
function newError(div,casella,testo_errore)
{
	var br = document.createElement("br");
	casella.style.borderColor="#FF0000";
	var elemento = document.createElement("label");
	elemento.style.align = "center";
	elemento.style.color = "red";
	elemento.innerHTML = testo_errore;
	div.appendChild(elemento);
	div.appendChild(br.cloneNode());
	return;
}