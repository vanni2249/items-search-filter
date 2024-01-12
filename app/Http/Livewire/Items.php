<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class Items extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $search;
    public $searchCategory;
    public $filterCategories = [];
    public $minPrice;
    public $maxPrice;
    public $sortPrice;
    public $test;

    protected $listeners = ['recivedDataSearch'];

    public function mount()
    {
        if (session('search')) {
            $this->search = session('search');
        }
        if (session('category')) {
            $this->searchCategory = session('category');
            $this->toggleCategory(session('category'));
        }
    }

    public function recivedDataSearch($data)
    {
        $this->search = $data['search'];
        if ($data['category']) {

            $this->reset(['filterCategories', 'searchCategory', 'minPrice', 'maxPrice', 'test']);

            if ($data['category'] != 'all') {
                $this->searchCategory = $data['category'];
                $this->test = $data['category'];
                $this->toggleCategory($this->searchCategory);
            }
        }
    }

    public function toggleCategory($category)
    {
        if (in_array($category, $this->filterCategories)) {
            $this->filterCategories = array_diff($this->filterCategories, [$category]);
        } else {
            $this->filterCategories[] = $category;
        }
    }

    public function render()
    {
        return view('livewire.items', [
            'categories' => Category::all(),
            'items' => Item::where('title', 'like', '%' . $this->search . '%')
                ->whereHas('categories', function ($query) {
                    if ($this->filterCategories) {
                        $query->whereIn('categories.id', $this->filterCategories);
                    }
                })
                ->where(function ($query) {
                    if ($this->minPrice && $this->maxPrice) {
                        $query->whereBetween('price', [$this->minPrice, $this->maxPrice]);
                    }
                })->when($this->sortPrice,function($query){
                    $query->orderBy('price',$this->sortPrice);
                },function($query){
                    $query->inRandomOrder();
                })
                ->paginate(20)
        ]);
    }
}
