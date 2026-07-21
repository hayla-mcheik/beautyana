<!--== Start Footer Area Wrapper ==-->
<footer class="footer-area">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!--== Start Footer Widget Area ==-->
        {{-- <div class="footer-widget-area pb-30">
          <div class="row">
            <div class="col-lg-6">
              <div class="widget-item">
                <div class="about-widget">
                  <div class="inner-content">
                    <div class="footer-logo">
                      <a href="{{ url('/') }}">
                        <img class="logo-light" src="{{ asset('assets/img/logo-light.png')}}" alt="Logo">
                      </a>
                    </div>
                    <p class="mt-3">{{ $appSetting->address ?? 'Beirut, Lebanon' }}</p>
                  </div>
                  <div class="widget-desc mt-3">
                    <p>{{ $appSetting->meta_description ?? 'Corporate clients and leisure travelers have been relying on Lakanto for dependable, safe, and professional monk fruit products.' }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="widget-item">
                <div class="widget-menu-wrap">
                  <ul class="nav-menu">
                    <li><a href="{{ url('aboutus') }}">Why Lakanto MonkFruit</a></li>
                    <li><a href="{{ url('contactus') }}">Contact us</a></li>
                    <li><a href="{{ url('blogs') }}">Health News</a></li>
                    <li><a href="{{ url('collections') }}">Stores</a></li>
     
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <!--== End Footer Widget Area ==-->
      </div>
    </div>
  </div>
  <!--== Start Footer Bottom Area ==-->
<!--== Start Footer Bottom Area ==-->
<div class="footer-bottom">
    <div class="container">

        <!-- Social Media -->
        <div class="footer-social text-center mb-4">
            <h6 class="social-title">Follow Us</h6>

            <div class="social-icons">

                @if(optional($appSetting)->facebook)
                    <a href="{{ $appSetting->facebook }}" target="_blank" class="facebook">
                        <i class="la la-facebook"></i>
                    </a>
                @endif

                @if(optional($appSetting)->instagram)
                    <a href="{{ $appSetting->instagram }}" target="_blank" class="instagram">
                        <i class="la la-instagram"></i>
                    </a>
                @endif

                @if(optional($appSetting)->youtube)
                    <a href="{{ $appSetting->youtube }}" target="_blank" class="tiktok">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="18"
                             height="18"
                             fill="currentColor"
                             viewBox="0 0 16 16">
                            <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                        </svg>
                    </a>
                @endif

            </div>
        </div>

        <div class="row align-items-center border-top pt-3">
            <div class="col-12 text-center">
                <p class="copyright mb-0">
                    © {{ date('Y') }} <strong>Taly's Collection</strong>. All Rights Reserved.
                </p>
            </div>
        </div>

    </div>
</div>
<!--== End Footer Bottom Area ==-->
  <!--== End Footer Bottom Area ==-->
</footer>
<!--== End Footer Area Wrapper ==-->
<style>
  .footer-bottom{
    background:#fff;
    padding:45px 0 25px;
    border-top:1px solid #f2f2f2;
}

.social-title{
    font-size:13px;
    letter-spacing:3px;
    text-transform:uppercase;
    color:#fff;
    margin-bottom:20px;
    font-weight:700;
}

.social-icons{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:18px;
}

.social-icons a{
    width:46px;
    height:46px;
    border:1px solid #e8e8e8;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#e0a4a4;
    font-size:20px;
    text-decoration:none;
    transition:.35s;
    background:#fff;
}

.social-icons a svg{
    width:18px;
    height:18px;
}

.social-icons a:hover{
    background:#fff;
    color:#e0a4a4;
    border-color:#fff;
    transform:translateY(-4px);
    box-shadow:0 8px 20px rgba(75,0,0,.18);
}

.copyright{
    font-size:13px;
    color:#777;
    letter-spacing:.5px;
}
</style>