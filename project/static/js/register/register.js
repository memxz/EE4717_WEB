// window.onload = init;

var firstnameNode = document.getElementById("firstname");
var lastnameNode = document.getElementById("lastname");
var phoneNode = document.getElementById("phone");
var emailNode = document.getElementById("email");
var addressNode = document.getElementById("address");
var paymentinfoNode = document.getElementById("paymentinfo");
var usernameNode = document.getElementById("username");
var passwordNode = document.getElementById("password");
var password2Node = document.getElementById("password2");
var submitNode = document.getElementById("registration_form");

firstnameNode.addEventListener("change", chkName, false);
lastnameNode.addEventListener("change", chkName, false);
phoneNode.addEventListener("change", chkPhone, false);
emailNode.addEventListener("change", chkEmail, false);
addressNode.addEventListener("change", chkAddress, false);
paymentinfoNode.addEventListener("change", chkPayment, false);
usernameNode.addEventListener("change", chkUsername, false);
passwordNode.addEventListener("change", chkPassword, false);
password2Node.addEventListener("change", chkPassword, false);



function chkSubmit(){
  // var passorfail = ()

  return false;
}


function init (){
  submitNode.onsubmit=chkName;
}


function chkName(event) {
  var myNameTarget = event.currentTarget;
  var patt = /^[a-zA-Z]+$/;
  var pos = myNameTarget.value.search(patt);

  if (pos != 0) {
    alert("The name you dfghjentered (" + myNameTarget.value + ") is invalid. \n" + "The name should only contain alphabet characters and character spaces.");
    returnFalse(myNameTarget);
    return false;
  } 
  return true;
}

function chkPhone(event) {
  var myPhoneTarget = event.currentTarget;
  var patt = /^[689][0-9]{7}$/;
  var pos = myPhoneTarget.value.search(patt);

  if (pos != 0) {
    alert("The phone number you entered (" + myPhoneTarget.value + ") is invalid. \n" + "Please re-enter your phone number.");
    returnFalse(myPhoneTarget);
    return false;
  } 
  return true;
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


function chkAddress(event) {
  var myAddressTarget = event.currentTarget;
  var patt = /^\d{1,3}.?\d{0,3}\s[a-zA-Z\s]{2,30}\sSingapore\s\d{6}$/; 
  var pos = myAddressTarget.value.search(patt);

  if (pos != 0) {
    alert("The address you entered (" + myAddressTarget.value + ") is not in the correct form. \n" + "The correct form is: <block number> <house number> <street> Singapore <zipcode>\n" + "Please go back and fix your address");
    returnFalse(myAddressTarget);
  } 
}

function chkUsername(event) {
  var myUsernameTarget = event.currentTarget;
  var patt = /^[a-zA-Z0-9]+$/;
  var pos = myUsernameTarget.value.search(patt);

  if (pos != 0) {
    alert("The username you entered (" + myUsernameTarget.value + ") is invalid. \n" + "The name should only contain alphanumeric characters with no spaces.");
    returnFalse(myUsernameTarget);
  } 
}

function chkPayment(event) {
  var myPaymentTarget = event.currentTarget;
  var patt = /^[a-zA-Z0-9\s]+$/;
  var pos = myPaymentTarget.value.search(patt);

  if (pos != 0) {
    alert("The payment info you entered (" + myPaymentTarget.value + ") is invalid. \n" + "Please re-enter a valid payment info.");
    returnFalse(myPaymentTarget);
  } 
}

function chkPassword(event) {
  var pwStrengthMsg = {
    length:"Password needs to be at least 8 characters long \n",
    uppercase:"Password needs at least two Upper Case \n",
    number:"Password needs at least 1 number \n",
    special:0
  };

  var myPasswordTarget = event.currentTarget;
  var myPasswordVal = myPasswordTarget.value;
  var myPasswordLength = myPasswordVal.length;

  // var anUpperCase = /^([A-Z]+[a-z]){2,}S/;
  var anUpperCase = /^(.*?[A-Z]){2,}/;
  var aLowerCase = /[a-z]/; 
  var aNumber = /[0-9]{1,}/;
  var aSpecial = /[!|@|#|$|%|^|&|*|(|)|-|_]{1,}/;

// Test the format of the input name 
  var patt = /^[a-zA-Z._-]+@[0-9]{2,3}$/;

// performing checks
  var isUppCase = anUpperCase.test(myPasswordVal);
  var isLong = (myPasswordLength>8);
  var isNum = aNumber.test(myPasswordVal)
  // to check password strength
  // if(isUppCase){pwStrength.uppercase+=1}
  // if(isLong){pwStrength.length+=1}
  // if(isNum){pwStrength.number+=1}
  if(!isUppCase || !isLong || !isNum){
    var outputMsg = "";
    if(!isUppCase){ outputMsg += pwStrengthMsg.uppercase}
    if(!isLong){ outputMsg += pwStrengthMsg.length}
    if(!isNum){ outputMsg += pwStrengthMsg.number}
    alert(outputMsg);
    returnFalse(myPasswordTarget);
  }   
}

function returnFalse(obj) {
  obj.focus()
  obj.select();
  return false;
}