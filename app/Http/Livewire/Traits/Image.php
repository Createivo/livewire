<?php

namespace App\Http\Livewire\Traits;


use Illuminate\Support\Facades\Storage;

trait Image {

    public $image = null ;
//    protected $listeners = ['imageUpload' => 'uploadImageToServer'];


    public function getListeners()
    {
        return $this->listeners + [
                'imageUpload' => 'storeImage',
            ];
    }

    public function storeImage($theImage) {
       $this -> image = $theImage ;

    }

    public function uploadImageToServer()
    {
        if (!$this->image) return null ;

        Storage::disk('public')->put('newImage.jpg' , $this->image);
    }

}
