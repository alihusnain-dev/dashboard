document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const submitButton = document.querySelector('.submit-button');
    const form = document.getElementById('myForm');

    function validatePasswords() {
        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordInput.classList.add('error-password');
            submitButton.disabled = true;
        } else {
            confirmPasswordInput.classList.remove('error-password');
            submitButton.disabled = false;
        }
    }

    passwordInput.addEventListener('input', validatePasswords);
    confirmPasswordInput.addEventListener('input', validatePasswords);

    // Ensure that the form cannot be submitted if passwords do not match
    form.addEventListener('submit', function(event) {
        if (passwordInput.value !== confirmPasswordInput.value) {
            event.preventDefault(); // Prevent form submission
            confirmPasswordInput.classList.add('error-password');
            submitButton.disabled = true;
        }
    });
});
