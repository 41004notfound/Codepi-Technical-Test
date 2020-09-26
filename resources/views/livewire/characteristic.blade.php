<div>
    @if($edit)
        <hr>
        <div class="card mb-3 border-0">
            <form wire:submit.prevent="save">
                <input wire:model="characteristic.name" class="form-control" type="text" >
                @error('characteristic.name') <span class="error">{{ $message }}</span> @enderror

                <button class="btn btn-success mt-2" type="submit"><i class="fas fa-check"></i> | Modifier</button>
            </form>
        </div>
        <hr>
    @else
        <p>{{ $characteristic->name }} <i wire:click="$toggle('edit')" class="fa fa-pen ml-1"></i></p>
    @endif
</div>
