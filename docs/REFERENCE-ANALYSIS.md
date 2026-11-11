# REFERENCE WEBSITE AUDIT & ANALYSIS

## Reference Source
- **URL**: `https://fanatic-luxe-mart-go.base44.app/repairs`
- **Brand / Business**: BUGS Wireless & Smoke Shop
- **Physical Address**: 10010 Halls Ferry Rd, St. Louis, MO 63136
- **Phone**: 314-441-2851 (`tel:+13144412851`)
- **Hours**: Mon – Sun · 10:00 AM – 8:00 PM
- **Instagram**: `https://www.instagram.com/bugs_wirless_and_smoke_shop/`
- **Google Maps**: `https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136`

---

## Complete Page Inventory

### 1. Repairs Page (`/repairs`) [Primary Target]
- **Page Title**: `Phone & Tablet Repair — Bugs Wireless & Smoke Shop, St. Louis`
- **Meta Description**: `Same-day screen, battery, charging port and water damage repair in St. Louis, plus carrier activation and data transfer. Free quote at the counter.`
- **Sections**:
  1. **Top Notice Bar / Announcement Strip**:
     - `21+ only · ID required in store`
     - `Free local delivery over $50`
     - `Open daily 10 – 8`
  2. **Header / Navbar**:
     - Brand Logo / Text: `BUGS.` + `Wireless & Smoke Shop`
     - Desktop Links: `Shop all`, `Vapes`, `Glass & Pipes`, `Repairs`, `Visit us`, `Your orders`
     - Action Buttons: Phone pill (`314-441-2851`), Cart Bag drawer toggle (`Bag` with counter badge), Mobile Hamburger button.
  3. **Hero Section**:
     - Eyebrow: `The repair bench` (gold/primary text)
     - Heading: `We fix all phones` <br/> `<span class="font-serif-display text-primary">while you wait</span>.`
     - Subheading: `iPhone, Samsung, Pixel, Motorola, tablets — if it has a screen and a battery, it's been across our bench. Honest quotes, no appointment, and most repairs finished the same day.`
     - CTA Buttons:
       - Primary: `Call 314-441-2851` (Gold pill button with phone icon, hover translation `-translate-y-0.5`)
       - Secondary: `Walk in — 10010 Halls Ferry Rd, St. Louis, MO 63136` (Outlined pill button)
     - Ambient Background: Radial gold glow (`glow-gold` overlay on top right)
  4. **"What We Fix" Service Grid**:
     - Heading: `What we ` `<span class="font-serif-display text-primary">fix</span>`
     - 6 Service Cards (2 cols on tablet, 3 cols on desktop):
       1. **Screen & glass replacement** (Icon: smartphone) — *Cracked front glass, dead touch or lines across the display — we swap the panel and test every corner.*
       2. **Battery replacement** (Icon: battery) — *Charging twice a day or shutting off at 30%? A fresh cell gets you back to a full day.*
       3. **Charging port repair** (Icon: plug/cable) — *Cable falls out or only charges at an angle — cleaned, reflowed or replaced on the spot.*
       4. **Liquid damage service** (Icon: drop/water) — *Dropped it in water? We open, clean and assess before you spend anything on parts.*
       5. **Data transfer & backup** (Icon: refresh/sync) — *Photos, contacts and messages moved across to your new phone, verified before you leave.*
       6. **Carrier activation** (Icon: wifi/signal) — *Prepaid and postpaid activations, SIM swaps and number ports, done in store.*
     - Footnote: `Prices depend on your model and the part — you'll always get the number before we start.`
  5. **3-Step Process Section**:
     - Background: Dark contrast (`#08080a`), 3 columns on desktop:
       - Step 01: `Bring it in` — *No appointment. Bring the phone and, if you have it, the charger.*
       - Step 02: `Free quote` — *We diagnose in front of you and quote the repair before opening anything.*
       - Step 03: `Same-day fix` — *Most screen and battery jobs are done within the hour. We test, then hand it back.*
  6. **Call To Action (CTA) Banner**:
     - Container: Rounded-3xl card with subtle border and dark background.
     - Eyebrow: `Open Mon – Sun · 10:00 AM – 8:00 PM`
     - Title: `Bring it by the counter.`
     - Description: Clock icon + `Free diagnosis · no appointment needed`
     - Button: `Call the shop` (pill gold button)
  7. **Footer**:
     - Brand identity, address, phone, directions link, hours.
     - Navigation columns: Shop Categories, Quick Links, Legal / Compliance (`21+ Only. Valid government ID required.`).
     - Copyright: `© 2026 Bugs Wireless & Smoke Shop. All rights reserved.`
  8. **Global Overlay Components**:
     - **Age Verification Modal**: `bugs-age-confirmed` local storage key. Asks `Are you 21 or older?`, buttons `Yes, I'm 21 or older` and `No, take me out` (`https://www.google.com`).
     - **Cart Drawer (Offcanvas Bag)**: Slide-out drawer with list of cart items, quantity increment/decrement, remove button, Subtotal, Checkout button, Empty bag action.
     - **Mobile Navigation Drawer**: Responsive slide/collapse menu.

