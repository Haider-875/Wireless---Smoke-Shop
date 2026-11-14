@extends('layouts.app')

@section('title', 'Store & Inventory Gallery · BUGS Wireless & Smoke Shop')
@section('meta_description', 'Real photos of BUGS Wireless & Smoke Shop at 10010 Halls Ferry Rd, St. Louis, MO. View our storefront, custom mural, unlocked iPhones, Samsung Galaxy phones, and phone accessories.')
@section('og_title', 'Store & Inventory Gallery · BUGS Wireless & Smoke Shop')
@section('og_image', asset('assets/images/gallery/5.jpeg'))

@section('content')
<div class="py-5" style="background-color: hsl(var(--background));">
    <div class="container-fluid px-4 px-lg-5" style="max-width: 1400px;">
        
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary text-decoration-none hover-white">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Store Gallery</li>
            </ol>
        </nav>

        <!-- Header Hero Section -->
        <div class="d-flex flex-column flex-lg-row align-items-lg-end justify-content-between gap-4 pb-4 mb-4 border-bottom border-white border-opacity-10">
            <div style="max-width: 760px;">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill border border-white border-opacity-10 mb-3" style="background-color: hsl(var(--surface));">
                    <span class="rounded-circle" style="width: 8px; height: 8px; background-color: #22c55e;"></span>
                    <span class="eyebrow text-steel" style="font-size: 0.72rem; letter-spacing: 0.14em;">10010 Halls Ferry Rd · Live In-Store Showcase</span>
                </div>
                <h1 class="display-5 fw-bold text-white tracking-tight mb-3" style="line-height: 1.15; letter-spacing: -0.025em;">
                    Inside the shop<span class="font-serif-display text-steel"> and on the shelves</span>.
                </h1>
                <p class="text-secondary mb-0" style="font-size: 1.0625rem; line-height: 1.6;">
                    Take a look at our authentic storefront, custom Rick &amp; Morty mural, and live inventory of certified unlocked iPhones, Samsung Galaxy devices, and counter gear in St. Louis, MO.
                </p>
            </div>

            <!-- Quick Action Links -->
            <div class="d-flex flex-wrap align-items-center gap-2">
                <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                   target="_blank" 
                   rel="noreferrer" 
                   class="btn btn-bugs-primary px-4 py-2.5 rounded-pill fw-semibold text-dark d-inline-flex align-items-center gap-2"
                   style="font-size: 13.5px;">
                    <i data-lucide="map-pin" style="width: 15px; height: 15px;"></i>
                    <span>Visit in person</span>
                </a>
                <a href="tel:+13144412851" 
                   class="btn btn-bugs-outline px-4 py-2.5 rounded-pill text-white d-inline-flex align-items-center gap-2"
                   style="font-size: 13.5px;">
                    <i data-lucide="phone" style="width: 15px; height: 15px;" class="text-steel"></i>
                    <span>314-441-2851</span>
                </a>
            </div>
        </div>

        <!-- Filter Pills Bar -->
        <div class="d-flex flex-wrap align-items-center gap-2 mb-4 pb-2">
            <span class="text-secondary small me-2 d-none d-sm-inline">Filter:</span>
            <button type="button" class="btn btn-sm btn-bugs-primary rounded-pill px-3 py-1.5 gallery-filter-btn active" data-filter="all">
                All Photos ({{ count($photos) }})
            </button>
            <button type="button" class="btn btn-sm btn-bugs-outline rounded-pill px-3 py-1.5 gallery-filter-btn text-white" data-filter="store">
                Storefront &amp; Exterior (2)
            </button>
            <button type="button" class="btn btn-sm btn-bugs-outline rounded-pill px-3 py-1.5 gallery-filter-btn text-white" data-filter="iphones">
                Unlocked iPhones (4)
            </button>
            <button type="button" class="btn btn-sm btn-bugs-outline rounded-pill px-3 py-1.5 gallery-filter-btn text-white" data-filter="android">
                Samsung &amp; Google Pixel (2)
            </button>
        </div>

        <!-- Gallery Showcase Grid -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4" id="galleryGrid">
            @foreach($photos as $index => $photo)
                <div class="col gallery-item" data-category="{{ $photo['category'] }}">
                    <div class="card h-100 border border-white border-opacity-10 overflow-hidden group shadow-sm" 
                         style="background-color: hsl(var(--card)); border-radius: 1.25rem; transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;">
                        
                        <!-- Image Container with Hover Overlay -->
                        <div class="position-relative overflow-hidden cursor-pointer gallery-card-trigger" 
                             style="aspect-ratio: 3 / 4; background-color: hsl(var(--surface-raised));"
                             data-index="{{ $index }}"
                             data-img="{{ asset('assets/images/gallery/' . $photo['file']) }}"
                             data-title="{{ $photo['title'] }}"
                             data-badge="{{ $photo['badge'] }}"
                             data-desc="{{ $photo['description'] }}"
                             data-meta="{{ $photo['meta'] }}"
                             role="button"
                             tabindex="0"
                             aria-label="Enlarge photo: {{ $photo['title'] }}">
                            
                            <img src="{{ asset('assets/images/gallery/' . $photo['file']) }}" 
                                 alt="{{ $photo['title'] }}" 
                                 class="w-100 h-100 object-fit-cover gallery-img" 
                                 loading="lazy"
                                 style="transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);">

                            <!-- Top Floating Badge -->
                            <div class="position-absolute top-0 start-0 m-3 z-2">
                                <span class="badge rounded-pill text-white border border-white border-opacity-20 px-3 py-1.5 fw-medium" 
                                      style="background: rgba(9, 10, 12, 0.85); backdrop-filter: blur(8px); font-size: 0.72rem; letter-spacing: 0.04em;">
                                    {{ $photo['badge'] }}
                                </span>
                            </div>

                            <!-- Hover Overlay with Zoom Pill -->
                            <div class="position-absolute inset-0 d-flex flex-column align-items-center justify-content-center opacity-0 group-hover-opacity-100 transition-opacity z-2 p-3 text-center"
                                 style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.2) 0%, rgba(9, 10, 12, 0.85) 100%);">
                                <div class="btn btn-bugs-primary btn-sm rounded-pill px-3 py-1.5 fw-semibold text-dark d-inline-flex align-items-center gap-1.5 shadow">
                                    <i data-lucide="maximize-2" style="width: 14px; height: 14px;"></i>
                                    <span style="font-size: 12px;">Tap to view</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Content Body -->
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="eyebrow text-steel" style="font-size: 0.6875rem; letter-spacing: 0.12em;">{{ $photo['meta'] }}</span>
                                    <i data-lucide="image" class="w-3.5 h-3.5 text-secondary opacity-50"></i>
                                </div>
                                <h3 class="fs-6 fw-semibold text-white mb-2" style="line-height: 1.4;">
                                    {{ $photo['title'] }}
                                </h3>
                                <p class="text-secondary small mb-0" style="font-size: 0.8125rem; line-height: 1.55;">
                                    {{ $photo['description'] }}
                                </p>
                            </div>

                            <div class="pt-3 mt-3 border-top border-white border-opacity-10 d-flex align-items-center justify-content-between">
                                <span class="text-white-50" style="font-size: 0.75rem;">Photo #{{ $index + 1 }}</span>
                                <button type="button" 
                                        class="btn btn-link p-0 text-steel text-decoration-none small fw-semibold d-inline-flex align-items-center gap-1 gallery-card-trigger"
                                        data-index="{{ $index }}"
                                        data-img="{{ asset('assets/images/gallery/' . $photo['file']) }}"
                                        data-title="{{ $photo['title'] }}"
                                        data-badge="{{ $photo['badge'] }}"
                                        data-desc="{{ $photo['description'] }}"
                                        data-meta="{{ $photo['meta'] }}">
                                    <span>Expand</span>
                                    <i data-lucide="arrow-up-right" style="width: 14px; height: 14px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- In-Store Visit Banner -->
        <div class="mt-5 p-4 p-md-5 rounded-4 border border-white border-opacity-10 text-white" 
             style="background: linear-gradient(135deg, hsl(var(--surface-deep)) 0%, hsl(var(--card)) 100%);">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">Visit the counter in St. Louis</p>
                    <h2 class="display-6 fw-semibold text-white tracking-tight mb-3">
                        Want to see any device<span class="font-serif-display text-steel"> in your hands</span>?
                    </h2>
                    <p class="text-secondary mb-3" style="max-width: 640px; font-size: 0.95rem; line-height: 1.6;">
                        All devices are unlocked, tested, and ready to walk out the door. We also do screen repairs, battery swaps, and data transfers on the spot. Walk in anytime during open hours.
                    </p>
                    <div class="d-flex flex-wrap align-items-center gap-3 text-secondary small">
                        <span class="d-inline-flex align-items-center gap-1.5 text-white">
                            <i data-lucide="map-pin" class="w-4 h-4 text-steel"></i>
                            10010 Halls Ferry Rd, St. Louis, MO 63136
                        </span>
                        <span class="text-white-50">&bull;</span>
                        <span class="d-inline-flex align-items-center gap-1.5 text-white">
                            <i data-lucide="clock" class="w-4 h-4 text-steel"></i>
                            Mon &ndash; Sun 10:00 AM &ndash; 8:00 PM
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-flex flex-column flex-sm-row flex-lg-column align-items-stretch justify-content-lg-end gap-2">
                        <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                           target="_blank" 
                           rel="noreferrer" 
                           class="btn btn-bugs-primary px-4 py-3 rounded-pill fw-semibold text-dark d-inline-flex align-items-center justify-content-center gap-2">
                            <i data-lucide="navigation" class="w-4 h-4"></i>
                            <span>Get directions</span>
                        </a>
                        <a href="{{ route('repairs') }}" 
                           class="btn btn-bugs-outline px-4 py-3 rounded-pill text-white d-inline-flex align-items-center justify-content-center gap-2">
                            <i data-lucide="wrench" class="w-4 h-4 text-steel"></i>
                            <span>Book phone repair</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ==========================================================================
     Interactive Lightbox Modal
     ========================================================================== -->
