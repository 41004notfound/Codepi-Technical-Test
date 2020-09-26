<div>
    <form wire:submit.prevent="submit">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Nom</label>
                <input type="text" class="form-control" wire:model="name" placeholder="Nom de la caractéristique">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
