function showCartItems()
{
    document.getElementById("cartItems").innerHTML = "";
    var xhr = new XMLHttpRequest();

    xhr.open("GET","../php/getCart.php", true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            if (result != "empty")
            {
                $("#cartItems").append('<div class="row">' +
                                            '<div class="col-md-2"></div>'+
                                                '<div class=" col-md-8" id="cartHeader">' +
                                                    '<div class="col-md-6 lead text-left">Name</div>' +
                                                    '<div class="col-md-2 lead text-left">Platform</div>' +
                                                    '<div class="col-md-1 lead text-left">Quantity</div>' +
                                                    '<div class="col-md-2 lead text-center">Price</div>' +
                                                    '<div class="col-md-1 lead text-center">Delete</div>' +
                                                '</div>'+
                                            '<div class="col-md-2"></div>' +
                                        '</div>');
                var cartItems = JSON.parse(result);

                for (var i=0, len = cartItems.length; i<len; i++ )
                {
                    $("#cartItems").append(buildCartItem(cartItems[i]));
                }
                $("#cartItems").append('<div class="row">' +
                                            '<div class="lead text-center" id="totalPrice"></div>' +
                                        '</div>');
                calculateTotal();
                $("#cartItems").append('<div class="row text-center">'+
                                            '<button type="button" class="btn btn-success" onclick="confirmOrder();">Confirm Order</button>'+
                                            '<button type="button" class="btn btn-danger" onclick="emptyCart();">Clear Cart</button>'+
                                        '</div>');
            }else
            {
                document.getElementById("cartItems").innerHTML = '<div class="text-center col-md-12 lead"> Go treat yourself to some games and come here later!</div>'
            }
        }
    };
    xhr.send();
}

function buildCartItem(cartItem)
{
    var plusValue = "plus-" + cartItem.sku;
    var minusValue = "minus-" + cartItem.sku;
    var price = cartItem.quantity * cartItem.price;
    var itemDiv = '<div class="row">' +
                        '<div class="col-md-2"></div>' +
                            '<div class="col-md-8 cartItem">' +
                                '<div class="col-md-6 lead text-left"> '+ cartItem.name +' </div>' +
                                '<div class="col-md-2 lead text-left">'+ cartItem.platform +'</div>' +
                                '<div class="col-md-1 lead text-left"><input class="col-md-12" onblur="updateCart('+ cartItem.sku +')" id="' + cartItem.sku + '" type="number" value="'+cartItem.quantity +'" min="1"/></div>' +
                                '<div class="col-md-2 lead text-center" id="price-'+cartItem.sku+'"> &euro;'+ price+'</div>' +
                                '<div class="col-md-1 lead text-center">' +
                                    '<button type="button" class="btn btn-danger" onclick="removeItem('+cartItem.sku+')">X</button>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-2"></div>' +
                    '</div>';
    return itemDiv;
}

function calculateTotal() {

    var xhr = new XMLHttpRequest();
    var url = "../php/calculateTotal.php?";
    xhr.open("GET",url, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var total =  xhr.responseText;
            document.getElementById("totalPrice").innerHTML = "Total: &euro;" + total;
            console.log(total);
        }
    };
    xhr.send();
}

function emptyCart() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/emptyCart.php", true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            showCartItems();
            document.getElementById("cartItemCount").innerHTML ="";
        }
    };
    xhr.send();
}

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

            document.getElementById("cartItemCount").innerHTML = cartItemCount;
        }
    };
    xhr.send();
}

function removeItem(sku) {

    console.log(sku);
    var url =  "../php/removeFromCart.php?p=" + sku;
    var xhr = new XMLHttpRequest();
    xhr.open("POST",url, true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            showCartItems();
        }
    };
    xhr.send();
}

function confirmOrder()
{
    var xhr = new XMLHttpRequest();
    xhr.open("GET","../php/createOrder.php", true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            if( result == "successful")
            {
                window.location.href="/game-world/pages/userAccount.php";
            }else
            {
                window.location.href="/game-world/pages/account.php";
            }
        }
    };
    xhr.send();
}

function updateCart(sku)
{
    var id = "" +sku;
    var quantity = document.getElementById(id).value;
    var url = "../php/updateQuantity.php?p=" + sku + "&q=" + quantity;

    var xhr = new XMLHttpRequest();
    xhr.open("GET",url, true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            var values = JSON.parse(result);
            var priceElement = "price-" + sku;
            document.getElementById(priceElement).innerHTML = "&euro;" + values.subtotal;
            document.getElementById("totalPrice").innerHTML = "Total: &euro;" + values.total;
            console.log(values);
        }
    };
    xhr.send();
}