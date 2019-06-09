<div class="full-screen-modal" id="ponto_chegada">
    <div class="full-screen-modal__header">
        ESCOLHA SEU DESTINO
        <button type="button" class="full-screen-modal__close js-close-modal" data-target="#ponto_chegada"><i class="fas fa-times"></i></button>
    </div>
    <div class="full-screen-modal__container">
        @foreach($venues as $venue)
            <div class="location-list__item">
                <input type="radio" name="venue_destination_id" id="venue_destination_id_{{$venue->id}}"
                       value="{{$venue->id}}" class="venue-destination">
                <label for="venue_destination_id_{{$venue->id}}">
                    <span class="inner--icon"><i class="fa fa-map-marker-alt"></i></span>
                    <span class="inner--name">{{$venue->title}}</span>
                </label>
                <span class="inner--option">
                    <button class="opt-button" type="button"><i class="fas fa-map"></i></button>
                </span>
            </div>
        @endforeach
    </div>
</div>
