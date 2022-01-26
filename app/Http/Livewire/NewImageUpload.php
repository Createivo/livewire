<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class NewImageUpload extends Component
{
    use WithFileUploads ;
    public $image ;

    public $rules = [
        'image' => 'image|max:20', // 1MB Max
    ];

    public function render()
    {
        return view('livewire.new-image-upload');
    }

    // real time validation
    public function updatedImage()
    {
        $this->validate();
    }


    public function save(){
        $this->validate();
        $this->image->store('images_folder');

    }
}
