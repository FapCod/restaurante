<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithPagination;
class ReportIndex extends Component
{
    use WithPagination;
    public $status="";
    private $products=[];
    public $start_date="";
    public $end_date="";
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['cleanup'];
    public function render()
    {
        if(!$this->start_date=="" || !$this->end_date=="" || !$this->status==""){
            if($this->status=="") {
                $fi = Carbon::parse($this->start_date)->format('Y-m-d 00:00:00');
                $ff = Carbon::parse($this->end_date)->format('Y-m-d 23:59:59');
                $this->products = Product::whereBetween('created_at', [$fi, $ff])->orderBy('id','DESC')->get();
            }
            if($this->start_date == "" && $this->end_date == ""){
                $this->products = Product::where('status',$this->status)->orderBy('id','DESC')->get();
            }
            if(!$this->start_date == "" && !$this->end_date == "" && !$this->status==""){
                $fi = Carbon::parse($this->start_date)->format('Y-m-d 00:00:00');
                $ff = Carbon::parse($this->end_date)->format('Y-m-d 23:59:59');
                $this->products = Product::whereBetween('created_at', [$fi, $ff])->where('status', $this->status)->orderBy('id','DESC')->get();
            }

        }else {
                $this->products = Product::all();
        }
        $products = $this->products;
        return view('livewire.admin.report-index',compact('products'));
    }

    public function cleanup()
    {
        
        $this->status="";
        $this->start_date="";
        $this->end_date="";
        // $this->dispatchBrowserEvent('load');
        
    }
    
}
