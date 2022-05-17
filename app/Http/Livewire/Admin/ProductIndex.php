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
    public $status="";
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if(!$this->status==""){
            $products = Product::where('status',$this->status)->where('name','like','%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);
        }else{
            $products = Product::where('status',2)->where('name','like','%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);
        }
        return view('livewire.admin.product-index', compact('products'));
    }
}
