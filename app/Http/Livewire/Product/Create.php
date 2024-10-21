<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $desc;
    public $price;
    public $image;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function store()
    {

        $this->validate([
            'title' => 'required|min:3',
            'desc' => 'required|max:120',
            'price' => 'required|numeric',
            'image' => 'image|max:1024',
        ]);

        $imageName = '';

        if ($this->image) {
            $imageName =Str::slug($this->title, '_')
                . '_'
                . uniqid()
                . '.' . $this->image->getClientOriginalExtension();

            $this->image->storeAs('public', $imageName, 'local');
        }
        
        Product::create([
            'title'  => $this->title,
            'desc' => $this->desc,
            'price' => $this->price,
            'image' => $imageName,

        ]);

        $this->emit('productStored');
    }
}
