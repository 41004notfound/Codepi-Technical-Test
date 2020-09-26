<div>
    <!-- Add product form -->
    @if($adding)
        @livewire('product-add')
    @else
        @if(count($products) > 0)
            <div class="card card-header mb-2">
                <button wire:click="addProduct" class="btn btn-success w-50 align-self-center"><i class="fa fa-plus"></i> | Ajouter un produit</button>
            </div>
        @endif
    @endif

    <!-- Load products component -->
    @if(count($products) > 0)
        @foreach($products as $product)
            @livewire('product', ['productID' => $product->id], key($product->id))
        @endforeach
    @else
        @livewire('product-add')
    @endif
</div>
