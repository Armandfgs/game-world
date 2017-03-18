function getProduct()
{
    let params = (new URL(location)).searchParams;
    var sku = params.get("p");
    var url = "../php/getProduct?p=" + sku;

    var xhr = new XMLHttpRequest();

    xhr.open("GET",url, true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            var product = JSON.parse(result);
            fillPage(product);
        }
    };
    xhr.send();
}

function fillPage(product)
{
    document.getElementById("prodPageName").innerHTML = product.name + " - " + product.platform;
    document.getElementById("prodImage").src = "../res/images/" + product.image;
    if (product.hasOwnProperty("otherPlatforms"))
    {
        $("#prodPageDropdownRow").append(generateDropdown("Platform", product["otherPlatforms"], "platform"));
        $("#prodPageDropdownRow").append('<div class="col-md-4"></div>');
    }

    if (product.hasOwnProperty("otherEditions"))
    {
        $("#prodPageDropdownRow").append(generateDropdown("Editions", product["otherEditions"], "edition"));
    }
    $("#prodDetails").append(generateDetails(product));
    $("#prodDescription").append(product.description);
    $("#prodPrice").append(product.price);

}

function generateDropdown(title, array, value)
{
    var list="<ul class='dropdown-menu'>";
    array.forEach(function (listItem)
    {
        var link = "product.php?p=" + listItem.sku;
        list += '<li><a href=' + ' " ' + link + '">' + listItem[value] + '</a></li>';
    });
    list += "</ul>";

    var dropdown = '<div class="col-md-2">'+
                                '<div class="dropdown">'+
                                    '<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">'+ title +
                                        '<span class="caret"></span>'+
                                    '</button>'+ list +
                                '</div>'+
                            '</div>';
    return dropdown;
}

function generateDetails(product)
{
    var details = '<ul id="prodDetailsList" class="text-left" >'+
        '<li><b>Developer: </b>'+ product.developer +'</li>'+
        '<li><b>Genre: </b>'+ product.genre +'</li>'+
        '<li><b>Model:</b> '+ product.model +'</li>'+
        '<li><b>Release Date: </b>'+ product.releaseDate +'</li>';
    return details;
}