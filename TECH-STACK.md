# TECH-STACK.md — Technical Architecture & Stack Specification

## 1. System Overview
The application is a full-stack Laravel MVC web platform architected for extreme speed, search-engine visibility, modular maintainability, and visual fidelity.

---

## 2. Technology Inventory

| Layer | Technology | Version | Purpose |
|-------|------------|---------|---------|
| **Backend Language** | PHP | 8.3.36 | Server-side execution engine |
| **Backend Framework** | Laravel | 11.x | MVC routing, controllers, Blade templates, validation, ORM |
| **Database** | MySQL / MariaDB | 10.4+ / MariaDB 10.4 | Relational persistence for products, categories, orders, repair leads |
| **CSS Framework** | Bootstrap | 5.3.3 | Responsive grid, containers, offcanvas, modals, utilities |
| **Icons** | Bootstrap Icons + Font Awesome | 1.11.3 / 6.5.1 | Iconography for repair tools, phones, bag, location, clock |
| **Typography** | Google Fonts | Space Grotesk, Cormorant Garamond, JetBrains Mono | Brand and luxury typography |
| **JavaScript** | Vanilla ES6+ | Modern Browsers | Cart drawer offcanvas, age gate, live sticky navbar blur |
| **Development Tools** | Composer, NPM, Artisan | Composer 2.10, Node v24.18 | Dependency management and build scripts |

---

## 3. STRICTLY PROHIBITED TECHNOLOGIES
- **Tailwind CSS**: ❌ No Tailwind CLI, PostCSS Tailwind plugins, or `@tailwind` directives.
- **Tailwind Classes**: ❌ No utility combinations resembling Tailwind (e.g. `bg-primary/80` translated to pure CSS or Bootstrap custom properties).
- **React / Next.js**: ❌ No React runtime, JSX compilation, or hydration overhead.
- **Frontend SPA Frameworks**: ❌ No Vue, Svelte, or Angular.

---

## 4. Laravel MVC Architecture

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── HomeController.php          # Homepage & "Visit us" sections
│   │   ├── RepairController.php        # Repairs page & quote submissions
│   │   ├── ShopController.php          # Product listing, category filters, details
│   │   ├── CartController.php          # Session/cookie-based cart operations
│   │   ├── CheckoutController.php      # Order placement & validation
│   │   └── AccountController.php       # Order lookup & status
│   └── Requests/
│       ├── RepairQuoteRequest.php      # Validation for repair inquiry
│       └── CheckoutRequest.php         # Validation for order placement
├── Models/
│   ├── Product.php                     # Store products (vapes, glass, accessories)
│   ├── Category.php                    # Product categories
│   ├── Order.php                       # Customer orders
│   ├── OrderItem.php                   # Items within an order
│   └── RepairInquiry.php               # Phone/tablet repair quotes
database/
├── migrations/
│   ├── create_categories_table.php
│   ├── create_products_table.php
│   ├── create_orders_tables.php
│   └── create_repair_inquiries_table.php
└── seeders/
    ├── CategorySeeder.php
    └── ProductSeeder.php               # Populates reference store catalog
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php               # Master shell (Header, Bag Drawer, Age Modal, Footer)
│   ├── components/
│   │   ├── announcement-bar.blade.php
│   │   ├── navbar.blade.php
│   │   ├── footer.blade.php
│   │   ├── age-modal.blade.php
│   │   ├── cart-drawer.blade.php
│   │   ├── service-card.blade.php
│   │   ├── product-card.blade.php
│   │   └── cta-banner.blade.php
│   └── pages/
│       ├── repairs.blade.php           # Primary Target Page
│       ├── home.blade.php              # Storefront
│       ├── shop.blade.php              # Catalog
│       ├── checkout.blade.php          # Order checkout
│       └── account.blade.php           # Orders lookup
public/
├── assets/
│   ├── css/
│   │   ├── bootstrap.min.css           # Bootstrap 5.3.3 core
│   │   └── bugs-theme.css              # Custom design tokens, typography, dark theme
│   ├── js/
│   │   ├── bootstrap.bundle.min.js     # Bootstrap 5.3.3 JS (offcanvas, modal, dropdown)
│   │   ├── app.js                      # Sticky navbar blur, age verification
│   │   └── cart.js                     # Vanilla JS bag state & AJAX cart updates
│   └── images/
│       ├── logo.png                    # Brand logo
│       └── products/                   # Local optimized product imagery
```

