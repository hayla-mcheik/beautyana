<!-- =========================================================
     SIMPLE FOOTER
========================================================= -->

<footer class="simple-footer">

    <div class="container">

        <div class="simple-footer-main">

            {{-- Brand --}}
            <div class="footer-brand-simple">

                <a href="{{ url('/') }}">
                    <img
                        src="{{ asset('assets/img/logo.png') }}"
                        alt="Beautyana"
                    >
                </a>

                <p>
                    Discover timeless beauty and elegant pieces
                    designed to complete your look.
                </p>

            </div>


            {{-- Quick Links --}}
            <div class="footer-links-simple">

                <h4>Quick Links</h4>

                <a href="{{ url('aboutus') }}">
                    About Us
                </a>

                <a href="{{ url('blogs') }}">
                    Blogs
                </a>

                <a href="{{ url('contactus') }}">
                    Contact Us
                </a>

            </div>


            {{-- Subscribe --}}
            <div class="footer-subscribe-simple">

                <h4>Subscribe</h4>

                <p>
                    Subscribe to receive our latest news and updates.
                </p>

                <form
                    action="{{ url('/subscribe') }}"
                    method="POST"
                    class="subscribe-simple"
                >

                    @csrf

                    <input
                        type="email"
                        name="email"
                        placeholder="Your email address"
                        required
                    >

                    <button type="submit">
                        Subscribe
                    </button>

                </form>

            </div>


            {{-- Social Media --}}
            <div class="footer-social-simple">

                <h4>Follow Us</h4>

                <div class="simple-social-icons">

                    {{-- Facebook --}}
                    @if(optional($appSetting)->facebook)

                        <a
                            href="{{ $appSetting->facebook }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook"
                        >
                            <i class="la la-facebook"></i>
                        </a>

                    @endif


                    {{-- TikTok --}}
                    @if(optional($appSetting)->youtube)

                        <a
                            href="{{ $appSetting->youtube }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="TikTok"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="15"
                                height="15"
                                fill="currentColor"
                                viewBox="0 0 16 16"
                            >

                                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>

                            </svg>

                        </a>

                    @endif


                    {{-- Instagram --}}
                    @if(optional($appSetting)->instagram)

                        <a
                            href="{{ $appSetting->instagram }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram"
                        >
                            <i class="la la-instagram"></i>
                        </a>

                    @endif

                </div>

            </div>

        </div>


        {{-- Bottom --}}
        <div class="simple-footer-bottom">

            <p>
                © {{ date('Y') }}
                {{ $appSetting->website_name ?? 'Beautyana' }}.
                All Rights Reserved.
            </p>

        </div>

    </div>

</footer>


<!-- =========================================================
     SIMPLE FOOTER CSS
========================================================= -->

<style>

.simple-footer {
    background: #fff;
    border-top: 1px solid #eeeeee;
    margin-top: 0;
}


/* Main */

.simple-footer-main {
    display: grid;

    grid-template-columns:
        1.3fr
        0.8fr
        1.5fr
        0.8fr;

    gap: 50px;

    padding: 55px 0 40px;
}


/* Brand */

.footer-brand-simple img {
    width: 105px;
    height: auto;
    margin-bottom: 15px;
}


.footer-brand-simple p {
    max-width: 260px;

    margin: 0;

    color: #888;

    font-size: 12px;

    line-height: 1.8;
}


/* Titles */

.footer-links-simple h4,
.footer-subscribe-simple h4,
.footer-social-simple h4 {
    margin: 0 0 18px;

    color: #222;

    font-size: 12px;

    font-weight: 600;

    text-transform: uppercase;

    letter-spacing: 1px;
}


/* Links */

.footer-links-simple a {
    display: block;

    margin-bottom: 10px;

    color: #777 !important;

    font-size: 12px !important;

    transition: 0.2s ease;
}


.footer-links-simple a:hover {
    color: #df9aa8 !important;
}


/* Subscribe */

.footer-subscribe-simple p {
    margin: 0 0 15px;

    color: #888;

    font-size: 12px;

    line-height: 1.6;
}


.subscribe-simple {
    display: flex;

    max-width: 360px;

    border-bottom: 1px solid #ddd;
}


.subscribe-simple input {
    width: 100%;

    border: 0 !important;

    outline: none;

    padding: 9px 0;

    background: transparent;

    color: #555;

    font-size: 11px;
}


.subscribe-simple input::placeholder {
    color: #aaa;
}


.subscribe-simple button {
    border: 0;

    background: transparent;

    color: #df9aa8;

    padding: 0 0 0 15px;

    font-size: 10px;

    font-weight: 600;

    text-transform: uppercase;

    letter-spacing: 0.8px;

    cursor: pointer;

    white-space: nowrap;
}


.subscribe-simple button:hover {
    color: #c87889;
}


/* Social */

.simple-social-icons {
    display: flex;

    gap: 8px;
}


.simple-social-icons a {
    display: flex;

    align-items: center;

    justify-content: center;

    width: 32px;

    height: 32px;

    border: 1px solid #e8e8e8;

    border-radius: 50%;

    color: #777;

    font-size: 13px;

    transition: all 0.25s ease;
}


.simple-social-icons a:hover {
    color: #fff;

    background: #df9aa8;

    border-color: #df9aa8;
}


/* Bottom */

.simple-footer-bottom {
    border-top: 1px solid #eeeeee;

    padding: 18px 0;

    text-align: center;
}


.simple-footer-bottom p {
    margin: 0;

    color: #aaa;

    font-size: 10px;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .simple-footer-main {
        grid-template-columns: 1fr 1fr;

        gap: 40px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 575px) {

    .simple-footer-main {
        display: grid;

        grid-template-columns: 1fr;

        gap: 30px;

        padding: 40px 20px 30px;
    }


    .footer-brand-simple p {
        max-width: 320px;
    }


    .subscribe-simple {
        max-width: 100%;
    }


    .simple-footer-bottom {
        padding: 15px 20px;
    }

}

</style>