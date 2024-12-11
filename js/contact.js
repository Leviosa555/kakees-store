document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contact-form');
    const responseMessage = document.getElementById('response-message');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        
        // Simple form validation
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;

        if (name && email && message) {
            // Display the success message on the page
            responseMessage.textContent = 'Thank you for your message! We will get in touch with you shortly.';
            responseMessage.style.display = 'block';

            // Clear form fields
            form.reset();
        } else {
            // Display an error message
            responseMessage.textContent = 'Please fill in all the fields.';
            responseMessage.style.color = '#D32F2F'; // Red color for error message
            responseMessage.style.display = 'block';
        }
    });
});
