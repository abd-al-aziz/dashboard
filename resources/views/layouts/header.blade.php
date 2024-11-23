<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Services Dashboard</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
    @include('layouts.sidebar')
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-md">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center space-x-4">
                        <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                       
                        <div class="flex items-center space-x-4">
                          <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 hover:underline">
                             <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-8 h-8 rounded-full">
                              <span class="text-sm font-medium text-gray-900">Admin</span>
                          </a>
                         </div>

                        <button class="text-gray-500 hover:text-gray-600 relative">
                            <i class="fas fa-bell"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                        </button>
                    </div>
                </div>
            </header>