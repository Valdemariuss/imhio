document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('js-email-check-form'),
        emailInp = document.getElementById('js-email-nput'),
        emailRow = emailInp.parentNode,
        formMessage = emailRow.getElementsByClassName('form-message')[0];

    function messege(mes) {
        formMessage.innerHTML = mes;
    }

    function checkEmail() {
        const data = new FormData(form),
            xhr = new XMLHttpRequest();

        xhr.open("POST", "/email/check", true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4){
                if(xhr.responseText) {
                    emailResponse( JSON.parse(xhr.responseText) );
                } else {
                    emailResponseError();
                }
            }
        };

        xhr.onerror = () => {
            emailResponseError();
        };

        xhr.send(data);
    }

    function emailResponse(res) {
        if(res.validation) {
            messege('Successful save');
        } else if(res.err) {
            messege('Email invalid');
        }
    }

    function emailResponseError() {
        messege('Send error');
    }

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        checkEmail();
        return false;
    });
});
