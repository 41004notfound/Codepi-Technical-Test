<div>
    @if($edit)
        <hr>
        <div class="card mb-3 border-0">
            <form wire:submit.prevent="save">
                <div class="form-group col-md-12">
                    <label>Nom</label>
                    <input wire:model="category.name" class="form-control" type="text" >
                    @error('category.name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-12">
                    <label>Description</label>
                    <input wire:model="category.description" class="form-control" type="text" >
                    @error('category.description') <span class="error">{{ $message }}</span> @enderror
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
                <button class="btn btn-success mt-2" type="submit"><i class="fas fa-check"></i> | Modifier</button>
            </form>
        </div>
        <hr>
    @else
        @if($category->isParent())
            <p class="font-weight-bold">{{ $category->name }} <i wire:click="$toggle('edit')" class="fa fa-pen ml-1"></i></p>
        @else
            <p class="pl-3">{{ $category->name }} <i wire:click="$toggle('edit')" class="fa fa-pen text-black-50 ml-1"></i></p>
        @endif
    @endif
</div>
