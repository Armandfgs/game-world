<?php
    session_start();
function outputHead($title)
{
    echo
    ('
       <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
		        <meta name="Game World" content="Video Game E-Commerce Shop">
                <title>'.$title.'</title>
                <meta name="viewport" content="width = device-width, initial-scale=1">
                 <link rel="stylesheet" type="text/css" href="/game-world/css/bootstrap.css" />
                 <link rel="stylesheet" type="text/css" href="/game-world/css/custom.css" />
                 <link rel="stylesheet" type="text/css" href="/game-world/font-awesome-4.7.0/css/font-awesome.css" />
                 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
                 <script type="text/javascript" src="/game-world/js/bootstrap.min.js"></script>
                 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
                 <script type="text/javascript" src="/game-world/js/cart.js"></script>
                 <script type="text/javascript" src="/game-world/js/login.js"></script>
                 <script type="text/javascript" src="/game-world/js/updateAccount.js"></script>
                 <script type="text/javascript" src="/game-world/js/userOrders.js"></script>
                 <script type="text/javascript" src="/game-world/js/productPage.js"></script>
                 <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
                 <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
                 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            </head>
            <body>
    ');
}

function outputNav($pageName)
{
    echo
    ('
        <header>
        <h1 id="title">Game World</h1>
        <nav class="navbar navbar-default" role="navigation">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/game-world/index.php">Game World</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li '. setActive($pageName, "home") .'><a href="/game-world/index.php">Home <span class="glyphicon glyphicon-home"></span> </a></li>
                <li '. setActive($pageName, "shop") . 'class="dropdown">
                  <a href="/game-world/pages/shop.php" class="dropdown-toggle" data-toggle="dropdown">Shop <span class="glyphicon glyphicon-euro"></span> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="/game-world/pages/shop-categories/pc.php">PC</a></li>
                    <li><a href="/game-world/pages/shop-categories/ps4.php">Playstation 4</a></li>
                    <li><a href="/game-world/pages/shop-categories/xbox.php">Xbox One</a></li>
                    <li class="divider"></li>
                    <li><a href="/game-world/pages/shop.php">All</a></li>
                  </ul>
                </li>
                <li'. setActive($pageName, "account") .'><a href="/game-world/pages/account.php" id="accountTab">Account <span class="glyphicon glyphicon-user"></span></a></li>
                <li'. setActive($pageName, "cart") .'><a href="/game-world/pages/cart.php">My Cart <span class="glyphicon glyphicon-shopping-cart"></span><span id="cartItemCount">'.cartCount().'</span> </a></li>
                <li'. setActive($pageName, "contact") .'><a href="/game-world/pages/contactUs.php">Contact Us <span class="glyphicon glyphicon-earphone"></span> </a></li>
                <li>
                  <form class="navbar-form navbar-left">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </li>
                <li><a href="/game-world/php/logout.php" onclick="logOut();"><span class="glyphicon glyphicon-log-out"></span></a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        </header>
    ');
}

function setAccountTab()
{
    if (isset($_SESSION["name"]) && !empty($_SESSION["name"]))
    {
        $name = $_SESSION["name"];
        echo '<script type="text/javascript">',
        "setAccountTab('$name ');",
        '</script>';
    }
    else
    {
        echo '<script type="text/javascript">',
        'setAccountTab("Account ");',
        '</script>';
    }
}

function setActive($pageName, $buildPage)
{
    if ($pageName == $buildPage)
    {
       return ' class="active"';
    }
}

function footer()
{
    echo
    ('
        <footer>
            <div class="row" id="footer">
                 <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <p>Armand Grech Scerri and Charlot Borg<br> Copyright &copy; 2016</p>
                </div>
            </div>
        </footer>
        </div>
        <script>
            window.addEventListener("load", function(){
                window.cookieconsent.initialise({
                    "palette": {
                        "popup": {
                            "background": "#eaf7f7",
                            "text": "#5c7291"
                        },
                        "button": {
                            "background": "#56cbdb",
                            "text": "#ffffff"
                        }
                    },
                    "theme": "edgeless",
                    "position": "top",
                    "static": true,
                    "content": {
                        "message": "We don\'t read your fortune, but we still use cookies "
                    }
                })});
        </script>
        </html>
    ');
}

function outputAdminNav($pageName)
{
    echo
    ('
        <header>
        <h1 id="title">Game World</h1>
        <nav class="navbar navbar-default" role="navigation">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/game-world/index.php">Game World</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                
                <li '. setActive($pageName, "home") .'><a href="/game-world/admin-pages/admin.php">Home <span class="glyphicon glyphicon-home"></span> </a></li>
                <li '. setActive($pageName, "shop") .'><a href="/game-world/admin-pages/manage-products.php">Manage Products </a></li>
                <li'. setActive($pageName, "account") .'><a href="/game-world/admin-pages/manage-admins.php">Manage Admins </a></li>
                <li'. setActive($pageName, "cart") .'><a href="/game-world/admin-pages/view-orders.php">View Orders </a></li>
                <li'. setActive($pageName, "contact") .'><a href="/game-world/admin-pages/login.php">Logout </a></li>
                <li>
                  
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        </header>
    ');
}

function cartCount()
{
    if (isset($_SESSION["cartCount"]))
    {
        return $_SESSION["cartCount"];
    }else
    {
        return "";
    }
}

?>

