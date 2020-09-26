<div>
    <form wire:submit.prevent="submit">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Nom</label>
                <input type="text" class="form-control" wire:model="name" placeholder="Nom de la catégorie">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12">
                <label>Description</label>
                <input type="text" class="form-control" wire:model="description" placeholder="Description de la catégorie">
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-check ml-2">
                <input wire:model="is_parent" type="checkbox" class="form-check-input">
                <label class="form-check-label">Catégorie parente</label>
            </div>
            <div class="form-group col-md-12 mt-2">
                @if(!$is_parent)
                    <label>Choix catégorie parente</label>
                    <select wire:model="selected_parent_category" class="form-control">
                        @foreach($parent_categories as $parent_category)
                            <option value="{{ $parent_category->id }}">{{ $parent_category->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
