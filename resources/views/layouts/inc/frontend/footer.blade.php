{{-- resources/views/layouts/inc/frontend/footer.blade.php --}}

<footer class="demanto-footer">

    <div class="footer-container">

        {{-- MAIN FOOTER ROW --}}
        <div class="footer-main-row">

            {{-- COLUMN 1: LOGO & TAGLINE --}}
            <div class="footer-brand">

                <a href="{{ url('/') }}" class="footer-logo-link">
 @if(!empty($appSetting?->logo))

    <img
        class="footer-logo"
        src="{{ asset($appSetting->logo) }}"
        alt="{{ $appSetting->website_name ?? 'DEMANTO' }}">

@else

    <img
        class="footer-logo"
        src="{{ asset('assets/img/logogold.png') }}"
        alt="{{ $appSetting->website_name ?? 'DEMANTO' }}">

@endif
                </a>


{{-- Social Icons --}}
<div class="footer-social">

    {{-- Facebook --}}
    @if($appSetting->facebook)
        <a href="{{ $appSetting->facebook }}"
           target="_blank"
           rel="noopener noreferrer"
           class="social-icon"
           aria-label="Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
    @endif

    {{-- Instagram --}}
    @if($appSetting->instagram)
        <a href="{{ $appSetting->instagram }}"
           target="_blank"
           rel="noopener noreferrer"
           class="social-icon"
           aria-label="Instagram">
            <i class="fab fa-instagram"></i>
        </a>
    @endif

    {{-- Snapchat --}}
    @if($appSetting->youtube)
        <a href="{{ $appSetting->youtube }}"
           target="_blank"
           rel="noopener noreferrer"
           class="social-icon"
           aria-label="Snapchat">
            <i class="fa-brands fa-snapchat"></i>
        </a>
    @endif

    {{-- TikTok --}}
    @if($appSetting->twitter)
        <a href="{{ $appSetting->twitter }}"
           target="_blank"
           rel="noopener noreferrer"
           class="social-icon"
           aria-label="TikTok">
            <i class="fab fa-tiktok"></i>
        </a>
    @endif

</div>

            </div>

            {{-- COLUMN 2: NAVIGATION --}}
            <nav class="footer-nav">
                <h4 class="footer-nav-title">Quick Links</h4>
                <ul class="footer-nav-list">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/aboutus') }}">About</a></li>
                    <li><a href="{{ url('/contactus') }}">Contact</a></li>
                    <li><a href="{{ url('/categories') }}">Categories</a></li>
                </ul>
            </nav>

            {{-- COLUMN 3: CONTACT & NEWSLETTER --}}
            <div class="footer-contact-wrapper">

                {{-- Contact Info --}}
                <a
                    href="https://www.google.com/maps/search/?api=1&query={{ urlencode(optional($appSetting)->address ?? 'Beirut, Lebanon') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="footer-contact-item"
                >
                    <div class="footer-contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="footer-contact-content">
                        <span class="footer-contact-label">Location</span>
                        <span class="footer-contact-value">
                            {{ optional($appSetting)->address ?? 'Beirut, Lebanon' }}
                        </span>
                    </div>
                </a>

                <a
                    href="tel:{{ preg_replace('/[^0-9+]/', '', optional($appSetting)->phone1 ?? '+96100000000') }}"
                    class="footer-contact-item"
                >
                    <div class="footer-contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="footer-contact-content">
                        <span class="footer-contact-label">Phone</span>
                        <span class="footer-contact-value">
                            {{ optional($appSetting)->phone1 ?? '+961 00 000 000' }}
                        </span>
                    </div>
                </a>

         

            </div>

        </div>

 

    </div>

    {{-- BACK TO TOP --}}
    <button class="back-to-top" aria-label="Back to top">
        <i class="fas fa-chevron-up"></i>
    </button>

</footer>


<style>
/* =====================================================
   PREMIUM FOOTER – ENHANCED
===================================================== */

@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Montserrat:wght@300;400;500;600&display=swap');

.demanto-footer a,
.demanto-footer span,
.demanto-footer li,
.demanto-footer p,
.demanto-footer input,
.demanto-footer button {
    font-family: 'Montserrat', sans-serif;
}

