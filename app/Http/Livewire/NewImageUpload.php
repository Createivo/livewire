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

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:20', // 1MB Max
        ]);
    }

    public function save(){

        $x = $this->image->store('images_folder');

        ddd($x);
    }
}
