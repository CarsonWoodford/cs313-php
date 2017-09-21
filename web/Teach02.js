// JavaScript Document

document.getElementById('button').onclick = function() {
	alert("Button was pressed!");
}

document.getElementById('colorButton').onclick = function() {
	switch(document.getElementById('colorSelector').value) {
		case "red":
			document.getElementById('div1').style.backgroundColor = "red";
			break;
		case "yellow":
			document.getElementById('div1').style.backgroundColor = "yellow";
			break;
		case "blue":
			document.getElementById('div1').style.backgroundColor = "blue";
			break;
		case "green":
			document.getElementById('div1').style.backgroundColor = "green";
			break;
		case "purple":
			document.getElementById('div1').style.backgroundColor = "purple";
			break;
		case "orange":
			document.getElementById('div1').style.backgroundColor = "orange";
			break;
		case "white":
			document.getElementById('div1').style.backgroundColor = "white";
			break;
		case "black":
			document.getElementById('div1').style.backgroundColor = "black";
			break;
		case "grey":
			document.getElementById('div1').style.backgroundColor = "grey";
			break;
		default:
			alert("incompatible color!");
			break;
	}
}