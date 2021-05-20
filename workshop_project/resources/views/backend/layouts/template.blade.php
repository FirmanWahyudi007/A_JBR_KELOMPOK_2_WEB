@include('backend/layouts.header')
<main class="content-wrapper">
    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
            @yield('content')
        </div>
    </div>
</main>
@include('backend/layouts.footer')
