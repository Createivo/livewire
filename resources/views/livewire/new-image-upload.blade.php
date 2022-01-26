<div>
    <h3>image upload with livewire v 2 </h3>
    <input class="my-3" type="file" wire:model="image" wire:change="save">
    @error('image') {{$message}} @enderror

    {{--  loading --}}
    <div wire:loading wire:target="photo">Uploading...</div>

    {{--  to show the image Preview --}}
    @if ($image)
        Photo Preview:
        <img src="{{ $image->temporaryUrl() }}">
    @endif
</div>
