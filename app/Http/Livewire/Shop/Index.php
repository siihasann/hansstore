<?php

namespace App\Http\Livewire\Shop;

use App\Facades\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // Properti untuk search dan pagination
    public $search;

    // Query string untuk menjaga state search saat reload
    protected $queryString = [
        'search' => ['except' => ''],  // 'except' untuk menghilangkan query ketika kosong
        'page' => ['except' => 1],  // Mengatur pagination kembali ke halaman 1 jika ada search
    ];

    // Fungsi mount untuk menangkap query string
    public function mount() 
    {
        $this->search = request()->query('search', $this->search);
    }

    // Fungsi render untuk menampilkan data produk sesuai dengan pencarian
    public function render()
    {
        return view('livewire.shop.index', [
            // Query produk berdasarkan pencarian, urutkan berdasarkan produk terbaru
            'products' => Product::when($this->search, function($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })->latest()->paginate(8),
        ]);
    }

    // Fungsi untuk menambahkan produk ke dalam cart
    public function addToCart($productId)
    {
        $product = Product::find($productId);

        // Tambahkan produk ke dalam cart menggunakan facade Cart
        if($product) {
            Cart::add($product);

            // Emit event agar frontend bisa melakukan update pada cart
            $this->emit('addToCart');
        }
    }

    // Fungsi untuk mereset search
    public function resetSearch()
    {
        $this->reset('search');
    }
}
