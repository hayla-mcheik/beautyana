{{-- resources/views/layouts/inc/frontend/footer.blade.php --}}
{{-- Demanto Luxury Footer - Simplified & Compact --}}
<footer class="demanto-footer">
    <div class="footer-container">
        {{-- Top Row: Logo + Quick Links --}}
        <div class="footer-top">
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="footer-logo-link">
                    <img class="footer-logo" src="{{ asset('assets/img/logogold.png') }}" alt="Demanto">
                </a>
                <div class="brand-tagline">TIMELESS LUXURY BY DEMANTO</div>
            </div>
            <div class="footer-quick">
                <span class="quick-quote">“Where Diamonds Become Art.”</span>
                <span class="quick-since">since 2005</span>
            </div>
        </div>

        {{-- Middle Row: 3 Compact Columns --}}
  
            {{-- <div class="footer-col">
                <h4>MAISON</h4>
                <ul>
                    <li><a href="{{ url('aboutus') }}">Our Story</a></li>
                    <li><a href="#">The Atelier</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Private Appointment</a></li>
                </ul>
            </div>

 
<div class="footer-col">

    <h4>COLLECTIONS</h4>

    <ul>

        @foreach($collections->take(4) as $category)

            <li>
                <a href="{{ url('collections/'.$category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>

        @endforeach

    </ul>

</div>


            <div class="footer-col">
                <h4>ATELIER</h4>
                <div class="contact-compact">
                    <p><i class="fas fa-map-marker-alt"></i> {{ $appSetting->address ?? 'beirut, lebanon' }}</p>
                    <p><i class="fas fa-phone-alt"></i> {{ $appSetting->phone1 ?? '+33 1 42 96 88 00' }}</p>
                    <p><i class="far fa-envelope"></i> {{ $appSetting->email1 ?? 'info@demanto.com' }}</p>
                </div>
                <div class="social-simple">
                    @if(optional($appSetting)->instagram)<a href="{{ $appSetting->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>@endif
                    @if(optional($appSetting)->facebook)<a href="{{ $appSetting->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>@endif
                    @if(optional($appSetting)->youtube)<a href="{{ $appSetting->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>@endif
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>

            <div class="footer-col newsletter-compact">
                <h4>THE CHRONICLE</h4>
                <div class="newsletter-simple">
                    <input type="email" id="luxEmailSimple" placeholder="Your email">
                    <button id="luxSubscribeSimpleBtn">Subscribe</button>
                </div>
                <p class="news-note">Exclusive previews & private events</p>
            </div> --}}
        </div> 

        {{-- Bottom Bar --}}
        <div class="footer-bottom container text-center">
            <div> <span>© {{ date('Y') }} DEMANTO · All rights reserved.</span> </div>
            
 
        </div>
    </div>
</footer>


