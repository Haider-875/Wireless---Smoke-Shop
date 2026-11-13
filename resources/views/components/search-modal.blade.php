<!-- Quick Search Modal -->
<div class="modal fade" id="bugsSearchModal" tabindex="-1" aria-labelledby="bugsSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 640px;">
        <div class="modal-content bugs-search-modal-content">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="eyebrow" style="color: var(--bugs-primary);">Catalog Search</span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('shop.index') }}" method="GET" class="w-100">
                <div class="bugs-search-box">
                    <i class="ph ph-magnifying-glass fs-5" style="color: var(--bugs-primary);"></i>
                    <input type="search" 
                           name="search" 
                           id="bugsModalSearchInput" 
                           placeholder="Search vapes, glass, disposables, or phone repairs..." 
                           autocomplete="off" 
                           required>
                    <button type="submit" class="btn btn-bugs-primary btn-bugs-pill-sm py-1 px-3">
                        Search
                    </button>
                </div>
            </form>

            <div class="mt-4">
                <p class="caption-3 text-secondary mb-2">Popular Categories</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('shop.index', ['category' => 'vapes']) }}" class="btn btn-bugs-outline btn-bugs-pill-sm py-1 px-3 caption-2">
                        Vapes &amp; Pods
                    </a>
                    <a href="{{ route('shop.index', ['category' => 'e-liquids']) }}" class="btn btn-bugs-outline btn-bugs-pill-sm py-1 px-3 caption-2">
                        E-Liquids
                    </a>
                    <a href="{{ route('shop.index', ['category' => 'glass-pipes']) }}" class="btn btn-bugs-outline btn-bugs-pill-sm py-1 px-3 caption-2">
                        Glass &amp; Pipes
                    </a>
                    <a href="{{ route('shop.index', ['category' => 'hookah']) }}" class="btn btn-bugs-outline btn-bugs-pill-sm py-1 px-3 caption-2">
                        Hookah
                    </a>
                    <a href="{{ route('repairs') }}" class="btn btn-bugs-outline btn-bugs-pill-sm py-1 px-3 caption-2">
                        Screen &amp; Battery Repair
                    </a>
                </div>
            </div>

            <div class="mt-4 pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center">
                <span class="caption-5 text-secondary">Press <kbd class="bg-dark text-white px-2 py-1 rounded border border-secondary border-opacity-50">ESC</kbd> to exit</span>
                <a href="{{ route('shop.index') }}" class="caption-4 text-decoration-none" style="color: var(--bugs-primary);">
                    View all items &rarr;
                </a>
            </div>
        </div>
    </div>
</div>

