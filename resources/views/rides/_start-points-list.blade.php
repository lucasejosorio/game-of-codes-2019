<div class="full-screen-modal" id="ponto_partida">
    <div class="full-screen-modal__header">
        ESCOLHA SEU LOCAL DE PARTIDA
        <button type="button" class="full-screen-modal__close js-close-modal" data-target="#ponto_partida"><i class="fas fa-times"></i></button>
    </div>
    <div class="full-screen-modal__container">
        @foreach($venues as $venue)
            <div class="location-list__item">
                <input type="radio" name="venue_start_id" id="venue_start_id_{{$venue->id}}"
                       value="{{$venue->id}}" class="venue-start">
                <label for="venue_start_id_{{$venue->id}}">
                    <span class="inner--icon"><i class="fa fa-map-marker-alt"></i></span>
                    <span class="inner--name">{{$venue->title}}</span>
                </label>
                <span class="inner--option">
                    <button class="opt-button js-open-map" type="button" data-latitude="{{ $venue->latitude }}" data-longitude="{{ $venue->longitude }}"><i class="fas fa-map"></i></button>
                </span>
            </div>
        @endforeach
    </div>
</div>
