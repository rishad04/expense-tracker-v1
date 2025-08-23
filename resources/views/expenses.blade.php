<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expenses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-12">
            <!-- Tables Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
                <!-- Today's Expense Table -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Expenses</h3>
                            {{-- <button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                View All
                            </button> --}}

                             <button  id="openExpenseModal" class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                            + Add Expense
                            </button>
                        </div>

                       

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">id</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200" id="tablebody">
                                    @forelse ($data as $row)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $row->title }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$ {{ $row->amount }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $row->category?->title }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $row->date }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                                No Data Found !
                                            </td>
                                        </tr>

                                        
                                    @endforelse
                                  
                                </tbody>

                            </table>
                            <div class="mt-4">
                                {{ $data->links() }}
                            </div>
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
                        showConfirmButton: 'Ok'
                    });

                    form.reset();
                    modal.classList.add("hidden");

                    console.log(data);

                   
                    // TODO: Update expense list dynamically here without reloading

                    window.location.reload();
                } catch (error) {
                    console.error("Error:", error);
                    alert("Network error, please try again.");
                }
            });
        });
    </script>


    

</x-app-layout>
