<!-- Cart Bag Offcanvas Drawer -->
<div class="offcanvas offcanvas-end bugs-offcanvas" tabindex="-1" id="bugsCartOffcanvas" aria-labelledby="bugsCartOffcanvasLabel">
    <div class="offcanvas-header border-bottom py-3 px-3 px-sm-4" style="border-color: var(--bugs-border) !important;">
        <h5 class="offcanvas-title text-white title-3 d-flex align-items-center gap-2 mb-0" id="bugsCartOffcanvasLabel">
            <i class="ph ph-shopping-bag fs-5" style="color: var(--bugs-primary) !important;"></i> Your Bag
            <span class="badge rounded-pill text-black ms-1" style="background-color: var(--bugs-primary); font-size: 0.7rem;" id="cartItemBadge">0</span>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <!-- Free Delivery Notice / Progress -->
    <div class="px-3 px-sm-4 py-2 border-bottom flex-shrink-0" style="background-color: var(--bugs-surface-1); border-color: var(--bugs-border) !important;" id="deliveryThresholdBanner">
        <p class="caption-4 text-secondary mb-0" id="deliveryNoticeText">
            <i class="ph ph-truck me-1" style="color: var(--bugs-primary) !important;"></i> Free local delivery on orders over $50
        </p>
    </div>

    <div class="offcanvas-body d-flex flex-column px-3 px-sm-4 py-3">
        <!-- Loading Spinner State -->
        <div id="cartLoadingState" class="flex-grow-1 d-none d-flex flex-column align-items-center justify-content-center text-center p-4">
            <div class="spinner-border mb-2" role="status" style="width: 2rem; height: 2rem; color: var(--bugs-primary) !important;">
                <span class="visually-hidden">Loading bag...</span>
            </div>
            <p class="body-3 text-secondary">Updating bag...</p>
        </div>

        <!-- Empty Bag State -->
        <div id="cartEmptyState" class="flex-grow-1 d-flex flex-column align-items-center justify-content-center text-center p-4">
            <div class="d-flex align-items-center justify-content-center rounded-circle border mb-3" style="width: 60px; height: 60px; border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-3); color: var(--bugs-primary);">
                <i class="ph ph-shopping-bag fs-2"></i>
            </div>
            <p class="title-2 text-white mb-1">Your bag is empty.</p>
            <p class="body-3 text-secondary mb-4">Take a look at what's in stock on the shelves.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-bugs-primary btn-bugs-pill-sm px-4 py-2" data-bs-dismiss="offcanvas">
                Browse the shop
            </a>
        </div>

        <!-- Populated Cart Items Container (Zero Browser Scrollbars) -->
        <div id="cartItemsList" class="bugs-cart-items-container flex-grow-1 d-none">
            <!-- Dynamic Cart Items Rendered via bugs-app.js -->
        </div>

        <!-- Cart Summary Footer -->
        <div class="border-top pt-3 mt-auto flex-shrink-0" style="border-color: var(--bugs-border) !important;">
            <div class="d-flex justify-content-between align-items-baseline mb-1">
                <span class="body-2 text-secondary">Subtotal</span>
                <span class="num fw-bold text-white fs-5" id="cartSubtotalText">$0.00</span>
            </div>
            <p class="caption-4 text-secondary mb-3">Tax and delivery calculated at checkout.</p>
            <a href="{{ route('checkout') }}" class="btn btn-bugs-primary w-100 py-3 disabled" id="btnCartCheckout">
                Proceed to Checkout
            </a>
            <button type="button" class="btn btn-link text-secondary text-decoration-none w-100 caption-4 mt-2 eyebrow" id="btnEmptyCart">
                Empty the bag
            </button>
        </div>
    </div>
</div>
