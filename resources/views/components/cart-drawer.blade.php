<!-- Cart Bag Offcanvas Drawer (Exact Reference Matching) -->
<div class="offcanvas offcanvas-end bugs-offcanvas" tabindex="-1" id="bugsCartOffcanvas" aria-labelledby="bugsCartOffcanvasLabel" style="width: 100%; max-width: 420px; background-color: hsl(var(--surface)); border-left: 1px solid rgba(255, 255, 255, 0.08);">
    <div class="offcanvas-header border-bottom border-white border-opacity-10 py-4 px-4 d-flex align-items-center justify-content-between">
        <div>
            <p class="eyebrow text-white mb-0" id="bugsCartOffcanvasLabel" style="font-size: 0.75rem; letter-spacing: 0.15em;">Your Bag</p>
            <p class="text-secondary small mb-0 mt-1" id="cartSubtitleText">Nothing in it yet</p>
        </div>
        <button type="button" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center border border-white border-opacity-10 text-secondary" style="width: 36px; height: 36px; background: transparent;" data-bs-dismiss="offcanvas" aria-label="Close">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>
    </div>

    <!-- Free Delivery Notice / Progress -->
    <div class="px-4 py-2 border-bottom border-white border-opacity-10 flex-shrink-0" style="background-color: hsl(var(--surface-deep));" id="deliveryThresholdBanner">
        <p class="caption-4 text-secondary mb-0 d-flex align-items-center gap-2" style="font-size: 0.75rem;" id="deliveryNoticeText">
            <i data-lucide="truck" class="w-3.5 h-3.5 text-steel"></i> Free local delivery on orders over $50
        </p>
    </div>

    <div class="offcanvas-body d-flex flex-column px-4 py-3">
        <!-- Loading Spinner State -->
        <div id="cartLoadingState" class="flex-grow-1 d-none d-flex flex-column align-items-center justify-content-center text-center p-4">
            <div class="spinner-border mb-2 text-steel" role="status" style="width: 2rem; height: 2rem;">
                <span class="visually-hidden">Loading bag...</span>
            </div>
            <p class="body-3 text-secondary">Updating bag...</p>
        </div>

        <!-- Empty Bag State (Exact Reference Layout) -->
        <div id="cartEmptyState" class="flex-grow-1 d-flex flex-column align-items-center justify-content-center text-center p-4">
            <div class="d-flex align-items-center justify-content-center rounded-circle border border-white border-opacity-10 mb-3" style="width: 56px; height: 56px; background-color: hsl(var(--surface-raised)); color: hsl(var(--foreground));">
                <i data-lucide="shopping-bag" class="w-6 h-6"></i>
            </div>
            <p class="fs-5 text-white fw-semibold mb-1">Your bag is empty.</p>
            <p class="text-secondary small mb-4">Take a look at what's in stock on the shelves.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-bugs-primary px-4 py-2 rounded-pill fw-semibold text-dark" data-bs-dismiss="offcanvas" style="font-size: 0.875rem;">
                Browse the shop
            </a>
        </div>

        <!-- Populated Cart Items Container (Zero Browser Scrollbars) -->
        <div id="cartItemsList" class="bugs-cart-items-container flex-grow-1 d-none">
            <!-- Dynamic Cart Items Rendered via bugs-app.js -->
        </div>

        <!-- Cart Summary Footer -->
        <div class="border-top border-white border-opacity-10 pt-3 mt-auto flex-shrink-0">
            <div class="d-flex justify-content-between align-items-baseline mb-1">
                <span class="text-secondary" style="font-size: 0.875rem;">Subtotal</span>
                <span class="fw-bold text-white fs-5" id="cartSubtotalText">$0.00</span>
            </div>
            <p class="text-secondary mb-3" style="font-size: 0.75rem;">Tax and delivery calculated at checkout.</p>
            <a href="{{ route('checkout') }}" class="btn btn-bugs-primary w-100 py-3 rounded-pill fw-semibold text-dark disabled" id="btnCartCheckout">
                Proceed to Checkout
            </a>
            <button type="button" class="btn btn-link text-secondary text-decoration-none w-100 mt-2 eyebrow" style="font-size: 0.6875rem; letter-spacing: 0.15em;" id="btnEmptyCart">
                Empty the bag
            </button>
        </div>
    </div>
</div>
