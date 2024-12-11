document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registration-form');
    const responseMessage = document.getElementById('response-message');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const cakeType = document.getElementById('cake_type').value;
        const deliveryDate = document.getElementById('delivery_date').value;

        if (name && email && phone && cakeType && deliveryDate) {
            responseMessage.textContent = 'Thank you for your registration! We will contact you shortly.';
            responseMessage.style.display = 'block';

            form.reset();
        } else {
            responseMessage.textContent = 'Please fill in all required fields.';
            responseMessage.style.color = '#D32F2F';
            responseMessage.style.display = 'block';
        }
    });
});
