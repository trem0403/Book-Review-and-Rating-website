function validate() {
  const email = document.getElementById("email");
  const username = document.getElementById("username");
  const password = document.getElementById("pass");
  const password2 = document.getElementById("pass2");
  const terms = document.getElementById("terms");
  

  const outputError = (input, message) => {
    const textArea = input.parentElement;
    const errorMessage = textArea.querySelector(".error");

    errorMessage.innerText = message;
    textArea.classList.add("error");
    textArea.classList.remove("success");
  };

  const outputSuccess = (input) => {
    const textArea = input.parentElement;
    const errorMessage = textArea.querySelector(".error");

    errorMessage.innerText = "";
    textArea.classList.add("success");
    textArea.classList.remove("error");
  };

  const validateInputs = () => {
    const emailValue = email.value.trim();
    const userValue = username.value.trim();
    const passValue = password.value.trim();
    const passValue2 = password2.value.trim();
    const termsChecked = terms.checked;

    // Email validation using regular expression
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(emailValue)) {
      outputError(
        email, "Email address should be non-empty with the format xyx@xyz.xyz."
      );
    } else {
      outputSuccess(email);
    }

    // User name validation
    if (userValue === "" || userValue.length < 20) {
      outputError(username, "User name should be non-empty, and within 20 characters long."
      );
    } else {
      outputSuccess(username);
    }

    // Password validation using regular expression
    var passPattern = /(?=.*[a-z])(?=.*[A-Z])/;
    if (passValue.length < 6 || !passPattern.test(passValue)) {
      outputError(
        password, "Password should be at least 6 characters: 1 uppercase, 1 lowercase."
      );
    } else {
      outputSuccess(password);
    }

    // Password match validation
    if (passValue !== passValue2 || passValue === "") {
      outputError(password2, "Please retype password.");
    } else {
      outputSuccess(password2);
    }

    // terms validation
    if (!termsChecked) {
      outputError(terms, "Please accept the terms and conditions.");
    } else {
      outputSuccess(terms);
    }

    // Check if all inputs are valid
    if (emailValue && userValue && passValue && passValue2 && termsChecked) {
      email.value = "";
      username.value = "";
      password.value = "";
      password2.value = "";
      terms.checked = false;
    }
  };

  validateInputs(); 
  return false; // Prevent form submission
}




