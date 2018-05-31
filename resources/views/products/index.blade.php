<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Products</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>

    </style>
</head>
<body>
<div class="container">
    <div id="app">
        <div class="row top-buffer">
            <div class="col-md-12">
                <h1>
                    Products
                </h1>
                <form class="form" id="products-form" method="POST" action="{{route('store_products')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-xs-4 col-md-4">
                            <label class="control-label" for="productName">Product Name</label>
                            <input type="text" class="form-control" placeholder="Enter Product Name" id="productName" value="">
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label class="control-label" for="quantityInStock">Quantity in stock</label>
                            <input type="text" class="form-control" id="quantityInStock" placeholder="Enter Quantity in stock" value="">
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label class="control-label" for="pricePerItem">Price per item</label>
                            <input type="text" class="form-control" id="pricePerItem" placeholder="Enter price per item" value="">
                        </div>
                        <div class="form-group col-xs-12 col-md-12">
                            <button type="submit" class="btn btn-primary pull-right">Add</button>
                        </div>
                        <div class="error-message alert">Some of your data was entered incorrectly, please notice that quantity and price should be integer numbers</div>
                    </div>

                </form>
            </div>
        </div>
        <div class="existing-products">
            <div class="row top-buffer">
                <div class="col-md-12">
                    <h3>Existing Products</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"><strong>Product name</strong></div>
                <div class="col-md-3"><strong>Quantity in stock</strong></div>
                <div class="col-md-2"><strong>Price per item</strong></div>
                <div class="col-md-2"><strong>Datetime submitted</strong></div>
                <div class="col-md-2"><strong>Total value</strong></div>
            </div>
            <hr>
            <products-bucket-component v-bind:products="products"></products-bucket-component>
            <hr>
            <summary-row-component v-bind:summary="summary"></summary-row-component>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>