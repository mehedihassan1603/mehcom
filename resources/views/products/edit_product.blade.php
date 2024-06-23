<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>

</head>
<body class="bg-gray-200">

@extends('layouts.template')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Edit Product</h1>
    <div class="container mx-auto p-8 bg-gray-100">
        <form action="{{ route('update_product') }}" method="POST" enctype="multipart/form-data" class="">
            @csrf
            <input type="hidden" value="{{ $product_info->id }}" name="product_id">
            <div class="mb-4">
                <label for="product_name" class="block text-gray-700 font-semibold">Product Name:</label>
                <input type="text" value="{{ $product_info->product_name }}" id="product_name" name="product_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="product_short_description" class="block text-gray-700 font-semibold">Short Description:</label>
                <textarea id="product_short_description" name="product_short_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $product_info->product_short_description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="product_long_description" class="block text-gray-700 font-semibold">Long Description:</label>
                <textarea id="product_long_description" name="product_long_description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $product_info->product_long_description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="product_price" class="block text-gray-700 font-semibold">Product Price:</label>
                <input type="number" value="{{ $product_info->product_price }}" id="product_price" name="product_price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="product_quantity" class="block text-gray-700 font-semibold">Product Quantity:</label>
                <input type="number" value="{{ $product_info->product_quantity }}" id="product_quantity" name="product_quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4 flex w-full">
                <label for="product_img" class="block text-gray-700 font-semibold">Product Image:</label>
                <div class="mx-auto">
                    <div class="flex gap-10">
                        <h1>Current Image:</h1>
                        <img src="{{ $product_info->product_img }}" alt="Product Image" width="160px" class="mb-2">
                    </div>
                    <div class="flex gap-10">
                        <h1>Upload New Image:</h1>
                        <input type="file" id="product_img" name="product_img" class="mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update Product</button>
            </div>
        </form>
    </div>
@endsection

</body>
</html>
