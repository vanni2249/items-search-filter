<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Search extends Component
{
    public $url;
    public $category;
    public $search;
    public $test;

    public function mount()
    {
        $this->url = request()->path();

        if (session('search')) {
            $this->search = session('search');
        }
        if (session('category')) {
            $this->category = session('category');
        }
    }

    public function render()
    {
        return view('livewire.search',[
            'categories' => Category::all()
        ]);
    }

    public function search()
    {
        sleep(1);
        if ($this->url == 'items') {
            return $this->sendDataSearch();

        }else{

            return redirect('items')->with('search',$this->search)->with('category',$this->category);
        }
    }

    public function sendDataSearch()
    {

        $data = [
            'search' => $this->search,
            'category' => $this->category
        ];

        $this->emit('recivedDataSearch', $data);
    }
}
