# GSD ROADMAP: PIXEL-PERFECT CLONE OF BUGS WIRELESS & SMOKE SHOP
**Reference Target:** https://fanatic-luxe-mart-go.base44.app/  
**Architecture:** Laravel 12 + PHP 8.3 + MySQL + Blade + Bootstrap 5.3 + Custom CSS  
**Rules:** 100% Local Development. Zero Tailwind CSS. Zero React/Vue. No Remote Git Operations.  
**Created:** November 15, 2026  

---

## Roadmap Overview

```
Phase 0: Reference Audit & Asset Extraction [COMPLETED]
  ├── Multi-viewport screenshots (390px, 576px, 768px, 1024px, 1440px, 1920px)
  ├── DOM tree extraction across all accessible routes
  ├── Typography and color token reverse-engineering
  └── Original high-resolution asset acquisition

Phase 1: Typography Reverse-Engineering [READY]
  ├── Manrope + Cormorant Garamond + JetBrains Mono Google font integration
  ├── Strict type scale and font variable system
  └── Verification against reference letter-spacing and line-heights

Phase 2: Centralized Design System [READY]
  ├── HSL/Hex obsidian surface tokens (--background, --card, --surface)
  ├── Steel blue (#5cb9ea) and platinum accents
  ├── Spacing scales, 1400px container width, and border radii (14px/24px)
  └── Custom Bootstrap 5.3 overrides (bugs-theme.css)

Phase 3: Global Layout & Blade Components [READY]
  ├── Responsive navbar with brand logo, quick phone link, and cart badge
  ├── Continuous ticker marquee with 8 exact guarantees
  ├── Global 4-column footer with legal and store contact details
  ├── Strict 21+ ID verification age gate modal
  └── Slide-over cart drawer (max-w-[420px]) with real-time recalculations

Phase 4: Pixel-Perfect Homepage Reproduction [READY]
  ├── Section 1: Hero with dual radial aura glow, headline, and technician photo
  ├── Section 2: Repair bench 2-column showcase with macro bench photography
  ├── Section 3: 4-item featured phone accessories grid with quick-add actions
  ├── Section 4: 5 smoke shop interactive aisle cards (01 Vapes to 05 Accessories)
  └── Section 5: Visit us counter showcase with live store hours and Google Maps

Phase 5: Catalog & Product Detail Architecture [READY]
  ├── /shop catalog with interactive category chips and 10 core seeded items
  ├── /shop/{slug} detail view with product specs, guarantee card, and stock badge
  └── Server-side session cart with quantity updates and price tampering protection

Phase 6: Repair Services Page (/repairs) [READY]
  ├── 6 repair category tiles (Screen, Battery, Port, Water, Data, Activation)
  ├── 3-step repair walk-in workflow
  └── In-store quote submission and counter dispatch

Phase 7: Asset Deployment & Resolution Fidelity [READY]
  ├── Placement of 100% original reference photography in public/assets/images/
  ├── Exact aspect ratios (1:1 products, 712x605 hero, 712x534 bench, 712x490 store)
  └── High-definition Lucide SVG icons replacement

Phase 8: Animations, Micro-Interactions & Transitions [READY]
  ├── 35s continuous infinite marquee with hover-pause
  ├── Smooth GPU-accelerated card lift transitions (-4px)
  ├── Slide-over cart drawer with cubic-bezier(0.16, 1, 0.3, 1) easing
  └── Prefers-reduced-motion media query conformance

Phase 9: Multi-Viewport Responsive Hardening [READY]
  ├── 390px Mobile testing and verification
  ├── 576px Large mobile / landscape audit
  ├── 768px Tablet portrait layout verification
  ├── 1024px Laptop layout verification
  ├── 1440px Standard desktop layout verification
  └── 1920px Ultra-wide layout verification

Phase 10: Visual Quality Assurance & Discrepancy Elimination [READY]
  ├── Side-by-side automated viewport screenshot capture (Local vs. Reference)
  ├── Pixel discrepancy analysis and correction
  ├── Execution of full PHPUnit / Pest test suite
  └── Generation of VISUAL-QA-REPORT.md and TESTING-REPORT.md
```

---

## Detailed Phase Breakdown & Acceptance Criteria

### Phase 0: Reference Audit & Asset Extraction
- **Objective:** Establish the undeniable source of truth from `https://fanatic-luxe-mart-go.base44.app/`.
- **Deliverables:**
  - Automated headless Chrome captures at 390px, 576px, 768px, 1024px, 1440px, 1920px.
  - Complete rendered DOM dumps for `/`, `/repairs`, `/shop`, `/shop/{slug}`, `/policies`, `/account`.
  - Reference assets downloaded to `.audit/reference_assets/`.
  - Authoring of `REFERENCE-AUDIT.md`, `TYPOGRAPHY-AND-DESIGN-SYSTEM.md`, and `ASSET-INVENTORY.md`.