.demanto-footer {
    background: #fff;
    color: #000;
    padding: 50px 0 20px;
    border-top: 1px solid rgba(201, 169, 110, 0.2);
    font-family: 'Montserrat', sans-serif;
    position: relative;
    overflow: hidden;
}

/* subtle texture overlay */
.demanto-footer::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 20% 30%, rgba(201, 169, 110, 0.03), transparent 50%);
    pointer-events: none;
}

.footer-container {
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 32px;
    position: relative;
    z-index: 1;
}

/* =====================================================
   MAIN ROW – 3‑COLUMN GRID
===================================================== */

.footer-main-row {
    display: grid;
    grid-template-columns: 1.2fr 1fr 1.4fr;
    gap: 40px;
    padding-bottom: 35px;
    border-bottom: 1px solid rgba(201, 169, 110, 0.15);
    align-items: start;
}

/* =====================================================
   COLUMN 1 – LOGO + SOCIAL
===================================================== */

.footer-brand {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.footer-logo-link {
    display: inline-block;
}

.footer-logo {
    display: block;
    width: auto;
    height: 64px;
    transition: opacity 0.3s ease;
}

.footer-logo:hover {
    opacity: 0.85;
}

.brand-tagline {
    font-family: 'Montserrat', sans-serif;
    margin-top: 12px;
    color: #000;
    font-size: 13px;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    font-weight: 300;
}

/* Social Icons */
.footer-social {
    display: flex;
    gap: 14px;
    margin-top: 20px;
}

.social-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 1px solid rgba(201, 169, 110, 0.3);
    color: #000;
    font-size: 16px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-icon:hover {
    background: #000;
    border-color: #000;
    color: #fff;
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(201, 169, 110, 0.15);
}

/* =====================================================
   COLUMN 2 – NAVIGATION
===================================================== */

.footer-nav {
    justify-self: center;
}

.footer-nav-title {
    font-family: 'Cormorant Garamond', serif;
    font-weight: 400;
    font-size: 16px;
    color: #000;
    margin: 0 0 14px 0;
    text-transform: capitalize;
    border-bottom: 1px solid rgba(201, 169, 110, 0.15);
    padding-bottom: 8px;
    display: inline-block;
}

.footer-nav-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.footer-nav-list li a {
    font-family: 'Montserrat', sans-serif;
    color: #000;
    text-decoration: none;
    font-size: 15px;
    font-weight: 400;
    letter-spacing: 0.3px;
    transition: color 0.3s ease, padding-left 0.3s ease;
    display: inline-block;
    position: relative;
}

.footer-nav-list li a::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 1.5px;
    background: #000E;
    transition: width 0.3s ease;
}

.footer-nav-list li a:hover {
    color: #000E;
    padding-left: 6px;
}

.footer-nav-list li a:hover::after {
    width: 100%;
}

/* =====================================================
   COLUMN 3 – CONTACT + NEWSLETTER
===================================================== */

.footer-contact-wrapper {
    display: flex;
    flex-direction: column;
    gap: 18px;
    align-items: flex-start;
    width: 100%;
}

.footer-contact-item {
    display: flex;
    align-items: center;
    gap: 14px;
    color: #D4CFC4;
    text-decoration: none;
    transition: transform 0.3s ease, color 0.3s ease;
    width: 100%;
}

.footer-contact-item:hover {
    transform: translateY(-2px);
    text-decoration: none;
}

.footer-contact-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid rgba(201, 169, 110, 0.4);
    border-radius: 50%;
    color: #000;
    font-size: 15px;
    transition: all 0.3s ease;
}


.footer-contact-content {
    display: flex;
    flex-direction: column;
    gap: 2px;
    flex: 1;
}

.footer-contact-label {
    font-family: 'Montserrat', sans-serif;
    color: black;
    font-size: 14px;
    font-weight: 400;
    text-transform: capitalize;
}

.footer-contact-value {
    color: #000;
font-family: "Montserrat", sans-serif;
    font-size: 16px;
    font-weight: 400;
}

/* =====================================================
   NEWSLETTER
===================================================== */

.footer-newsletter {
    width: 100%;
    margin-top: 6px;
}

.newsletter-label {
    font-family: 'Montserrat', sans-serif;
    display: block;
    color: #C9A96E;
    font-size: 12px;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 8px;
    font-weight: 400;
}

