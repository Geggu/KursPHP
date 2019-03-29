function clearForm(){
	document.getElementById("temat").value = "";
	document.getElementById("content").innerHTML = "Tutaj wpisz treść...";
	document.getElementById("idtopic").value = "0";
}



function isEmpty(st){ 
	if (st.length == 0){ 
		return true; 
	}else 
		return false;
}
function iloscZnakow(st, mess, ilosc){
	if(st.length>=ilosc && !isEmpty(st)){
		return true;
	}else{
		alert("Pole " + mess + " jest niepoprawnie wpisane");
		return false;
	}
}

function testLogin(login){
	var val = /^[a-zA-Z0-9]+/;
	if(iloscZnakow(login, "Login", 4) && val.test(login)){
		return true;
	}else{
		alert("WPISANO NIEPRAWIDŁOWE ZNAKI W POLE LOGIN!");
		return false;
	}

}
function testHaslo(haslo){
	var val = /^[a-zA-Z0-9]+/;
	if( iloscZnakow(haslo, "hasło", 4) && val.test(haslo)){
		return true;
	}else{
		alert("WPISANO NIEPRAWIDŁOWE ZNAKI W POLE HASŁO!");
		return false;
	}
}



function sprawdzTemat(form){
	if(
		iloscZnakow(form.temat.value, "Temat", 5) &&
		iloscZnakow(form.content.value, "Treść", 10)
	){
		form.submit();
	}
}
function sprawdzLogin(form){
	if(
		testLogin(form.login.value) &&
		testHaslo(form.haslo.value)
	){
		form.submit();
	}
}
function potwierdz(form){
	if(confirm("Czy na pewno chcesz usunąć ten wiersz?")){
		form.submit();
	}else{
		return;
	}
}