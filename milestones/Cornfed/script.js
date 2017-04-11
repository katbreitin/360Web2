
/* This code will loop through all the inputs to look at the pattern for valid inputs  */

var inputFields = document.contact.getElementsByTagName("input");

for (key in inputFields) {

	var myField = inputFields[key];
	var myError = document.getElementById('formerror');

	myField.onchange = function() {
		var myPattern = this.pattern;
		var myPlaceholder = this.placeholder;
		var isValid = this.value.search(myPattern) >= 0;

		if (!(isValid)) {
			myError.innerHTML = "Please update the information: " + myPlaceholder;
		} else { //pattern not valid
			myError.innerHTML = "";
		} 
	} 
}