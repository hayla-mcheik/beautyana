<div class="cart-dropdown-wrapper">
    <style>
        .cart-dropdown-wrapper {
            min-width: 280px;
            max-width: 320px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Popup Product List */
        .popup-product-list {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 320px;
            overflow-y: auto;
        }

        .popup-product-list::-webkit-scrollbar {
            width: 4px;
        }

        .popup-product-list::-webkit-scrollbar-track {
            background: #f0f0f0;
        }

        .popup-product-list::-webkit-scrollbar-thumb {
            background: var(--demanto-gold);
            border-radius: 4px;
        }

        .product-list-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-bottom: 1px solid rgba(179, 146, 86, 0.15);
            transition: all 0.3s ease;
            position: relative;
        }

        .product-list-item:hover {
            background: rgba(179, 146, 86, 0.03);
        }

        .product-list-item a {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            text-decoration: none;
            color: inherit;
        }

        .product-list-item img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 8px;
            background: #f8f5ef;
            padding: 5px;
            transition: transform 0.3s ease;
        }

        .product-list-item:hover img {
            transform: scale(1.05);
        }

        .product-title {
           font-family:"Cormorant Garamond",serif;
            font-size: 18px;
            font-weight: 500;
            color: #232323;
            flex: 1;
            line-height: 1.3;
        }

        .product-quantity {
            font-size: 16px;
            color: #999;
            font-weight: 500;
        }

        .product-price {
            font-size: 16px;
            font-weight: 600;
            color: var(--demanto-gold);
            margin-left: auto;
        }

        .product-close {
            color: #999;
            transition: all 0.3s ease;
            margin-left: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .product-close:hover {
            color: #e74c3c;
        }

        /* Price Content */
        .price-content {
            padding: 12px 15px;
            background: #faf8f3;
            border-top: 1px solid rgba(179, 146, 86, 0.15);
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-total .label {
           font-family:"Cormorant Garamond",serif;
            font-size: 18px;
            font-weight: 600;
            color: #232323;
            text-transform: capitalize;
            letter-spacing: 0.5px;
        }

        .cart-total .value {
            font-size: 16px;
            font-weight: 700;
            color: var(--demanto-gold);
        }

        /* Checkout Button */
        .checkout {
            padding: 12px 15px;
        }

        .btn-Checkout {
            display: block;
            width: 100%;
            background: linear-gradient(135deg, var(--demanto-gold) 0%, #9a7b45 100%);
            color: #fff;
            text-align: center;
            padding: 8px 15px;
            border-radius: 25px;
            text-decoration: none;
      font-family:"Cormorant Garamond",serif;
            font-size: 18px;
            font-weight: 600;
            text-transform: capitalize;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-Checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(179, 146, 86, 0.3);
            color: #fff;
        }

        /* Empty Cart */
        .empty-cart-message {
            padding: 30px 20px;
            text-align: center;
        }

        .empty-cart-message i {
            font-size: 40px;
            color: var(--demanto-gold);
            opacity: 0.3;
            margin-bottom: 10px;
        }

        .empty-cart-message span {
            font-size: 18px;
            color: #999;
      font-family:"Cormorant Garamond",serif;
        }
    </style>

    <ul class="popup-product-list">
        @forelse($items as $item)
            <li class="product-list-item" wire:key="cart-{{ $item['id'] }}">
                <a href="{{ url('collections/'.$item['category_slug'].'/'.$item['slug']) }}">
                    @if($item['image'])
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                    @else
                        <img src="{{ asset('assets/img/no-image.png') }}" alt="no-image">
                    @endif
                    <span class="product-title">{{ Str::limit($item['name'], 25) }}</span>
                    <span class="product-quantity me-5">{{ $item['quantity'] }}x</span>
                </a>
                <span class="product-price ml-2">${{ number_format($item['price'], 2) }}</span>
                <a class="product-close" href="#" wire:click.prevent="removeItem({{ $item['id'] }})" wire:loading.attr="disabled">
                    <i class="la la-close"></i>
                </a>
            </li>
        @empty
            <li class="empty-cart-message">
                <i class="la la-shopping-cart"></i>
                <span>Your cart is empty</span>
            </li>
        @endforelse
    </ul>

    @if(count($items) > 0)
        <div class="checkout mt-4">
            <a href="{{ url('cart') }}" class="btn-Checkout">View All Items in Cart</a>
        </div>

        <div class="price-content">
            <div class="cart-total">
                <span class="label">Total</span>
                <span class="value">${{ number_format($total, 2) }}</span>
            </div>
        </div>

        <div class="checkout mt-4">
            <a href="{{ url('checkout') }}" class="btn-Checkout">Proceed to Checkout</a>
        </div>
    @endif
</div>