- **Status:** **COMPLETED**.

### Phase 1: Typography Reverse Engineering
- **Objective:** Match the exact typographic feel and hierarchy of the reference website.
- **Acceptance Criteria:**
  - `Manrope`, `Cormorant Garamond`, and `JetBrains Mono` linked and active.
  - H1 display utilizes italic serif accent for `"the same day"`.
  - Line-heights, letter-spacing (`-0.03em` for hero, `+0.08em` for eyebrow), and weights match reference CSS.

### Phase 2: Design System
- **Objective:** Construct a unified, centralized design token system in `public/assets/css/bugs-theme.css`.
- **Acceptance Criteria:**
  - Exact HSL color values for surfaces (`--background: 220 11% 4%`, `--surface: 220 9% 6%`, `--card: 220 9% 7%`).
  - Steel blue accent (`--steel: 202 70% 62%`) applied to badges, glows, and key links.
  - Zero Tailwind utility classes or CDN dependencies. Bootstrap 5.3 + custom CSS only.

### Phase 3: Global Layout & Blade Components
- **Objective:** Create modular, reusable Blade components for all shared UI elements.
- **Acceptance Criteria:**
  - `navbar.blade.php`: Logo, nav links, phone CTA, Bag button with reactive badge.
  - `announcement-bar.blade.php`: Continuous horizontal ticker with 8 exact guarantees.
  - `footer.blade.php`: 4 columns matching reference footer links and policies.
  - `age-modal.blade.php`: 21+ modal with persistent cookie / localStorage check.
  - `cart-drawer.blade.php`: Offcanvas right drawer with item listing, totals, and checkout trigger.

### Phase 4: Homepage Implementation
- **Objective:** Recreate the reference homepage section by section with pixel-level accuracy.
- **Acceptance Criteria:**
  - Hero section matches layout, radial glows, copy, and photo dimensions.
  - Repair bench section with 2-column layout and bullet points.
  - Featured products grid with 4 items.
  - Smoke shop section with 5 numbered aisle cards (`01 Vapes` to `05 Phone Accessories`).
  - Visit us section with store hours, map CTA, and store counter imagery.

### Phase 5: Products & Catalog
- **Objective:** Fully functional e-commerce catalog backed by Laravel & MySQL.
- **Acceptance Criteria:**
  - `/shop` displays all 10 catalog items with category filter tabs.
  - `/shop/{slug}` renders product details, stock count, and spec guarantees.
  - Cart addition, quantity adjustments, and subtotal calculation working server-side.

### Phase 6: Repair Services
- **Objective:** Reproduce the dedicated repair services hub (`/repairs`).
- **Acceptance Criteria:**
  - 6 service categories detailed with turnaround times and starting prices.
  - 3-step walk-in process.
  - Working quote / consultation request form.

### Phase 7: Images & Asset Management
- **Objective:** Ensure all images are crisp, correctly cropped, and locally hosted.
- **Acceptance Criteria:**
  - Original assets utilized from reference audit.
  - Aspect ratios match: 1:1 for products, 712:605 for hero, 712:534 for bench, 712:490 for store.
  - No blurred, stretched, or generic stock images.

### Phase 8: Animations & Interactions
- **Objective:** Replicate all reference interactive behaviors and motion design.
- **Acceptance Criteria:**
  - Infinite marquee ticker running smoothly at 35s.
  - Hover states on cards, buttons, and navigation links.
  - Slide-over cart drawer opening and closing with smooth physics.

### Phase 9: Responsive Development
- **Objective:** Guarantee flawless presentation across mobile, tablet, and desktop viewports.
- **Acceptance Criteria:**
  - Verified at 390px, 576px, 768px, 1024px, 1440px, and 1920px.
  - No horizontal overflow (`overflow-x: hidden`).
  - Mobile hamburger navigation drawer working seamlessly on small viewports.

### Phase 10: Visual Quality Assurance & Documentation
- **Objective:** Provide visual proof of pixel-accurate reproduction and functional integrity.
- **Acceptance Criteria:**
  - Side-by-side screenshots comparing local implementation against reference captures.
  - Full Laravel test suite passing (`php artisan test`).
  - Production of `IMPLEMENTATION-REPORT.md`, `VISUAL-QA-REPORT.md`, and `TESTING-REPORT.md`.

