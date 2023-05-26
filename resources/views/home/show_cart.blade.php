<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('sweetalert::alert')

    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
    <style>
    .center {
        margin: auto;
        with: 70%;
        text-align: center;
        padding: 30px;
    }

    table,
    th,
    td {
        border: 1px solid gray;
    }

    .th_deg {
        font-size: 30px;
        padding: 5px;
        background: skyblue;
    }

    .total_deg {
        font-size: 20px;
        padding: 40px;
    }
    </style>
</head>

<body>
@include('sweetalert::alert')
    <div class="hero_area">
        <!-- header section strats -->

        @include('home.header')

        <!-- end header section -->

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('error')}}
        </div>
        @endif


        <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Product Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Action</th>
                </tr>

                @php
                $totalprice = 0
                @endphp

                @php
                $total_product = 0
                @endphp

                @foreach($cart as $cart)
                <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>${{$cart->price}}</td>
                    <td>
                        <img class="img-fluid" style="width: 120px" src="/product/{{$cart->image}}" alt="...">
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('remove_cart', $cart->id)}}">Remove Product</a>
                    </td>
                </tr>

                @php
                $totalprice = $totalprice + $cart->price
                @endphp

                @php
                $total_product = $total_product + 1
                @endphp
                @endforeach

                <table>
                    <div>
                        <h1 class="total_deg">Total Price : ${{$totalprice}}</h1>
                    </div>
                </table>

            </table>
        </div>

        <!-- after total price -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-5 text-center">
                <h1 style="font-size: 30px; padding-bottom: 15px;">Proceed to Order</h1>
                <a href="{{url('cash_order', $total_product)}}" class="btn btn-danger">Cash On Delivery</a>
                <a href="{{route('stripe', ['totalprice' =>$totalprice, 'total_product'=>$total_product])}}" class="btn btn-danger">Pay Using Card</a>
                <a href="{{route('list')}}" class="btn btn-danger">Pay Using Esewa</a>
            </div>
        </div>

        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- conform delete alert  -->
        <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                    title: "Are you sure to cancel this product",
                    text: "You will not be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancel) => {
                    if (willCancel) {



                        window.location.href = urlToRedirect;

                    }


                });


        }
        </script>

        <!-- jQery -->
        <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
        <!-- popper js -->
        <script src="{{asset('home/js/popper.min.js')}}"></script>
        <!-- bootstrap js -->
        <script src="{{asset('home/js/bootstrap.js')}}"></script>
        <!-- custom js -->
        <script src="{{asset('home/js/custom.js')}}"></script>
</body>

</html>