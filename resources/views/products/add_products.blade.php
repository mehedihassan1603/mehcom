@extends('layouts.template')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200">

@section('content')
    <h1 class="text-3xl font-bold mb-4">Add Product</h1>
    <div class="container mx-auto p-8 bg-gray-100">
        <form action="{{ route('post_product') }}" method="POST" enctype="multipart/form-data" class="max-w-md">
            @csrf
            <div class="mb-4">
                <label for="product_name" class="block text-gray-700 font-semibold">Product Name:</label>
                <input type="text" id="product_name" name="product_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="product_short_description" class="block text-gray-700 font-semibold">Short Description:</label>
                <textarea id="product_short_description" name="product_short_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>
            <div class="mb-4">
                <label for="product_long_description" class="block text-gray-700 font-semibold">Long Description:</label>
                <textarea id="product_long_description" name="product_long_description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>
            <div class="mb-4">
                <label for="product_price" class="block text-gray-700 font-semibold">Product Price:</label>
                <input type="number" id="product_price" name="product_price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="product_quantity" class="block text-gray-700 font-semibold">Product Quantity:</label>
                <input type="number" id="product_quantity" name="product_quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="product_category_name" class="block text-gray-700 font-semibold">Category Name:</label>
                <select name="product_category_name" id="product_category_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option selected disabled>Select Category</option>
                    @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="product_subcategory_name" class="block text-gray-700 font-semibold">Subcategory Name:</label>
                <select name="product_subcategory_name" id="product_subcategory_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option selected disabled>Select Subcategory</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="product_img" class="block text-gray-700 font-semibold">Product Image:</label>
                <input type="file" id="product_img" name="product_img" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Product</button>
            </div>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

 <script>
    $(document).ready(function(){
        $('#product_category_name').change(function(event){
            var idCategory = this.value;
            // alert();
            $('#product_subcategory_name').html('');
            $.ajax({
            url: "{{ route('getSubcategories') }}",
            method: 'POST',
            dataType: 'json',
            data: { category_id: idCategory, _token:"{{ csrf_token() }}" },
            success:function(response)
            {
                // console.log(response)
                $('#product_subcategory_name').html('<option selected disabled>Select a Subcategory</option>');
                $.each(response, function(index, subcategory) {
                    $('#product_subcategory_name').append('<option value="' + subcategory.id + '">' + subcategory.subcategory_name + '</option>');
                });
            },
            error: function(response) {
            }
        });
        })
    })
 </script>


</body>
</html>
