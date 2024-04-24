@extends('layouts.template')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-SubCategory</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <style>
        .action-icons a {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    @section('content')
        <h1 class="text-3xl text-center font-bold mb-4">All Products</h1>
        <div class="container mx-auto overflow-auto">
            <table class="min-w-full divide-y divide-gray-200 text-center text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Serial
                        </th>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Product
                            Name</th>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Product
                            Image</th>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Product
                            Price</th>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category Name</th>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Sub-Category Name</th>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Product
                            Quantity</th>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $key => $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $product->product_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $product->product_img }}" alt="{{ $product->product_name }}"
                                    style="max-width: 100px;">
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $product->product_price }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $product->product_category_name }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $product->product_subcategory_name }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $product->product_quantity }}</td>
                            <td class="px-3 py-2 whitespace-nowrap action-icons">
                                <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" href="{{ route('edit_product', $product->id) }}"><i class="fa fa-edit"></i></a>
                                <button
                                    type="button"
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                                    data-toggle="modal" data-target="#confirmDeleteModal_{{ $product->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @foreach ($products as $product)
            <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden"
                id="confirmDeleteModal_{{ $product->id }}">
                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <!-- Modal content -->
                    <div class="modal-content py-4 text-left px-6">
                        <!-- Title -->
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold">Confirm Delete</p>
                            <button class="modal-close cursor-pointer z-50">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 18 18">
                                    <path
                                        d="M6.72 6l5.29 5.29a1 1 0 01-1.41 1.42L5.3 7.41a1 1 0 111.42-1.42zm5.28-1L7.41 11.3a1 1 0 11-1.42-1.42L10.58 4a1 1 0 011.42 0 1 1 0 010 1.42z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Body -->
                        <p>Are you sure you want to delete this product?</p>

                        <!-- Buttons -->
                        <div class="mt-5 flex justify-end">
                            <button
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2 modal-close">Cancel</button>
                                <a class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" href="{{ route('delete_product', $product->id) }}">Delete Product</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script>
        // Open modal on button click
        document.querySelectorAll('[data-toggle="modal"]').forEach(function(elem) {
            elem.onclick = function(event) {
                var target = document.querySelector(elem.getAttribute('data-target'));
                target.classList.remove('hidden');
            }
        });

        // Close modal on modal close button click or overlay click
        document.querySelectorAll('.modal-close').forEach(function(elem) {
            elem.onclick = function(event) {
                var modal = event.target.closest('.modal');
                modal.classList.add('hidden');
            }
        });
    </script>
 @endsection
</body>

</html>
