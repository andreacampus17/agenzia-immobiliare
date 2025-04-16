function form_nuovo_proprietario()
{
	var text_nome = document.getElementById("nome_proprietario");
	var text_cognome = document.getElementById("cognome_proprietario");
	var text_indirizzo = document.getElementById("indirizzo_proprietario");
	var check_proprietario = document.getElementById("nuovo_proprietario");
	if(check_proprietario.checked == true)
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
