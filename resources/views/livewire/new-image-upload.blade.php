<div>
    <h3>image upload with livewire v 2 </h3>
    <form wire:submit.prevent="save">
        <input class="my-3" type="file" wire:model="image">
        <input type="submit" value="upload image">
    </form>
    @error('image') <span>{{$message}}</span> @enderror

    {{--  loading --}}
    <div wire:loading wire:target="image">Uploading...</div>

    {{--  to show the image Preview --}}
    @if ($image)
        Photo Preview:
        <img src="{{ $image->temporaryUrl() }}">
    @endif

</div>
