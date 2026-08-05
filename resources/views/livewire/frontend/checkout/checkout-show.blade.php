<div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Roboto:wght@300;400;500;700&display=swap');

        :root {
            --demanto-gold: #B39256;
            --demanto-dark: #232323;
            --demanto-bg: #FDFBF7;
            --demanto-muted: #6E6E6E;
            --luxury-border: rgba(179, 146, 86, 0.25);
            --transition-smooth: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .product-area {
            background: linear-gradient(135deg, #FDFBF7 0%, #fff 100%);
            position: relative;
            padding: 20px 0 40px 0;
        }

        .product-area::before {
            content: '♦';
            position: absolute;
            top: 30px;
            right: 30px;
            font-size: 80px;
            color: var(--demanto-gold);
            opacity: 0.03;
            font-family: serif;
            pointer-events: none;
        }

        /* Checkout Content */
        .shopping-checkout-content {
            background: #fff;
            border-radius: 20px;
            border: 1px solid var(--luxury-border);
            padding: 20px;
        }

        /* Accordion */
        .checkout-accordion-item {
            margin-bottom: 15px;
            border-bottom: 1px solid var(--luxury-border);
        }

        .heading-button {
            width: 100%;
            background: transparent;
            border: none;
            padding: 12px 0;
font-family:"Cormorant Garamond",serif;
            font-size: 18px;
            font-weight: 500;
            color: var(--demanto-dark);
            text-align: left;
            position: relative;
            transition: var(--transition-smooth);
        }

        .heading-button .step-number {
            display: inline-block;
            width: 26px;
            height: 26px;
            background: var(--demanto-gold);
            color: #fff;
            border-radius: 50%;
            text-align: center;
            line-height: 26px;
            font-size: 18px;
            margin-right: 10px;
        }

        .heading-button .step-edit {
            float: right;
            font-size: 18px;
            color: var(--demanto-muted);
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .heading-button:hover .step-edit {
            opacity: 1;
        }

        .checkout-accordion-body {
            padding: 15px 0 20px 0;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 18px;
            font-weight: 500;
            color: var(--demanto-dark);
            margin-bottom: 5px;
        }

        .form-control {
            border: 1px solid var(--luxury-border);
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 14px;
            transition: var(--transition-smooth);
            background: #fff;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--demanto-gold);
            box-shadow: 0 0 0 2px rgba(179, 146, 86, 0.1);
        }

        .btn-promocode-apply {
            background: linear-gradient(135deg, var(--demanto-gold) 0%, #9a7b45 100%);
            color: #fff;
            font-size: 16px;
            letter-spacing: 2px;
            text-transform: capitalize;
            padding: 0px 20px;
            border: none;
            border-radius: 20px;
            transition: var(--transition-smooth);
        }

        .btn-promocode-apply:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(179, 146, 86, 0.3);
        }

        /* Order Summary */
        .shopping-cart-summary {
            background: #fff;
            border-radius: 20px;
            border: 1px solid var(--luxury-border);
            padding: 20px;
            position: sticky;
            top: 100px;
        }

        .title {
font-family:"Cormorant Garamond",serif;
            font-size: 18px;
            font-weight: 500;
            color: var(--demanto-dark);
            margin-bottom: 10px;
        }

        .order-items {
            max-height: 250px;
            overflow-y: auto;
            margin-bottom: 15px;
        }

        .order-items::-webkit-scrollbar {
            width: 3px;
        }

        .order-items .border-bottom {
            border-bottom: 1px solid var(--luxury-border) !important;
            padding-bottom: 8px;
            margin-bottom: 8px;
        }

        .promocode-box {
            background: #f8f6f0;
            padding: 12px;
            border-radius: 12px;
            margin: 15px 0;
        }

        .promocode {
            display: flex;
            gap: 8px;
        }

        .promocode input {
            flex: 1;
            border-radius: 20px;
            font-size: 16px;
            padding: 6px 12px;
        }

        /* Radio Button */
        .form-check {
            padding-left: 25px;
        }

        .form-check-input {
            width: 16px;
            height: 16px;
            margin-top: 2px;
        }

        .form-check-input:checked {
            background-color: var(--demanto-gold);
            border-color: var(--demanto-gold);
        }

        .form-check-label {
            font-size: 16px;
            color: var(--demanto-dark);
        }

        .form-check-label p {
            font-size: 16px;
            margin-top: 3px;
        }

        /* Personal Info */
        .personal-information {
            background: #f8f6f0;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 15px;
        }

        .personal-information ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .personal-information li {
            padding: 3px 0;
            font-size: 18px;
        }

        .text-danger {
            color: #e74c3c !important;
        }

        .text-success {
            color: #27ae60 !important;
        }

        hr {
            margin: 10px 0;
            border-color: var(--luxury-border);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .shopping-checkout-content,
            .shopping-cart-summary {
                padding: 15px;
            }
            .heading-button {
                font-size: 16px;
                padding: 10px 0;
            }
            .heading-button .step-number {
                width: 24px;
                height: 24px;
                line-height: 24px;
                font-size: 16px;
            }
        }
    </style>

    <section class="product-area">
        <div class="container">
            <div class="shopping-cart-wrap">
                <div class="row g-3">
                    <div class="col-lg-8">
                        <div class="shopping-checkout-content">
                            <div class="checkout-accordion" id="accordionExample">
                                <!-- Step 1: Personal Information -->
                                <div class="checkout-accordion-item">
                                    <h2 class="heading" id="headingTwo">
                                        <button class="heading-button @if(!$isPersonalInfoValid) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="@if($isPersonalInfoValid) true @else false @endif" aria-controls="collapseTwo">
                                            <span class="step-number">1</span>
                                            Personal Information
                                            {{-- <span class="step-edit"><i class="fa fa-pencil"></i> edit</span> --}}
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse @if(!$isPersonalInfoValid) show @endif" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="checkout-accordion-body">
                                            <div class="personal-addresses">
                                                <p class="mb-3" style="font-size: 26px; color: var(--demanto-muted);">Please provide your information for order delivery</p>
                                                <div class="delivery-address-form">
                                                    <form wire:submit.prevent="validatePersonalInformation">
                                                        <div class="form-group">
                                                            <label for="f_name">Full Name <span class="text-danger">*</span></label>
                                                            <input id="f_name" wire:model="fullname" class="form-control" type="text" placeholder="Enter your full name">
                                                            @error('fullname') <span class="text-danger small">{{ $message }}</span> @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="frm_address">Address <span class="text-danger">*</span></label>
                                                            <input id="frm_address" wire:model="address" class="form-control" type="text" placeholder="Enter your address">
                                                            @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="frm-phone">Phone <span class="text-danger">*</span></label>
                                                            <input id="frm-phone" wire:model="phone" class="form-control" type="tel" placeholder="Enter your phone number">
                                                            @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="frm-email">Email <span class="text-muted">(optional)</span></label>
                                                            <input id="frm-email" wire:model="email" class="form-control" type="email" placeholder="Enter your email">
                                                            @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                                                        </div>
                                                        <div class="form-group text-end">
                                                            <button type="submit" class="btn-promocode-apply">Continue →</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 2: Payment -->
                                <div class="checkout-accordion-item">
                                    <h2 class="heading" id="headingThree">
                                        <button class="heading-button @if($isPersonalInfoValid) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="@if($isPersonalInfoValid) true @else false @endif" aria-controls="collapseThree" @if(!$isPersonalInfoValid) disabled style="opacity: 0.5;" @endif>
                                            <span class="step-number">2</span>
                                            Payment Method
                                            {{-- <span class="step-edit"><i class="fa fa-pencil"></i> edit</span> --}}
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse @if($isPersonalInfoValid) show @endif" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="checkout-accordion-body">
                                            <div class="personal-addresses">
                                                @auth
                                                    <div class="personal-information">
                                                        <ul>
                                                            <li><strong>✓ Logged in as:</strong> {{ auth()->user()->name }}</li>
                                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: var(--demanto-gold); font-size: 16px;">Log out</a></li>
                                                        </ul>
                                                    </div>
                                                @endauth

                                                <div class="payment-method">
                                                    <h5 style="font-family: 'Cormorant Garamond', serif; font-size: 16px; margin-bottom: 10px;">Select Payment</h5>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" wire:model="payment_mode" checked>
                                                        <label class="form-check-label" for="cod">
                                                            <strong>Cash on Delivery (COD)</strong>
                                                            <p class="text-muted">Pay when you receive your order</p>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group text-end mt-3">
                                                    <button type="button" class="btn-promocode-apply" wire:click="codOrder" wire:loading.attr="disabled">
                                                        <span wire:loading.remove>Place Order →</span>
                                                        <span wire:loading>Processing...</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Summary -->
                    <div class="col-lg-4">
                        <div class="shopping-cart-summary">
                            <h4 class="title">Order Summary</h4>
                            
                            <div class="order-items">
                                @foreach($carts as $item)
                                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                                        <div>
                                            <h6 class="mb-0" style="font-size: 26px; font-weight: 500;">{{ $item->product->name }}</h6>
                                            <small class="text-muted" style="font-size: 26px;">Qty: {{ $item->quantity }}</small>
                                        </div>
                                        <div class="text-end">
                                            <span style="font-size: 26px; color: var(--demanto-gold);">${{ number_format($item->product->selling_price * $item->quantity, 2) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if($totalProductAmount != 0)
                                <div class="cart-detailed-totals">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="label" style="font-size: 26px;">Subtotal</span>
                                        <span class="value" style="font-size: 26px;">${{ number_format($totalProductAmount, 2) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="label" style="font-size: 18px;">Shipping</span>
                                        <span class="value text-success" style="font-size: 26px;">Free</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between fw-bold">
                                        <span class="label" style="font-size: 26px;">Total</span>
                                        <span class="value" style="color: var(--demanto-gold); font-size: 26px;">${{ number_format($totalProductAmount, 2) }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
    </form>
    
    @script
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('personalInfoValidated', () => {
                const collapseTwo = document.getElementById('collapseTwo');
                if (collapseTwo) {
                    const bsCollapseTwo = new bootstrap.Collapse(collapseTwo, { toggle: false });
                    bsCollapseTwo.hide();
                }
                const collapseThree = document.getElementById('collapseThree');
                if (collapseThree) {
                    const bsCollapseThree = new bootstrap.Collapse(collapseThree, { toggle: false });
                    bsCollapseThree.show();
                }
            });
        });
    </script>
    @endscript
</div>