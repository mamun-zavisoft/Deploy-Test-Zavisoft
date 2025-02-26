<ul class="list-group shadow mt-1 overflow-auto" style="height: 300px;">
    @foreach ($products as $product)
        <li class="list-group-item d-flex justify-content-between align-items-center product_cart"
            data-id="{{ $product->id }}" data-purchase-price="{{ $product->purchase_price }}"
            data-sale-price="{{ $product->sale_price }}"
            data-img="{{ $product->thumbnail ?: asset('build/img/no-image.svg') }}"
            data-title="{{ $product->name }}">

            <div class="d-flex align-items-center">
                <img src="{{ $product->thumbnail ?: asset('build/img/no-image.svg') }}"
                    alt="{{ $product->name }}" class="img-thumbnail me-3" style="width: 50px; height: 50px;">
                <span>{{ $product->name }}</span>
            </div>

            <div class="text-end">
                <span class="d-block">{{ $product->purchase_price ?? 0 }} Tk</span>
            </div>
        </li>
    @endforeach
</ul>
