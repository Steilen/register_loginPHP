const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

// Toggle between Sign Up and Sign In forms
signUpButton.addEventListener('click', () =>
  container.classList.add('right-panel-active'));

signInButton.addEventListener('click', () =>
  container.classList.remove('right-panel-active'));

// Password match validation
const password = document.getElementById('password');
const confirm_password = document.getElementById('confirm_password');

function validatePassword() {
  if (password.value !== confirm_password.value) {
    confirm_password.setCustomValidity("Passwords don't match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
