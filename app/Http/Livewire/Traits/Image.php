<?php

namespace App\Http\Livewire\Traits;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;


trait Image {

    public $image = null ;
    public $ext = null ;
//    protected $listeners = ['imageUpload' => 'uploadImageToServer'];

    // protected $listeners make error and the getListeners() is the solution
    public function getListeners()
    {
        return $this->listeners + [
                'imageUpload' => 'storeImage',
            ];
    }

    public function storeImage($theImage) {

       $this -> image = $theImage[0] ;
       $this -> ext = $theImage[1];

    }

    public function uploadImageToServer()
    {
        if (!$this->image) return null ;

        // php image intervention
        // https://image.intervention.io/v2 package
        $img = ImageManagerStatic::make($this->image)->encode($this->ext);
        $randomName = \Str::random() . '.' . $this->ext;

        // Storage facade
        Storage::disk('public')->put($randomName , $img);
        return $randomName ;
    }

}
