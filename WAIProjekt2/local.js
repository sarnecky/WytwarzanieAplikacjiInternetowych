		function ReadColor() {
		    if (window.localStorage.getItem('kolejny_kolor') != null) document.body.style.backgroundColor = window.localStorage.getItem('kolejny_kolor');
		}

		function Initialize() { ReadColor(); checkStorageSupport(); }

		window.addEventListener("load", Initialize, false);

		function zmianaKoloru() {
		    var x = document.getElementById("kolorek").value;
		    document.body.style.backgroundColor = x;
		    window.localStorage.setItem('kolejny_kolor', x);
		 }
window.addEventListener("storage", displayStorageEvent, true);