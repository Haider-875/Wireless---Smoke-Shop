<!-- Inquiry & Quote Modal (BUGS Wireless Component) -->
<div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 520px;">
        <div class="modal-content bugs-card p-4 p-sm-5 border" style="background-color: var(--bugs-surface-1); border-color: var(--bugs-border) !important; border-radius: 20px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.65);">
            <div class="modal-header border-0 pb-0 px-0 pt-0">
                <div>
                    <div class="d-inline-flex align-items-center gap-2 mb-1">
                        <span class="bugs-icon-badge" style="width: 28px; height: 28px; font-size: 13px;">
                            <i class="ph ph-chat-circle-dots"></i>
                        </span>
                        <span class="eyebrow" style="color: var(--bugs-primary); font-size: 11px;">Halls Ferry Counter Desk</span>
                    </div>
                    <h4 class="title-1 text-white fw-bold mb-1" id="inquiryModalLabel">Device & Repair Inquiry</h4>
                    <p class="body-4 text-secondary mb-0">Ask about pricing, reserve a phone, or get an honest repair quote.</p>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1); opacity: 0.7;"></button>
            </div>

            <div class="modal-body px-0 pt-4 pb-0">
                <form action="{{ route('inquiry.store') }}" method="POST" id="inquiryForm">
                    @csrf
                    <input type="hidden" name="product_id" id="inquiryProductId" value="">
                    
                    <div class="mb-3">
                        <label for="inquiryInquiryType" class="form-label caption-3 text-secondary">Inquiry Purpose</label>
                        <select class="form-select bg-dark text-white border-secondary rounded-3" id="inquiryInquiryType" name="inquiry_type" required style="border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-2) !important;">
                            <option value="device_inquiry">📱 Smartphone Purchase / Price Check</option>
                            <option value="device_inquiry">🔒 Counter Hold / Same-Day Reserve</option>
                            <option value="trade_in">🔄 Device Trade-In / Sell My Phone</option>
                            <option value="repair_quote">🔧 Screen / Hardware Repair Quote</option>
                            <option value="general_inquiry">💬 General Store Inquiry</option>
                        </select>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-sm-6">
                            <label for="inquiryName" class="form-label caption-3 text-secondary">Your Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control bg-dark text-white border-secondary rounded-3" id="inquiryName" name="name" required placeholder="e.g. Marcus Miller" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-2) !important;">
                        </div>
                        <div class="col-sm-6">
                            <label for="inquiryPhone" class="form-label caption-3 text-secondary">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control bg-dark text-white border-secondary rounded-3" id="inquiryPhone" name="phone" required placeholder="e.g. 314-555-0199" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-2) !important;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inquiryEmail" class="form-label caption-3 text-secondary">Email Address <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control bg-dark text-white border-secondary rounded-3" id="inquiryEmail" name="email" placeholder="e.g. marcus@example.com" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-2) !important;">
                    </div>

                    <div class="mb-3">
                        <label for="inquiryDeviceModel" class="form-label caption-3 text-secondary">Device of Interest <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-dark text-white border-secondary rounded-3" id="inquiryDeviceModel" name="device_model" required placeholder="e.g. iPhone 15 Pro Max 1TB / Galaxy S24 Ultra" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-2) !important;">
                    </div>

                    <div class="mb-3">
                        <label for="inquiryServiceNeeded" class="form-label caption-3 text-secondary">Specific Request <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-dark text-white border-secondary rounded-3" id="inquiryServiceNeeded" name="service_needed" required value="Device Pricing & Availability" placeholder="e.g. Check stock in counter, carrier unlock, screen swap" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-2) !important;">
                    </div>

                    <div class="mb-4">
                        <label for="inquiryNotes" class="form-label caption-3 text-secondary">Questions or Details <span class="text-muted">(Optional)</span></label>
                        <textarea class="form-control bg-dark text-white border-secondary rounded-3" id="inquiryNotes" name="notes" rows="2" placeholder="Any storage/color preferences or details for our counter techs..." style="border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-2) !important;"></textarea>
                    </div>

                    <div class="d-flex flex-column gap-2">
                        <button type="submit" class="btn btn-bugs-primary w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                            <i class="ph ph-paper-plane-tilt fs-5"></i>
                            <span>Send Counter Inquiry</span>
                        </button>
                        <div class="text-center pt-2">
                            <span class="caption-4 text-secondary">
                                Need instant answers? Call the counter at 
                                <a href="tel:+13144412851" class="text-decoration-none fw-semibold" style="color: var(--bugs-primary);">314-441-2851</a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const inquiryModal = document.getElementById('inquiryModal');
    if (!inquiryModal) return;

    inquiryModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        if (!button) return;

        const device = button.getAttribute('data-device-model');
        const service = button.getAttribute('data-service-needed');
        const type = button.getAttribute('data-inquiry-type');
        const productId = button.getAttribute('data-product-id');

        if (device) {
            const devInput = document.getElementById('inquiryDeviceModel');
            if (devInput) devInput.value = device;
        }

        if (service) {
            const servInput = document.getElementById('inquiryServiceNeeded');
            if (servInput) servInput.value = service;
        }

        if (type) {
            const typeSelect = document.getElementById('inquiryInquiryType');
            if (typeSelect) typeSelect.value = type;
        }

        if (productId) {
            const prodInput = document.getElementById('inquiryProductId');
            if (prodInput) prodInput.value = productId;
        }
    });
});
</script>

