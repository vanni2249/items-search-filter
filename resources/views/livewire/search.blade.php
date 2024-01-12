<div>
    <div class="flex justify-center">
        <select wire:model='category' name="" id="" class="rounded-l ">
            <option value='all'>All</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" class="capitalize">{{$category->name}}</option>
            @endforeach
        </select>
        <input wire:model.lazy='search' type="text" class="p-1 w-2/4" placeholder="Buscar">
        <button wire:click.lazy='search' class="bg-yellow-500 rounded-r  px-2 ">Search</button>
    </div>
    <x-loading></x-loading>
</div>