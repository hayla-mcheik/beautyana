<!-- Signature Collections Section -->
<section class="signature-collections">

    <div class="container collections-container">

        <!-- TITLE – with animated dash -->
        <div class="collections-title">
            <span class="title-main">The Edit</span>
            <div class="title-accent">
                <span class="dash"></span>
            </div>
            <p class="sub-headline">curated for comfort</p>
        </div>

        {{-- ========================= COLLECTIONS ========================= --}}

        @if($collections->count())

            <div class="collections-slider-wrapper mt-0">

                <div class="swiper signature-slider collections-slider">

                    <div class="swiper-wrapper">

                        @foreach($collections as $categoryItem)

                            <div class="swiper-slide">

                                <a
                                    href="{{ url('/collections/'.$categoryItem->slug) }}"
                                    class="collection-card"
                                >

                                    <div class="collection-inner">

                                        <!-- Image – full bleed -->
                                        <div class="collection-image-wrap">
                                            <div class="collection-image">
                                                <img
                                                    src="{{ asset($categoryItem->image) }}"
                                                    width="400"
                                                    height="533"
                                                    loading="eager"
                                                    decoding="async"
                                                    alt="{{ $categoryItem->name }}"
                                                >
                                                <!-- Floating creative button – no overlay -->
                                                <div class="floating-cta">
                                                    <span class="plus-icon">+</span>
                                                    <span class="cta-label">Shop</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Footer – with animated underline -->
                                        <div class="card-footer">
                                            <h3>{{ $categoryItem->name }}</h3>
                                            <span class="view-indicator">explore →</span>
                                        </div>

                                    </div>

                                </a>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        @endif

    </div>

</section>


<style>
/* ==================================================
   CREATIVE, VIBRANT – NO DARK OVERLAY
   ================================================== */

@import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap');

.signature-collections {
    background: #f8f6f3;
    padding: 10px 0 10px;
    overflow: hidden;
}

/* ==================================================
   CONTAINER
   ================================================== */
.collections-container {
    padding-left: 40px;
    padding-right: 40px;
}

/* ==================================================
   TITLE – with moving dash
   ================================================== */
.collections-title {
    text-align: center;
    margin-bottom: 48px;
}

.collections-title .title-main {
    display: block;
  font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 40px;
    letter-spacing: 1px;
    color: #1c1a18;
    text-transform: uppercase;
}

.title-accent {
    display: flex;
    justify-content: center;
    margin-top: 6px;
}

.title-accent .dash {
    display: block;
    width: 60px;
    height: 3px;
    background: #d4b8a0;
    border-radius: 2px;
    position: relative;
    transition: width 0.4s ease;
}

.title-accent .dash::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 20%;
    background: #b3927a;
    border-radius: 2px;
    animation: dashMove 3s ease-in-out infinite;
}

@keyframes dashMove {
    0%, 100% { left: 0; }
    50% { left: 80%; }
}

.collections-title .sub-headline {
  font-family: 'Roboto', sans-serif;
    font-weight: 300;
    font-size: 11px;
    letter-spacing: 3px;
    text-transform: lowercase;
    color: #b09884;
    margin-top: 6px;
}

/* ==================================================
   SWIPER
   ================================================== */
.collections-slider-wrapper {
    position: relative;
    width: 100%;
    overflow: hidden;
}

.collections-slider {
    position: relative;
    width: 100%;
    overflow: hidden;
}
.collections-slider .swiper-wrapper {
    align-items: stretch;
}
.collections-slider .swiper-slide {
    height: auto;
    box-sizing: border-box;
}

/* ==================================================
   CARD – with gradient border animation
   ================================================== */
.collection-card {
    display: block;
    width: 100%;
    height: 100%;
    text-decoration: none;
}

.collection-inner {
    position: relative;
    width: 100%;
    height: 100%;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid transparent;
    background-clip: padding-box;
    transition: transform 0.4s ease, box-shadow 0.4s ease, border-color 0.4s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.02);
}

