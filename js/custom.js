function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form-message");

    messageElement.textContent = message;
    messageElement.classList.remove("form-message-success", "form-message-error");
    messageElement.classList.add("form-message-".concat(type));

    //setFormMessage(loginForm, "success", "You're loggied in!");
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form-input-error");
    inputElement.parentElement.querySelector(".form-input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form-input-error");
    inputElement.parentElement.querySelector(".form-input-error-message").textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");
/*
    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form-hidden");
        createAccountForm.classList.remove("form-hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form-hidden");
        createAccountForm.classList.add("form-hidden");
    });
*/
    const form = {
        username: document.getElementById('username'),
        password: document.getElementById('password'),
        submit: document.getElementById('submit')
    };
    
    loginForm.addEventListener("submit", e => {
        e.preventDefault();

        // Perform your AJAX/Fetch Login
        form.submit.addEventListener('click', () => {
            const request = new XMLHttpRequest();
        
            request.onload = () => {
                let responseObject = null;
        
                try {
                    responseObject = JSON.parse(request.responseText);
                } catch (e) {
                    console.error('Could not parse JSON');
                }
        
                if (responseObject) {
                    handleResponse(responseObject);
                }
            };
        
            const requestData = 'username=$form.username.value}&password=${form.password.value}';
        
            request.open('post', 'checkuser.php');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(requestData)
        });

        function handleResponse (responseObject) {
            //document.getElementById("demo").innerHTML = "something";
            if (responseObject) {
                location.href = "dashboard.html";
            } else {
                setFormMessage(loginForm, "error", "Invalid username/password combination");
            }
        }
        
        //setFormMessage(loginForm, "error", "Invalid username/password combination");
        
    });

    document.querySelectorAll(".form-input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id == "signupUsername" && e.target.value.length > 0 && e.target.value.length < 10) {
                setInputError(inputElement, "Username must be at least 10 characters in length.");
            }
            
            if (e.target.id == "createPassword" && e.target.value.length < 8 || e.target.value.length > 16) {
                setInputError(inputElement, "Password must be 8 to 10 characters in length.");
            } 
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        })
    });
});