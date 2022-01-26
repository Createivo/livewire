<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class NewImageUpload extends Component
{
    use WithFileUploads ;
    public $image ;
    public function render()
    {
        return view('livewire.new-image-upload');
    }

    public function save(){
        $this->validate([
            'image' => 'required|max:1024'
        ]);

        $this->image->store('images_folder');
    }
}
