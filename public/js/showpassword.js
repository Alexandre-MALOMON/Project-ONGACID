/* show password */
let eyeicons = document.querySelectorAll(".eyeicon");
let passwords = document.querySelectorAll(".password");

for(let i = 0; i < eyeicons.length; i++) {
  eyeicons[i].onclick = function() {
    if(passwords[i].type == "password") {
      passwords[i].type = "text";
      eyeicons[i].src = "../images/eye-visible.svg";
    } else {
      passwords[i].type = "password";
      eyeicons[i].src = "../images/eye-invisible.svg";
    }
  }
}

