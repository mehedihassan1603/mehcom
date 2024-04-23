<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <div class="w-1/6 bg-gray-800 text-gray-100 py-8">
            <div class="px-4">
                <h2 class="text-xl font-semibold mb-4">MehCom</h2>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('dashboard') }}" class="block hover:bg-gray-700 rounded px-4 py-2">
                            <i class="fas fa-tachometer-alt mr-2"></i> <!-- Font Awesome icon for Dashboard -->
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <h1 class="block rounded px-4 py-2">
                            <i class="fas fa-list mr-2"></i> <!-- Font Awesome icon -->
                            Categories
                        </h1>
                        <!-- Sub-menu for Categories -->
                        <ul class="ml-4">
                            <li><a href="{{ route('add_category') }}" class="block text-sm hover:bg-gray-700 rounded px-4 py-2"><i class="fas fa-plus mr-2"></i> Add Category</a></li>
                            <li><a href="{{ route('all_category') }}" class="block text-sm hover:bg-gray-700 rounded px-4 py-2"><i class="fas fa-th-list mr-2"></i> All Category</a></li>
                            <!-- Add more sub-pages for Category management -->
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="block hover:bg-gray-700 rounded px-4 py-2">
                            <i class="fas fa-tags mr-2"></i> <!-- Font Awesome icon for Subcategories -->
                            Subcategories
                        </a>
                        <!-- Sub-menu for Subcategories -->
                        <ul class="ml-4">
                            <li><a href="{{ route('add_subcategory') }}" class="block text-sm hover:bg-gray-700 rounded px-4 py-2"><i class="fas fa-plus mr-2"></i> Add Subcategory</a></li>
                            <li><a href="{{ route('all_subcategory') }}" class="block text-sm hover:bg-gray-700 rounded px-4 py-2"><i class="fas fa-th-list mr-2"></i> All Subcategory</a></li>
                            <!-- Add more sub-pages for Subcategory management -->
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="block hover:bg-gray-700 rounded px-4 py-2">
                            <i class="fas fa-boxes mr-2"></i> <!-- Font Awesome icon for Products -->
                            Products
                        </a>
                        <!-- Sub-menu for Products -->
                        <ul class="ml-4">
                            <li><a href="{{ route('add_product') }}" class="block text-sm hover:bg-gray-700 rounded px-4 py-2"><i class="fas fa-plus mr-2"></i> Add Product</a></li>
                            <li><a href="#" class="block text-sm hover:bg-gray-700 rounded px-4 py-2"><i class="fas fa-list-ul mr-2"></i> View All Product</a></li>
                            <!-- Add more sub-pages for Product management -->
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="block hover:bg-gray-700 rounded px-4 py-2">
                            <i class="fas fa-shopping-cart mr-2"></i> <!-- Font Awesome icon for Orders -->
                            Orders
                        </a>
                        <!-- Sub-menu for Orders -->
                        <ul class="ml-4">
                            <li><a href="#" class="block text-sm hover:bg-gray-700 rounded px-4 py-2"><i class="fas fa-clock mr-2"></i> Pending Orders</a></li>
                            <li><a href="#" class="block text-sm hover:bg-gray-700 rounded px-4 py-2"><i class="fas fa-check-circle mr-2"></i> Completed Orders</a></li>
                            <li><a href="#" class="block text-sm hover:bg-gray-700 rounded px-4 py-2"><i class="fas fa-times-circle mr-2"></i> Cancel Orders</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 p-8">
            @yield('content')
        </div>

    </div>

</body>

</html>
