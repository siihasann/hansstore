<?php

namespace App\Http\Livewire\Shop;

use App\Facades\Cart as FacadesCart;

use Livewire\Component;

class Cart extends Component
{

    public $cart;

    public function mount()
    {
        $this->cart = FacadesCart::get();

    }

    // price total product cart
    // public function getTotalPrice()
    // {
    //     $total = 0;

    //     foreach ($this->cart['products'] as $product) {
    //         $total += $product->price * $product->quantity;
    //     }

    //     return $total;

    // }


    public function render()
    {
        // $totalPrice = $this->getTotalPrice();

        return view('livewire.shop.cart');
    }

    public function removeFromCart($id)
    {
        FacadesCart::remove($id);
        $this->cart = FacadesCart::get();
        $this->emit('removeFromCart');
    }
}
