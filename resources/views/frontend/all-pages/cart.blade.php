@extends('frontend.layouts.template')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
        integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            margin-top: 20px;
            background-color: #afb1b4;
        }

        .avatar-lg {
            height: 4rem;
            width: 5rem;
        }

        .font-size-18 {
            font-size: 18px !important;
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        a {
            text-decoration: none !important;
        }

        .w-xl {
            min-width: 160px;
        }

        .card {
            margin-bottom: 24px;
            -webkit-box-shadow: 0 2px 3px #e4e8f0;
            box-shadow: 0 2px 3px #e4e8f0;
        }

        .cards {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-top: 20px;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #ebe6e6;
            background-clip: border-box;
            border: 1px solid #eff0f2;
            border-radius: 1rem;
        }

        .hoverr:hover {
            color: red;
            width: 28px;
            height: 28px;
        }

        .card-bodys {
            flex: 1 1 auto;
            gap: 20px;
            min-height: 1px;
            padding: 1.25rem;
        }

        .gaps {
            gap: 20px;
        }
    </style>
</head>

<body>
    @section('main-content')
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    @php
                        $totalAmount = 0;
                    @endphp
                    @foreach ($items as $key => $item)
                        <div class="cards border shadow-none">
                            @php
                                $product_info = App\Models\product::findOrFail($item->product_id);
                                $totalAmount += $item->price;
                            @endphp
                            <div class="card-bodys">
                                <div class="d-flex align-items-start border-bottom pb-3 gaps">
                                    <div class="me-4">
                                        <img src={{ $product_info->product_img }} alt="" class="avatar-lg rounded">
                                    </div>
                                    <div class="flex-grow-1 align-self-center overflow-hidden">
                                        <div>
                                            <h5 class="text-truncate font-size-18"><a href="#"
                                                    class="text-dark">{{ $product_info->product_name }}</a></h5>
                                            <p class="mb-0 mt-1">Category : <span
                                                    class="fw-medium">{{ $product_info->product_category_name }}</span></p>
                                            <p class="mb-0 mt-1">Subcategory : <span
                                                    class="fw-medium">{{ $product_info->product_subcategory_name }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <ul class="list-inline mb-0 font-size-16">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-trash hoverr" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mt-3">
                                                <p class="text-black mb-2">Price: <span
                                                        style="font-size: 22px; color:black; font-weight: semibold;">{{ $product_info->product_price }}</span>
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mt-3">
                                                <p class="text-black mb-2">Quantity: <span
                                                        style="font-size: 22px; color:black; font-weight: semibold;">{{ $item->quantity }}</span>
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mt-3">
                                                <p class="text-black mb-2">Total: <span
                                                        style="font-size: 22px; color:black; font-weight: semibold;">${{ $item->price }}</span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <!-- end card -->


                </div>

                <div class="col-xl-4">
                    <div class="mt-5 mt-lg-0">
                        <div class="cards border shadow-none">
                            <div class="card-header bg-transparent border-bottom py-3 px-4">
                                <h5 class="font-size-16 mb-0">Order Summary:</h5>
                            </div>
                            <div class="card-body p-4 pt-2">

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr class="bg-light">
                                                <th style="font-size: 22px; color:black; font-weight: semibold;">Total :</th>
                                                <td class="text-end">
                                                    <span class="fw-bold" style="font-size: 22px; color:black; font-weight: semibold;">
                                                        ${{ $totalAmount }}
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                            <div class="row my-4">
                                <div class="col-sm-6">
                                    <a href="/" class="btn btn-link text-muted">
                                        <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-sm-end mt-2 mt-sm-0">
                                        <a href="{{ route('checkout') }}" class="btn btn-success">
                                            <i class="mdi mdi-cart-outline me-1"></i> Checkout </a>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    @endsection

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
