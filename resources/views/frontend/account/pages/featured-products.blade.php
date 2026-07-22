@extends('layouts.app')

@section('title','Featured Products')
@section('content')
<div class="py-5 bg-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Featured Products</h4>
        <div class="underline mb-4"></div>
      </div>
      
      @forelse ($featuredProducts as $productItem)
      <div class="col-md-3 mb-4">
        <div class="product-card">
          <div class="product-card-img position-relative">
            <label class="stock bg-success">New</label>
            @if($productItem->productImages->count() > 0)
              <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}" class="w-100">
              </a>
              
              <!-- Add to Cart Button on Hover -->
              <div class="add-to-cart-overlay">
                <button class="btn btn-warning w-100 add-to-cart-btn" 
                        data-product-id="{{ $productItem->id }}">
                  <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                </button>
              </div>
            @endif
          </div>
          <div class="product-card-body">
            <p class="product-brand">{{ $productItem->brand }}</p>
            <h5 class="product-name">
              <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                {{ $productItem->name }}
              </a>
            </h5>
            <div>
              <span class="selling-price">${{ number_format($productItem->selling_price, 2) }}</span>
              @if($productItem->original_price > $productItem->selling_price)
                <span class="original-price text-muted text-decoration-line-through">${{ number_format($productItem->original_price, 2) }}</span>
              @endif
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <div class="p-2 text-center">
          <h4>No Featured Products Available</h4>
        </div>
      </div>
      @endforelse

      <div class="col-md-12 text-center mt-4">
        <a href="{{ url('collections') }}" class="btn btn-warning px-3">Shop More</a>
      </div>
    </div>
  </div>
</div>

<!-- Add to Cart Modal (Optional) -->
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center p-4">
        <div class="mb-3">
          <i class="fas fa-check-circle text-success fa-3x"></i>
        </div>
        <h5>Product added to cart successfully!</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Continue Shopping</button>
        <a href="{{ url('/cart') }}" class="btn btn-warning">View Cart</a>
      </div>
    </div>
  </div>
</div>

@endsection

@push('styles')
<style>
.product-card {
  border: 1px solid #e0e0e0;
  border-radius: 8px;
  overflow: hidden;
  transition: all 0.3s ease;
}

.product-card:hover {
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  transform: translateY(-5px);
}

.product-card-img {
  position: relative;
  overflow: hidden;
  height: 250px;
}

.product-card-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.product-card-img:hover img {
  transform: scale(1.05);
}

.stock {
  position: absolute;
  top: 10px;
  left: 10px;
  padding: 5px 12px;
  border-radius: 4px;
  color: white;
  font-size: 12px;
  font-weight: 600;
  z-index: 2;
}

.add-to-cart-overlay {
  position: absolute;
  bottom: -50px;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
  padding: 20px 15px 15px;
  opacity: 0;
  transition: all 0.3s ease;
  z-index: 1;
}

.product-card-img:hover .add-to-cart-overlay {
  bottom: 0;
  opacity: 1;
}

.add-to-cart-btn {
  transform: translateY(10px);
  opacity: 0;
  transition: all 0.3s ease 0.1s;
}

.product-card-img:hover .add-to-cart-btn {
  transform: translateY(0);
  opacity: 1;
}

.product-card-body {
  padding: 15px;
  background: white;
}

.product-brand {
  font-size: 12px;
  color: #666;
  text-transform: uppercase;
  margin-bottom: 5px;
}

.product-name {
  font-size: 14px;
  font-weight: 600;
  margin-bottom: 10px;
  height: 40px;
  overflow: hidden;
}

.product-name a {
  color: #333;
  text-decoration: none;
}

.product-name a:hover {
  color: #ffc107;
}

.selling-price {
  font-size: 16px;
  font-weight: 700;
  color: #333;
  margin-right: 8px;
}

.original-price {
  font-size: 14px;
  color: #999;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Add to cart functionality
  const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
  const addToCartModal = new bootstrap.Modal(document.getElementById('addToCartModal'));
  
  addToCartButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      
      const productId = this.getAttribute('data-product-id');
      
      // Send AJAX request to add to cart
      fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          product_id: productId,
          quantity: 1
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Update cart count
          if (document.querySelector('.cart-count')) {
            document.querySelector('.cart-count').textContent = data.cart_count;
          }
          
          // Show success modal
          addToCartModal.show();
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  });
  
  // Prevent product link click when clicking add to cart button
  document.querySelectorAll('.product-card-img a').forEach(link => {
    link.addEventListener('click', function(e) {
      const target = e.target;
      if (target.closest('.add-to-cart-btn')) {
        e.preventDefault();
      }
    });
  });
});
</script>
@endpush