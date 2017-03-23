function getOrders() {
    var xhr = new XMLHttpRequest();

    xhr.open("GET", "../php/getUserOrders.php", true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            var orders = JSON.parse(result);
            var list = document.getElementById("ordersList");

            if(orders.length <= 0)
            {
                list.innerHTML = '<div class="text-center col-md-12"> No Orders Yet! Go buy some Games! </div>'
            }else
            {
                orders.forEach(function (order)
                {
                    var itemList ="<ul>";
                    order.productList.forEach(function (item)
                    {
                        itemList += '<li>' + item.name + ' - ' + item.platform + ' x ' + item.quantity + '</li>';
                    });

                    itemList += "</ul>";
                    var orderItem = '<div class="row cartObject">'+
                                        '<div class="col-md-12 cartItem">'+
                                            '<div class="col-md-8">'+
                                                '<h4 class="lead">'+order.transactionDate +'</h4>'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="col-md-1">' +
                                                            '<p>Items:</p>'+
                                                        '</div>'+
                                                        '<div class="col-md-11">' +
                                                            itemList+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div  class="col-md-4">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12 lead" >'+
                                                        '<p>Total Price: &euro;'+order.price +'</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';
                    $(list).append(orderItem);
                    
                })
            }
        }
    };
    xhr.send();
}

function loadAllOrders() {
    var xhr = new XMLHttpRequest();

    xhr.open("GET", "../php/getAllOrders.php", true);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
            var result = xhr.responseText;
            var orders = JSON.parse(result);
            console.log(orders);
            console.log(orders.length);

            orders.forEach(function (order)
            {
                $('#allOrders').append(generateOrderAdmin(order));
            })
        }
    };

    xhr.send();
}

function generateOrderAdmin(order)
{
    var itemList ="<ul>";
    order.productList.forEach(function (item)
    {
        itemList += '<li>' + item.name + ' - ' + item.platform + ' x ' + item.quantity + '</li>';
    });

    var orderElement = '<div class="row cartObject">'+
                            '<div class="col-md-12 cartItem">' +
                                '<div class="row">' +
                                    '<div class="col-md-12 text-left lead">' +order.email + '</div> ' +
                                '</div> '+
                                '<div class="col-md-8">'+
                                    '<h4 class="lead">'+order.transactionDate +'</h4>'+
                                '<div class="row">'+
                                    '<div class="col-md-12">'+
                                        '<div class="col-md-1">' +
                                            '<p>Items:</p>'+
                                        '</div>'+
                                        '<div class="col-md-11">' +
                                            itemList+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                                '<div  class="col-md-4">'+
                                    '<div class="row">'+
                                        '<div class="col-md-12 lead" >'+
                                            '<p>Total Price: &euro;'+order.price +'</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

    return orderElement;
}
