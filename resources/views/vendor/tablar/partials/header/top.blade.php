<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <ul class="navbar-nav">
            @if ($layoutHelper->isLayoutTopnavEnabled())
                @each('tablar::partials.navbar.dropdown-item', $tablar->menu('sidebar'), 'item')
            @endif
            <div class="d-none d-md-flex">
                @include('tablar::partials.header.theme-mode')
            </div>
        </ul>

        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
                <div class="btn-list">
                    @include('tablar::partials.header.header-button')
                </div>
            </div>
            @include('tablar::partials.header.top-right')
        </div>

    </div>
</header>
