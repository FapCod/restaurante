<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class PresentationProduct extends Component
{
    public $stock;
    public $product;
    public $presentation=[];
    protected $rules = [
        'stock' => 'required|numeric|min:0',
        'presentation' => 'required'
    ];


    public function save(){
        $this->validate();
        $this->product->presentations()->create([
            'stock' => $this->stock,
            'presentation' => $this->presentation
        ]);
        $this->product->fresh();
    }
    public function render()
    {
        $this->presentations = $this->product->presentations;
        $presentations = $this->presentations;
        return view('livewire.admin.presentation-product', compact('presentations'));
    }
}
