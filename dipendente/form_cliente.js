function form_nuovo_cliente()
{
	var text_nome = document.getElementById("nome_cliente");
	var text_cognome = document.getElementById("cognome_cliente");
	var text_indirizzo = document.getElementById("indirizzo_cliente");
	var check_cliente = document.getElementById("nuovo_cliente");
	if(check_cliente.checked == true)
	{
		text_nome.disabled=false;
		text_cognome.disabled=false;
		text_indirizzo.disabled=false;
	}
	else
	{
		text_nome.disabled=true;
		text_cognome.disabled=true;
		text_indirizzo.disabled=true;
	}
}