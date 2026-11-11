---
milestone: v1.0.0-bugs-clone
updated: 2026-11-12T00:23:00+05:00
---

# REQUIREMENTS.md — Formal Requirements Specification

## Functional Requirements

| ID | Requirement | Description | Target Phase | Status |
|----|-------------|-------------|--------------|--------|
| REQ-01 | Architecture & Setup | Install Laravel 12 on PHP 8.3 with MySQL, establish directory layout, Bootstrap 5.3 foundation. | Phase 1 | Complete |
| REQ-02 | Repairs & Home Routes | Configure named routes `home` (`/`) and `repairs` (`/repairs`) backed by controllers. | Phase 1 | Complete |
| REQ-03 | Master Layout & Blade Components | Establish `layouts/app.blade.php`, `navbar.blade.php`, `announcement-bar.blade.php`, and `footer.blade.php`. | Phase 1, Phase 2 | Phase 1 Complete |
| REQ-04 | Sticky Navbar & Dynamic Blur | Top announcement bar + sticky navigation header with dynamic blur on scroll (`window.scrollY > 16`). | Phase 2 | Pending |
| REQ-05 | Age Verification Gate | Modal popup prompting `Are you 21 or older?`, saving `bugs-age-confirmed = 'yes'` in `localStorage`. | Phase 2 | Pending |
| REQ-06 | Offcanvas Cart Drawer | Slide-out bag offcanvas showing items, live counter badge, quantity selector, subtotal calculation. | Phase 2, Phase 5 | Pending |
| REQ-07 | Full Repairs Page Recreation | Hero, 6 service cards, 3-step process, CTA banner, exact typography and styles from `/repairs`. | Phase 3 | Pending |

---

## Technical Constraints Verification

| ID | Constraint | Status | Proof |
|----|------------|--------|-------|
| CON-01 | Bootstrap 5.3 ONLY | Verified | `public/assets/css/bootstrap.min.css` (v5.3.3) & `public/assets/js/bootstrap.bundle.min.js` |
| CON-02 | Tailwind CSS Absence | Verified | Purged from `package.json`, `vite.config.js`, zero Tailwind dependencies |
| CON-03 | PHP & Laravel Standard | Verified | PHP 8.3.36 CLI, Laravel 12.72.0 framework |
| CON-04 | MySQL Database Integration | Verified | MariaDB 10.4.32 on `127.0.0.1:3306`, database `bugs_wireless` migrated |
