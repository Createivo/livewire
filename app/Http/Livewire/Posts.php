<?php

namespace App\Http\Livewire;

use App\Models\Posts as ModelsPosts;
use Carbon\Carbon;
use Livewire\Component;

class Posts extends Component
{
    public $posts  ;
    public $title , $body ; // data received from the form inputs titel and body

    public function render() // construct like
    {
        return view('livewire.posts');
    }

    public function mount () { // runs when the livewire component calls
        $this->posts = ModelsPosts::latest() -> get();
    }

    public function addPost(){ // eventListener function
        $created = ModelsPosts::create([
            'title' => $this-> title , 
            'body' => $this-> body
        ]);

        $this-> posts -> push($created);
    }

    
}
