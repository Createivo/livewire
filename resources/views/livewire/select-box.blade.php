<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Car</label>
                    <select wire:model="cities" class="form-control" id="exampleFormControlSelect2">
                        <option> Select City </option>
                       @foreach($allCities as $city)
                            <option value="{{$city}}">{{$city}}</option>
                       @endforeach

                    </select>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    @if(!empty($sideKick))
                    <select wire:model="sideKick" class="form-control" id="exampleFormControlSelect1">
                        @foreach($sideKick as $newCar)
                            <option value="{{$newCar}}">{{$newCar}}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
