<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Presentation;
class PresentationProduct extends Component
{
    public $stock,$name,$slug;
    public $product;
    public $presentation,$presentacion_name,$presentacion_stock,$presentacion_slug;
    public $presentations=[];
    public $open = false;
    protected $listeners = ['delete'];
    protected $rules = [
        'stock' => 'required|numeric|min:0',
        'name' => 'required'
    ];
    // generar el slug a partir del name
    public function updatedName($value){
        $this->slug = Str::slug($value);
    }    
    public function save(){
        $this->validate();

        $registro = Presentation::where(['product_id' => $this->product->id, 'name' => $this->name])->first();
 
        if(isset($registro)){
            $registro->update([
                'stock' => $this->stock,
                'slug' => $this->slug
            ]);
            $this->product=$this->product->fresh();
            $this->reset(['stock','name','slug']);
        }else{
           $this->product->presentations()->create([
            'stock' => $this->stock,
            'name' => $this->name,
            'slug' => $this->slug,
            ]);
            $this->product=$this->product->fresh();
            $this->reset(['stock','name','slug']);

        }


        
        

    }
    public function edit(Presentation $presentation){
        $this->open = true;
        $this->presentation= $presentation;
        $this->name = $presentation->name;
        $this->stock = $presentation->stock;
        $this->slug = $presentation->slug;
    }
    public function update(){
        $this->validate();
        $this->presentation->update([
            'stock' => $this->stock,
            'name' => $this->name,
            'slug' => $this->slug,
        ]);
        $this->product=$this->product->fresh();
        $this->reset(['stock','name','slug']);
        $this->open = false;
    }
    public function cancel(){
        $this->reset(['stock','name','slug']);
        $this->open = false;
    }
    public function delete(Presentation $presentation){
        $presentation->delete();
        // $this->dispatchBrowserEvent('deletepresentation');
        $this->product=$this->product->fresh();
    }
   

    public function render()
    {
        $this->presentations = $this->product->presentations;
        $presentations = $this->presentations;
        return view('livewire.admin.presentation-product', compact('presentations'));
    }
}
