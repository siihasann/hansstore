<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class PublicShopIndex extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }
    public function render()
    {
        return view('livewire.public-shop-index');
    }
}
