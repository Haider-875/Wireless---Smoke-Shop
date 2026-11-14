# REFERENCE WEBSITE AUDIT: BUGS WIRELESS & SMOKE SHOP
**Reference URL:** https://fanatic-luxe-mart-go.base44.app/  
**Audit Date:** November 15, 2026  
**Auditor:** Senior Laravel & Reverse-Engineering Specialist  
**Methodology:** Chrome Headless Automated Capture + DOM Extraction + Network Asset Audit

---

## 1. Executive Summary & Site Architecture

The reference application is an ultra-premium storefront and local service platform for **BUGS Wireless & Smoke Shop** located at **10010 Halls Ferry Rd, St. Louis, MO 63136** (Tel: `314-441-2851`).

The website blends high-precision device repair bench services with a curated smoke shop and wireless catalog. The visual language is defined by deep obsidian/black space surfaces (`#090b0e`), frosted glass backdrops (`backdrop-blur-md`), steel-blue high-tech accents (`#5cb9ea` / `hsl(202, 70%, 62%)`), platinum aura blooms, and warm editorial typography (`Cormorant Garamond` paired with `Manrope` and `JetBrains Mono`).

### Discovered Pages & Routes
| Route | Page Title / Purpose | Status | Key Components |
|---|---|---|---|
| `/` | Homepage | Fully Audited | Hero, Announcement Marquee, Repair Bench CTA, Featured Products, Smoke Shop Aisle Grid, In-Store Showcase, Footer |
| `/repairs` | Phone & Tablet Repair | Fully Audited | 6 Service Detail Cards, 3-Step Process, Booking / Quote Form, Technician Bench Guarantee |
| `/shop` | Store Catalog | Fully Audited | Category Navigation Chips, 10 Product Cards, Sticky Cart Floating Trigger, Price Comparison Badges |
| `/shop/{slug}` | Product Detail Page (PDP) | Fully Audited | Gallery Showcase, Spec Sheet, In-Stock Badge, Add-to-Bag Stepper, Store Pickup Guarantee, Related Category Items |
| `/policies` | Store Policies & Rules | Fully Audited | Delivery & Local Pickup, 30-Day Returns, Strict 21+ Age Policy, Privacy & ID Terms |
| `/account` | Customer Orders & Lookup | Fully Audited | Order Number & Phone Lookup, Receipt Retrieval |
| Global Modals | Age Gate & Cart Drawer | Fully Audited | 21+ ID Gate Modal, Slide-Over Cart Aside (`max-w-[420px]`) |

---

## 2. Multi-Viewport Screenshot Captures

All reference screenshots have been captured at the exact required viewports using headless Chromium with full JavaScript execution and virtual rendering budget (`--virtual-time-budget=6000`):

| Viewport | Device Profile | Width x Height | Generated File Reference |
|---|---|---|---|
| **390px** | iPhone 14/15/16 Mobile | 390 x 844 | `.audit/reference_screenshots/ref_homepage_390px.png` |
| **576px** | Large Mobile / Landscape | 576 x 900 | `.audit/reference_screenshots/ref_homepage_576px.png` |
| **768px** | iPad / Tablet Portrait | 768 x 1024 | `.audit/reference_screenshots/ref_homepage_768px.png` |
| **1024px** | iPad Pro / Small Laptop | 1024 x 768 | `.audit/reference_screenshots/ref_homepage_1024px.png` |
| **1440px** | Desktop HD | 1440 x 900 | `.audit/reference_screenshots/ref_homepage_1440px.png` |
| **1920px** | Ultra-Wide / 1080p Desktop | 1920 x 1080 | `.audit/reference_screenshots/ref_homepage_1920px.png` |

*(Complete screenshot suite also covers `/repairs`, `/shop`, `/shop/{slug}`, and `/policies` across all 6 viewports in `.audit/reference_screenshots/`)*.

---

## 3. Section-by-Section Anatomy (Homepage)

### A. Global Header & Navigation
- **Dimensions:** Sticky header (`top-0 z-40`), height ~72px, backdrop blur (`rgba(9, 11, 14, 0.85)` + `backdrop-filter: blur(12px)`), bottom border `1px solid rgba(255, 255, 255, 0.07)`.
- **Brand Identity:** Left-aligned flex group with custom circular logo icon (`9c6ad8d0b_logo.png`, 36x36px), title `BUGS.` (`font-weight: 700`, trailing steel period), subtitle `Wireless & Repair · Smoke shop inside` (`font-size: 11px`, muted text).
- **Navigation Links:**
  - `Repairs` (`/repairs`)
  - `Phone gear` (`/shop?category=Phone+Accessories`)
  - `Shop all` (`/shop`)
  - `Smoke shop` (`/shop?category=Vapes`)
  - `Visit us` (`/#visit`)
  - `Your orders` (`/account`)
- **Actions:**
  - Phone Pill: `314-441-2851` (`tel:+13144412851`, border `white/10`, hover `border-steel/50`).
  - Primary CTA: `Fix my phone` (pill button, `#eaedf0` background, dark text `#101215`, hover lift `-2px`).
  - Cart Trigger: `Bag` with counter badge, triggers sliding offcanvas cart.
  - Mobile Hamburger: Displays on screens `< 1024px`.

### B. Announcement Ticker (Continuous Marquee)
- **Container:** Border-y `1px solid rgba(255, 255, 255, 0.07)`, background `hsl(220, 9%, 6%)`, height ~44px.
- **Animation:** Continuous linear infinite horizontal crawl (`animation: marquee 35s linear infinite`).
- **Ticker Items (8 Distinct Guarantees):**
  1. `Same-day screen repair`
  2. `90-day repair warranty`
  3. `Free diagnostics at the counter`
  4. `In-store carrier activation`
  5. `Screen protector fitted free`
  6. `Data transfer to your new phone`
  7. `Open every day 10 – 8`
  8. `21+ tobacco counter in store`
