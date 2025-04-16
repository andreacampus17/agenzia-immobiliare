var camere = new Array();

function aggiungi_camera()
{
	var check = true;
	//rimozione qualsiasi oggetto dentro il <div id=errors>
	var a = document.getElementById("errors");
	while (a.firstChild) {
        a.removeChild(a.firstChild);
    }
	a.style.display = 'none';
	var numero = document.getElementById("n_camera");
	if (!numero.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,numero,"Codice Fiscale sbagliato");
	}
	else
	{
		numero.style= "";
	}
	var metratura = document.getElementById("metratura_camera");
	if (!metratura.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,metratura,"Metratura camera sbagliata");
	}
	else
	{
		metratura.style= "";
	}
	var tipo = document.getElementById("tipo_camera");
	if (!tipo.value.match(/^[a-zA-Z]+$/))
	{
		check = false;
		newError(a,tipo,"Codice Fiscale sbagliato");
	}
	else
	{
		tipo.style= "";
	}
	var label_numero = document.getElementById("label_numero_camera");
	var label_metratura = document.getElementById("label_metratura");
	var label_tipo = document.getElementById("label_tipo");
	if(check == true)
	{
		var nuova = new Array();
		nuova.push(numero.value);
		nuova.push(metratura.value);
		nuova.push(tipo.value);
		camere.push(nuova);
		label_numero.innerHTML = numero.value;
		label_metratura.innerHTML = metratura.value;
		label_tipo.innerHTML = tipo.value;
		event.stopPropagation();
	}
	else
	{
		a.style.display = 'block';
	}
}

