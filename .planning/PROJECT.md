---
status: FINALIZED
created: 2026-11-11T23:40:00+05:00
finalized: 2026-11-11T23:45:00+05:00
---

# PROJECT.md — BUGS Wireless & Smoke Shop Website Clone

## Vision
Recreate the reference website (`https://fanatic-luxe-mart-go.base44.app/repairs`) as a high-performance, pixel-faithful, responsive web application using Laravel (PHP 8.2+), MySQL, Bootstrap 5.3, and Vanilla JavaScript. The website serves as the digital storefront and service desk for BUGS Wireless & Smoke Shop in St. Louis, MO, showcasing professional device repair services, a smoking/vape product catalog, interactive cart/bag ordering, and store information with a dark luxury aesthetic.

---

## Goals

1. **Pixel-Accurate Design & Experience Re-creation**
   Replicate the luxury dark design system (Space Grotesk + Cormorant Garamond italic + JetBrains Mono), custom gold accents, smooth hover interactions, sticky blurred navbars, and responsive layouts across desktop, tablet, and mobile.

2. **Full Responsive Frontend with Bootstrap 5.3 Only**
   Deliver all pages (`/repairs`, `/`, `/shop`, `/checkout`, `/account`) using standard Bootstrap 5.3 grid, components, and custom CSS without any Tailwind CSS, React, or extraneous frontend frameworks.

3. **Robust Laravel Backend & MySQL Integration**
   Build structured Laravel MVC architecture (Blade components, Controllers, Models, Migrations, Seeders, Requests) supporting repair inquiries, shop catalog management, order processing, and administrative tracking.

---

## Non-Goals (Out of Scope)
- No Tailwind CSS or Tailwind classes under any circumstances.
- No React, Next.js, Vue, or heavy SPA frameworks.
- No third-party payment gateway charges in production (checkout is local order placement/in-store pickup and local delivery).
- No hotlinking to Base44 CDN or third-party proprietary servers for static images.

---

## Target Audience & Users
- **Walk-in & Local Customers (St. Louis, MO)**: Looking for quick, same-day screen, battery, water damage, and carrier activations or checking smoke shop hours and inventory.
- **Online Shoppers**: Browsing vapes, glass, hookah, and phone accessories for pickup or delivery.
- **Store Staff / Admin**: Viewing incoming repair quote requests, phone call clicks, and orders.

---

## Key Constraints
- **Framework Rule**: Bootstrap 5.3 is the ONLY CSS framework.
- **PHP Version**: PHP 8.3 (local CLI: PHP 8.3.36).
- **Composer Version**: Composer 2.10.3.
- **Database**: MySQL / MariaDB (XAMPP at `C:\xampp\mysql\bin` or SQLite fallback for development if MySQL service is paused).
- **Vanilla JS**: Standard DOM manipulation, Fetch API, and Bootstrap JS bundle without bloated libraries.

---

## Success Criteria
- [ ] 100% visual match to the reference `/repairs` page layout, typography, and color palette.
- [ ] Working Age Verification modal (21+) with localStorage remember flag.
- [ ] Working Cart Drawer (slide-out offcanvas) with add, quantity adjustment, subtotal computation, and checkout transition.
- [ ] Fully functional contact/quote forms and direct dial telephone links (`314-441-2851`).
- [ ] High Lighthouse performance score (>90), zero console errors, zero broken assets.
- [ ] Comprehensive test suite (Feature and Unit tests) verifying all routes and controllers.
