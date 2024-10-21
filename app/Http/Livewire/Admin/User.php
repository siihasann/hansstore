<?php

namespace App\Http\Livewire\Admin;

use App\Models\User as UserModel;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{

    use WithPagination;

    public $paginate = 10;
    public $search;

    protected $updateQuaryString = [
        ['search' => ['except' => '']]
    ];

    public function mount () 
    {
        $this->search = request()->query('search', $this->search);
    }


    public function render()
    {
        return view('livewire.admin.user', [
            'users' => $this->search === null ?
            UserModel::latest()->paginate($this->paginate) :
            UserModel::latest()->where('name', 'like', '%' . $this->search. '%')
            ->paginate($this->paginate)
        ]);
    }
}
