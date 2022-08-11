// window.onload = init;

var myfirstnameNode = document.getElementById("myfirstname");
var mylastnameNode = document.getElementById("mylastname");
var myphoneNode = document.getElementById("myphone");
var myemailNode = document.getElementById("myemail");
var submitNode = document.getElementById("contact_form");

myfirstnameNode.addEventListener("change", chkName, false);
mylastnameNode.addEventListener("change", chkName, false);
myphoneNode.addEventListener("change", chkPhone, false);
myemailNode.addEventListener("change", chkEmail, false);

// function chkSubmit(){
//   // var passorfail = ()
//   return chkName();
// }

// function init (){
//   submitNode.onsubmit=chkName;
// }

function chkName(event) {
  var myNameTarget = event.currentTarget;
  var patt = /^[a-zA-Z]+$/;
  var pos = myNameTarget.value.search(patt);

  if (pos != 0) {
    alert("The name you entered (" + myNameTarget.value + ") is invalid. \n" + "The name should only contain alphabet characters and character spaces.");
    returnFalse(myNameTarget);
  } 
}

function chkPhone(event) {
  var myPhoneTarget = event.currentTarget;
  var patt = /^[689][0-9]{7}$/;
  var pos = myPhoneTarget.value.search(patt);

  if (pos != 0) {
    alert("The phone number you entered (" + myPhoneTarget.value + ") is invalid. \n" + "Please re-enter your phone number.");
    returnFalse(myPhoneTarget);
  } 
}

function chkEmail(event) {
  var myEmailTarget = event.currentTarget;
  // pattern for multiple email extensions
  // this is the Regex for a standard email domain that does not accept unicode
  var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; 
  // var patt = /^[\w.-]+@[\w]{1,}([.]{1}[\w]{1,}){1,3}[.]{1}[\w]{2,4}$/; // This is the ReGex for the standard email domain
// Test the format of the input email
  // var patt = /^[\w.-_]{1,}[@]{1}[\w]{1,}[.]{1}[\w]{2,4}$/;
  // this is the ReGex for the xxx@yyy.zzz.com form
  // var patt = /^[\w.-_]{1,}[@]{1}[\w]{1,}([.]{1}[\w]{1,}){1,3}[.]{1}[\w]{2,4}$/; 

  var pos = myEmailTarget.value.search(patt);
  if (pos != 0) {
    alert("The email you entered (" + myEmailTarget.value + ") is not in the correct form. \n" + "The correct form is: xxxx@yyy.zzz.com \n" + "Please go back and fix your email");
    returnFalse(myEmailTarget);
  } 
}

function returnFalse(obj) {
  obj.focus()
  obj.select();
  return false;
}