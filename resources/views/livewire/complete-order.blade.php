<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
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
                    <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-primary dark:text-gray-400 dark:hover:text-white md:ms-2">Order summary</a>
                  </div>
                </li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="mx-auto max-w-3xl">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Order summary</h2>

            <hr class="mt-6">
    
            <div class="mt-6 sm:mt-8">
            <div class="relative overflow-x-auto border-gray-200 dark:border-gray-800">
                <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                        @forelse  ($carts as $cart)    
                            <tr>
                                <td class="whitespace-nowrap py-4 md:w-[384px]">
                                    <div class="flex items-center gap-4">
                                    <a href="#" class="flex items-center aspect-square w-10 h-10 shrink-0">
                                        <img class="h-auto w-full max-h-full" src="{{ asset('storage/'. $cart->menu->image) }}" alt="imac image" />
                                    </a>
                                    <a href="#" class="hover:underline">{{ $cart->menu->name }}</a>
                                    </div>
                                </td>
                
                                <td class="p-4 text-base font-normal text-gray-900 dark:text-white">x{{ $cart->qty }}</td>
                
                                <td class="p-4 text-right text-base font-bold text-gray-900 dark:text-white">Rp. {{ $cart->menu->price }}</td>
                                <td class="p-4 text-right text-base text-red-500"><button wire:click="removeItem({{ $cart->id }})">Hapus</button></td>
                            </tr>
                        @empty
                            <tr>
                                <td class="p-4 text-base font-normal text-gray-900 dark:text-white">No item in cart</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
    
            <div class="mt-4 space-y-6">
                <div class="space-y-4">
                    <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                        <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                        <dd class="text-lg font-bold text-gray-900 dark:text-white">Rp. {{ $total }}</dd>
                    </dl>
                </div>
    
                <div class="gap-4 sm:flex sm:items-center">
                <button type="button" wire:click="returnToMenu" class="w-full rounded-lg  border border-gray-200 bg-white px-5  py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Return to Shopping</button>
    
                <button type="submit" x-on:click="$openModal('cardModal')" class="mt-4 flex w-full items-center justify-center rounded-lg bg-primary  px-5 py-2.5 text-sm font-medium text-white hover:bg-primary focus:outline-none focus:ring-4 focus:ring-primary sm:mt-0">Send the order</button>
                </div>
            </div>
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
  