.newsletter-form {
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(201, 169, 110, 0.2);
    border-radius: 30px;
    overflow: hidden;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    max-width: 320px;
}

.newsletter-form:focus-within {
    border-color: #C9A96E;
    box-shadow: 0 0 0 3px rgba(201, 169, 110, 0.1);
}

.newsletter-form input {
    flex: 1;
    background: transparent;
    border: none;
    padding: 12px 18px;
    color: #D4CFC4;
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    outline: none;
    min-width: 0;
}

.newsletter-form input::placeholder {
    color: #8A857C;
    font-weight: 300;
}

.newsletter-form button {
    background: transparent;
    border: none;
    color: #C9A96E;
    padding: 12px 18px;
    cursor: pointer;
    font-size: 16px;
    transition: all 0.3s ease;
}

.newsletter-form button:hover {
    color: #FFFFFF;
    transform: translateX(3px);
}

/* =====================================================
   COPYRIGHT & LEGAL
===================================================== */

.footer-bottom {
    font-family: 'Montserrat', sans-serif;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 20px;
    color: #8A857C;
    font-size: 12px;
    letter-spacing: 0.3px;
    flex-wrap: wrap;
    gap: 8px;
}

.footer-legal {
    display: flex;
    align-items: center;
    gap: 6px;
}

.footer-legal a {
    font-family: 'Montserrat', sans-serif;
    color: #8A857C;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-legal a:hover {
    color: #D4CFC4;
}

.footer-legal .dot {
    color: #4A4540;
}

/* =====================================================
   BACK TO TOP
===================================================== */

.back-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(201, 169, 110, 0.1);
    border: 1px solid rgba(201, 169, 110, 0.3);
    color: #C9A96E;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    z-index: 999;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
}

.back-to-top.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.back-to-top:hover {
    background: #C9A96E;
    border-color: #C9A96E;
    color: #0C0B0A;
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(201, 169, 110, 0.2);
}

/* =====================================================
   RESPONSIVE
===================================================== */

/* =====================================================
   RESPONSIVE FOOTER
===================================================== */

