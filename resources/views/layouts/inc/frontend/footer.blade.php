{{-- resources/views/layouts/inc/frontend/footer.blade.php --}}

<footer class="demanto-footer">

    <div class="footer-container">

        {{-- MAIN FOOTER ROW --}}
        <div class="footer-main-row">

            {{-- LOGO --}}
            <div class="footer-brand">

                <a href="{{ url('/') }}" class="footer-logo-link">

                    <img
                        class="footer-logo"
                        src="{{ asset('assets/img/logogold.png') }}"
                        alt="Demanto"
                    >

                </a>

                <div class="brand-tagline">
                    TIMELESS LUXURY BY DEMANTO
                </div>

            </div>


            {{-- LOCATION --}}
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

                    <span class="footer-contact-label">
                        LOCATION
                    </span>

                    <span class="footer-contact-value">
                        {{ optional($appSetting)->address ?? 'Beirut, Lebanon' }}
                    </span>

                </div>

            </a>


            {{-- PHONE --}}
            <a
                href="tel:{{ preg_replace('/[^0-9+]/', '', optional($appSetting)->phone1 ?? '+96100000000') }}"
                class="footer-contact-item"
            >

                <div class="footer-contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>

                <div class="footer-contact-content">

                    <span class="footer-contact-label">
                        PHONE
                    </span>

                    <span class="footer-contact-value">
                        {{ optional($appSetting)->phone1 ?? '+961 00 000 000' }}
                    </span>

                </div>

            </a>


            {{-- QUOTE --}}
            <div class="footer-quick">

                <span class="quick-quote">
                    “Where Diamonds Become Art.”
                </span>

                <span class="quick-since">
                    since 1991
                </span>

            </div>

        </div>


        {{-- COPYRIGHT --}}
        <div class="footer-bottom">

            <span>
                © {{ date('Y') }} DEMANTO · All rights reserved.
            </span>

        </div>

    </div>

</footer>


<style>

/* =====================================================
   FOOTER
===================================================== */

.demanto-footer {
    background-color: #0C0B0A;
    color: #D4CFC4;

    padding: 35px 0 22px;

    border-top: 1px solid rgba(201, 169, 110, 0.25);

    font-family: 'Montserrat', sans-serif;
}


.footer-container {
    width: 100%;

    max-width: 1400px;

    margin: 0 auto;

    padding: 0 32px;
}


/* =====================================================
   MAIN ROW
===================================================== */

.footer-main-row {
    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 35px;

    padding-bottom: 28px;

    border-bottom: 1px solid rgba(201, 169, 110, 0.2);
}


/* =====================================================
   LOGO
===================================================== */

.footer-brand {
    display: flex;

    flex-direction: column;

    align-items: flex-start;

    flex-shrink: 0;
}


.footer-logo-link {
    display: inline-block;
}


.footer-logo {
    display: block;

    width: auto;

    height: 38px;
}


.brand-tagline {
    margin-top: 8px;

    color: #C9A96E;

    font-size: 12px;

    letter-spacing: 2.5px;

    white-space: nowrap;

    text-transform: uppercase;
}


/* =====================================================
   CONTACT ITEMS
===================================================== */

.footer-contact-item {
    display: flex;

    align-items: center;

    gap: 13px;

    color: #D4CFC4;

    text-decoration: none;

    min-width: 190px;

    transition:
        transform 0.3s ease,
        color 0.3s ease;
}


.footer-contact-item:hover {
    transform: translateY(-3px);

    color: #FFFFFF;

    text-decoration: none;
}


/* =====================================================
   CONTACT ICON
===================================================== */

.footer-contact-icon {
    width: 40px;

    height: 40px;

    flex-shrink: 0;

    display: flex;

    justify-content: center;

    align-items: center;

    border: 1px solid rgba(201, 169, 110, 0.5);

    border-radius: 50%;

    color: #C9A96E;

    font-size: 14px;

    transition:
        background-color 0.3s ease,
        border-color 0.3s ease,
        color 0.3s ease;
}


.footer-contact-item:hover .footer-contact-icon {
    background-color: #C9A96E;

    border-color: #C9A96E;

    color: #0C0B0A;
}


/* =====================================================
   CONTACT CONTENT
===================================================== */

.footer-contact-content {
    display: flex;

    flex-direction: column;

    gap: 4px;
}


.footer-contact-label {
    color: #C9A96E;

    font-size: 12px;

    font-weight: 500;

    letter-spacing: 2px;
}


.footer-contact-value {
    color: #D4CFC4;

    font-family: "Cormorant Garamond", serif;

    font-size: 15px;

    line-height: 1.3;
}


.footer-contact-item:hover .footer-contact-value {
    color: #FFFFFF;
}


/* =====================================================
   QUOTE
===================================================== */

.footer-quick {
    flex-shrink: 0;

    text-align: right;
}


.quick-quote {
    display: block;

    color: #E4D9C8;

    font-family: 'Cormorant Garamond', serif;

    font-size: 16px;

    font-style: italic;

    white-space: nowrap;
}


.quick-since {
    display: block;

    margin-top: 4px;

    color: #8A857C;

    font-size: 12px;

    letter-spacing: 1px;
}


/* =====================================================
   COPYRIGHT
===================================================== */

.footer-bottom {
    display: flex;

    justify-content: center;

    align-items: center;

    padding-top: 20px;

    color: #99928A;

    text-align: center;

    font-size: 12px;
}


/* =====================================================
   TABLET
===================================================== */

@media (max-width: 1100px) {

    .footer-main-row {
        gap: 20px;
    }


    .footer-contact-item {
        min-width: 170px;
    }


    .footer-contact-icon {
        width: 36px;

        height: 36px;
    }


    .footer-contact-value {
        font-size: 13px;
    }


    .quick-quote {
        font-size: 14px;
    }

}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 768px) {

    .demanto-footer {
        padding: 30px 0 20px;
    }


    .footer-container {
        padding: 0 20px;
    }


    .footer-main-row {
        flex-direction: column;

        align-items: center;

        justify-content: center;

        gap: 24px;

        padding-bottom: 25px;
    }


    .footer-brand {
        align-items: center;

        text-align: center;
    }


    .footer-contact-item {
        width: 100%;

        max-width: 330px;

        min-width: 0;

        justify-content: flex-start;
    }


    .footer-quick {
        text-align: center;
    }


    .quick-quote {
        white-space: normal;
    }

}


/* =====================================================
   SMALL MOBILE
===================================================== */

@media (max-width: 420px) {

    .footer-container {
        padding: 0 16px;
    }


    .footer-logo {
        height: 34px;
    }


    .brand-tagline {
        font-size: 8px;

        letter-spacing: 2px;
    }


    .footer-contact-item {
        max-width: 100%;
    }


    .footer-contact-icon {
        width: 38px;

        height: 38px;
    }


    .footer-contact-value {
        font-size: 14px;

        overflow-wrap: anywhere;
    }


    .quick-quote {
        font-size: 15px;
    }

}

</style>