<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SelectBox extends Component
{
    public $cities = null; // first select box
    public $sideKick = [] ; // second select box
    public function render()
    {
        return view('livewire.select-box' , [
            'allCities' => ['italy' , 'germany' , 'usa' , 'russia']
        ]);
    }

    public function updatedCities($value) {

        // this values will be added as option in second select box
        if ($value == 'italy') {
            $this->sideKick = ['fiat' , 'bugatti', 'ferrari'];
        } elseif ($value == 'usa') {
            $this->sideKick = ['dodge' , 'chevrolet' , 'ford' ];
        } elseif ($value == 'germany') {
            $this->sideKick = ['bmw' , 'Mercedes'];
        }elseif ($value == 'russia') {
            $this->sideKick = ['lada'];
        }

        $this->cities = $value ;

    }
}
