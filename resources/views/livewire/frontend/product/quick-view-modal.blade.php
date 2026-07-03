<!-- quick-view-modal --> 
<div>
  @if($showModal)

<div class="popup-product-quickview">
  <div class="product-single-item">
    <div class="row">
      <div class="col-md-6">
        <!--== Start Product Thumbnail Area ==-->
        <div class="product-thumb">
          <div class="swiper-container single-product-thumb-content single-product-thumb-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <a href="#/">
                  <img src="assets/img/shop/product-single/05.jpg" alt="Image-HasTech">
                  <span class="product-flag-new">New</span>
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#/">
                  <img src="assets/img/shop/product-single/06.jpg" alt="Image-HasTech">
                  <span class="product-flag-new">New</span>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-container single-product-nav-content single-product-nav-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="assets/img/shop/product-single/nav-05.jpg" alt="Image-HasTech">
              </div>
              <div class="swiper-slide">
                <img src="assets/img/shop/product-single/nav-06.jpg" alt="Image-HasTech">
              </div>
            </div>
          </div>
        </div>
        <!--== End Product Thumbnail Area ==-->
      </div>
      <div class="col-md-6">
        <!--== Start Product Info Area ==-->
        <div class="product-single-info mt-sm-70">
          <h1 class="title">Water And Wind Resistant Insulated Jacket</h1>
          <div class="product-info">
            <div class="star-content">
              <i class="ion-md-star"></i>
              <i class="ion-md-star"></i>
              <i class="ion-md-star"></i>
              <i class="ion-md-star"></i>
              <i class="ion-md-star icon-color-gray"></i>
            </div>
            <ul class="comments-advices">
              <li><a href="#/" class="reviews"><i class="fa fa-commenting-o"></i>Read reviews (1)</a></li>
              <li><a href="#/" class="comment"><i class="fa fa-pencil-square-o"></i>Write a review</a></li>
            </ul>
          </div>
          <div class="prices">
            <span class="price">$14.52</span>
            <div class="tax-label">Tax included</div>
          </div>
          <div class="product-description">
            <ul class="product-desc-list">
              <li>Stay ready for a change in weather with the IZOD® Water and Wind Resistant Insulated Jacket.</li>
              <li>Water-resistant jacket keeps you warm and dry.</li>
              <li>Stand collar features an attached hood.</li>
              <li>Front-zip closure.</li>
            </ul>
          </div>
          <div class="product-quick-action">
            <div class="product-quick-qty">
              <div class="pro-qty">
                <input type="text" id="quantity" title="Quantity" value="1">
              </div>
            </div>
            <a class="btn-product-add" href="single-product.html">Add to cart</a>
          </div>
          <div class="product-wishlist-compare">
            <a href="#" class="btn-wishlist"><i class="icon-heart"></i>Add to wishlist</a>
            <a href="#" class="btn-compare"><i class="icon-shuffle"></i>Add to compare</a>
          </div>
          <div class="social-sharing">
            <span>Share</span>
            <div class="social-icons">
              <a href="#/"><i class="la la-facebook"></i></a>
              <a href="#/"><i class="la la-twitter"></i></a>
            </div>
          </div>
        </div>
        <!--== End Product Info Area ==-->
      </div>
    </div>
  </div>
</div>
@endif
</div>