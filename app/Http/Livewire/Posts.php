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

    // real time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName); // take the rules from the rules method
    }

    // make validation rules
    public function rules(){
        return [
            'title' => 'required|max:30' ,
            'body' => 'required'
        ] ;
    }

    public function mount () { // runs when the livewire component calls
        $this->posts = ModelsPosts::latest() -> get();
    }

    public function addPost(){ // eventListener function

        $this -> validate(); // take the rules from the rules method



        $created = ModelsPosts::create([
            'title' => $this-> title ,
            'body' => $this-> body
        ]);

        $this-> posts -> prepend($created);

        $this -> body = '' ;
        $this -> title = '' ;
    }

    public function delete($id){
        ModelsPosts::find($id)->delete();
        $this->posts = ModelsPosts::latest() -> get();
    }


}
