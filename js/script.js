// Event listener for DOMContentLoaded to ensure the DOM is fully loaded before executing the script
document.addEventListener("DOMContentLoaded", function () {
  // DOM element selectors
  const wrapper = document.querySelector(".wrapper");
  const loginLink = document.querySelector(".login-link");
  const registerLink = document.querySelector(".register-link");
  const btnPopup = document.querySelector(".btnLogin-popup");
  const iconClose = document.querySelector(".icon-close");
  const registerForm = document.querySelector(".register form");
  const aboutLink = document.querySelector('.navigation a[href="#About"]');
  const aboutPopup = document.querySelector(".about-popup");
  const iconCloseAbout = document.querySelector(".icon-close-about");
  const contactLink = document.querySelector('.navigation a[href="#Contact"]');
  const contactPopup = document.querySelector(".contact-popup");
  const iconCloseContact = document.querySelector(".icon-close-contact");

  // Email validation function using regex
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  // Password validation function (minimum 8 characters)
  function isValidPassword(password) {
    return password.length >= 8;
  }

  // Function to check if terms and conditions are accepted
  function isTermsAccepted(termsCheckbox) {
    return termsCheckbox.checked;
  }

  // Function to display error messages
  function showError(input, message) {
    const formBox = input.closest(".form-box");
    const errorElement = formBox.querySelector(".error-message");
    errorElement.innerText = message;
    errorElement.style.display = "block"; // Display the error message
    formBox.classList.add("error");
  }

  // Function to remove error messages
  function removeError(input) {
    const formBox = input.closest(".form-box");
    const errorElement = formBox.querySelector(".error-message");
    errorElement.innerText = "";
    errorElement.style.display = "none"; // Hide the error message
    formBox.classList.remove("error");
  }

  // Function to handle registration form submission with validation
  function validateRegistrationForm() {
    const emailInput = document.querySelector('.register input[type="email"]');
    const passwordInput = document.querySelector('.register input[type="password"]');
    const termsCheckbox = document.querySelector('.register input[name="terms"]');

    // Resetting previous errors
    removeError(emailInput);
    removeError(passwordInput);
    removeError(termsCheckbox);

    // Validating each field
    if (!isValidEmail(emailInput.value)) {
      showError(emailInput, "Please enter a valid email address.");
      return false;
    }
    if (!isValidPassword(passwordInput.value)) {
      showError(passwordInput, "Password must be at least 8 characters long.");
      return false;
    }
    if (!isTermsAccepted(termsCheckbox)) {
      showError(termsCheckbox, "Please accept the terms and conditions.");
      return false;
    }

    // If all validations pass
    return true;
  }

  // Function to handle login form validation
  const loginForm = document.querySelector(".login form");
  function validateLoginForm() {
    const emailInput = document.querySelector('.login input[type="email"]');
    const passwordInput = document.querySelector('.login input[type="password"]');

    // Resetting previous errors
    removeError(emailInput);
    removeError(passwordInput);

    // Validating each field
    if (!isValidEmail(emailInput.value)) {
      showError(emailInput, "Please enter a valid email address.");
      return false;
    }
    if (!isValidPassword(passwordInput.value)) {
      showError(passwordInput, "Password must be at least 8 characters long.");
      return false;
    }

    // If all validations pass
    return true;
  }

  // Prevent form submission if validation fails
  loginForm.addEventListener("submit", function (e) {
    if (!validateLoginForm()) {
      e.preventDefault();
    }
  });
  registerForm.addEventListener("submit", function (e) {
    if (!validateRegistrationForm()) {
      e.preventDefault();
    }
  });

  // Event listeners for user interactions
  registerLink.addEventListener("click", () => wrapper.classList.add("active"));
  loginLink.addEventListener("click", () => wrapper.classList.remove("active"));
  btnPopup.addEventListener("click", () => wrapper.classList.add("active-popup"));
  iconClose.addEventListener("click", () => {
    wrapper.classList.remove("active-popup");
    wrapper.classList.remove("active");
  });
  aboutLink.addEventListener("click", () => aboutPopup.classList.add("active"));
  iconCloseAbout.addEventListener("click", () => aboutPopup.classList.remove("active"));
  contactLink.addEventListener("click", () => contactPopup.classList.add("active"));
  iconCloseContact.addEventListener("click", () => contactPopup.classList.remove("active"));
});

// Additional event listener for window load to handle error messages in URL
window.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const error = urlParams.get('error');

  if (error) {
    // Alerting the user with the error message
    alert(decodeURIComponent(error));

    // Removing the error parameter from the URL
    urlParams.delete("error");
    history.pushState(null, "", "?" + urlParams.toString());
  }
});
