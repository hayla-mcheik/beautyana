<div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Roboto:wght@300;400;500;700&display=swap');

    :root {
        --demanto-gold: #B39256;
        --demanto-gold-light: #F7F4EB;
        --demanto-dark: #232323;
        --demanto-bg: #FDFBF7;
        --demanto-muted: #6E6E6E;
        --luxury-border: rgba(179, 146, 86, 0.25);
        --transition-smooth: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        --box-shadow-luxury: 0 25px 45px rgba(179, 146, 86, 0.1);
    }

    body {
        background-color: var(--demanto-bg);
        font-family:"Cormorant Garamond",serif;
    }

    /* Product Area */
    .product-area {
        background: linear-gradient(135deg, #FDFBF7 0%, #fff 100%);
        position: relative;
        overflow: hidden;
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

    .product-area::after {
        content: '✧';
        position: absolute;
        bottom: 30px;
        left: 30px;
        font-size: 60px;
        color: var(--demanto-gold);
        opacity: 0.03;
        font-family: serif;
        pointer-events: none;
    }

    /* Sidebar Styles - Desktop */
    .shop-sidebar-wrapper {
        background: #fff;
        border-radius: 20px;
        border: 1px solid var(--luxury-border);
        padding: 15px;
        position: sticky;
        top: 100px;
    }

    /* Mobile Categories Section - Above Products */
    .mobile-categories-section {
        display: none;
        background: #fff;
        border-radius: 20px;
        border: 1px solid var(--luxury-border);
        padding: 15px;
        margin-bottom: 20px;
    }

    .mobile-categories-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        padding: 5px 0;
    }

    .mobile-categories-header h4 {
      font-family:"Cormorant Garamond",serif;
        font-size: 14px;
        font-weight: 600;
        color: var(--demanto-dark);
        margin: 0;
        letter-spacing: 1px;
    }

    .mobile-categories-header i {
        color: var(--demanto-gold);
        font-size: 14px;
        transition: transform 0.3s ease;
    }

    .mobile-categories-header.active i {
        transform: rotate(180deg);
    }

    .mobile-categories-list {
        display: none;
        margin-top: 15px;
        padding-top: 10px;
        border-top: 1px solid var(--luxury-border);
    }

    .mobile-categories-list.show {
        display: block;
    }

    .mobile-categories-list ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mobile-categories-list ul li {
        margin-bottom: 8px;
    }

    .mobile-categories-list ul li a {
        display: block;
        padding: 8px 0;
        color: var(--demanto-muted);
        text-decoration: none;
        font-size: 12px;
        transition: var(--transition-smooth);
        border-bottom: 1px solid var(--luxury-border);
        position: relative;
        padding-left: 15px;
    }

    .mobile-categories-list ul li a::before {
        content: '✧';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        color: var(--demanto-gold);
        font-size: 9px;
        opacity: 0;
        transition: var(--transition-smooth);
    }

    .mobile-categories-list ul li a:hover {
        color: var(--demanto-gold);
        padding-left: 22px;
    }

    .mobile-categories-list ul li a:hover::before {
        opacity: 1;
        left: 6px;
    }

    .sidebar-title {
        font-family:"Cormorant Garamond",serif;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 12px;
        padding-bottom: 8px;
        border-bottom: 2px solid var(--demanto-gold);
        position: relative;
    }

    .sidebar-title a {
        color: var(--demanto-dark);
        text-decoration: none;
        transition: var(--transition-smooth);
    }

    .sidebar-title a:hover {
        color: var(--demanto-gold);
    }

    .category-sub-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .category-sub-menu ul li {
        margin-bottom: 3px;
    }

    .category-sub-menu ul li a {
        display: block;
        padding: 8px 0;
        color: var(--demanto-muted);
        text-decoration: none;
        font-size: 12px;
        transition: var(--transition-smooth);
        border-bottom: 1px solid var(--luxury-border);
        position: relative;
        padding-left: 12px;
    }

    .category-sub-menu ul li a::before {
        content: '✧';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        color: var(--demanto-gold);
        font-size: 9px;
        opacity: 0;
        transition: var(--transition-smooth);
    }

    .category-sub-menu ul li a:hover {
        color: var(--demanto-gold);
        padding-left: 22px;
    }

    .category-sub-menu ul li a:hover::before {
        opacity: 1;
        left: 6px;
    }

    /* Product Header */
    .product-header-wrap {
        background: #fff;
        border-radius: 15px;
        padding: 12px 18px;
        margin-bottom: 20px;
        border: 1px solid var(--luxury-border);
    }

    .product-tab-nav {
        display: flex;
        gap: 8px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .product-tab-nav li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        background: var(--demanto-bg);
        border-radius: 10px;
        color: var(--demanto-muted);
        transition: var(--transition-smooth);
        text-decoration: none;
        font-size: 14px;
    }

    .product-tab-nav li a.active,
    .product-tab-nav li a:hover {
        background: var(--demanto-gold);
        color: #fff;
    }

    .total-products p {
        margin: 0;
        font-size: 14px;
        color: var(--demanto-muted);
    }

    .total-products p strong {
        color: var(--demanto-gold);
    }

    /* ============================================================
       PRODUCT CARDS - NO CROPPING (UPDATED)
    ============================================================ */
    
    .featured-product-card {
        background: #fff;
        border-radius: 20px;
        border: 1px solid rgba(179, 146, 86, 0.15);
        overflow: hidden;
        transition: var(--transition-smooth);
        height: 100%;
        margin-bottom: 0;
    }

    .featured-product-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--box-shadow-luxury);
        border-color: var(--demanto-gold);
    }

    .featured-image {
        height: 220px;
        background: linear-gradient(135deg, #f8f5ef 0%, #fff 100%);
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px; /* Added padding to ensure images fit */
    }

    .featured-image::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(transparent, rgba(179, 146, 86, 0.03));
        pointer-events: none;
    }

    .featured-image a {
        display: block;
        width: 100%;
        height: 100%;
    }

    .featured-image img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* CHANGED: from cover to contain - NO CROPPING */
        padding: 15px; /* Keep padding for breathing room */
        transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .featured-product-card:hover .featured-image img {
        transform: scale(1.05);
    }

    .featured-content {
        padding: 15px;
        text-align: center;
    }

    .featured-content h4 {
        font-family:"Cormorant Garamond",serif;
        font-size: 14px;
        margin-bottom: 6px;
        color: var(--demanto-dark);
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .featured-content a {
        color: var(--boutique-text);
        text-decoration: none;
        text-transform: uppercase;
        font-size: 9px;
        letter-spacing: 1px;
        transition: var(--transition-smooth);
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .featured-content a:hover {
        color: var(--demanto-dark);
        gap: 8px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        background: #fff;
        border-radius: 20px;
        border: 1px solid var(--luxury-border);
    }

    .empty-state i {
        font-size: 40px;
        color: var(--demanto-gold);
        margin-bottom: 15px;
        opacity: 0.5;
    }

    .empty-state h5 {
        font-family:"Cormorant Garamond",serif;
        font-size: 16px;
        color: var(--demanto-dark);
        margin-bottom: 8px;
    }

    /* Sort Bar for Mobile */
    .sort-bar {
        display: none !important;
        background: #fff;
        border-radius: 15px;
        padding: 10px 15px;
        margin-bottom: 15px;
        border: 1px solid var(--luxury-border);
        justify-content: flex-end;
        align-items: center;
    }

    .sort-select {
        padding: 6px 12px;
        border: 1px solid var(--luxury-border);
        border-radius: 20px;
        font-size: 11px;
        background: #fff;
        color: var(--demanto-dark);
        cursor: pointer;
    }

    /* ============================================================
       RESPONSIVE - NO CROPPING
    ============================================================ */

    @media (max-width: 1200px) {
        .featured-image { 
            height: 200px; 
            padding: 8px;
        }
        .featured-image img { 
            padding: 12px; 
            object-fit: contain;
        }
    }

    @media (max-width: 991px) {
        /* Hide desktop sidebar on mobile */
        .col-lg-2 {
            display: none;
        }
        
        /* Show mobile categories section */
        .mobile-categories-section {
            display: block;
        }
        
        .sort-bar {
            display: none;
        }
        
        .featured-image { 
            height: 190px; 
            padding: 8px;
        }
        .featured-image img { 
            padding: 12px; 
            object-fit: contain;
        }
        
        /* Make products take full width */
        .col-lg-10 {
            width: 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .product-area { padding: 15px 0 30px 0; }
        
        .product-header-wrap { 
            flex-direction: column; 
            gap: 10px;
            padding: 12px 15px;
        }
        
        .product-tab-nav { justify-content: center; }
        .total-products { text-align: center; }
        
        .featured-image { 
            height: 180px; 
            padding: 8px;
        }
        .featured-image img { 
            padding: 10px; 
            object-fit: contain;
        }
        .featured-content { padding: 12px; }
        .featured-content h4 { font-size: 12px; white-space: normal; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .featured-content a { font-size: 8px; }
        
        .container-fluid {
            padding-left: 12px;
            padding-right: 12px;
        }
        
        .row.g-3 {
            margin-left: -6px;
            margin-right: -6px;
        }
        
        .row.g-3 > [class*="col-"] {
            padding-left: 6px;
            padding-right: 6px;
        }
        
        .mobile-categories-section {
            padding: 12px;
        }
        
        .mobile-categories-header h4 {
            font-size: 13px;
        }
        
        .mobile-categories-list ul li a {
            font-size: 11px;
            padding: 6px 0;
            padding-left: 15px;
        }
    }

    @media (max-width: 576px) {
        .featured-image { 
            height: 150px; 
            padding: 5px;
        }
        .featured-image img { 
            padding: 8px; 
            object-fit: contain;
        }
        .featured-content { padding: 10px; }
        .featured-content h4 { font-size: 11px; }
        .featured-content a { font-size: 7px; }
        
        .product-header-wrap { padding: 10px 12px; }
        .product-tab-nav li a { width: 30px; height: 30px; font-size: 12px; }
        .total-products p { font-size: 10px; }
        
        .sort-select { font-size: 10px; padding: 4px 10px; }
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .featured-product-card {
        animation: fadeInUp 0.5s ease-out;
        animation-fill-mode: backwards;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
    }
    
    ::-webkit-scrollbar-track {
        background: var(--demanto-bg);
    }
    
    ::-webkit-scrollbar-thumb {
        background: var(--demanto-gold);
        border-radius: 3px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: var(--boutique-text);
    }
</style>

<section class="product-area">
    <div class="container">
        <!-- Mobile Categories Section - ABOVE Products -->
        <div class="mobile-categories-section">
            <div class="mobile-categories-header" id="mobileCategoriesHeader">
                <h4><i class="fa fa-sliders-h"></i> All Categories</h4>
                <i class="fa fa-chevron-down"></i>
            </div>
            <div class="mobile-categories-list" id="mobileCategoriesList">
                <h5 class="sidebar-title">Collections</h5>
                <ul>
                    @foreach($collections as $categoryItem)
                    <li>
                        <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                            {{ $categoryItem->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <h5 class="sidebar-title mt-4">High Jewelry</h5>
                <ul>
                    @foreach($highJewelry as $categoryItem)
                    <li>
                        <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                            {{ $categoryItem->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <h5 class="sidebar-title mt-4">AD Signature</h5>
                <ul>
                    @foreach($adSignature as $categoryItem)
                    <li>
                        <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                            {{ $categoryItem->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Sort Bar for Mobile -->
        <div class="sort-bar">
            <select class="sort-select" id="mobileSortSelect">
                <option value="">Sort by: Default</option>
                <option value="low-to-high">Price: Low to High</option>
                <option value="high-to-low">Price: High to Low</option>
            </select>
        </div>

        <div class="row g-3">
            <!-- Desktop Sidebar (hidden on mobile) -->
            <div class="col-lg-2">
                <div class="shop-sidebar-wrapper">
                    <div class="sidebar-item">
                        <h4 class="sidebar-title">
                            <a href="{{ url('/categories') }}">All Categories</a>
                        </h4>
                        <div class="sidebar-body">
                            <div class="category-sub-menu">
                                <h6>Collections</h6>
                                <ul>
                                    @foreach($collections as $categoryItem)
                                    <li>
                                        <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                                            {{ $categoryItem->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <h6 class="mt-3">High Jewelry</h6>
                                <ul>
                                    @foreach($highJewelry as $categoryItem)
                                    <li>
                                        <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                                            {{ $categoryItem->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <h6 class="mt-3">AD Signature</h6>
                                <ul>
                                    @foreach($adSignature as $categoryItem)
                                    <li>
                                        <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                                            {{ $categoryItem->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-10">
                <div class="product-header-wrap">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <ul class="product-tab-nav" id="pills-tab" role="tablist">
                                <li role="presentation">
                                    <a class="active" id="grid-tab" data-bs-toggle="pill" href="#grid" role="tab" aria-controls="grid" aria-selected="true">
                                        <i class="fa fa-th"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="total-products mt-1">
                                <p>There are <strong>{{ $category->products_count }}</strong> products in this collection</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-body-wrap">
                    <div class="tab-content product-tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                            <div class="row g-3">
                                @forelse ($products as $index => $product)
                                <div class="col-6 col-md-4 col-lg-3" style="animation-delay: {{ $index * 0.05 }}s">
                                    <div class="featured-product-card">
                                        <div class="featured-image">
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                                @if($product->productImages->count())
                                                    <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}" loading="lazy">
                                                @else
                                                    <img src="{{ asset('assets/img/placeholder.jpg') }}" alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="featured-content">
                                            <h4>{{ $product->name }}</h4>
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                                Discover Details <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="empty-state">
                                        <i class="fa-regular fa-gem"></i>
                                        <h5>No Products Available</h5>
                                        <p>New products are being curated just for you. Please check back soon.</p>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile Categories Accordion
    const mobileCategoriesHeader = document.getElementById('mobileCategoriesHeader');
    const mobileCategoriesList = document.getElementById('mobileCategoriesList');
    
    if (mobileCategoriesHeader && mobileCategoriesList) {
        mobileCategoriesHeader.addEventListener('click', function() {
            this.classList.toggle('active');
            mobileCategoriesList.classList.toggle('show');
        });
    }

    // Mobile Sort Functionality
    const mobileSortSelect = document.getElementById('mobileSortSelect');
    if (mobileSortSelect) {
        mobileSortSelect.addEventListener('change', function() {
            const sortValue = this.value;
            if (sortValue) {
                console.log('Sort by:', sortValue);
            }
        });
    }

    // Lazy loading images
    const images = document.querySelectorAll('.featured-image img');
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                }
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
});
</script>
</div>