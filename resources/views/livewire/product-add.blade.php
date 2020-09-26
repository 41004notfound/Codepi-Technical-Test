<div class="card mb-3">
    <div class="card-body">
        <h3 class="card-title">Ajouter un produit</h3>
        <hr>
        <form wire:submit.prevent="submit">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Nom</label>
                    <input type="text" class="form-control" wire:model="name" placeholder="Nom du produit">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-12">
                    <label>Description</label>
                    <input type="text" class="form-control" wire:model="description" placeholder="Description du produit">
                    @error('description') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Prix</label>
                    <input type="number" class="form-control" wire:model="price_ttc" placeholder="0">
                    @error('price_ttc') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Stock</label>
                    <input type="number" class="form-control" wire:model="stock" placeholder="1">
                    @error('stock') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-12">
                    <label>Catégories</label>
                    <select wire:model="selected_categories" class="form-control" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('selected_categories') <span class="error">{{ $message }}</span> @enderror

                    @if($adding_category)
                        <p wire:click="newCategory">x Ajouter une catégorie</p>
                        <label>Ajouter un nouvelle catégorie</label>
                        <input type="text" class="form-control" wire:model="new_category" placeholder="Nom de la catégorie">
                        @error('new_category') <span class="error">{{ $message }}</span> @enderror
                    @else
                        <p wire:click="newCategory">+ Ajouter une catégorie</p>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label>Caractéristiques</label>
                    <select wire:model="selected_characteristics" class="form-control" multiple>
                        @foreach($characteristics as $characteristic)
                            <option value="{{ $characteristic->id }}">{{ $characteristic->name }}</option>
                        @endforeach
                    </select>
                    @error('selected_characteristics') <span class="error">{{ $message }}</span> @enderror

                    @if($adding_characteristic)
                        <p wire:click="newCharacteristic">x Ajouter une caractéristique</p>
                        <label>Ajouter un nouvelle caractéristique</label>
                        <input type="text" class="form-control" wire:model="new_characteristic"
                               placeholder="Nom de la caractéristique">
                        @error('new_characteristic') <span class="error">{{ $message }}</span> @enderror
                    @else
                        <p wire:click="newCharacteristic">+ Ajouter une caractéristique</p>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>
