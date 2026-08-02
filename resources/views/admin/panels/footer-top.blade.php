<footer class="footer mt-auto py-3 bg-white text-center">
    <div class="container">
        <span class="text-muted"> Copyright © <span id="year"></span> <a href="javascript:void(0);" class="text-dark fw-medium">Hope Heritage Institute</a>.
            Designed with <span class="bi bi-heart-fill text-danger"></span> by <a href="javascript:void(0);">
                <span class="fw-medium text-primary">S2code</span>
            </a> All
            rights
            reserved
        </span>
    </div>
</footer> <!-- End::main-footer -->

</div>

<div class="text-left modal fade effect-sign" id="md_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="md_modal_content">

        </div>
    </div>
</div>

<div class="text-left modal fade effect-sign" id="lg_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" id="lg_modal_content">

        </div>
    </div>
</div>
<div id="successToast" class="toast colored-toast bg-success-transparent" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-success text-fixed-white">
        <img class="bd-placeholder-img rounded me-2" src="assets/images/brand-logos/toggle-dark.png" alt="...">
        <strong class="me-auto">Mamix</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Your,toast message here.
    </div>
</div>
<div id="dangerToast" class="toast colored-toast bg-danger-transparent" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-danger text-fixed-white">
        <img class="bd-placeholder-img rounded me-2" src="assets/images/brand-logos/toggle-dark.png" alt="...">
        <strong class="me-auto">Mamix</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Your,toast message here.
    </div>
</div>
@include('admin.panels.scripts')