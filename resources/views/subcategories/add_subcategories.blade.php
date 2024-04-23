@extends('layouts.template')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add-Subcategory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-200">

    @section('content')
    <h1 class="text-3xl font-bold mb-4">Add Sub-Category</h1>
    @if ($errors->any())
    <div class="text-red-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="container mx-auto p-8 bg-gray-100">

            <form action="{{ route('post_subcategory') }}" method="POST" class="max-w-md">
                @csrf
                <div class="mb-4">
                    <label for="subcategory_name" class="block text-gray-700 font-semibold">Add New Sub-Category:</label>
                    <input type="text" id="subcategory_name" name="subcategory_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 font-semibold">Select Category:</label>
                    <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option selected>Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Sub-Category</button>
                </div>
            </form>
        </div>
    @endsection
    </body>
</html>
