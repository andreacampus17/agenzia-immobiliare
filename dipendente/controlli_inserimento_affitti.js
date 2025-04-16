function controllo_affitti()
{
	var check = true;
	var casella;
	//rimozione qualsiasi oggetto dentro il <div id=errors>
	var a = document.getElementById("errors");
	while (a.firstChild) {
        a.removeChild(a.firstChild);
    }
	a.style.display = 'none';
	//controllo campi e inserimento messaggio errore
	//controllo codice fiscale cliente
	casella = document.getElementById("c_f_cliente");
	if (!casella.value.match(/^[0-9a-zA-Z]+$/))
	{
		check = false;
		newError(a,casella,"Codice Fiscale sbagliato");
	}
	else
	{
		casella.style= "";
	}
	//controllo nuovo cliente
		casella = document.getElementById("nome_cliente");
		//controllo nome
		if(document.getElementById("nuovo_cliente").checked == true &&  !casella.value.match(/^[a-zA-Z]+$/))
		{
			check = false;
			newError(a,casella,"Nome cliente sbagliato");
		}
		else
		{
			casella.style= "";
		}
		casella = document.getElementById("cognome_cliente");
		//controllo cognome
		if(document.getElementById("nuovo_cliente").checked == true &&  !casella.value.match(/^[a-zA-Z]+$/))
		{
			check = false;
			newError(a,casella,"Cognome cliente sbagliato");
		}
		else
		{
			casella.style= "";
		}
		casella = document.getElementById("indirizzo_cliente");
		//controllo indirizzo
		if(document.getElementById("nuovo_cliente").checked == true &&  !casella.value.match(/^[a-zA-Z]+$/))
		{
			check = false;
			newError(a,casella,"Indirizzo cliente sbagliato");
		}
		else
		{
			casella.style= "";
		}
	//controllo codice immobile
	casella = document.getElementById("codice_immobile");
	if (!casella.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,casella,"Codice Immobile sbagliato");
	}
	else
	{
		casella.style= "";
	}
	casella = document.getElementById("giorno_inizio");
	//controllo giorno inizio
	if(!casella.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,casella,"Giorno inizio sbagliato");
	}
	else
	{
		casella.style= "";
	}
	casella = document.getElementById("mese_inizio");
	//controllo mese inizio
	if(!casella.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,casella,"Mese inizio sbagliato");
	}
	else
	{
		casella.style= "";
	}
	casella = document.getElementById("anno_inizio");
	//controllo anno inizio
	if(!casella.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,casella,"Anno inizio sbagliato");
	}
	else
	{
		casella.style= "";
	}
	casella = document.getElementById("giorno_fine");
	//controllo giorno inizio
	if(!casella.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,casella,"Giorno fine sbagliato");
	}
	else
	{
		casella.style= "";
	}
	casella = document.getElementById("mese_fine");
	//controllo giorno inizio
	if(!casella.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,casella,"Mese fine sbagliato");
	}
	else
	{
		casella.style= "";
	}
	casella = document.getElementById("anno_fine");
	//controllo giorno inizio
	if(!casella.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,casella,"Anno fine sbagliato");
	}
	else
	{
		casella.style= "";
	}
	casella = document.getElementById("prezzo");
	//controllo prezzo
	if(!casella.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,casella,"Prezzo fine sbagliato");
	}
	else
	{
		casella.style= "";
	}
	//se ci sono errori rendo visibile il blocco div
	if(check == false)
	{
		a.style.display = 'block';
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