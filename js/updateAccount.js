function updateAccount()
{
    clearErrors();

    var form = document.getElementById("updateAccountForm");
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

            console.log(account);
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
    }
    xhr.send(formData);
}

function fillForm()
{
    var xhr = new XMLHttpRequest();

    xhr.open("GET", "../php/getAccount.php", true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            var account = JSON.parse(result);

            document.getElementById("nameUpdate").value = account.firstName;
            document.getElementById("lastNameUpdate").value = account.lastName;
            document.getElementById("passUpdate").value = account.password;
            document.getElementById("mobileNoUpdate").value = account.mobileNumber;
            document.getElementById("addressLine1Update").value = account.address.address1;
            document.getElementById("addressLine2Update").value = account.address.address2;
            document.getElementById("postcodeUpdate").value = account.address.postcode;
            document.getElementById("cityUpdate").value = account.address.city;
            document.getElementById("countryUpdate").value = account.address.country;

            getOrders();
        }
    };
    xhr.send();
}