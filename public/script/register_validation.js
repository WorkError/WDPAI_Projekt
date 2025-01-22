document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    form.addEventListener('submit', (event) => {
        const firstName = document.getElementById('first_name').value.trim();
        const lastName = document.getElementById('last_name').value.trim();
        const nickname = document.getElementById('nickname').value.trim();
        const email = document.getElementById('email').value.trim();
        const birthDate = document.getElementById('birth_date').value;
        const password = document.getElementById('password').value;

        document.querySelectorAll('.error').forEach(el => el.remove());

        let isValid = true;

        if (firstName.length < 2 || firstName.length > 50) {
            showError('first_name', 'First name must be between 2 and 50 characters.');
            isValid = false;
        }

        if (lastName.length < 2 || lastName.length > 50) {
            showError('last_name', 'Last name must be between 2 and 50 characters.');
            isValid = false;
        }

        if (nickname.length < 3 || nickname.length > 10) {
            showError('nickname', 'Nickname must be between 3 and 10 characters.');
            isValid = false;
        }

        if (!validateEmail(email)) {
            showError('email', 'Please enter a valid email address.');
            isValid = false;
        }

        if (!validateBirthDate(birthDate)) {
            showError('birth_date', 'Please enter a valid date of birth (must be 16 years or older).');
            isValid = false;
        }

        if (password.length < 5) {
            showError('password', 'Password must be at least 5 characters long.');
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const error = document.createElement('div');
        error.className = 'error';
        error.style.color = 'red';
        error.style.fontSize = '0.9rem';
        error.style.marginTop = '5px';
        error.style.marginBottom = '5px';
        error.textContent = message;
        field.parentNode.insertBefore(error, field.nextSibling);
    }


    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validateBirthDate(birthDate) {
        const currentDate = new Date();
        const birthDateObj = new Date(birthDate);
        const age = currentDate.getFullYear() - birthDateObj.getFullYear();
        const monthDifference = currentDate.getMonth() - birthDateObj.getMonth();

        return (
            birthDate &&
            (age > 16 || (age === 16 && monthDifference >= 0))
        );
    }
});
