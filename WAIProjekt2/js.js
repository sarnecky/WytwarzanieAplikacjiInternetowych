function nowe_wpisy()
{
	var para = document.createElement("h2");
var node = document.createTextNode("'Wyparte' części");
para.appendChild(node);

var para1 = document.createElement("h1");
var node1 = document.createTextNode("#Slidery");

para1.appendChild(node1);


var para2 = document.createElement("p");
var node2 = document.createTextNode("Wąskie plastikowe paski przymocowywane pod deckiem wzdłuż krawędzi. Były popularne wśród vert skaterów, którym ułatwiały przytrzymywanie deski podczas wykonywania trików w powietrzu. Powodowały również większy poślizg na dolnej warstwie decka, chroniąc tym samym deck przed zarysowaniem podczas wykonywania slide'ów. Większość skateboarderów już nie używa raili ze względu na małą przydatność i kłopot z montażem. W latach 90. zastąpiono je Everslickiem czyli pokryciem spodniej warstwy deski plastikowa powłoka o grubości warstwy decka – taka sama powłoka stosowana jest w snowboardach.");

para2.appendChild(node2);

var element = document.getElementById("a");
element.appendChild(para);
var element = document.getElementById("a");
element.appendChild(para1);
var element = document.getElementById("a");
element.appendChild(para2);


var para3 = document.createElement("h1");
var node3 = document.createTextNode("#Copery");

para3.appendChild(node3);

var para4 = document.createElement("p");
var node4 = document.createTextNode("Plastikowe nakładki na hangery trucka, zapewniające większy poślizg podczas wykonywania grindów. Zostały wymyślone w czasie, gdy street skating był w początkowej fazie swojego istnienia. Copery nie były bardzo popularne ze względu na małą trwałość.");

para4.appendChild(node4);

var element = document.getElementById("a");
element.appendChild(para3);
var element = document.getElementById("a");
element.appendChild(para4);




var para5 = document.createElement("h1");
var node5 = document.createTextNode("#Leppery");

para5.appendChild(node5);

var para6 = document.createElement("p");
var node6 = document.createTextNode("Plastikowe nakładki na hangery trucka, zapewniające większy poślizg podczas wykonywania grindów. Zostały wymyślone w czasie, gdy street skating był w początkowej fazie swojego istnienia. Copery nie były bardzo popularne ze względu na małą trwałość.");

para6.appendChild(node6);

var element = document.getElementById("a");
element.appendChild(para5);
var element = document.getElementById("a");
element.appendChild(para6);

var s = document.getElementById('bez');
      s.parentNode.removeChild(s);
      var s1 = document.getElementById('bez2');
      s1.parentNode.removeChild(s1);

}
function color()
{
		document.getElementById('red').style.color = 'red';
		document.getElementById('blue').style.color = 'blue';
		document.getElementById('red').style.fontSize = '15px';
		document.getElementById('blue').style.fontSize = '50px';
}

$(document).ready(function(){
		$("#w, #r").button();
		 $("#radio").buttonset();
		$("#form").validate({
    rules: {
    imie: {
      required: true,
      minlength: 2
    },
   	nazwisko: {
      required: true,
      minlength: 2
    },
    email: {
     required: true,
     email: true
    },
    miejscowosc: {
     required: true,
      minlength: 2
    },
    haslo: {
     required: true,
      minlength: 8
    },
   },
    
  messages: {
   imie: "<p class='error'>Wpisz swoje imię.</p>",
   email: "<p class='error'>Wpisz poprawny adres E-mail</p>",
   nazwisko: "<p class='error'>Wpisz swoje nazwisko.</p>",
   miejscowosc: "<p class='error'>Wpisz poprawny nazwie miejscowości</p>",
   haslo: 		  "<p class='error'>Twoje hasło musi mieć min. 8 znaków</p>"
   
  }
  });
 });
function bezj(){
	  var s = document.getElementById('bez');
      s.parentNode.removeChild(s);
}
$("#clickme").click(function() {
      $( "#streszczenie" ).slideUp( "slow", function() {
    });
  });
