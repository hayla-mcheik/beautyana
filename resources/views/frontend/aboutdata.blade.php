<section class="beautyana-about">

    <div class="about-inner">

        @if($about)

            <!-- Small editorial label -->
            <div class="about-kicker">
                <div class="about-kicker-line"></div>
                <span>The House of Beautyana</span>
            </div>


            <div class="about-grid">

                <!-- LEFT -->
                <div class="about-left">

                    <h1 class="about-heading">
                        Fashion
                        <em>that feels</em>
                        like you.
                    </h1>

                    <div class="about-number">
                        About Beautyana
                    </div>

                </div>


                <!-- RIGHT -->
                <div class="about-content">

                    @if($about->title)
                        <h2 class="about-content-title">
                            {{ $about->title }}
                        </h2>
                    @endif

                    <div class="about-description">
                        {!! nl2br(e($about->description)) !!}
                    </div>


                    <!-- Signature -->
                    <div class="about-signature">

                        <div class="signature-brand">

                            <div>
                                <div class="signature-name">
                                    Beautyana
                                </div>

                                <div class="signature-caption">
                                    Fashion & Lifestyle
                                </div>
                            </div>

                        </div>

                        <div class="about-established">
                            Style · Confidence · Comfort
                        </div>

                    </div>

                </div>

            </div>


            <!-- Decorative botanical element -->
            <div class="about-decoration">

                <svg viewBox="0 0 200 200" fill="none">

                    <path
                        d="M20 180C55 145 90 110 178 20"
                        stroke="#b95c19"
                        stroke-width="1"
                    />

                    <path
                        d="M55 145C45 125 48 105 65 92"
                        stroke="#b95c19"
                        stroke-width="1"
                    />

                    <path
                        d="M80 120C75 95 85 76 106 65"
                        stroke="#b95c19"
                        stroke-width="1"
                    />

                    <path
                        d="M108 92C105 67 118 48 140 40"
                        stroke="#b95c19"
                        stroke-width="1"
                    />

                    <path
                        d="M42 158C65 158 80 147 88 130"
                        stroke="#b95c19"
                        stroke-width="1"
                    />

                </svg>

            </div>

        @else

            <div class="text-center py-5">
                <p>
                    About Us content is currently being updated.
                </p>
            </div>

        @endif

    </div>

</section>
<style>
    /* ============================================================
       BEAUTYANA - ABOUT US / EDITORIAL DESIGN
    ============================================================ */

    .beautyana-about {
        position: relative;
        width: 100%;
        overflow: hidden;
        background: #fff;
        color: #171717;
        padding: 90px 0 100px;
    }

    /* Soft background decoration */
    .beautyana-about::before {
        content: "BEAUTYANA";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: 'Playfair Display', serif;
        font-size: clamp(90px, 15vw, 240px);
        font-weight: 600;
        letter-spacing: -8px;
        color: rgba(185, 92, 25, 0.035);
        white-space: nowrap;
        pointer-events: none;
        z-index: 0;
    }

    .beautyana-about::after {
        content: "";
        position: absolute;
        width: 420px;
        height: 420px;
        right: -180px;
        top: -160px;
        border: 1px solid rgba(185, 92, 25, 0.12);
        border-radius: 50%;
        pointer-events: none;
    }

    .about-inner {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 35px;
    }

    /* Top label */
    .about-kicker {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 25px;
    }

    .about-kicker-line {
        width: 42px;
        height: 1px;
        background: #b95c19;
    }

    .about-kicker span {
        font-family: 'Montserrat', sans-serif;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #b95c19;
    }

    /* Main grid */
    .about-grid {
        display: grid;
        grid-template-columns: 0.85fr 1.5fr;
        gap: 90px;
        align-items: start;
    }

    /* Left side */
    .about-heading {
        margin: 0;
        font-family: 'Playfair Display', serif;
        font-size: clamp(42px, 5vw, 68px);
        line-height: 1.05;
        font-weight: 500;
        color: #171717;
        letter-spacing: -1.5px;
    }

    .about-heading em {
        display: block;
        color: #b95c19;
        font-style: italic;
        font-weight: 400;
    }

    .about-number {
        margin-top: 45px;
        display: flex;
        align-items: center;
        gap: 15px;
        font-family: 'Montserrat', sans-serif;
        font-size: 10px;
        letter-spacing: 3px;
        color: #999;
        text-transform: uppercase;
    }

    .about-number::before {
        content: "";
        width: 30px;
        height: 1px;
        background: #d9d9d9;
    }

    /* Right content */
    .about-content {
        padding-top: 8px;
    }

    .about-content-title {
        margin: 0 0 28px;
        font-family: 'Playfair Display', serif;
        font-size: 27px;
        line-height: 1.4;
        font-weight: 500;
        color: #222;
    }

    .about-description {
        margin: 0;
        font-family: 'Montserrat', sans-serif;
        font-size: 13px;
        line-height: 2;
        font-weight: 400;
        letter-spacing: 0.2px;
        color: #686868;
        max-width: 720px;
    }

    .about-description p {
        margin-bottom: 15px;
    }

    /* Bottom brand signature */
    .about-signature {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 60px;
        padding-top: 25px;
        border-top: 1px solid #eeeeee;
        max-width: 720px;
    }

    .signature-brand {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .signature-logo {
        width: 48px;
        height: auto;
        opacity: 0.9;
    }

    .signature-name {
        font-family: 'Playfair Display', serif;
        font-size: 18px;
        font-style: italic;
        color: #222;
    }

    .signature-caption {
        font-family: 'Montserrat', sans-serif;
        font-size: 8px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #999;
    }

    .about-established {
        font-family: 'Montserrat', sans-serif;
        font-size: 9px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #aaa;
        text-align: right;
    }

    /* Decorative botanical lines */
    .about-decoration {
        position: absolute;
        right: 40px;
        bottom: 20px;
        width: 180px;
        height: 180px;
        opacity: 0.12;
        pointer-events: none;
    }

    .about-decoration svg {
        width: 100%;
        height: 100%;
    }


    /* ============================================================
       TABLET
    ============================================================ */

    @media (max-width: 991px) {

        .beautyana-about {
            padding: 70px 0 80px;
        }

        .about-grid {
            grid-template-columns: 1fr;
            gap: 45px;
        }

        .about-heading {
            max-width: 600px;
        }

        .about-number {
            margin-top: 25px;
        }

        .about-content {
            padding-top: 0;
        }
    }


    /* ============================================================
       MOBILE
    ============================================================ */

    @media (max-width: 576px) {

        .beautyana-about {
            padding: 55px 0 65px;
        }

        .about-inner {
            padding: 0 22px;
        }

        .about-kicker {
            margin-bottom: 20px;
        }

        .about-kicker span {
            font-size: 8px;
            letter-spacing: 3px;
        }

        .about-kicker-line {
            width: 30px;
        }

        .about-grid {
            gap: 35px;
        }

        .about-heading {
            font-size: 42px;
            line-height: 1.08;
        }

        .about-content-title {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .about-description {
            font-size: 12px;
            line-height: 1.9;
        }

        .about-signature {
            margin-top: 40px;
            align-items: flex-start;
            gap: 20px;
        }

        .about-established {
            font-size: 8px;
        }

        .about-decoration {
            right: -50px;
            bottom: 0;
            width: 150px;
            height: 150px;
        }

        .beautyana-about::before {
            font-size: 70px;
            letter-spacing: -4px;
        }
    }
</style>
