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

<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-4">All Sub-Categories</h1>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subcategory Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Count</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($sub_categories as $key => $sub_category )
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $sub_category->subcategory_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $sub_category->slug }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $sub_category->category_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $sub_category->product_count }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('edit_subcategory', $sub_category->id) }}">Edit</a>
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
