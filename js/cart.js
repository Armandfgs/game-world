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
                                                    '<div class="col-md-5 lead text-left">Name</div>' +
                                                    '<div class="col-md-2 lead text-left">Platform</div>' +
                                                    '<div class="col-md-2 lead text-center">Quantity</div>' +
                                                    '<div class="col-md-2 lead text-center">Price</div>' +
                                                    '<div class="col-md-1 lead text-left">Delete</div>' +
                                                '</div>'+
                                            '<div class="col-md-2"></div>' +
                                        '</div>');
                var cartItems = JSON.parse(result);
                console.log(cartItems);
                for (var i=0, len = cartItems.length; i<len; i++ )
                {
                    $("#cartItems").append(buildCartItem(cartItems[i]));
                }
                quantityFunctionality();
                $("#cartItems").append('<div class="row">' +
                                            '<div class="text-center lead" id="totalPrice"> Total: &euro;   </div>');
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
    var itemDiv = '<div class="row">' +
                        '<div class="col-md-2"></div>' +
                            '<div class="col-md-8 cartItem">' +
                                '<div class="col-md-5 lead text-left"> '+ cartItem.name +' </div>' +
                                '<div class="col-md-2 lead text-left">'+ cartItem.platform +'</div>' +
                                '<div class="col-md-2 lead text-center">' +
                                        '<div class="input-group">'+
                                            '<span class="input-group-btn">'+
                                                '<button type="button" class="quantity-left-minus btn btn-danger btn-number" value="'+cartItem.sku+'" data-type="minus" data-field="">'+
                                                    '<span class="glyphicon glyphicon-minus"></span>'+
                                                '</button>'+
                                            '</span>'+
                                        '<input type="text" id="quantity" value="1" name="quantity" class="form-control input-number col-md-5" value="10" min="1">'+
                                        '<span class="input-group-btn">'+
                                            '<button type="button" class="quantity-right-plus btn btn-success btn-number" value="'+cartItem.sku+'" data-type="plus" data-field="">'+
                                                '<span class="glyphicon glyphicon-plus"></span>'+
                                            '</button>'+
                                '</div>'+
                                '</div>' +
                                '<div class="col-md-2 lead text-center" id="'+cartItem.sku+'"> &euro;'+ cartItem.subtotal+'</div>' +
                                '<div class="col-md-1 lead text-center">' +
                                    '<button type="button" class="btn btn-danger">X</button>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-2"></div>' +
                    '</div>';
    return itemDiv;
}

function quantityFunctionality()
{
    var quantity=0;
    $('.quantity-right-plus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        // If is not undefined
        $('#quantity').val(quantity + 1);
        // Increment
        calculatePrice(quantity+1, $('.quantity-right-plus').attr("value"));
    });

    $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        // If is not undefined
        // Increment
        if(quantity>1){
            $('#quantity').val(quantity - 1);
        }
        calculatePrice(quantity-1, $('.quantity-left-minus').attr("value"));
    });
}

function calculatePrice(quantity, sku) {

    var xhr = new XMLHttpRequest();
    var url = "../php/calculatePrices.php?q=" +quantity + "&p=" + sku;

    xhr.open("GET",url, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            console.log(result);
            var values = JSON.parse(result);

            console.log(values);
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


            console.log(cartItemCount);

        }
    };
    xhr.send();
}