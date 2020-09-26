<div class="card mb-2">
    @if($edit)
        <form wire:submit.prevent="save">
    @endif
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                @if($edit)
                    <input wire:model="product.name" class="form-control" type="text" >
                    @error('product.name') <span class="error">{{ $message }}</span> @enderror
                @else
                    <h4 class="card-title mb-1">{{ $product->name }}</h4>
                @endif
            </div>

            <div class="col-6">
                <i class="far fa-trash-alt text-danger cursor-pointer float-right m-1" wire:click="delete"></i>
                <i class="far fa-edit cursor-pointer float-right m-1" wire:click="$toggle('edit')"></i>
            </div>
        </div>
        @if($edit)
            <input wire:model="product.description" class="form-control" type="text" >
            @error('product.description') <span class="error">{{ $message }}</span> @enderror
        @else
            <p class="card-subtitle text-muted">{{ $product->description }}</p>
        @endif
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        @if($edit)
                            <label>Prix TTC (€) :</label>
                            <input wire:model="product.price_ttc" class="form-control" type="number" >
                            @error('product.price_ttc') <span class="error">{{ $message }}</span> @enderror
                        @else
                            <p>Prix : {{ $product->price_ttc }}€</p>
                        @endif
                    </div>
                    
                    <div class="col-6">
                        @if($edit)
                            <label>Stock :</label>
                            <input wire:model="product.stock" class="form-control" type="number" >
                            @error('product.stock') <span class="error">{{ $message }}</span> @enderror
                        @else
                            <p>
                                Stock : {{ $product->stock }}
                                <i class="fa fa-plus-square text-muted cursor-pointer ml-1" wire:click="increment"></i>
                                <i class="fa fa-minus-square cursor-pointer text-muted" wire:click="decrement"></i>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <p class="font-weight-bold mb-0">Catégories</p>
                @if($edit)
                    <select wire:model="selected_categories" class="form-control" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('selected_categories') <span class="error">{{ $message }}</span> @enderror
                @else
                    @foreach($product->categories as $category)
                        <p class="m-0">{{ $category->name }}</p>
                    @endforeach
                @endif
            </div>
            <div class="col-12 col-md-6">
                <p class="font-weight-bold mb-0">Caractéristiques</p>
                @if($edit)
                    <select wire:model="selected_characteristics" class="form-control" multiple>
                        @foreach($characteristics as $characteristic)
                            <option value="{{ $characteristic->id }}">{{ $characteristic->name }}</option>
                        @endforeach
                    </select>
                    @error('selected_characteristics') <span class="error">{{ $message }}</span> @enderror
                @else
                    @foreach($product->characteristics as $characteristic)
                        <p class="m-0">{{ $characteristic->name }}</p>
                    @endforeach
                @endif
            </div>
            @if($edit)
                <div class="col-12 mt-3">
                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> | Modifier</button>
                </div>
            @endif
        </div>
    </div>
    @if($edit)
        </form>
    @endif
</div>