/* Gradient border on hover */
.collection-card:hover .collection-inner {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.08);
    border-color: #d4b8a0;
    background: linear-gradient(#ffffff, #ffffff) padding-box,
                linear-gradient(135deg, #d4b8a0, #f0d5c0, #d4b8a0) border-box;
    border-image: linear-gradient(135deg, #d4b8a0, #f0d5c0, #d4b8a0) 1;
}

/* Remove all pseudo decorations */
.collection-inner::before,
.collection-inner::after {
    display: none !important;
}

/* ==================================================
   IMAGE WRAP
   ================================================== */
.collection-image-wrap {
    width: 100%;
    background: #f3efea;
    overflow: hidden;
}

.collection-image {
    position: relative;
    width: 100%;
    aspect-ratio: 4 / 5;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    contain: layout paint;
    background: #f3efea;
}

/* ==================================================
   IMAGE – with soft glow shadow on hover
   ================================================== */
.collection-image img {
    display: block;
    opacity: 0;
    visibility: hidden;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: scale(1);
    transition: transform 0.6s ease, filter 0.6s ease;
    position: relative;
    z-index: 1;
}

.collection-image.loaded img {
    opacity: 1;
    visibility: visible;
}

.collection-card:hover .collection-image img {
    transform: scale(1.04);
    filter: drop-shadow(0 20px 30px rgba(180, 140, 120, 0.15));
}

/* ==================================================
   FLOATING CTA – bright, no overlay
   ================================================== */
.floating-cta {
    position: absolute;
    bottom: 20px;
    right: 20px;
    z-index: 3;
    display: flex;
    align-items: center;
    gap: 6px;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    padding: 8px 16px 8px 12px;
    border-radius: 40px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.3);
    transform: translateY(0) scale(1);
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                background 0.3s ease,
                box-shadow 0.3s ease;
    pointer-events: auto;
}

.floating-cta .plus-icon {
    font-size: 18px;
    font-weight: 300;
    color: #b3927a;
    transition: transform 0.4s ease, color 0.3s ease;
    line-height: 1;
}

.floating-cta .cta-label {
  font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 11px;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: #4a413b;
    opacity: 0;
    max-width: 0;
    overflow: hidden;
    white-space: nowrap;
    transition: opacity 0.3s ease, max-width 0.4s ease;
}

.collection-card:hover .floating-cta {
    transform: translateY(-4px) scale(1.02);
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 8px 24px rgba(180, 140, 120, 0.15);
}

.collection-card:hover .floating-cta .cta-label {
    opacity: 1;
    max-width: 60px;
}

.collection-card:hover .floating-cta .plus-icon {
    transform: rotate(90deg);
    color: #b3927a;
}

/* ==================================================
   CARD FOOTER – with sliding underline
   ================================================== */
.card-footer {
    padding: 14px 16px 12px 16px;
    text-align: left;
    background: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #f0ebe6;
    transition: border-color 0.3s ease;
}

.collection-card:hover .card-footer {
    border-top-color: #d4b8a0;
}

.card-footer h3 {
  font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 18px;
    letter-spacing: 0.3px;
    color: #1c1a18;
    text-transform: capitalize;
    margin: 0;
    line-height: 1.2;
    position: relative;
}

/* Underline that slides from left */
.card-footer h3::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: #d4b8a0;
    transition: width 0.4s ease;
}

.collection-card:hover .card-footer h3::after {
    width: 100%;
}

.card-footer .view-indicator {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 10px;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: #b8a894;
    transition: color 0.3s ease, transform 0.3s ease;
}

.collection-card:hover .view-indicator {
    color: #b3927a;
    transform: translateX(4px);
}

/* ==================================================
   LEGACY – hidden
   ================================================== */
.discover-link,
.explore-link {
    display: none;
}

/* ==================================================
   TABLET
   ================================================== */
@media (max-width: 991px) {
    .collections-container {
        padding-left: 25px;
        padding-right: 25px;
    }
    .collections-title .title-main {
        font-size: 32px;
    }
    .card-footer h3 {
        font-size: 16px;
    }
    .floating-cta {
        padding: 6px 14px 6px 10px;
        bottom: 14px;
        right: 14px;
    }
    .floating-cta .plus-icon {
        font-size: 16px;
    }
}

/* ==================================================
   MOBILE
   ================================================== */
@media (max-width: 767px) {
    .signature-collections {
        padding: 10px 0 10px;
    }
    .collections-container {
        padding-left: 15px;
        padding-right: 15px;
    }
    .collections-title {
        margin-bottom: 32px;
    }
    .collections-title .title-main {
        font-size: 26px;
    }
    .title-accent .dash {
        width: 40px;
    }
    .collections-title .sub-headline {
        font-size: 9px;
        letter-spacing: 2px;
    }
    .collection-image {
        aspect-ratio: 4 / 5;
    }
    .floating-cta {
        padding: 4px 12px 4px 8px;
        bottom: 10px;
        right: 10px;
        border-radius: 30px;
    }
    .floating-cta .plus-icon {
        font-size: 14px;
    }
    .floating-cta .cta-label {
        font-size: 9px;
    }
    .card-footer {
        padding: 10px 12px 10px 12px;
    }
    .card-footer h3 {
        font-size: 14px;
    }
    .card-footer .view-indicator {
        font-size: 9px;
    }
}

/* ==================================================
   SMALL MOBILE
   ================================================== */
@media (max-width: 400px) {
    .collections-container {
        padding-left: 10px;
        padding-right: 10px;
    }
    .card-footer h3 {
        font-size: 12px;
    }
}
</style>