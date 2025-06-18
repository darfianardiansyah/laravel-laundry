<div>
    <div wire:show="modalFormData" x-cloak>
        <!-- Modal background -->
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-[80]">
            <!-- Modal container -->
            <div class="bg-white rounded-lg shadow-lg max-w-xl w-full">
                <form wire:submit="save">
                    <!-- Header -->
                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold">{{ $update_data ? 'Edit' : 'Tambah' }} Transaksi
                            {{ $update_data ? '' : 'Baru' }}</h3>
                        <button type="button"
                            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                            wire:click="closeModal">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-4 text-sm text-gray-700">
                        <!-- Section -->
                        @if (session()->has('error'))
                            <div class="bg-red-50 border-s-4 border-red-500 p-4 dark:bg-red-800/30" role="alert"
                                tabindex="-1" aria-labelledby="hs-bordered-red-style-label">
                                <div class="flex">
                                    <div class="shrink-0">
                                        <!-- Icon -->
                                        <span
                                            class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-400">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </span>
                                        <!-- End Icon -->
                                    </div>
                                    <div class="ms-3">
                                        <h3 id="hs-bordered-red-style-label"
                                            class="text-gray-800 font-semibold dark:text-white">
                                            Error!
                                        </h3>
                                        <p class="text-sm text-gray-700 dark:text-neutral-400">
                                            {{ session('error') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div wire:ignore>
                            <div class="w-full mb-3">
                                <label for="input-label-with-helper-name"
                                    class="block text-sm font-medium mb-2 dark:text-white">Customer</label>
                                <!-- Select -->
                                <select
                                    data-hs-select='{
                                        "hasSearch": true,
                                        "searchLimit": 5,
                                        "searchPlaceholder": "Cari...",
                                        "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-1.5 sm:py-2 px-3",
                                        "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                        "placeholder": "Pilih Customer...",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-hidden dark:focus:ring-1 dark:focus:ring-neutral-600",
                                        "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                    }'
                                    class="hidden" id="customer" wire:model="customer" required>
                                    <option value="">Pilih Customer...</option>
                                    @foreach ($customers as $item)
                                        <option {{ $customer == $item->id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->
                                @error('name')
                                    <span class="text-red-600 text-xs"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div wire:ignore>
                            <div class="w-full">
                                <label for="input-label-with-helper-name"
                                    class="block text-sm font-medium mb-2 dark:text-white">Service</label>
                                <!-- Select -->
                                <select
                                    data-hs-select='{
                                        "hasSearch": true,
                                        "searchLimit": 5,
                                        "searchPlaceholder": "Cari...",
                                        "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-1.5 sm:py-2 px-3",
                                        "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                        "placeholder": "Pilih Service...",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-hidden dark:focus:ring-1 dark:focus:ring-neutral-600",
                                        "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                    }'
                                    class="hidden" id="service" wire:model.change="service" required>
                                    <option value="">Pilih Service...</option>
                                    @foreach ($services as $item)
                                        <option {{ $service == $item->id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <!-- End Select -->
                                @error('name')
                                    <span class="text-red-600 text-xs"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full mt-4">
                            <label for="input-label-with-helper-phone"
                                class="block text-sm font-medium mb-2 dark:text-white">Berat /Kg</label>
                            <input type="number" wire:model.live.debounce.500ms="weight" name="weight"
                                id="input-label-with-helper-phone"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="1" aria-describedby="hs-input-helper-phone" required>
                            @error('weight')
                                <span class="text-red-600 text-xs"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="w-full mt-4">
                            <label for="input-label-with-helper-total"
                                class="block text-sm font-medium mb-2 dark:text-white">Total Pembayaran</label>
                            <input type="number" wire:model="amount" name="amount" id="input-label-with-helper-total"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 read-only:bg-gray-200 read-only:cursor-not-allowed"
                                placeholder="0" aria-describedby="hs-input-helper-phone" readonly>
                            @error('amount')
                                <span class="text-red-600 text-xs"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="flex justify-end gap-2 px-6 py-4 border-t border-gray-200">
                        <button type="button" wire:click="closeModal"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            Keluar
                        </button>
                        <button type="submit" wire:loading.attr="disabled"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            {{ $update_data ? 'Update' : 'Simpan' }}
                            <div wire:loading
                                class="animate-spin inline-block w-4 h-4 border-[3px] border-current border-t-transparent text-white rounded-full dark:text-white"
                                role="status" aria-label="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        Livewire.on('value', (response) => {
            setTimeout(() => {
                const customer = HSSelect.getInstance('#customer');
                const service = HSSelect.getInstance('#service');

                customer.setValue(`${response[0].customer}`)
                service.setValue(`${response[0].service}`)
            }, 300);
        });

        Livewire.on('open-modal', () => {
            setTimeout(() => {
                const customer = HSSelect.getInstance('#customer');
                const service = HSSelect.getInstance('#service');

                customer.setValue("")
                service.setValue("")
            }, 300);
        });
    </script>
@endscript
