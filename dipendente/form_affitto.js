function affitto()
{
	if(document.getElementById("tabella2")) {
	var a = document.getElementById("tabella2");
	while (a.firstChild) {
        a.removeChild(a.firstChild);
    }
	a.remove();
	}
	var table = document.createElement("table");
	table.setAttribute("id","tabella2");
	table.setAttribute("border","none");
	table.setAttribute("align","center");
	var row1 = document.createElement("tr");
	var row2 = document.createElement("tr");
	var row3 = document.createElement("tr");
	var row4 = document.createElement("tr");
	var row5 = document.createElement("tr");
	var col = document.createElement("td");
	col.setAttribute("id","td-date");
	
	var datalabel = document.createElement("label");
	datalabel.innerHTML = "Data inizio";
	var col = col.cloneNode();
	col.appendChild(datalabel);
	row1.appendChild(col);
	//TEXTBOX DATA INIZIO
	var textbox = document.createElement("input");
	textbox.setAttribute("type","date");
	textbox.setAttribute("name","data_inizio");
	textbox.setAttribute("id","data_inizio");
	textbox.style.width = "180px";
	//prende il form e accoda la textbox
	var col = col.cloneNode();
	col.appendChild(textbox);
	row2.appendChild(col);
	
	var datalabel = document.createElement("label");
	datalabel.innerHTML = "Data fine";
	var col = col.cloneNode();
	col.appendChild(datalabel);
	row3.appendChild(col);
	//TEXTBOX DATA FINE
	var textbox = document.createElement("input");
	textbox.setAttribute("type","date");
	textbox.setAttribute("name","data_fine");
	textbox.setAttribute("id","data_fine");
	textbox.style.width = "180px";
	//prende il form e accoda la textbox
	var col = col.cloneNode();
	col.appendChild(textbox);
	row4.appendChild(col);
	//TEXTBOX PREZZO
	//crea la textbox
	var textbox = document.createElement("input");
	textbox.setAttribute("type","text");
	textbox.setAttribute("name","prezzo");
	textbox.setAttribute("id","prezzo");
	textbox.setAttribute("placeholder","prezzo");
	textbox.style.width = "80px";
	//prende il form e accoda la textbox
	var col = col.cloneNode();
	col.appendChild(textbox);
	row5.appendChild(col);

	
	//prende la table e la accoda al form
	table.appendChild(row1);
	table.appendChild(row2);
	table.appendChild(row3);
	table.appendChild(row4);
	table.appendChild(row5);
	var td1 = document.getElementById("form_interno");
	td1.appendChild(table);
}