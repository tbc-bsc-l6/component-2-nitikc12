<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    @include('home.header')

   

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 50px;
        }
        table {
            border: 2px solid black;
            text-align: center;
            width: 810px;
        }
        th {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 21px;
            font-weight: 4px;
            background-color: black;
        }
        td {
            border: 1px solid skyblue;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <h2>Your Cart</h2>

        @if($cart->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <div class="div_deg">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    
                    $value=0
                    
                    
                    ?>

                    <!-- Loop through the cart items -->
                    @foreach($cart as $cartItem)
                        <tr>
                            <td>{{ $cartItem->product->title }}</td>
                            <td>{{ $cartItem->product->price }}</td>
                            <td>
                            <img width="150px" src="/products/{{$cartItem->product->image}}">

                            </td>
                        
                        </tr>


                        <?php

                        $value = $value + $cartItem->product->price;
                        
                        ?>
                    @endforeach
                </table>
            </div>
        @endif

        <p>Total items in cart: {{ $count }}</p>
    </div>

<h3>Total Value Of Cart is: {{$value}}</h3>


    @include('home.footer')
</body>
</html>
