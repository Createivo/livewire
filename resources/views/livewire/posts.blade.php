<div>
    <div class="row">
        <div class="col-lg-12 ">
            <form class="mx-5 mt-5" wire:submit.prevent="addPost">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input wire:model="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">body</label>
                    <textarea wire:model="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">add post</button>
              </form>
        </div>
    </div>

    <div class="row mt-3"> 
        <div class="col-lg-12">
          <div class="mx-5 mb-3 font-weight-bold">posts</div>
          @foreach ( $posts as $post )
            <div class="card mx-5 mb-3">
                <div class="card-header">
                  {{$post->title }}--- {{  $post->created_at->diffForHumans()}}
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">{{$post->body}}</li>
                </ul>
              </div>
          @endforeach
        </div>
    </div>

</div>
