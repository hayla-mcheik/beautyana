<div class="cart-dropdown-wrapper">
    <style>
        /* =========================================================
           CART DROPDOWN WRAPPER - COMPACT & ELEGANT
        ========================================================= */
        .cart-dropdown-wrapper {
            width: 320px;
            max-width: 95vw;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid #f0ece4;
            position: relative;
            font-family: 'Roboto', sans-serif;
        }

        /* Subtle Gold Top Accent */
        .cart-dropdown-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #b39256, #d4b87a, #b39256);
        }

        /* =========================================================
           PRODUCT LIST
        ========================================================= */
   /* =========================================================
   PRODUCT LIST
========================================================= */

.popup-product-list {
    list-style: none;

    padding: 0;
    margin: 0;

    max-height: 330px;

    overflow-y: auto;
    overflow-x: hidden;
}


/* =========================================================
   PRODUCT ROW
========================================================= */

.product-list-item {

    display: flex;

    align-items: flex-start;

    gap: 12px;

    width: 100%;

    box-sizing: border-box;

    padding: 12px;

    border-bottom: 1px solid #eeeae3;

    background: #fff;
}


.product-list-item:last-child {
    border-bottom: none;
}


/* =========================================================
   IMAGE
========================================================= */

.product-image-link {

    width: 55px;
    height: 55px;

    flex: 0 0 55px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #f6f5f2;

    border: 1px solid #e8e4dc;

    border-radius: 7px;

    overflow: hidden;

    text-decoration: none;
}


.product-image-link img {

    width: 100%;
    height: 100%;

    padding: 4px;

    box-sizing: border-box;

    object-fit: contain;

    display: block;
}


/* =========================================================
   RIGHT SIDE
========================================================= */

.product-content {

    flex: 1;

    min-width: 0;

    display: flex;

    flex-direction: column;

    justify-content: center;

    gap: 6px;
}


/* =========================================================
   PRODUCT NAME
========================================================= */

.product-title {

    display: block;

    width: 100%;

    color: #292929;

    font-family: "Cormorant Garamond", serif;

    font-size: 16px;

    font-weight: 600;

    line-height: 1.15;

    text-decoration: none;

    white-space: normal;

    overflow-wrap: break-word;
}


.product-title:hover {

    color: #b39256;

    text-decoration: none;
}


/* =========================================================
   BOTTOM ROW
   COLOR | SIZE | QUANTITY | PRICE | REMOVE
========================================================= */

.product-bottom-row {

    display: flex;

    align-items: center;

    width: 100%;

    min-width: 0;

    gap: 9px;
}


/* =========================================================
   COLOR / SIZE
========================================================= */

.product-variants {

    display: flex;

    align-items: center;

    gap: 4px;

    min-width: 0;

    flex: 1;

    overflow: hidden;

    white-space: nowrap;

    font-family: "Roboto", sans-serif;

    font-size: 9px;

    font-weight: 500;

    color: #999;

    text-transform: uppercase;

    letter-spacing: .4px;
}


.product-variants span:not(:last-child)::after {

    content: "/";

    margin-left: 4px;

    color: #c9c1b5;
}


/* =========================================================
   QUANTITY
========================================================= */

.product-quantity {

    display: flex;

    align-items: center;
    justify-content: center;

    width: 30px;
    min-width: 30px;

    height: 21px;

    box-sizing: border-box;

    background: #f1f0ed;

    border-radius: 11px;

    color: #777;

    font-family: "Roboto", sans-serif;

    font-size: 9px;

    font-weight: 600;

    white-space: nowrap;
}


/* =========================================================
   PRICE
========================================================= */

.product-price {

    width: 55px;

    min-width: 55px;

    text-align: right;

    white-space: nowrap;

    color: #b39256;

    font-family: "Cormorant Garamond", serif;

    font-size: 14px;

    font-weight: 700;
}


/* =========================================================
   REMOVE
========================================================= */

.product-close {

    width: 20px;

    min-width: 20px;

    height: 20px;

    display: flex;

    align-items: center;
    justify-content: center;

    color: #aaa;

    font-size: 12px;

    text-decoration: none;

    border-radius: 50%;

    cursor: pointer;
}


