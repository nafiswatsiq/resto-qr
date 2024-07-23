<section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <div>
              <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                  <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                      <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                      </svg>
                      Home
                    </a>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                      </svg>
                      <a href="{{ route('menu') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-primary dark:text-gray-400 dark:hover:text-white md:ms-2">Menu</a>
                    </div>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                      </svg>
                      <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-primary dark:text-gray-400 dark:hover:text-white md:ms-2">{{ $menu->name }}</a>
                    </div>
                  </li>
                </ol>
              </nav>
            </div>
          </div>

        <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                <img class="w-full rounded-xl" src="{{ asset('storage/'. $menu->image) }}"
                    alt="" />
            </div>

            <div class="mt-6 sm:mt-8 lg:mt-0">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    {{ $menu->name }}
                </h1>
                <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                    <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                        Rp. {{ $menu->price }}
                    </p>

                </div>

                <div class="mt-6">
                  <div class="grid grid-cols-1 gap-y-6">
                      {{-- <div>
                          <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                          <input wire:model="name" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 " placeholder="John" />
                          @error('name') <span class="error text-xs text-red-500">{{ $message }}</span> @enderror 
                      </div>
                      <div>
                          <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Meja</label>
                          <input wire:model="tableNumber" type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 " placeholder="10" />
                          @error('tableNumber') <span class="error text-xs text-red-500">{{ $message }}</span> @enderror 
                      </div> --}}

                      <div class="flex flex-col md:flex-row items-start md:items-end gap-x-3">
                          <div class="w-full md:max-w-md">
                              <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Order:</label>
                              <div class="relative flex items-center w-full md:max-w-[12rem]">
                                  <button wire:click="decrement" type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-10 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                      <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                      </svg>
                                  </button>
                                  <input wire:model="quantity" type="text" id="quantity-input" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-10 text-center text-gray-900 text-sm focus:ring-primary focus:border-primary block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" />
                                  <button wire:click="increment" type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-10 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                      <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                      </svg>
                                  </button>
                              </div>
                          </div>
                          <div>
                              @error('quantity') <span class="error text-xs text-red-500">{{ $message }}</span> @enderror 
                          </div>
      
                          <button wire:click="addToCart" type="button"
                              class="w-full text-primary mt-4 sm:mt-0 bg-white hover:bg-white border-2 border-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center"
                              role="button">
                              <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                              </svg>
      
                              Add to cart
                          </button>

                          <button type="button" x-on:click="$openModal('cardModal')" primary
                              class="w-full text-white mt-4 sm:mt-0 bg-primary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center"
                              role="button">
                              <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                              </svg>
      
                              Order Now
                          </button>
                      </div>
                  </div>
                </div>

                <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                {!! $menu->description !!}
            </div>
        </div>
    </div>

    <x-modal-card title="Confirm Order" name="cardModal" align="center" width="lg">
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-1">
          <x-input label="Nama" placeholder="" wire:model="name" />
   
          <x-input label="Nomor Meja" placeholder="" wire:model="tableNumber" />
   
      </div>
   
      <x-slot name="footer" class="flex justify-between gap-x-4">
          <div class="flex gap-x-4">
              <x-button class="border-primary border text-primary" flat label="Cancel" x-on:click="close" />
   
              <x-button class="bg-primary" primary label="Order Now" wire:click="order" />
          </div>
      </x-slot>
  </x-modal-card>
</section>