<style>
    /* Simplified Footer CSS - Compact & Elegant */
    .demanto-footer {
        background-color: #0C0B0A;
        color: #D4CFC4;
        padding: 40px 0 25px;
        border-top: 1px solid rgba(201, 169, 110, 0.25);
        font-family: 'Montserrat', sans-serif;
    }
    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 32px;
    }

    /* Top Row - Compact */
    .footer-top {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        flex-wrap: wrap;
        padding-bottom: 25px;
        margin-bottom: 25px;
        border-bottom: 1px solid rgba(201, 169, 110, 0.2);
    }
    .footer-logo {
        height: 38px;
        width: auto;
    }
    .brand-tagline {
        font-size: 10px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #C9A96E;
        margin-top: 8px;
    }
    .footer-quick {
        text-align: right;
    }
    .quick-quote {
        font-family: 'Cormorant Garamond', serif;
        font-size: 16px;
        font-style: italic;
        color: #e4d9c8;
        display: block;
    }
    .quick-since {
        font-size: 10px;
        color: #8a857c;
        letter-spacing: 1px;
    }

    /* Grid - 4 columns compact */
    .footer-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin-bottom: 30px;
    }
    .footer-col {
        flex: 1;
        min-width: 150px;
    }
    .footer-col h4 {
font-family:"Cormorant Garamond",serif;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1.5px;
        color: #ffffff;
        margin-bottom: 16px;
        position: relative;
        display: inline-block;
    }
    .footer-col h4:after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 28px;
        height: 1px;
        background: #C9A96E;
    }
    .footer-col ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer-col li {
        margin-bottom: 8px;
    }
    .footer-col a {
        color: #D4CFC4;
        text-decoration: none;
        font-size: 11px;
        font-weight: 400;
        letter-spacing: 0.3px;
        transition: color 0.2s;
    }
    .footer-col a:hover {
        color: #C9A96E;
    }
    .contact-compact p {
        font-size: 11px;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .contact-compact i {
        width: 18px;
        color: #C9A96E;
        font-size: 11px;
    }
    .social-simple {
        display: flex;
        gap: 16px;
        margin-top: 12px;
    }
    .social-simple a {
        color: #D4CFC4;
        font-size: 14px;
        transition: 0.2s;
    }
    .social-simple a:hover {
        color: #C9A96E;
    }
    .newsletter-compact .newsletter-simple {
        display: flex;
        border-bottom: 1px solid rgba(212, 207, 196, 0.3);
        padding-bottom: 4px;
    }
    .newsletter-compact input {
        background: transparent;
        border: none;
        padding: 8px 0;
        color: #fff;
        font-size: 11px;
        flex: 1;
        outline: none;
    }
    .newsletter-compact input::placeholder {
        color: #8a857c;
        font-style: italic;
    }
    .newsletter-compact button {
        background: transparent;
        border: none;
        color: #C9A96E;
        font-weight: 500;
        font-size: 10px;
        letter-spacing: 1.5px;
        cursor: pointer;
        padding: 0;
    }
    .newsletter-compact button:hover {
        color: #fff;
    }
    .news-note {
        font-size: 9px;
        margin-top: 8px;
        opacity: 0.6;
    }

    /* Bottom Bar - Simple */
    .footer-bottom {
        border-top: 1px solid rgba(201, 169, 110, 0.2);
        padding-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        font-size: 10px;
        color: #99928a;
    }
    .payment-simple i {
        font-size: 16px;
        margin-left: 12px;
        opacity: 0.6;
    }
    .payment-simple i:hover {
        opacity: 1;
        color: #C9A96E;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .footer-container {
            padding: 0 20px;
        }
        .footer-top {
            flex-direction: column;
            text-align: center;
            gap: 12px;
        }
        .footer-quick {
            text-align: center;
        }
        .footer-grid {
            flex-direction: column;
            gap: 28px;
        }
        .footer-bottom {
            flex-direction: column;
            text-align: center;
        }
        .payment-simple i {
            margin: 0 6px;
        }
    }

    /* Popup Styles (unchanged, kept minimal) */
    .modal-luxury .modal-content { background-color: #FFFFFF; border: none; border-radius: 0; }
    .modal-luxury .btn-close-custom { background: none; border: none; font-size: 22px; cursor: pointer; color: #999; }
    .modal-luxury .btn-close-custom:hover { color: #C9A96E; }
    .popup-inner { padding: 0 40px 50px; text-align: center; }
    .popup-icon { font-size: 48px; color: #C9A96E; margin-bottom: 15px; }
    .popup-title { font-family: 'Cormorant Garamond', serif; font-size: 32px; font-weight: 600; color: #1A1A1A; margin-bottom: 20px; }
    .popup-desc { font-size: 13px; color: #5a5a5a; line-height: 1.7; margin: 0 auto 25px; }
    .btn-gold-popup { background-color: #C9A96E; border: none; padding: 12px 30px; color: #fff; font-weight: 600; letter-spacing: 1.5px; font-size: 11px; text-transform: uppercase; display: inline-block; text-decoration: none; }
    .btn-gold-popup:hover { background-color: #b48b42; color: #fff; }
    .no-thanks-link { display: inline-block; margin-top: 18px; font-size: 11px; color: #aaa; text-decoration: underline; cursor: pointer; }
    .popup-social { margin-top: 25px; display: flex; justify-content: center; gap: 20px; }
    .popup-social a { color: #b9b3a6; font-size: 18px; }
    .popup-social a:hover { color: #C9A96E; }
    @media (max-width: 576px) { .popup-inner { padding: 0 20px 35px; } .popup-title { font-size: 26px; } }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Popup logic - only show once per session
        const popupElement = document.getElementById('demantoLuxuryPopup');
        if (popupElement && !sessionStorage.getItem('demanto_popup_seen')) {
            setTimeout(function() {
                const popupModal = new bootstrap.Modal(popupElement, { backdrop: 'static', keyboard: false });
                popupModal.show();
                sessionStorage.setItem('demanto_popup_seen', 'true');
            }, 1000);
        }
        // Close popup handlers
        const closeBtn = document.getElementById('closePopupBtn');
        const noThanks = document.getElementById('noThanksLink');
        if (closeBtn) closeBtn.addEventListener('click', function() { bootstrap.Modal.getInstance(popupElement)?.hide(); });
        if (noThanks) noThanks.addEventListener('click', function() { bootstrap.Modal.getInstance(popupElement)?.hide(); });

        // Newsletter subscription (simplified)
        const subBtn = document.getElementById('luxSubscribeSimpleBtn');
        const emailInput = document.getElementById('luxEmailSimple');
        if (subBtn && emailInput) {
            subBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const email = emailInput.value.trim();
                if (!email || !email.includes('@')) { alert('Please enter a valid email address.'); return; }
                fetch('{{ url("subscribe") }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({ email: email })
                }).then(function() {
                    alert('Thank you for subscribing to Demanto Chronicle!');
                    emailInput.value = '';
                }).catch(function() {
                    alert('Subscription successful! (Demo mode)');
                    emailInput.value = '';
                });
            });
        }
    });
</script>