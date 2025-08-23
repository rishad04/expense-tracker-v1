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

           <div class="max-w-5xl mx-auto p-6 bg-white shadow rounded">
                <h2 class="text-2xl font-bold mb-6">Expenses This Month (Grouped by Category)</h2>

                @forelse ($categories as $category)
                    @if ($category->expenses->isNotEmpty())
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3 border-b pb-1">{{ $category->name }}</h3>
                        <ul class="space-y-2">
                        @foreach ($category->expenses as $expense)
                            <li class="flex justify-between items-center px-4 py-2 bg-gray-50 border rounded">
                            <div>
                                <div class="font-medium">{{ $expense->title }}</div>
                                <div class="text-sm text-gray-500">{{ $expense->date->format('d M Y') }}</div>
                            </div>
                            <div class="text-right font-semibold text-blue-700">${{ number_format($expense->amount, 2) }}</div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                @empty
                    <p>No categories or expenses found.</p>
                @endforelse

                </div>

            
        </div>
    </div>
</x-app-layout>
