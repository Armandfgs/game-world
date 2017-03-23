function loadAdmins(userList)
{
    document.getElementById("adminList").innerHTML = "";
    userList.forEach(function (admin) {
        $("#adminList").append(buildAdminRow(admin));
    });
}

function getAdminList()
{
    var xhr = new XMLHttpRequest();

    xhr.open("GET", "../php/getAdminList.php", true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            var userList = JSON.parse(result);
            loadAdmins(userList);
        }
    };

    xhr.send();
}

function buildAdminRow(adminObject) {
    var admin = '<div class="row">' +
                    '<div class="col-md-2"></div>' +
                    '<div class="col-md-8 cartItem">' +
                        '<div class="col-md-11 lead text-left">'+adminObject.username+' </div>' +
                        '<div class="col-md-1 lead text-center">' +
                            '<button type="button" class="btn btn-danger" onclick="deleteAdmin(\''+adminObject.username+'\')">X</button>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-md-2"></div>' +
                '</div>';
    return admin;
}

function deleteAdmin(username) {
    var xhr = new XMLHttpRequest();
    var url = "../php/deleteAdmin.php?a=" + username;

    xhr.open("GET",url , true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            getAdminList();
        }
    };

    xhr.send();
}