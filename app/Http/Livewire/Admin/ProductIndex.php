<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
class ProductIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search="";
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $products = Product::where('status',2)
                    ->where('name','like','%'.$this->search.'%')
                    ->orderBy('id','DESC')            
                    ->paginate(10);
        return view('livewire.admin.product-index', compact('products'));
    }
}
