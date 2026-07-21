<div class="page-header-area bg-img" data-bg-img="{{ asset('assets/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-header-content">
                    <nav class="breadcrumb-area">
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>

                            @foreach($breadcrumbs as $breadcrumb)
                                <li class="breadcrumb-sep">
                                /
                                </li>

                                @if(!$loop->last)
                                    <li>
                                        <a href="{{ $breadcrumb['url'] }}">
                                            {{ $breadcrumb['title'] }}
                                        </a>
                                    </li>
                                @else
                                    <li>{{ $breadcrumb['title'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>