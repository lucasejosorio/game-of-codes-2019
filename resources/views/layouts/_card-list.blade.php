<div class="ride-list">
    @forelse($rides as $ride)
        <div class="ride-list__item">
            <div class="from">
                <div class="title">
                    <span class="inner--text font-weight-bold">De: </span>
                    <span class="inner--name text-primary font-weight-bold">{{$ride->start_venue->title}}</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="to">
                <span class="inner--text font-weight-bold">Até: </span>
                <span class="inner--name text-primary font-weight-bold">{{$ride->destination_venue->title}}</span>
            </div>
            <div class="to">
                <span class="inner--text font-weight-bold">Horário: </span>
                <span class="inner--name text-primary font-weight-bold">{{$ride->date->format("h\h d/m/Y ")}}</span>
            </div>
            <div class="to">
                <span class="inner--text font-weight-bold">Veículo: </span>
                <span class="inner--name text-primary font-weight-bold">{{$ride->transport->title}}</span>
            </div>
            <div class="to">
                <span class="inner--text font-weight-bold">Criador: </span>
                <span class="inner--name text-primary font-weight-bold">{{$ride->users->first()->name}}</span>
            </div>
            <div class="to">
                <span class="inner--text font-weight-bold">Distância até o ponto de partida: </span>
                <span class="inner--name text-primary font-weight-bold">{{$ride->distance}}</span>
            </div>
            <a class="btn btn-block btn-primary" href="{{route('ride.show', ['ride_id' => $ride->id])}}">Ver detalhes</a>
        </div>
    @empty
        <div class="ride-list__item">
            <div class="no-results">
                <div class="inner--icon"><i class="far fa-dizzy"></i></div>
                <div class="inner--text"></div>
                Não encontramos nenhuma trip
            </div>
            @endforelse
        </div>
</div>
