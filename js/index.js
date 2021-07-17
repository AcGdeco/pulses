function logar(){
    var a;
    var b;

    var resposta;

	a = document.getElementById("Login").value;
    b = document.getElementById("senhaLogin").value;

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {

	    if (xhttp.readyState == 4 && xhttp.status == 200) {

            resposta = xhttp.responseText;
            alert(resposta);
            if(resposta == "Login efetuado!"){
                window.location.href = "index.php";
            }
	
        }
    };

	xhttp.open("POST", "loginBD.php", true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.send("login=" + a +"&senha="+b);
}