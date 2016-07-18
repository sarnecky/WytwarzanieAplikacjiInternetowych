		function ReadColor() {
		    if (window.sessionstorage.getItem('kk') != null) document.body.style.backgroundColor = window.sessionstorage.getItem('kk');
		}

		function Initialize() { ReadColor(); checkStorageSupport(); }

		window.addEventListener("load", Initialize, false);

		function zmianaKoloru() {
		    var x = document.getElementById("kolorekk").value;
		    document.body.style.backgroundColor = x;
		    window.sessionstorage.setItem('kk', x);
}
window.addEventListener("storage", displayStorageEvent, true);