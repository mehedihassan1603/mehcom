@extends('layouts.template')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add-Category</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200">

    @section('content')
    <h1 class="text-3xl font-bold mb-4">Add Category</h1>
        <div class="container mx-auto p-8 bg-gray-100">

            <form action="{{ route('post_category') }}" method="POST" class="max-w-md">
                @csrf
                <div class="mb-4">
                    <label for="category_name" class="block text-gray-700 font-semibold">Add New Category:</label>
                    <input type="text" id="category_name" name="category_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Category</button>
                </div>
            </form>
        </div>
    @endsection
    </body>
</html>
