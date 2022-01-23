<div>
  <div class="row">
    <div class="col-lg-12 ">
      <form class="mx-5 mt-5" wire:submit.prevent="addPost">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input wire:model.debounce.500ms="title" type="text" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
            @error('title')
            <small class="text-danger font-weight-bold">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">body</label>
          <textarea wire:model.debounce.500ms="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('body')
            <small class="text-danger font-weight-bold">{{$message}}</small>
            @enderror
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1">upload image</label>
                    <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1" wire:change="$emit('showImage')">
                </div>
            </div>
            <div class="col-lg-6">
                <img width="200" class="myImage" src="{{$image}}" alt="">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">add post</button>
      </form>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg-12">
      <div class="mx-5">
          {{$posts -> links()}}
      </div>
      <div class="mx-5 mb-3 font-weight-bold">posts</div>
      @foreach ( $posts as $post )
      <div class="card mx-5 mb-3">
        <div class="card-header">
          <div>
            <!-- Button trigger modal -->
            <button type="button" class="delbtn btn btn-danger" data-toggle="modal" data-target="#e{{$post -> id}}">
              Delete
            </button>

            <!-- Modal -->
            <div class="modal fade" id="e{{$post -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    are you sure you want to delete post {{$post -> title }}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button wire:click.prevent="delete({{$post->id}})" type="button" class="btn btn-danger" data-dismiss="modal" >confirm</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{$post->title }}--- {{ $post->created_at->diffForHumans()}}
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{$post->body}}</li>
          @if($post->img)
                {{--   php artisan storage:link ->  storage/'.$post->img --}}
                <li class="list-group-item"><img width="200" src="{{'storage/'.$post->img}}" alt=""></li>
          @endif
        </ul>
      </div>
      @endforeach

        <script>
            // Firing Events # Method A: From The Template
            // this is the fired event from the input file
            // wire:change="$emit('showImage')"
            window.Livewire.on('showImage' , function(event){
                let imageInput = document.querySelector('input[type="file"]');
                // extension
                let file = imageInput.files[0];
                let fileExt = file.name.split('.');
                fileExt = fileExt[fileExt.length - 1];


                let fileReader = new FileReader();
                fileReader.readAsDataURL(file)
                fileReader.onloadend = (event) => {
                    let result = event.target.result;
                    document.querySelector('.myImage').src = result ;

                    // Firing Events # Method C: From Global JavaScript
                    Livewire.emit('imageUpload' , [result, fileExt]);
                }
            })
        </script>
    </div>
  </div>
</div>


