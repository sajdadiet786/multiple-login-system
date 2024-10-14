<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Total Users
                    </div>
                    <div class="card-body">
                        <h2>{{ $userCount }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Total Products
                    </div>
                    <div class="card-body">
                        <h2>{{ $productCount }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Total CMS Pages
                    </div>
                    <div class="card-body">
                        <h2>{{ $cmsCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
