// JavaScript Document

document.getElementById('button').onclick = function() {
	alert("Button was pressed!");
}

document.getElementById('colorButton').onclick = function() {
	switch(document.getElementById('colorSelector').value) {
		case "red":
			document.getElementById('div1').style.backgroundColor = "red";
			break;
		default:
			alert("incompatible color!");
			break;
	}
}