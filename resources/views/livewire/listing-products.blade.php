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
    <!-- END Add product form -->

    <!-- Load products component -->
        @if(count($products) > 0)
            @foreach($products as $product)
                <!-- Product - Livewire Component -->
                @livewire('product', ['productID' => $product->id], key($product->id))
            @endforeach
        @else
            <!-- Add Product - Livewire Component -->
            @livewire('product-add')
        @endif
    <!-- END Load products component -->
</div>
