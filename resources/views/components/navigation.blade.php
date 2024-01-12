<div class="bg-slate-700">
    <div class="container mx-auto">
        <div class="flex flex-row justify-between items-center">
            <div class="w-1/5 p-4 flex justify-center">
                <a href="/" class="text-white">Logo</a>
            </div>
            <div class="flex-grow">
                @livewire('search')
            </div>
            <div class="w-1/5 p-4 flex justify-evenly">
                <span>My account</span>
                <span>My wish</span>
                <span>
                    <a href="{{ route('cart') }}" class="text-white">Cart</a>
                </span>
            </div>
        </div>
    </div>
</div>