function controllo_immobili()
{
	var metratura =document.getElementById("metratura_immobile");
	var tipo =document.getElementById("tipo_immobile");
	var indirizzo_immobile =document.getElementById("indirizzo_immobile");
	var descrizione =document.getElementById("descrizione_immobile");
	var proprietario =document.getElementById("codice_fiscale");
	//CONTROLLO DATI INSERITI
	var check = true;
	//rimozione qualsiasi oggetto dentro il <div id=errors>
	var a = document.getElementById("errors");
	while (a.firstChild) {
        a.removeChild(a.firstChild);
    }
	a.style.display = 'none';
	//controllo tipo immobile
	if (!tipo.value.match(/^[a-zA-Z]+$/))
	{
		check = false;
		newError(a,tipo,"Tipo sbagliato");
	}
	else
	{
		tipo.style= "";
	}
	//controllo metratura immobile
	if (!metratura.value.match(/^[0-9]+$/))
	{
		check = false;
		newError(a,metratura,"Metratura sbagliato");
	}
	else
	{
		metratura.style= "";
	}
	//controllo indirizzo immobile
	if (!indirizzo_immobile.value.match(/^[a-zA-Z]+$/))
	{
		check = false;
		newError(a,indirizzo_immobile,"Indirizzo immobile sbagliato");
	}
	else
	{
		indirizzo_immobile.style= "";
	}
	//controllo descrizione immobile
	if (!descrizione.value.match(/^[a-zA-Z]+$/))
	{
		check = false;
		newError(a,descrizione,"Descrizione immobile sbagliato");
	}
	else
	{
		descrizione.style= "";
	}
	//controllo date
	
	//controllo data affitto
	if (document.getElementById("filtro_affitto").checked)
	{
		let date1 = document.getElementById("data_inizio").value;
		let date2 = document.getElementById("data_fine").value;
		if(date1 > date2)
		{
			check = false;
			newError(a,document.getElementById("data_inizio"),"Data fine affitto minore di data inizio affitto.");
			document.getElementById("data_fine").style.borderColor="#FF0000";
		}
		else
		{
			document.getElementById("data_inizio").style= "";
			document.getElementById("data_fine").style= "";
		}
	}
	
	//let date = new Date();
	//let day = date.getDate();
	//let month = date.getMonth();
	//let year = date.getFullYear();

	//let currentDate = `${year}-${month}-${day}`;
	let currentDate = new Date().getTime();
	if(document.getElementById("filtro_affitto").checked)
	{
		console.log("filtro_affitto checkato");
			let date1 = new Date(document.getElementById("data_inizio").value).getTime();
			let date2 = new Date(document.getElementById("data_fine").value).getTime();
			if(date1 < currentDate)
			{
				console.log(`data: ${date1}, data corrente: ${currentDate}`);
				check = false;
				newError(a,document.getElementById("data_inizio"),"Data inizio affitto minore della data corrente.");
			}
			else
			{
				document.getElementById("data_inizio").style = "";
			}
			if(date2 < currentDate)
			{
				console.log(`data: ${date2}, data corrente: ${currentDate}`);
				check = false;
				newError(a,document.getElementById("data_fine"),"Data fine affitto minore della data corrente.");
			}
			else
			{
				document.getElementById("data_fine").style = "";
			}
	}
	if(document.getElementById("filtro_vendita").checked)
	{
		console.log("filtro_vendita checkato");
		let date = new Date(document.getElementById("data").value).getTime();
			console.log(`data: ${date}, data corrente: ${currentDate}`);
			if(date < currentDate)
			{
				check = false;
				console.log("date minore di currentDate");
				console.log(`data: ${date}, data corrente: ${currentDate}`);
				newError(a,document.getElementById("data"),"Data di vendita minore della data corrente.");
			}
			else
			{
				document.getElementById("data").style = "";
			}
	}
	if(check)
	{	
	//AGGIUNGE DATI INPUT IMMOBILE
	var nuova = new Array();
		nuova.push(tipo.value);
		nuova.push(metratura.value);
		nuova.push(indirizzo_immobile.value);
		nuova.push(descrizione.value);
		camere.push(nuova);
		
		//AGGIUNGE DATI INPUT PROPRIETARIO
	var codice_fiscale =document.getElementById("codice_fiscale");
	var nome =document.getElementById("nome_proprietario");
	var cognome =document.getElementById("cognome_proprietario");
	var indirizzo =document.getElementById("indirizzo_proprietario");
	var percentuale = document.getElementById("percentuale");
		nuova = new Array();
		nuova.push(codice_fiscale.value);
		nuova.push((document.getElementById("nuovo_proprietario").checked == true)? "true" : "false");
		nuova.push(nome.value);
		nuova.push(cognome.value);
		nuova.push(indirizzo.value);
		nuova.push(percentuale.value);
		camere.push(nuova);
		//AGGIUNGE DATI AFFITTO O VENDITA
		if(document.getElementById("filtro_affitto").checked)
		{
			nuova = [document.getElementById("filtro_affitto").value,
			document.getElementById("data_inizio").value,
			document.getElementById("data_fine").value,
			document.getElementById("prezzo").value];
			camere.push(nuova);
		}
		else if(document.getElementById("filtro_vendita").checked)
		{
			nuova = [document.getElementById("filtro_vendita"),document.getElementById("data").value
			,document.getElementById("prezzo").value];
			camere.push(nuova);
		}
		//INVIO JSON
		if(document.getElementById("filtro_affitto").checked || document.getElementById("filtro_vendita").checked)
		{
		var data = JSON.stringify(camere);
		if(typeof camere !== 'undefined' && camere.length > 0)
		{
		var xhr = new XMLHttpRequest();
		var url = "immobile_e_proprietario.php";
		var i = 0;
		xhr.onreadystatechange = function () {
			
			if(xhr.responseText.includes("Errore"))
			{
				camere = new Array();
			}
			var label = document.getElementById("input_check");
				label.innerHTML = xhr.responseText;
		if (xhr.readyState === 4 && xhr.status === 200) 
			{		
				var form = document.getElementById("form_inserimento");
				var elements = form.elements;
				for (var i = 0, len = elements.length; i < len; ++i) 
				{
					elements[i].disabled = true;
				}
			}
		};
		xhr.open("POST", url, true);
		xhr.setRequestHeader("Content-Type", "application/json",true);
		xhr.send(data);
		}
	}
	}
	else
	{
		a.style.display = 'block';
	}
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
}