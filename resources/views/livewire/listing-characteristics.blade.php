<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-1">Caractéristiques</h4>
            @if(count($characteristics) > 0)
                <span wire:click="$toggle('adding')" class="card-subtitle cursor-pointer text-muted font-italic">
                    {!! $adding ? '<i class="fa fa-minus"></i>' : '<i class="fa fa-plus"></i>' !!} Ajouter
                </span>
            @endif
        </div>
        <div class="card-body">
            <!-- Adding form -->
            @if($adding)
                @livewire('characteristic-add')
            @else
                @if(count($characteristics) > 0)
                    @foreach($characteristics as $characteristic)
                        @livewire('characteristic', ['characteristicID' => $characteristic->id], key($characteristic->id))
                    @endforeach
                @else
                    @livewire('characteristic-add')
                @endif
            @endif
        </div>
    </div>
</div>
