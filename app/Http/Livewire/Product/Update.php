<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Update extends Component
{
    use WithFileUploads;

    public $productId;
    public $title;
    public $desc;
    public $price;
    public $image;
    public $imageOld;

    protected $listeners = [
        'editProduct' => 'editProductHandler'
    ];

    public function render()
    {
        return view('livewire.product.update');
    }

    public function editProductHandler($product)
    {
        $this->productId = $product['id'];
        $this->title = $product['title'];
        $this->price = $product['price'];
        $this->desc = $product['desc'];
        $this->imageOld = asset('/storage/' . $product['image']);

    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:3',
            'desc' => 'required|max:120',
            'price' => 'required|numeric',
            'image' => 'image|max:1024',
        ]);

        $image = '';

        if ($this->productId) {
            $product = Product::find($this->productId);

            if ($this->image) {
                Storage::disk('public')->delete($product->image);

                $imageName =Str::slug($this->title, '_')
                . '_'
                . uniqid()
                . '.' . $this->image->getClientOriginalExtension();

                $this->image->storeAs('public', $imageName, 'local');

                $image = $imageName;
            } else {
                $image = $product->image;
            }

            $product->update([
                'title'  => $this->title,
                'desc' => $this->desc,
                'price' => $this->price,
                'image' => $image,

            ]);

            $this->emit('productUpdate');
        }
    }
}
