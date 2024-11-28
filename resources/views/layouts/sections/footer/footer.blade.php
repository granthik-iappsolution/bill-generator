<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
    <div
        class="{{ (!empty($containerNav) ? $containerNav : 'container-fluid') }} d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            Copyright © {{ date('Y') }}, made with ❤️ by
            <a href="#" target="_blank" class="footer-link fw-bolder">
                Codiksh For {{ env('APP_NAME') }}.
            </a>
        </div>
    </div>
</footer>
<!--/ Footer-->