.product-close:hover {

    color: #b39256;

    background: #f7f2e9;

    text-decoration: none;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 480px) {

    .product-list-item {

        gap: 9px;

        padding: 10px;
    }


    .product-image-link {

        width: 48px;
        height: 48px;

        flex: 0 0 48px;
    }


    .product-title {

        font-size: 14px;
    }


    .product-bottom-row {

        gap: 6px;
    }


    .product-variants {

        font-size: 8px;
    }


    .product-quantity {

        width: 27px;
        min-width: 27px;

        font-size: 8px;
    }


    .product-price {

        width: 48px;
        min-width: 48px;

        font-size: 13px;
    }


    .product-close {

        width: 18px;
        min-width: 18px;
    }

}
.checkout-actions a {
    color: white !important;
}

        /* =========================================================
           FOOTER (PRICE & CHECKOUT) - COMPACT
        ========================================================= */
        .cart-footer {
            background: #faf8f3;
            border-top: 1px solid #f0ece4;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Total Row */
        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 1px dashed #e0d6c5;
        }

        .cart-total .label {
            font-family: "Cormorant Garamond", serif;
            font-size: 18px;
            font-weight: 600;
            color: #2c2c2c;
        }

        .cart-total .value {
            font-family: "Cormorant Garamond", serif;
            font-size: 20px;
            font-weight: 700;
            color: #b39256;
        }

        /* Buttons */
        .checkout-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .btn-Checkout {
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-family: "Cormorant Garamond", serif;
            font-size: 15px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-Checkout {
            background: #b39256;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(179, 146, 86, 0.25);
            color: #fff;
        }

        /* Secondary Button (View Cart) */
        .btn-ViewCart {
            display: block;
            width: 100%;
            background: transparent;
            color: #2c2c2c;
            text-align: center;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-family: "Cormorant Garamond", serif;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: 1px solid #dcd3c5;
            cursor: pointer;
        }

        .btn-ViewCart:hover {
            background: #f4efe6;
            border-color: #b39256;
            color: #b39256;
        }

        /* =========================================================
           EMPTY CART
        ========================================================= */
        .empty-cart-message {
            padding: 30px 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .empty-cart-message i {
            font-size: 40px;
            color: #d4c4a8;
        }

        .empty-cart-message span {
            font-family: "Cormorant Garamond", serif;
            font-size: 18px;
            color: #888;
            font-weight: 500;
        }
    </style>

<ul class="popup-product-list">

    @forelse($items as $item)

        <li
            class="product-list-item"
            wire:key="cart-{{ $item['id'] }}"
        >

            {{-- PRODUCT IMAGE --}}
            <a
                href="{{ url('collections/'.$item['category_slug'].'/'.$item['slug']) }}"
                class="product-image-link"
            >

                @if($item['image'])

                    <img
                        src="{{ asset($item['image']) }}"
                        alt="{{ $item['name'] }}"
                    >

                @else

                    <img
                        src="{{ asset('assets/img/no-image.png') }}"
                        alt="no-image"
                    >

                @endif

            </a>


            {{-- RIGHT SIDE --}}
            <div class="product-content">

                {{-- PRODUCT NAME --}}
                <a
                    href="{{ url('collections/'.$item['category_slug'].'/'.$item['slug']) }}"
                    class="product-title"
                >
                    {{ $item['name'] }}
                </a>


                {{-- COLOR / SIZE / QUANTITY / PRICE --}}
                <div class="product-bottom-row">

                    {{-- COLOR / SIZE --}}
                    @if(
                        !empty($item['color']) ||
                        !empty($item['size'])
                    )

                        <div class="product-variants">

                            @if(!empty($item['color']))
                                <span>{{ $item['color'] }}</span>
                            @endif

                            @if(!empty($item['size']))
                                <span>{{ $item['size'] }}</span>
                            @endif

                        </div>

                    @endif


                    {{-- QUANTITY --}}
                    <span class="product-quantity">
                        {{ $item['quantity'] }}x
                    </span>


                    {{-- PRICE --}}
                    <span class="product-price">
                        ${{ number_format($item['price'], 2) }}
                    </span>


                    {{-- REMOVE --}}
                    <a
                        class="product-close"
                        href="#"
                        wire:click.prevent="removeItem('{{ $item['id'] }}')"
                        wire:loading.attr="disabled"
                        aria-label="Remove product"
                    >
                        <i class="la la-close"></i>
                    </a>

                </div>

            </div>

        </li>

    @empty

        <li class="empty-cart-message">

            <i class="la la-shopping-cart"></i>

            <span>
                Your cart is empty
            </span>

        </li>

    @endforelse

</ul>

    @if(count($items) > 0)
        <div class="cart-footer">
            
            <div class="cart-total">
                <span class="label">Total</span>
                <span class="value">${{ number_format($total, 2) }}</span>
            </div>

            <div class="checkout-actions">
                <a href="{{ url('checkout') }}" class="btn-Checkout">
                    Proceed to Checkout
                </a>
                <a href="{{ url('cart') }}" class="btn-ViewCart">
                    View Cart
                </a>
            </div>

        </div>
    @endif
</div>