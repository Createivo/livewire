<?php

namespace App\Http\Livewire;

use App\Models\Posts as ModelsPosts;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // public $posts  ;   [disabled because we pass the data in render method]
    public $title , $body ; // data received from the form inputs title and body

    public function render() // construct like
    {
        return view('livewire.posts' , [
            'posts' => ModelsPosts::latest() -> paginate(2)
        ]);
    }

    // make validation rules
    public function rules(){
        return [
            'title' => 'required|max:30' ,
            'body' => 'required'
        ] ;
    }

    // real time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName); // take the rules from the rules method
    }



//    public function mount () { // runs when the livewire component calls
//        $this->posts = ModelsPosts::latest() -> get();
//    }    [disabled because we pass the data in render method]

    public function addPost(){ // eventListener function

        $this -> validate(); // take the rules from the rules method

        $created = ModelsPosts::create([
            'title' => $this-> title ,
            'body' => $this-> body
        ]);

        $this -> body = '' ;
        $this -> title = '' ;
    }

    public function delete($id){

        ModelsPosts::find($id)->delete();

    }


}
