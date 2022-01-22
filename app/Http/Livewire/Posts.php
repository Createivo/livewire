<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\Image;
use App\Models\Posts as ModelsPosts;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use Image ;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


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


    public function addPost(){ // eventListener function

        $this -> validate(); // take the rules from the rules method

        $img = $this -> uploadImageToServer();

        $created = ModelsPosts::create([
            'title' => $this-> title ,
            'body' => $this-> body ,
            'img' => $img
        ]);

        $this -> body = '' ;
        $this -> title = '' ;
    }

    public function delete($id){
        try {
            ModelsPosts::find($id)->delete();
        } catch (\Exception $e) {
            dd($e -> getMessage());
        }



    }


}
