@extends('frontend.layouts.template')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
</head>

<body>
    @section('main-content')
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Billing Address -->
                    <div class="card border shadow-none">
                        <div class="card-header bg-transparent border-bottom py-3 px-4">
                            <h5 class="font-size-16 mb-0">Billing Address:</h5>
                        </div>
                        <div class="card-body p-4 pt-2">
                            <form>
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="John Doe">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="John Doe">
                                </div>
                                <div class="mb-3">
                                    <label for="thana" class="form-label">Thana</label>
                                    <input type="text" class="form-control" id="thana" placeholder="John Doe">
                                </div>
                                <div class="mb-3">
                                    <label for="District" class="form-label">District</label>
                                    <input type="text" class="form-control" id="District" placeholder="John Doe">
                                </div>
                                <div class="mb-3">
                                    <label for="division" class="form-label">Division</label>
                                    <input type="text" class="form-control" id="division" placeholder="John Doe">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Order Summary -->
                    <div class="card border shadow-none">
                        <div class="card-header bg-transparent border-bottom py-3 px-4">
                            <h5 class="font-size-16 mb-0">Order Summary:</h5>
                        </div>
                        <div class="card-body p-4 pt-2">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- Total amount -->
                            <div class="mt-3 text-end">
                                <p class="mb-0">Total</p>
                            </div>
                            <!-- Checkout button -->
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-success">Proceed to Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>


</html>
