<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800"> {{ __('Dashboard') }}</h3>

            <button  id="openExpenseModal" class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
               + Add Expense
            </button>
        </div>
        
    </x-slot>

    {{-- // Charts and tables  --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- This Month's Expense Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-6">This Month's Expense</h3>
                        <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
                            <!-- Chart Section -->
                            <div class="flex-shrink-0">
                                <div class="relative w-64 h-64">
                                    <canvas id="monthlyChart" width="256" height="256"></canvas>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-center">
                                            <div class="text-sm font-medium text-gray-600">Total</div>
                                            <div class="text-xl font-bold text-gray-800">$5,100</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Category Summary Section -->
                            <div class="flex-1 min-w-0">
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 rounded-full bg-green-500 mr-3"></div>
                                            <span class="text-base font-medium text-gray-700">Transport</span>
                                        </div>
                                        <span class="text-base font-semibold text-gray-900">$1,200</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 rounded-full bg-orange-500 mr-3"></div>
                                            <span class="text-base font-medium text-gray-700">Food</span>
                                        </div>
                                        <span class="text-base font-semibold text-gray-900">$2,500</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 rounded-full bg-blue-500 mr-3"></div>
                                            <span class="text-base font-medium text-gray-700">Shopping</span>
                                        </div>
                                        <span class="text-base font-semibold text-gray-900">$800</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 rounded-full bg-purple-500 mr-3"></div>
                                            <span class="text-base font-medium text-gray-700">Others</span>
                                        </div>
                                        <span class="text-base font-semibold text-gray-900">$600</span>
                                    </div>
                                    <hr class="border-gray-200 my-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-gray-900">Total</span>
                                        <span class="text-lg font-bold text-gray-900">$5,100</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Today's Expense Table -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Today's Expense</h3>
                            <button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                View All
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Groceries</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$75.23</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">Food</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">03/10/2023</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Groceries</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$42.50</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">Food</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">03/10/2023</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Dinner with friends</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$42.50</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">Social</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">03/09/2023</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Online Course Subscription</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$120.00</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Education</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">03/08/2023</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Expense Add Modal  -->
    <div
        id="expenseModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div
            class="bg-white w-full max-w-md p-6 rounded-2xl shadow-lg relative">
            <!-- Close button -->
            <button id="closeExpenseModal"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                ✖
            </button>

            <h2 class="text-lg font-semibold mb-4">Add Daily Expense</h2>

            <!-- Expense Form -->
            <form method="POST" action="{{ route('expenses.store') }}" id="expenseForm">
                @csrf

                <!-- Errors container -->
                <div id="formErrors" class="mb-3 hidden bg-red-100 border border-red-400 text-red-700 p-2 rounded"></div>

                <!-- Category -->
                <div class="mb-3">
                    <label class="block text-gray-700">Category</label>
                    <select name="category_id" class="w-full border rounded-lg px-3 py-2 @error('category_id') border-red-500 @enderror" required>
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Title -->
                <div class="mb-3">
                    <label class="block text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Ex: Trasport Cost"
                        class="w-full border rounded-lg px-3 py-2 @error('title') border-red-500 @enderror" required>
                    @error('title')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label class="block text-gray-700">Amount</label>
                    <input type="number" name="amount" value="{{ old('amount') }}" placeholder="Amount Ex: 2000"
                        class="w-full border rounded-lg px-3 py-2 @error('amount') border-red-500 @enderror" required>
                    @error('amount')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date -->
                <div class="mb-3">
                    <label class="block text-gray-700">Date</label>
                    <input type="date" name="date" value="{{ old('date', now()->toDateString()) }}"
                        class="w-full border rounded-lg px-3 py-2 @error('date') border-red-500 @enderror" required>
                    @error('date')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>



                <!-- Actions -->
                <div class="flex justify-end mt-4 space-x-2">
                    <button type="button" id="cancelExpenseModal"
                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const openBtn = document.getElementById("openExpenseModal");
            const closeBtn = document.getElementById("closeExpenseModal");
            const cancelBtn = document.getElementById("cancelExpenseModal");
            const modal = document.getElementById("expenseModal");
            const form = document.getElementById("expenseForm");

            function openModal() {
                modal.classList.remove("hidden");
            }

            function closeModal() {
                modal.classList.add("hidden");
                form.reset();
            }

            openBtn.addEventListener("click", openModal);
            closeBtn.addEventListener("click", closeModal);
            cancelBtn.addEventListener("click", closeModal);

            // Close when clicking outside modal box
            modal.addEventListener("click", function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            // Close with ESC
            document.addEventListener("keydown", function(e) {
                if (e.key === "Escape") {
                    closeModal();
                }
            });
        });
    </script>

    {{-- // Store the form  --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("expenseForm");
            const modal = document.getElementById("expenseModal");
            const errorBox = document.getElementById("formErrors");

            form.addEventListener("submit", async function(e) {
                e.preventDefault();

                errorBox.classList.add("hidden");
                errorBox.innerHTML = "";

                const formData = new FormData(form);

                try {
                    const response = await fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                            "Accept": "application/json"
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        if (response.status === 422) {
                            // Validation errors
                            errorBox.classList.remove("hidden");
                            Object.values(data.errors).forEach(errArr => {
                                errArr.forEach(err => {
                                    const p = document.createElement("p");
                                    p.textContent = err;
                                    errorBox.appendChild(p);
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: data.message || "Unexpected error occurred.",
                            });
                        }
                        return;
                    }

                    // Success
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false
                    });

                    form.reset();
                    modal.classList.add("hidden");

                    // TODO: Update expense list dynamically here without reloading

                } catch (error) {
                    console.error("Error:", error);
                    alert("Network error, please try again.");
                }
            });
        });
    </script>

    {{-- Chart script --}}

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Monthly Expense Donut Chart
            const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
            new Chart(monthlyCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Housing', 'Transportation', 'Utilities', 'Entertainment', 'Food'],
                    datasets: [{
                        data: [65.4, 15.2, 8.7, 6.5, 4.2],
                        backgroundColor: [
                            '#3B82F6', // blue-500
                            '#10B981', // green-500
                            '#EF4444', // red-500
                            '#F59E0B', // yellow-500
                            '#F97316'  // orange-500
                        ],
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        cutout: '60%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.parsed + '%';
                                }
                            }
                        }
                    }
                }
            });

            // Daily Expense Bar Chart
            const dailyCtx = document.getElementById('dailyChart').getContext('2d');
            new Chart(dailyCtx, {
                type: 'bar',
                data: {
                    labels: ['Coffee - $4.50', 'Lunch - $18.00', 'Lunch - $65.00', 'Groceries'],
                    datasets: [{
                        label: 'Amount',
                        data: [4.50, 18.00, 65.00, 25.00],
                        backgroundColor: [
                            '#EF4444', // red-500
                            '#10B981', // green-500
                            '#10B981', // green-500
                            '#3B82F6'  // blue-500
                        ],
                        borderColor: [
                            '#DC2626', // red-600
                            '#059669', // green-600
                            '#059669', // green-600
                            '#2563EB'  // blue-600
                        ],
                        borderWidth: 1,
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return '$' + context.parsed.y.toFixed(2);
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#F3F4F6'
                            },
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                },
                                color: '#6B7280'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#6B7280',
                                maxRotation: 45
                            }
                        }
                    }
                }
            });
        });
    </script> --}}

   <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Monthly Expense Donut Chart
        const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'doughnut',
            data: {
                labels: ['Food', 'Transport', 'Shopping', 'Others'],
                datasets: [{
                    data: [2500, 1200, 800, 600],
                    backgroundColor: [
                        '#F97316', // orange-500 - Food
                        '#10B981', // green-500 - Transport
                        '#3B82F6', // blue-500 - Shopping
                        '#8B5CF6'  // purple-500 - Others
                    ],
                    borderWidth: 2,
                    borderColor: '#ffffff',
                    cutout: '60%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const value = context.parsed;
                                const percentage = ((value * 100) / total).toFixed(1);
                                return `${context.label}: $${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        // Daily Expense Bar Chart
        const dailyCtx = document.getElementById('dailyChart').getContext('2d');
        new Chart(dailyCtx, {
            type: 'bar',
            data: {
                labels: ['Coffee - $4.50', 'Lunch - $18.00', 'Dinner - $65.00', 'Groceries'],
                datasets: [{
                    label: 'Amount',
                    data: [4.50, 18.00, 65.00, 25.00],
                    backgroundColor: [
                        '#EF4444', // red-500
                        '#10B981', // green-500
                        '#10B981', // green-500
                        '#3B82F6'  // blue-500
                    ],
                    borderColor: [
                        '#DC2626', // red-600
                        '#059669', // green-600
                        '#059669', // green-600
                        '#2563EB'  // blue-600
                    ],
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return '$' + context.parsed.y.toFixed(2);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#F3F4F6'
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            },
                            color: '#6B7280'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6B7280',
                            maxRotation: 45
                        }
                    }
                }
            }
        });
    });
</script>



</x-app-layout>