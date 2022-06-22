// JSFormValidation.js
/*
 * Run init() after the page is loaded
 */
window.onload = init;
 
/*
 * Initialization
 */
function init() {
   // Bind "onsubmit" event handler to the "submit" button
   document.getElementById("formTest").onsubmit = validateForm;
   // Bind "onclick" event handler to "reset" button
   document.getElementById("btnReset").onclick = clearForm;
   // Set initial focus
   document.getElementById("txtZipcode").focus();
}
 

function validateForm(theForm) {
   with(theForm) {
      // return false would prevent default submission
	  
      return (isNumeric(txtZipcode, "Veuillez  Saisissez le code de vérification", elmZipcodeError)
	  && isLengthMinMax(txtZipcode, 6, 6, "Veuillez ne pas tenter de deviner le code de vérification,<BR> cela pourrait bloquer la procédure pendant un certain temps", elmZipcodeError)	  
	    	  
      );
   }
}
 

function postValidate(isValid, errMsg, errElm, inputElm) {
   if (!isValid) {
      // Show errMsg on errElm, if provided.
      if (errElm !== undefined && errElm !== null
            && errMsg !== undefined && errMsg !== null) {
         errElm.innerHTML = errMsg;
      }
      // Set focus on Input Element for correcting error, if provided.
      if (inputElm !== undefined && inputElm !== null) {
         inputElm.classList.add("errorBox");  // Add class for styling
         inputElm.focus();
      }
   } else {
      // Clear previous error message on errElm, if provided.
      if (errElm !== undefined && errElm !== null) {
         errElm.innerHTML = "";
      }
      if (inputElm !== undefined && inputElm !== null) {
         inputElm.classList.remove("errorBox");
      }
   }
}
 
/* 
 * Validate that input value is not empty.
 * 
 * @param inputElm (object): input element
 * @param errMsg (string): error message
 * @param errElm (object): element to place error message
 */

/* Validate that input value contains one or more digits */

/* Validate that input value contains only one or more letters */

/* Validate that input value contains one or more digits or letters */

/* Validate that input value length is between minLength and maxLength */
function isLengthMinMax(inputElm, minLength, maxLength, errMsg, errElm) {
   var inputValue = inputElm.value.trim();
   var isValid = (inputValue.length >= minLength) && (inputValue.length <= maxLength);
   postValidate(isValid, errMsg, errElm, inputElm);
   return isValid;
}
 

/* 
 * Validate that a selection is made (not default of "") in <select> input 
 * 
 * @param selectElm (object): the <select> element
 */

 
/* 
 * Validate that one of the checkboxes or radio buttons is checked.
 * Checkbox and radio are based on name attribute, not id.
 * 
 * @param inputName (string): name attribute of the checkbox or radio
 */

 /* Validate that input value contains one or more digits */
function isNumeric(inputElm, errMsg, errElm) {
   var isValid = (inputElm.value.trim().match(/^\d+$/) !== null);
   postValidate(isValid, errMsg, errElm, inputElm);
   return isValid;
}

// Validate password, 6-8 characters of [a-zA-Z0-9_]
 
/*
 * The "onclick" handler for the "reset" button to clear the display,
 * including the previous error messages and error box.
 */
function clearForm() {
   // Remove class "errorBox" from input elements
   var elms = document.querySelectorAll('.errorBox');  // class
   for (var i = 0; i < elms.length; i++) {
      elms[i].classList.remove("errorBox");
   }
   
   // Remove previous error messages

}