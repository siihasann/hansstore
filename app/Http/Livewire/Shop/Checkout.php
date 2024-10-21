<?php

namespace App\Http\Livewire\Shop;

use App\Facades\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $address;
    public $city;
    public $postal_code;
    
    // Billing address fields
    public $billing_address;
    public $billing_city;
    public $billing_postal_code;
    public $use_shipping_as_billing = true; // Default to true (alamat pengiriman sama dengan billing)
    
    public $formCheckout;
    public $snapToken;

    protected $listeners = [
        'emptyCart' => 'emptyCartHandler'
    ];

    public function mount()
    {
        $this->formCheckout = true;
    }

    public function render()
    {
        return view('livewire.shop.checkout');
    }

    public function checkout()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        // Validasi billing jika user memilih alamat terpisah
        if (!$this->use_shipping_as_billing) {
            $this->validate([
                'billing_address' => 'required',
                'billing_city' => 'required',
                'billing_postal_code' => 'required',
            ]);
        }

        // Dapatkan cart dan total amount
        $cart = Cart::get()['products'];
        $amount = array_sum(
            array_column($cart, 'price')
        );

        // Customer details
        $customerDetails = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone_number,
            'billing_address' => [
                'address' => $this->use_shipping_as_billing ? $this->address : $this->billing_address,
                'city' => $this->use_shipping_as_billing ? $this->city : $this->billing_city,
                'postal_code' => $this->use_shipping_as_billing ? $this->postal_code : $this->billing_postal_code,
                'country_code' => 'IDN' // Sesuaikan kode negara
            ],
            'shipping_address' => [
                'address' => $this->address,
                'city' => $this->city,
                'postal_code' => $this->postal_code,
                'country_code' => 'IDN' // Sesuaikan kode negara
            ]
        ];

        // Transaction details
        $transactionDetails = [
            'order_id' => uniqid(),
            'gross_amount' => $amount
        ];

        $payload = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails
        ];

        $this->formCheckout = false;

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        // Dapatkan Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($payload);

        // Simpan snap token untuk digunakan di view
        $this->snapToken = $snapToken;
    }

    public function emptyCartHandler()
    {
        Cart::clear();
        $this->emit('cartClear');
    }
}
