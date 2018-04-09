(function (){
	"use strict";
	console.log("main.js attached");

	var coverimgInput = document.querySelector("#cover-image");
	var newimg = document.querySelector("#new-image");
	var readfile = new FileReader();

	function displayPic(e){
		console.log(e.target.value.slice(12));
		newimg.src = "../images/"+e.target.value.slice(12);
		
	}


	coverimgInput.addEventListener("change", displayPic, false);


})();