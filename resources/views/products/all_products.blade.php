@extends('layouts.template')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All-SubCategory</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body>
@section('content')

<h1 class="text-3xl text-center font-bold mb-4">All Products</h1>
<div class="container mx-auto p-8 overflow-auto">
    <table class="min-w-full divide-y divide-gray-200 text-center text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serial</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Price</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sub-Category Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Short Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Long Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Quantity</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($products as $key => $product)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <img src="{{ $product->product_img }}" alt="{{ $product->product_name }}" style="max-width: 100px;">
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->product_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->product_price }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->product_category_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->product_subcategory_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ substr($product->product_short_description, 0, 20) }}...</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ substr($product->product_long_description, 0, 20) }}...</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $product->product_quantity }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a>Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
</body>
</html>