### 2. Connected Reference Pages
- **Home (`/`)**: Main showcase with hero, product spotlights, visit us section, testimonials/features.
- **Shop (`/shop`)**: Product catalog with category filter pills (`Vapes`, `E-Liquids`, `Glass & Pipes`, `Hookah`, `Phone Accessories`), search bar, product cards with "Add to Bag".
- **Checkout (`/checkout`)**: Multi-step checkout (Contact, Delivery/Pickup options, Order summary, Place Order).
- **Account / Orders (`/account`)**: Customer order lookup / history interface.

---

## Visual Design & Design Tokens

### Color Palette
- **Background**: `hsl(240, 6%, 4%)` (`#0a0a0b` / deep dark luxury slate)
- **Foreground / Text**: `hsl(0, 0%, 95%)` (`#f2f2f2`)
- **Card Background**: `hsl(240, 6%, 7%)` (`#111113`)
- **Primary / Accent Gold**: `hsl(39, 42%, 56%)` (`#b89766` / warm metallic gold)
- **Primary Foreground**: `hsl(240, 8%, 6%)` (`#0f0f12`)
- **Muted Text**: `hsl(240, 4%, 62%)` (`#9999a1`)
- **Muted Background**: `hsl(240, 5%, 11%)` (`#1b1b1e`)
- **Border / Hairlines**: `hsl(240, 6%, 16%)` (`rgba(255, 255, 255, 0.08)`)
- **Destructive**: `hsl(0, 64%, 52%)` (`#dc3545`)

### Typography
- **Heading & Body Font**: `Space Grotesk`, sans-serif (Weights: 300, 400, 500, 600, 700)
- **Display Serif Font**: `Cormorant Garamond`, serif italic (Used for luxury emphasis in headings: *while you wait*, *fix*, *& phone doctor*)
- **Monospace Font**: `JetBrains Mono`, monospace (Used for `.eyebrow` uppercase tracking and `.num` tabular figures)

### Key Styling Classes
- `.eyebrow`: `font-family: 'JetBrains Mono', monospace; letter-spacing: 0.22em; text-transform: uppercase; font-size: 0.6875rem; line-height: 1.4;`
- `.font-serif-display`: `font-family: 'Cormorant Garamond', serif; font-style: italic; letter-spacing: -0.01em;`
- `.num`: `font-family: 'JetBrains Mono', monospace; font-variant-numeric: tabular-nums;`
- `.glow-gold`: `radial-gradient(circle at 50% 50%, rgba(184, 151, 102, 0.16), transparent 68%)`
- Pill Radii: `rounded-full` (`border-radius: 9999px`)
- Card Radii: `rounded-2xl` (`1rem`) to `rounded-3xl` (`1.5rem`)

---

## Reusable Components List
1. `AnnouncementBar`: Top announcement strip with age notice, delivery threshold, and hours.
2. `Navbar`: Sticky header with backdrop blur, brand logo, navigation links, phone CTA, Bag button with badge counter, and mobile hamburger trigger.
3. `MobileMenuDrawer`: Responsive offcanvas/drawer menu for mobile viewports.
4. `AgeVerificationModal`: 21+ modal gate with localStorage persistence.
5. `CartDrawer`: Offcanvas sliding bag with live cart item management, subtotals, and checkout transition.
6. `ServiceCard`: Distinctive icon badge, title, descriptive body, and hover border glow.
7. `ProcessStep`: Monospaced step number (`01`, `02`, `03`), bold header, and descriptive paragraph.
8. `CtaBanner`: Rounded gradient card with hours, title, description, and call button.
9. `Footer`: Multi-column site footer with branding, business details, directions link, category links, and legal notice.
10. `ProductCard`: For shop and home pages (image container, badge, title, formatted price, add-to-bag button).

---

## Inaccessible Elements & External Asset Findings
- All critical reference assets (HTML structure, CSS variables, React bundle sources) were successfully inspected and captured.
- Product images referenced in Base44 CDN (`media.base44.com/...`) will be downloaded and hosted locally in `public/assets/images/` to prevent hotlinking and ensure 100% offline self-reliance.
- External icons use Lucide icons in React; for our clean Bootstrap 5 implementation, we will use **Bootstrap Icons (v1.11+)** and **Font Awesome 6 (free)** via local SVG or CSS sprites.
- Google Fonts (`Space Grotesk`, `Cormorant Garamond`, `JetBrains Mono`) will be loaded via Google Fonts CDN or local `@font-face`.

