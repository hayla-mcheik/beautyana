<div class="page-header-area bg-img" data-bg-img="{{ asset('assets/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-header-content">
                    <nav class="breadcrumb-area">
                        <ul class="breadcrumb d-flex justify-content-center align-items-center flex-wrap m-0 p-0">
                            {{-- ALWAYS HOME --}}
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>

                            @if(isset($breadcrumbs) && count($breadcrumbs) > 0)
                                @foreach($breadcrumbs as $breadcrumb)
                                    <li class="breadcrumb-sep px-2">/</li>

                                    @if(!$loop->last && !empty($breadcrumb['url']) && $breadcrumb['url'] !== '#')
                                        <li>
                                            <a href="{{ $breadcrumb['url'] }}">
                                                {{ $breadcrumb['title'] }}
                                            </a>
                                        </li>
                                    @else
                                        <li class="active text-capitalize">
                                            {{ $breadcrumb['title'] }}
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>