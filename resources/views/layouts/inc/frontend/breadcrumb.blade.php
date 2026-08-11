<div class="beautyana-breadcrumb-area">
    <div class="container-fluid">
        <div class="beautyana-breadcrumb">

            <a href="{{ url('/') }}" class="breadcrumb-home">
                Home
            </a>

            @if(isset($breadcrumbs) && count($breadcrumbs) > 0)

                @foreach($breadcrumbs as $breadcrumb)

                    <span class="breadcrumb-arrow">›</span>

                    @if(
                        !$loop->last &&
                        !empty($breadcrumb['url']) &&
                        $breadcrumb['url'] !== '#'
                    )
                        <a href="{{ $breadcrumb['url'] }}">
                            {{ $breadcrumb['title'] }}
                        </a>
                    @else
                        <span class="breadcrumb-current">
                            {{ $breadcrumb['title'] }}
                        </span>
                    @endif

                @endforeach

            @endif

        </div>
    </div>
</div>
<style>
    /* ============================================================
   BEAUTYANA BREADCRUMB
============================================================ */

.beautyana-breadcrumb-area {
    background: #ffffff;
    padding: 28px 0 10px;
}

.beautyana-breadcrumb {
    display: flex;
    align-items: center;
    flex-wrap: wrap;

    padding-left: 40px;
    padding-right: 40px;

    font-family: "Roboto", sans-serif;
    font-size: 14px;
    font-weight: 400;

    color: #777;
}

/* Home */

.beautyana-breadcrumb .breadcrumb-home {
    color: #e0a4a4;
    text-decoration: none;

    transition: all 0.3s ease;
}

.beautyana-breadcrumb .breadcrumb-home:hover {
    color: #b86f6f;
}

/* Links */

.beautyana-breadcrumb a:not(.breadcrumb-home) {
    color: #666;
    text-decoration: none;

    transition: all 0.3s ease;
}

.beautyana-breadcrumb a:not(.breadcrumb-home):hover {
    color: #e0a4a4;
}

/* Arrow */

.beautyana-breadcrumb .breadcrumb-arrow {
    margin: 0 12px;

    color: #bdbdbd;

    font-size: 18px;
    line-height: 1;
}

/* Current page */

.beautyana-breadcrumb .breadcrumb-current {
    color: #555;
    font-weight: 400;
}

/* ============================================================
   MOBILE
============================================================ */

@media (max-width: 768px) {

    .beautyana-breadcrumb-area {
        padding: 20px 0 8px;
    }

    .beautyana-breadcrumb {
        padding-left: 20px;
        padding-right: 20px;

        font-size: 13px;
    }

    .beautyana-breadcrumb .breadcrumb-arrow {
        margin: 0 8px;
        font-size: 16px;
    }
}
</style>