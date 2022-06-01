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
    protected $listeners = ['resetFilter','changerrender'];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    // funcion para resetear los filtros 
    public function resetFilter(){
        $this->search="";
        $this->status="";
        // enviar cambio al navegador
        $this->dispatchBrowserEvent('changer');
       
    }
    public function changerrender(){
        $this->dispatchBrowserEvent('advertencia');
    }


    public function render()
    {
        if(!$this->status==""){
            $products = Product::where('status',$this->status)->where('name','like','%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);
            if($this->status=="1"){
                $this->emit('changerrender');
            }
        }else{
            $products = Product::where('status',2)->where('name','like','%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);
        }
        return view('livewire.admin.product-index', compact('products'));
    }
}