- **Separator:** 4px circular dot with `bg-steel/70`.

### C. Hero Section
- **Background Effects:** Radial gradient glows:
  - Top-left platinum aura: `520px x 520px`, radial blur `120px`, opacity 0.12.
  - Bottom-right steel aura: `460px x 460px`, radial blur `100px`, opacity 0.14.
- **Eyebrow:** Lucide `ShieldCheck` icon + `Certified repair counter · St. Louis` in steel color (`hsl(202, 70%, 62%)`).
- **H1 Headline:**
  ```html
  Phone repair,<br>
  <span class="font-serif-display font-normal text-steel">the same day</span><br>
  on Halls Ferry.
  ```
  Font size: `clamp(2.6rem, 6.4vw, 4.9rem)`, tracking `-0.03em`, line-height `1.05`.
- **Description:** `Cracked screen, tired battery, dead charging port — our technicians work the bench in front of you, with the price agreed before a single screw comes out. Phones, tablets and wireless service, plus the tobacco counter in the back.` (max-width `460px`, `17px`, text muted).
- **Hero Image:** High-resolution technician replacing phone screen (`28ec12444_generated_image.png`, 712x605px aspect ratio), rounded 24px (`rounded-3xl`), border `1px solid rgba(255, 255, 255, 0.08)`. Floating badge overlay: `Average fix: 22 mins` with live pulsating status dot.

### D. Repair Bench Section ("Broken today, fixed by tonight")
- **Layout:** 2-column split (content left, imagery right).
- **Eyebrow:** `The repair bench` in steel.
- **Heading:** `Broken today, fixed by tonight.`
- **Feature Points:**
  - `Screen replacement` — OLED, LCD & Glass for iPhone, Samsung, Motorola.
  - `Battery & charging ports` — Fresh batteries, cleaned and replaced lightning/USB-C ports.
  - `Diagnostics & quotes` — Always $0 before any work begins.
- **Image:** Macro bench technician with precision screwdriver (`41b9158c6_generated_83ccd249.png`, 712x534px).

### E. Featured Products ("Gear for the phone you just fixed")
- **Heading:** `Gear for the phone you just fixed.`
- **Grid:** 4-column responsive grid (`grid-cols-1 sm:grid-cols-2 lg:grid-cols-4`, gap 24px).
- **Product Cards:**
  1. `Fog Guard Clear Case` ($19.99)
  2. `Armor Glass Screen Shield` ($14.99)
  3. `Pulse Buds Wireless` ($49.99, compare at $59.99, badge: `Save $10.00`)
  4. `Ember Power Bank 10K` ($34.99)
- **Card Styling:** Card background `#101215`, border `1px solid rgba(255, 255, 255, 0.08)`, aspect-square image container (`#14161a`), category eyebrow, title `h3` (`16px`, semibold), price (`Manrope 15px`), quick add-to-bag circular button (`+`).

### F. Smoke Shop Aisles ("The smoke shop side of the counter")
- **Heading:** `The smoke shop side of the counter.`
- **Layout:** 5 interactive aisle rows / tiles:
  - `01 Vapes` — Disposables, pods and rechargeables
  - `02 E-Liquids` — Nic salts and freebase, 0–50mg
  - `03 Glass & Pipes` — Beakers, spoons and hand-blown pieces
  - `04 Hookah` — Stems, hoses, bowls and shisha
  - `05 Phone Accessories` — Cases, glass, audio and power
- **Micro-interaction:** Hover highlights row border, shifts numeric prefix, expands action arrow.

### G. Visit Us Section ("Repairs, activation and a look around")
- **Storefront Photography:** Showcase of in-store counters and display cases (`445179722_generated_image.png`, 712x490px).
- **Details Card:**
  - Hours: `Monday – Sunday: 10:00 AM – 8:00 PM`
  - Address: `10010 Halls Ferry Rd, St. Louis, MO 63136`
  - Direct Phone: `(314) 441-2851`
  - One-click Google Maps Directions link.
  - Instagram handle: `@bugs_wirless_and_smoke_shop`.

### H. Global Footer
- **Layout:** 4 columns: Brand column, Repair Services, Smoke Shop Catalog, Store Hours & Legal.
- **Legal & Compliance:** Links to `/policies#shipping`, `/policies#returns`, `/policies#age`, `/policies#privacy`.
- **Copyright:** `© 2026 BUGS Wireless & Smoke Shop. All rights reserved.`

---

## 4. Modal & Interactive Drawer System

### A. 21+ Age Gate Modal
- Strict ID modal triggered on first visit:
  - Backdrop: `rgba(0, 0, 0, 0.85)` + `backdrop-filter: blur(16px)`.
  - Dialog: `max-w-md` (448px), background `#0e1012`, border `1px solid rgba(255, 255, 255, 0.1)`, rounded 24px.
  - Heading: `Are you 21 or older?`
  - Confirm Button: `Yes, I'm 21 or older` (sets cookie / localStorage `bugs_age_verified=true`).
  - Reject Button: `No, take me out` (`href="https://www.google.com"`).

### B. Slide-Over Cart Drawer
- Width: `w-full max-w-[420px]`, full height (`h-full fixed right-0 top-0 z-50`).
- Surface: `#0e1012` with left border `1px solid rgba(255, 255, 255, 0.08)`.
- Transition: Smooth cubic bezier `cubic-bezier(0.16, 1, 0.3, 1) duration-500`.
- Quantity controls: Minus, Plus, and Remove with real-time recalculation.

