<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $search;
    public $formVisible;
    public $formUpdate=false;

    protected $updatesQuaryString = [
        ['search' => ['except' => '']]
    ];

    protected $listeners = [
        'formClose' => 'formCloseHandler',
        'productStored' => 'productStoredHandler',
        'productUpdate' => 'productUpdateHandler',
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    
    public function render()
    {
        return view('livewire.product.index', [
            'products' => $this->search === null ?
            Product::latest()->paginate($this->paginate) :
            Product::latest()->where('title', 'like', '%' . $this->search. '%')
            ->paginate($this->paginate)

        ]);
    }

    public function formCloseHandler()
    {
        $this->formVisible = false;
    }

    public function productStoredHandler()
    {
        $this->formVisible = false;
        session()->flash('message', 'Your Product was stored ');
    }

    public function editProduct($productId)
    {
        $this->formUpdate= true;
        $this->formVisible= true;
        $product = Product::find($productId);
        $this->emit('editProduct', $product);
    }

    public function productUpdateHandler()
    {
        $this->formVisible = false;
        session()->flash('message', 'Your Product was Update! ');


    }

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);


        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        session()->flash('message', 'Your Product was Delete! Success ');

    }
}
