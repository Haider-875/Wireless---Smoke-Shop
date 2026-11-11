# TESTING-PLAN.md — Comprehensive Quality Assurance & Verification Plan

## 1. Quality Strategy
In accordance with GSD core rules, every change and feature requires empirical proof. No phase is considered complete without verifiable evidence (automated test runs, HTTP status outputs, visual checks).

---

## 2. Test Tiers

### A. Automated Backend Feature & Unit Tests (PHPUnit / Pest)
- **Route Availability Tests**:
  - `GET /repairs`: Assert HTTP 200, view has repairs data, service cards present.
  - `GET /`: Assert HTTP 200, home sections rendered.
  - `GET /shop`: Assert HTTP 200, products present.
  - `GET /checkout`: Assert HTTP 200.
  - `GET /account`: Assert HTTP 200.
- **Cart API & Session Tests**:
  - `POST /cart/add`: Verify product addition to session cart and response JSON.
  - `POST /cart/update`: Verify quantity adjustment and recalculation.
  - `POST /cart/remove`: Verify item removal.
  - `POST /cart/clear`: Verify empty cart state.
- **Form Submission & Validation Tests**:
  - `POST /repairs/quote`: Test valid inquiry submission (persists in DB, returns success flash/JSON).
  - `POST /repairs/quote` with missing inputs: Test validation errors (required name, phone).
  - `POST /checkout`: Test checkout validation and order persistence.

### B. Frontend & Visual Fidelity Tests
- **Typography & Font Check**:
  - Verify `Space Grotesk`, `Cormorant Garamond` (italic display), and `JetBrains Mono` load without layout shift.
- **Color Accuracy**:
  - Verify background `#0a0a0b`, gold accent `#b89766`, cards `#111113`, and hair-thin borders `rgba(255, 255, 255, 0.07)`.
- **Responsive Viewport Checks**:
  - **Mobile (375px - 414px)**: Single column service cards, mobile hamburger drawer, sticky announcement bar.
  - **Tablet (768px - 834px)**: 2-column service grid, visible phone link.
  - **Desktop (1024px - 1440px+)**: 3-column service grid, full navigation links, ambient gold glow.
- **Interactive Component Tests**:
  - **Age Verification Modal**: Opens if localStorage has no `bugs-age-confirmed`; closing sets `'yes'`; does not reopen on reload.
  - **Cart Offcanvas**: Opens on click of "Bag" button; displays item list and subtotal; updates dynamically.
  - **Navbar Scroll Effect**: Header background becomes opaque with `backdrop-filter: blur(20px)` once `window.scrollY > 16`.

### C. Performance, Accessibility & Security Checks
- **Lighthouse Audit**:
  - Performance: Target ≥ 90
  - Accessibility: Target ≥ 95 (proper ARIA attributes, semantic headings, contrast ratios)
  - Best Practices: Target ≥ 95
  - SEO: Target ≥ 95
- **Security Check**:
  - CSRF tokens verified on all state-modifying requests.
  - SQL injection prevented via Eloquent parameterized queries.
  - XSS prevented via Blade `{{ ... }}` escaping.

---

## 3. Phase-by-Phase Verification Log

| Phase | Milestone | Primary Verification Evidence Required | Signoff |
|-------|-----------|----------------------------------------|---------|
| **Phase 0** | Reference Audit & Planning | Complete audit documents created; GSD initialized. | 🔄 Current |
| **Phase 1** | Laravel Setup & Bootstrap | `php artisan --version` output; Bootstrap CSS/JS linked; zero build errors. | Pending |
| **Phase 2** | UI Components & Tokens | Visual inspection of Navbar, Drawer, Age Modal, Footer; proof of CSS variables. | Pending |
| **Phase 3** | Frontend Pages | `/repairs` fully populated; side-by-side comparison against Base44 reference. | Pending |
| **Phase 4** | Responsive & Animations | Mobile, tablet, and desktop layout screenshots; hover transition checks. | Pending |
| **Phase 5** | Database & Cart Logic | Database migrations run; test cart additions and quote submissions. | Pending |
| **Phase 6** | Automated Tests | `php artisan test` passing 100% of feature and unit tests. | Pending |
| **Phase 7** | Security & SEO | Lighthouse report; CSRF validation proof; JSON-LD validator output. | Pending |
| **Phase 8** | Final QA | Comprehensive sign-off against reference site before handoff. | Pending |

