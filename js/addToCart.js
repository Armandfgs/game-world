function addToCart()
{
    let params = (new URL(location)).searchParams;
    var sku = params.get("p");
    var url = "../php/addToCart?p=" + sku;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var cartItemCount = xhr.responseText;


            console.log(cartItemCount);

        }
    }
}
