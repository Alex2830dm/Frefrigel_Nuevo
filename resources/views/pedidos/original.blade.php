<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart Js</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">

</head>

<body>
    <header>
        <div class="header-section container">
            <img class="logo" src="./images/logoShop.png" alt="">
            <div>
                <img onclick="showCart(this)" class="cart" src="./images/cart.png" alt="">
                <p class="count-product">0</p>
            </div>
            <div class="cart-products" id="products-id">
                <p class="close-btn" onclick="closeBtn()">X</p>
                <h3>Mi carrito</h3>
                <div class="card-items">
                    <!-- <div class="item">
                        <img src="./images/products/keyboard-1.jpg" alt="">
                        <div class="item-content">
                            <h5>name of product name of product name of product</h5>
                            <h5 class="cart-price">45.50$</h5>
                            <h6>Amount: 3</h6>
                        </div>
                        <span>X</span>
                    </div>
    
                    <div class="item">
                        <img src="./images/products/keyboard-1.jpg" alt="">
                        <div class="item-content">
                            <h5>name of product name of product name of product</h5>
                            <h5 class="cart-price">45.50$</h5>
                            <h6>Amount: 3</h6>
                        </div>
                        <span class="delete-product" data-id="">X</span>
                    </div> -->
                </div>
                <h2>Total: $<strong class="price-total">0</strong></h2>
            </div>
        </div>
    </header>
    <section class="container">
        <div class="products">
            @foreach ($productos as $producto)
            <div class="carts">
                <div>
                    <img src="{{ asset('assets/imgs/products/'.$producto->foto)}}" alt="">
                    <p><span>20</span>$</p>
                </div>
                <p class="title">{{ $producto->descriptionProduct}}</p>
                <a href="" data-id="{{$producto->id}}" class="btn-add-cart">+</a>
            </div>
            @endforeach
        </div>
    </section>

    <footer>
        <p class="author">🪐 by <a href="https://github.com/garu2" target="_blank">GaryAT</a></p>
    </footer>

    <script>
        function showCart(x) {
            document.getElementById("products-id").style.display = "block";
        }

        function closeBtn() {
            document.getElementById("products-id").style.display = "none";
        }

    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