/* -------------------------
   TABLET
------------------------- */
@media (max-width: 1100px) {

    .footer-container {
        padding: 0 28px;
    }

    .footer-main-row {
        grid-template-columns: 1fr 1fr;
        gap: 35px;
    }

    .footer-contact-wrapper {
        grid-column: 1 / -1;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
    }

    .footer-newsletter {
        width: 100%;
        max-width: 100%;
    }

    .newsletter-form {
        width: 100%;
        max-width: 100%;
    }
}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 768px) {

    .demanto-footer {
        padding: 40px 0 20px;
    }

    .footer-container {
        width: 100%;
        padding: 0 20px;
    }

    /* One clean column */
    .footer-main-row {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        gap: 32px;
        width: 100%;
        text-align: center;
    }


    /* =========================
       BRAND
    ========================= */

    .footer-brand {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .footer-logo-link {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .footer-logo {
        width: auto;
        max-width: 150px;
        height: 55px;
        object-fit: contain;
    }

    .brand-tagline {
        margin-top: 10px;
        font-size: 10px;
        letter-spacing: 2px;
        line-height: 1.5;
        text-align: center;
    }

    .footer-social {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        margin-top: 18px;
    }

    .social-icon {
        width: 38px;
        height: 38px;
        font-size: 14px;
    }


    /* =========================
       QUICK LINKS
    ========================= */

    .footer-nav {
        width: 100%;
        justify-self: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .footer-nav-title {
        font-family: 'Cormorant Garamond', serif;
        margin-bottom: 16px;
        font-size: 20px;
        text-align: center;
    }

    .footer-nav-list {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 9px;
        width: 100%;
        padding: 0;
        margin: 0;
    }

    .footer-nav-list li {
        width: auto;
        text-align: center;
    }

    .footer-nav-list li a {
        display: inline-block;
        font-size: 14px;
        line-height: 1.5;
        text-align: center;
    }


    /* =========================
       CONTACT
    ========================= */

    .footer-contact-wrapper {
        width: 100%;
        max-width: 420px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 16px;
        text-align: left;
    }

    .footer-contact-item {
        width: 100%;
        max-width: 380px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 13px;
        margin: 0 auto;
        padding: 0;
        text-align: left;
    }

    .footer-contact-icon {
        width: 40px;
        height: 40px;
        min-width: 40px;
        flex-shrink: 0;
        font-size: 14px;
    }

    .footer-contact-content {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        gap: 2px;
        text-align: left;
    }

    .footer-contact-label {
        font-size: 14px;
        font-weight: 400;
        text-transform: capitalize;
    }

    .footer-contact-value {
        color: #000 !important;
font-family: "Montserrat", sans-serif;
        font-size: 16px;
        font-weight: 400;
        word-break: break-word;
        overflow-wrap: anywhere;
    }

    /* Don't turn contact text white on hover */
    .footer-contact-item:hover {
        color: #000;
        transform: translateY(-1px);
    }




    /* =========================
       NEWSLETTER
    ========================= */

    .footer-newsletter {
        width: 100%;
        max-width: 380px;
        margin: 0 auto;
    }

    .newsletter-label {
        text-align: center;
        font-size: 10px;
        letter-spacing: 1.7px;
    }

    .newsletter-form {
        width: 100%;
        max-width: 380px;
        margin: 0 auto;
    }

    .newsletter-form input {
        min-width: 0;
        font-size: 13px;
    }


    /* =========================
       FOOTER BOTTOM
    ========================= */

    .footer-bottom {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding-top: 18px;
        text-align: center;
        font-size: 11px;
    }

    .footer-legal {
        justify-content: center;
        text-align: center;
        flex-wrap: wrap;
    }


    /* =========================
       BACK TO TOP
    ========================= */

    .back-to-top {
        width: 42px;
        height: 42px;
        right: 15px;
        bottom: 15px;
        font-size: 14px;
    }
}


/* =====================================================
   SMALL MOBILE
===================================================== */

@media (max-width: 480px) {

    .demanto-footer {
        padding: 35px 0 18px;
    }

    .footer-container {
        padding-left: 15px;
        padding-right: 15px;
    }

    .footer-main-row {
        gap: 28px;
    }

    .footer-logo {
        max-width: 135px;
        height: 50px;
    }

    .footer-social {
        gap: 10px;
        margin-top: 16px;
    }

    .social-icon {
        width: 36px;
        height: 36px;
        font-size: 13px;
    }

    .footer-nav-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 16px;
        margin-bottom: 13px;
    }

    .footer-nav-list {
        gap: 8px;
    }

    .footer-nav-list li a {
        font-size: 13px;
    }

    .footer-contact-wrapper {
        max-width: 100%;
        gap: 14px;
    }

    .footer-contact-item {
        max-width: 100%;
        gap: 11px;
    }

    .footer-contact-icon {
        width: 38px;
        height: 38px;
        min-width: 38px;
        font-size: 13px;
    }

    .footer-contact-label {
        font-size: 14px;
    }

    .footer-contact-value {
        font-size: 16px;
    }

    .newsletter-form input {
        padding: 11px 14px;
        font-size: 12px;
    }

    .newsletter-form button {
        padding: 11px 14px;
    }
}


/* =====================================================
   VERY SMALL PHONES
===================================================== */

@media (max-width: 360px) {

    .footer-container {
        padding-left: 12px;
        padding-right: 12px;
    }

    .footer-main-row {
        gap: 25px;
    }

    .footer-logo {
        max-width: 120px;
        height: 45px;
    }

    .footer-contact-item {
        gap: 9px;
    }

    .footer-contact-icon {
        width: 35px;
        height: 35px;
        min-width: 35px;
    }

    .footer-contact-value {
        font-size: 16px;
    }

    .footer-nav-list li a {
        font-size: 12px;
    }
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function() {

    // =============================================
    // BACK TO TOP BUTTON
    // =============================================
    const backToTop = document.querySelector('.back-to-top');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 400) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    });

    backToTop.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // =============================================
    // NEWSLETTER FORM (demo – prevent default)
    // =============================================
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const input = this.querySelector('input');
            if (input.value.trim() !== '') {
                alert('Thank you for subscribing! (demo)');
                input.value = '';
            }
        });
    }

});
</script>