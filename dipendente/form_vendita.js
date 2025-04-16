function vendita()
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
	var col = document.createElement("td");
	col.setAttribute("id","td-date");
	var datalabel = document.createElement("label");
	datalabel.innerHTML = "Data";
	var col = col.cloneNode();
	col.appendChild(datalabel);
	row1.appendChild(col);
	//TEXTBOX DATA
	var textbox = document.createElement("input");
	textbox.setAttribute("type","date");
	textbox.setAttribute("name","data");
	textbox.setAttribute("id","data");
	textbox.style.width = "180px";
	//prende il form e accoda la textbox
	var col = col.cloneNode();
	col.appendChild(textbox);
	row2.appendChild(col);
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
	row3.appendChild(col);
	
	//prende la table e la accoda al form
	table.appendChild(row1);
	table.appendChild(row2);
	table.appendChild(row3);
	var td1 = document.getElementById("form_interno");
	td1.appendChild(table);
}
