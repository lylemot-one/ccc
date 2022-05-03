<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CoopType1;
use App\Models\CoopType2;

class Dropdowns extends Component
{
    public $t1;
    public $t2s=[];
    public $t2;
    public $t1edit;
    public $t2edit;

    public function mount($t1, $t2)
    {
        $this->t1=$t1;
        $this->t2=$t2;
    }

    public function render()
    {
        if (!empty($this->t1)) {
            $this->t2s = CoopType2::where('coop_L1ID', $this->t1)->get();
        }
        return view('livewire.dropdowns')
            ->withType1s(CoopType1::orderBy('id')->get());
    }
}
