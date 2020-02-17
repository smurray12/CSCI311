/* 
* @Author: Sarah Murray
* @Csci id: murraysa
* @Purpose: Lab3Dynamic.html csci311
* @Date:   2020-02-06 05:30:24
* @Last Modified by:   sarah
* @Last Modified time: 2020-02-17 12:54:08
*/

var animalArr = [
	'cat',
	'llama',
	'panda',
	'walrus',
	'otter',
	'penguin',
	'shark',
	'alpaca',
	'goat'
];

var fileNames = [
	'cat.jpg',
	'llama.jpg',
	'panda.jpg',
	'walrus.jpg',
	'otter.jpg',
	'penguin.jpg',
	'shark.jpg',
	'alpaca.jpg',
	'goat.jpg'
];


function promptName() {
	var user = prompt("Please enter your full name");
	if (user != "") {
		document.getElementById("userPrompt").innerHTML = "Welcome " + user + "!";
	} else {
		document.getElementById("userPrompt").innerHTML = "Welcome no name!";
	}
}

function getAnimal() {
	var ranAnimal = animalArr[Math.floor(Math.random() * animalArr.length)];
	return ranAnimal;
}

function changeAnimal() {
	var ul = document.getElementById("animals");
	var li = document.createElement("li");
	var ranAnimal = getAnimal();
	var att = document.createAttribute("id");
	att.value = ranAnimal;
	li.setAttributeNode(att);
	li.appendChild(document.createTextNode(ranAnimal));
	ul.appendChild(li);
}