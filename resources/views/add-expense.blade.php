<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Current Month Expenses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ \Carbon\Carbon::now()->format('m') }} {{ __("Current Month Expenses") }}
                </div>
            </div>

            <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">

                <h2 class="text-2xl font-semibold mb-6">Add New Expense</h2>

                {{-- <form method="POST" action="{{ route('expenses.store') }}"> --}}
                <form method="POST" action="#">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <!-- Amount -->
                    <div class="mb-4">
                        <label for="amount" class="block text-gray-700">Amount</label>
                        <input type="number" name="amount" id="amount" step="0.01" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <!-- Date -->
                    <div class="mb-4">
                        <label for="date" class="block text-gray-700">Date</label>
                        <input type="date" name="date" id="date" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <!-- Category -->
                    <div class="mb-6">
                        <label for="category_id" class="block text-gray-700">Category</label>
                        <select name="category_id" id="category_id" class="w-full border rounded px-3 py-2" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Expense</button>
                </form>

            </div>

            
        </div>
    </div>
</x-app-layout>