<div class="modal fade" id="galleryLightboxModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border border-white border-opacity-10" style="background-color: hsl(var(--surface-deep)); border-radius: 1.5rem; overflow: hidden;">
            
            <!-- Modal Header -->
            <div class="modal-header border-bottom border-white border-opacity-10 px-4 py-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge rounded-pill text-white border border-white border-opacity-20 px-2.5 py-1" id="lightboxBadge" style="background: hsl(var(--surface)); font-size: 0.72rem;">
                        Badge
                    </span>
                    <h5 class="modal-title fs-6 fw-semibold text-white mb-0" id="galleryModalLabel">Photo Details</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body (Full Resolution Photo with Controls) -->
            <div class="modal-body p-0 position-relative d-flex align-items-center justify-content-center" style="background-color: #000; min-height: 480px; max-height: 75vh;">
                <!-- Full Photo -->
                <img id="lightboxImage" src="" alt="BUGS Gallery" class="img-fluid" style="max-height: 75vh; width: auto; object-fit: contain;">

                <!-- Nav Button: Previous -->
                <button type="button" 
                        class="btn position-absolute top-50 start-0 translate-middle-y m-3 rounded-circle text-white border border-white border-opacity-20 p-2 d-inline-flex align-items-center justify-content-center" 
                        id="lightboxPrevBtn"
                        style="width: 44px; height: 44px; background: rgba(0, 0, 0, 0.6); backdrop-filter: blur(8px); z-index: 10;"
                        aria-label="Previous photo">
                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                </button>

                <!-- Nav Button: Next -->
                <button type="button" 
                        class="btn position-absolute top-50 end-0 translate-middle-y m-3 rounded-circle text-white border border-white border-opacity-20 p-2 d-inline-flex align-items-center justify-content-center" 
                        id="lightboxNextBtn"
                        style="width: 44px; height: 44px; background: rgba(0, 0, 0, 0.6); backdrop-filter: blur(8px); z-index: 10;"
                        aria-label="Next photo">
                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                </button>
            </div>

            <!-- Modal Footer (Description & Direct In-Store CTA) -->
            <div class="modal-footer border-top border-white border-opacity-10 px-4 py-3 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div class="text-start">
                    <p class="eyebrow text-steel mb-1" id="lightboxMeta" style="font-size: 0.7rem; letter-spacing: 0.12em;">Meta</p>
                    <p class="text-secondary small mb-0" id="lightboxDesc" style="max-width: 680px; line-height: 1.5;">Description</p>
                </div>
                <div class="d-flex align-items-center gap-2 w-100 w-md-auto justify-content-end">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="btn btn-bugs-primary btn-sm px-3 py-2 rounded-pill fw-semibold text-dark d-inline-flex align-items-center gap-1.5">
                        <i data-lucide="map-pin" style="width: 14px; height: 14px;"></i>
                        <span>See at counter</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const galleryItems = Array.from(document.querySelectorAll('.gallery-card-trigger[data-index]'));
    const filterBtns = document.querySelectorAll('.gallery-filter-btn');
    const cards = document.querySelectorAll('.gallery-item');
    
    // Lightbox modal elements
    const modalEl = document.getElementById('galleryLightboxModal');
    let modalInstance = null;
    if (modalEl && typeof bootstrap !== 'undefined') {
        modalInstance = new bootstrap.Modal(modalEl);
    }
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxTitle = document.getElementById('galleryModalLabel');
    const lightboxBadge = document.getElementById('lightboxBadge');
    const lightboxMeta = document.getElementById('lightboxMeta');
    const lightboxDesc = document.getElementById('lightboxDesc');
    const prevBtn = document.getElementById('lightboxPrevBtn');
    const nextBtn = document.getElementById('lightboxNextBtn');

    let currentIndex = 0;
    const photoData = @json($photos);

    function showPhotoAtIndex(idx) {
        if (idx < 0) idx = photoData.length - 1;
        if (idx >= photoData.length) idx = 0;
        currentIndex = idx;

        const photo = photoData[idx];
        const photoUrl = "{{ asset('assets/images/gallery') }}/" + photo.file;

        if (lightboxImage) lightboxImage.src = photoUrl;
        if (lightboxTitle) lightboxTitle.textContent = photo.title;
        if (lightboxBadge) lightboxBadge.textContent = photo.badge;
        if (lightboxMeta) lightboxMeta.textContent = photo.meta;
        if (lightboxDesc) lightboxDesc.textContent = photo.description;

        if (window.lucide) {
            window.lucide.createIcons();
        }
    }

    // Attach click events to all cards and buttons
    galleryItems.forEach(el => {
        el.addEventListener('click', function (e) {
            e.preventDefault();
            const idx = parseInt(this.getAttribute('data-index'), 10);
            showPhotoAtIndex(idx);
            if (modalInstance) {
                modalInstance.show();
            }
        });
        el.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const idx = parseInt(this.getAttribute('data-index'), 10);
                showPhotoAtIndex(idx);
                if (modalInstance) {
                    modalInstance.show();
                }
            }
        });
    });

    // Lightbox Next/Prev controls
    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            showPhotoAtIndex(currentIndex - 1);
        });
    }
    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            showPhotoAtIndex(currentIndex + 1);
        });
    }

    // Keyboard arrow navigation when modal is open
    document.addEventListener('keydown', function (e) {
        if (!modalEl || !modalEl.classList.contains('show')) return;
        if (e.key === 'ArrowLeft') {
            showPhotoAtIndex(currentIndex - 1);
        } else if (e.key === 'ArrowRight') {
            showPhotoAtIndex(currentIndex + 1);
        }
    });

    // Category Filtering
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const filter = this.getAttribute('data-filter');

            // Toggle active pill style
            filterBtns.forEach(b => {
                b.classList.remove('active', 'btn-bugs-primary');
                b.classList.add('btn-bugs-outline', 'text-white');
            });
            this.classList.remove('btn-bugs-outline', 'text-white');
            this.classList.add('active', 'btn-bugs-primary');

            // Filter cards
            cards.forEach(card => {
                const cat = card.getAttribute('data-category');
                if (filter === 'all' || cat === filter) {
                    card.style.display = '';
                    card.classList.remove('d-none');
                } else {
                    card.style.display = 'none';
                    card.classList.add('d-none');
                }
            });
        });
    });

    // Card hover subtle scale
    document.querySelectorAll('.gallery-item .card').forEach(card => {
        card.addEventListener('mouseenter', function () {
            const img = this.querySelector('.gallery-img');
            if (img) img.style.transform = 'scale(1.05)';
            this.style.transform = 'translateY(-4px)';
            this.style.borderColor = 'rgba(255, 255, 255, 0.22)';
            this.style.boxShadow = '0 12px 28px rgba(0, 0, 0, 0.45)';
        });
        card.addEventListener('mouseleave', function () {
            const img = this.querySelector('.gallery-img');
            if (img) img.style.transform = 'scale(1)';
            this.style.transform = 'none';
            this.style.borderColor = 'rgba(255, 255, 255, 0.08)';
            this.style.boxShadow = 'none';
        });
    });
});
</script>
@endpush
@endsection
