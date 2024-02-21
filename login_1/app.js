var nameError = document.getElementById("name-error");
var phoneError = document.getElementById("phone-error");
var emailError = document.getElementById("email-error");
var messageError = document.getElementById("message-error");
var submitError = document.getElementById("submit-error");

function validateName() {
  var name = document.getElementById("contact-name").value;

  if (name.length == 0) {
    nameError.innerHTML = "Name is required";
    return false;
  }
  if (!name.match(/^[a-zA-Z]+(?: [a-zA-Z]+)*$/)) {
    nameError.innerHTML = "Write full name";
    return false;
  }
  nameError.innerHTML = '<i class="fas fa-check-circle"></i>';
  return true;
}

function validatePhone() {
  var phone = document.getElementById("contact-phone").value;

  if (phone.length == 0) {
    phoneError.innerHTML = "Phone no is required";
    return false;
  }

  if (phone.length !== 10) {
    phoneError.innerHTML = "Phone no should be 10 characters";
    return false;
  }

  if (!phone.match(/^[0-9]{10}$/)) {
    phoneError.innerHTML = "Only digits please";
    return false;
  }
  phoneError.innerHTML = '<i class="fas fa-check-circle"></i>';
  return true;
}

function validateEmail() {
  // Get the email input value
  const email = document.getElementById("contact-email").value;

  emailError.innerHTML = "";

  if (!email) {
    emailError.innerHTML = "Email is required.";
    return false;
  }

  const emailRegex =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  if (!emailRegex.test(email)) {
    emailError.innerHTML =
      "Invalid email format. Please enter a valid email address.";
    return false;
  }

  // Email is valid
  emailError.innerHTML = '<i class="fas fa-check-circle"></i>';
  return true;
}

function validateMessage() {
  var message = document.getElementById("contact-message");
  var required = 30;
  var left = required - message.length;

  if (left > 0) {
    messageError.innerHTML = left + " More characters required";
    return false;
  }

  messageError.innerHTML = '<i class="fas fa-check-circle"></i>';
  return true;
}

function validateForm() {
  if (
    !validateName() ||
    !validateEmail() ||
    !validatePhone() ||
    !validateMessage()
  ) {
    submitError.style.display = "block";
    submitError.innerHTML = "Please fix error to submit";
    setTimeout(function () {
      submitError.style.display = "none";
    }, 3000);
    return false;
  }
}
