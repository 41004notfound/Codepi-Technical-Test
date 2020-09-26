<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-1">Catégories</h4>
            @if(count($categories) > 0)
                <!-- Non-object id key error protection -->
                @if(!$adding)
                    <span wire:click="$toggle('adding')" class="card-subtitle cursor-pointer text-muted font-italic">
                        <i class="fa fa-plus"></i> Ajouter
                    </span>
                @endif
            @endif
        </div>
        <div class="card-body">
            <!-- Adding form -->
            @if($adding)
                @livewire('category-add')
            @else
                @if(count($categories) > 0)
                    @foreach($categories as $group => $values)
                        @foreach($values as $category)
                            @livewire('category', ['categoryID' => $category->id], key($category->id))
                        @endforeach
                    @endforeach
                @else
                    @livewire('category-add')
                @endif
            @endif
        </div>
    </div>
</div>
