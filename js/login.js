
//Valiates that both passwords entered are identical
function checkSamePass(passId,repassId){
    var pass = document.getElementById(passId).value;
    var repass = document.getElementById(repassId).value;

    if(repass === pass)
    {
        document.getElementById(repassId).style.borderColor = "PaleGreen";
    }else
    {
        document.getElementById(repassId).style.borderColor = "red";
    }
}

//Checks that the password the user wants fits the regulations set
function checkValidPass(passId)
{
    var pass = document.getElementById(passId).value;
    var required = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;


    if(!required.test(pass))
    {
        document.getElementById(passId).style.borderColor = "red";
    }else
    {
        document.getElementById(passId).style.borderColor = "PaleGreen";
    }
}

function registerAccount()
{
    clearErrors();

    var form = document.getElementById("registerForm");
    var action = form.getAttribute("action");

    if(checkForErrors() == false);
    {
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();

        xhr.open("POST", action, true);

        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.onreadystatechange = function ()
        {
            if (xhr.readyState == 4 && xhr.status == 200)
            {
                var result = xhr.responseText;

                var jsonResult = JSON.parse(result);


                if (jsonResult.hasOwnProperty('errors') && jsonResult.errors.length > 0)
                {
                   displayErrors(jsonResult.errors);
                } else
                {
                    window.location.href="/game-world/index.php";
                }
            }
        }

        xhr.send(formData);
    }
}

function tryLogin()
{
    clearErrors();

    var form = document.getElementById("loginForm");
    var action = form.getAttribute("action");

    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();

    xhr.open("POST", action, true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            var account = JSON.parse(result);

            if (account.hasOwnProperty('errors') && account.errors.length > 0)
            {
                displayErrors(account.errors);
            } else
            {
                delete account.password;
                setAccountTab(account.firstName);

                window.location.href="/game-world/index.php";


            }
        }
    };
    xhr.send(formData);
}

function displayErrors(errors) {
    var inputs = document.getElementsByTagName('input');
    for(i=0; i < inputs.length; i++) {
        var input = inputs[i];
        if(errors.indexOf(input.name) >= 0) {
            input.classList.add('error');
        }
    }
}

function registrationSuccessful()
{
    alert("Account Created");
}

function error()
{
    alert("Error");
}

function clearErrors() {
    var inputs = document.getElementsByTagName('input');
    for(i=0; i < inputs.length; i++) {
        inputs[i].classList.remove('error');
    }
}

function checkForErrors()
{
    var hasError = false;

    var pass = document.getElementById("passSignUp").value;
    var repass = document.getElementById("repassSignUp").value;

    if(repass != pass )
    {
        hasError = true;
    }
    console.log(hasError);
    return hasError;
}

function setAccountTab(name)
{
    var accountTab = document.getElementById("accountTab");
    accountTab.innerHTML = name + '<span class="glyphicon glyphicon-user">';
    if(name == "Account ")
    {
        accountTab.href = "/game-world/pages/account.php"
    }else
    {
        accountTab.href = "/game-world/pages/userAccount.php";
    }

}