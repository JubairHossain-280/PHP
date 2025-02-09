document.querySelectorAll("input[type='password']").forEach((passwordField) => {
    const showBtn = passwordField.nextElementSibling;
    const eyeIcon = showBtn.querySelector('.fa-solid');

    showBtn.onclick = function() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    };
});






