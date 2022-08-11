// validator2r.js
//   The last part of validator2. Registers the 
//   event handlers
//   Note: This script does not work with IE8

// Get the DOM addresses of the elements and register 
//  the event handlers

      var nameNode = document.getElementById("myName");
      var passwordNode = document.getElementById("myPassword");
      var emailNode = document.getElementById("myEmail");
      var dateNode = document.getElementById("myDate");
      nameNode.addEventListener("change", chkName, false);
      passwordNode.addEventListener("change", chkPassword, false);
      emailNode.addEventListener("change", chkEmail, false);
      dateNode.addEventListener("change", chkDate, false);
