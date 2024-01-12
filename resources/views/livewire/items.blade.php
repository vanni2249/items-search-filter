<div>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-2">
            <div class="space-y-4">
                @if ($searchCategory == null)
                <div class="border rounded p-4">
                    <h2 class="text-xs font-semibold">Categories</h2>
                    <ul class="py-4 space-y-2">
                        @foreach ($categories as $category)
                        <li class="flex flex-row space-x-4 text-sm  capitalize">
                            <input type="checkbox" wire:click="toggleCategory('{{$category->id}}')"
                                value="{{$category->id}}">
                            <label for="">{{$category->name}}</label>
                        </li>
                        @endforeach

                    </ul>
                </div>

                @endif
                <div class="border rounded p-4">
                    <h2 class="text-xs font-semibold">Price</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="min-price" class="text-sm">Price min:</label>
                            <input type="number" id="min-price" wire:model="minPrice" min="10"
                                max="{{$this->maxPrice - 1}}" value="5"
                                class="w-full text-center border border-gray-400 rounded">

                        </div>
                        <div>
                            <label for="max-price" class="text-sm">Price Max:</label>
                            <input type="number" id="max-price" wire:model="maxPrice" min="{{$this->minPrice + 1}}"
                                class="w-full border text-center  border-gray-400 rounded">

                        </div>
                    </div>

                    {{-- <input min="0" max="100" step="1" wire:model="priceRange" type="range" class="w-full">
                    <p class="text-xs font-semibold">{{$priceRange}}</p> --}}
                </div>
            </div>
        </div>
        <div class="col-span-10">
            <div class="space-y-6">
                {{-- @if ($search)
                    <div class="border p-4 rounded">
                        <p class="font-semibold">Result: {{$search}}</p>
                        
                    </div>
                    @endif --}}
                    <div class="border rounded p-4">
                        <div class="flex flex-row justify-between">
                            <div>
                                @if ($search)
                                <h1 class="font-semibold">Result: {{$search}}</h1>
                                @else
                                <h1 class="font-semibold">Items</h1>
                                @endif
                            </div>
                            <div>
                                @if ($items->count() > 0)
                                <select wire:model='sortPrice' class="text-sm p-1 rounded">
                                    <option value="">Featured</option>
                                    <option value="asc">Price: Low to hight</option>
                                    <option value="desc">Price: Higt to low</option>
                                </select>
                                    
                                @endif
                            </div>
                        </div>
                    </div>
            @if ($items->count() < 1) 
            <div class="bg-gray-200 h-64 w-full rounded">
                <div class="h-full flex justify-center items-center">
                    <div class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-16 h-16">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                        </svg>
                        <p>I'm sorry I can't find anything with {{$search}}</p>
                    </div>
                </div>
            </div>
            @endif
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($items as $item)
                <div class="border rounded space-y-4">
                    <div class="bg-gray-200 w-full h-52"></div>
                    <div class="p-2 space-y-2 ">
                        {{$item->id}}
                        <div class="flex flex-row space-x-2">
                            @foreach ($item->categories as $category)
                            <p class="text-xs text-gray-500 font-semibold uppercase">{{$category->name}}</p>
                            @endforeach

                        </div>
                        <h2 class="text-sm font-semibold line-clamp-2">{{$item->title}}</h2>
                        <div class="flex justify-between items-center">
                            <p>{{$item->price}}</p>
                            <button class="bg-gray-200 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div>
                {{ $items->links() }}
            </div>

        </div>
    </div>
</div>
</div>