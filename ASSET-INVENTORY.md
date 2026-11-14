# ASSET INVENTORY & MEDIA DIRECTORY
**Project:** BUGS Wireless & Smoke Shop Clone  
**Audit Source:** `https://fanatic-luxe-mart-go.base44.app/`  
**Storage Location:** `.audit/reference_assets/` and `public/assets/images/`  
**Date:** November 15, 2026  

---

## 1. Brand Identity & Global Assets

| Asset Name | Local File | Original Source URL | Aspect / Dimensions | Usage |
|---|---|---|---|---|
| **Store Logo** | `9c6ad8d0b_logo.png` | `https://media.base44.com/images/public/6af3bd9c1141871615af4ece/9c6ad8d0b_logo.png/v1/fit/w_180,h_180/9c6ad8d0b_logo.png` | 180x180 (1:1) | Navbar Brand, Footer Brand, Age Gate Header |
| **Favicon** | `favicon.ico` / `9c6ad8d0b_logo.png` | Same | 32x32 / 180x180 | Browser Tab Icon |

---

## 2. Lifestyle & Hero Photography

| Asset Name | Local File | Original Source URL | Aspect / Dimensions | Section / Usage |
|---|---|---|---|---|
| **Hero Technician** | `28ec12444_generated_image.png` | `.../28ec12444_generated_image.png/v1/fill/w_712,h_605,al_c,q_90...` | 712x605 (~1.17:1) | Homepage Hero (Right Column) |
| **Repair Bench Macro** | `41b9158c6_generated_83ccd249.png` | `.../41b9158c6_generated_83ccd249.png/v1/fill/w_712,h_534,al_c,q_90...` | 712x534 (4:3) | Homepage Section 2 ("Broken today, fixed by tonight") & Repairs Page Banner |
| **In-Store Display** | `445179722_generated_image.png` | `.../445179722_generated_image.png/v1/fill/w_712,h_490,al_c,q_90...` | 712x490 (~1.45:1) | Homepage Visit Section ("Repairs, activation and a look around") |

---

## 3. Product Catalog Photography (10 Core Catalog Items)

| Product Title | Category | Local File | Original Source URL | Dimensions |
|---|---|---|---|---|
| **Fog Guard Clear Case** | Phone Accessories | `8f9936f3e_generated_4062126e.png` | `.../8f9936f3e_generated_4062126e.png/v1/fill/w_349,h_349...` | 349x349 (1:1) |
| **Armor Glass Screen Shield** | Phone Accessories | `ae8e3a226_generated_ecbed8f7.png` | `.../ae8e3a226_generated_ecbed8f7.png/v1/fill/w_349,h_349...` | 349x349 (1:1) |
| **Pulse Buds Wireless** | Phone Accessories | `449f67b51_generated_f9fb9662.png` | `.../449f67b51_generated_f9fb9662.png/v1/fill/w_349,h_349...` | 349x349 (1:1) |
| **Ember Power Bank 10K** | Phone Accessories | `409c37ddf_generated_d2f4253b.png` | `.../409c37ddf_generated_d2f4253b.png/v1/fill/w_349,h_349...` | 349x349 (1:1) |
| **Midnight Ice 20K Disposable** | Vapes | `vape-midnight-ice.png` | Local & Seeded Catalog | 349x349 (1:1) |
| **Blue Razz Cloud 6K** | Vapes | `vape-blue-razz.png` | Local & Seeded Catalog | 349x349 (1:1) |
| **Salty Coast Nic Salt 30ml** | E-Liquids | `eliquid-salty-coast.png` | Local & Seeded Catalog | 349x349 (1:1) |
| **Ember Beaker Bong 12"** | Glass & Pipes | `glass-ember-beaker.png` | Local & Seeded Catalog | 349x349 (1:1) |
| **Nebula Hand Pipe** | Glass & Pipes | `glass-nebula-pipe.png` | Local & Seeded Catalog | 349x349 (1:1) |
| **Brass Haze Hookah** | Hookah | `hookah-brass-haze.png` | Local & Seeded Catalog | 349x349 (1:1) |

---

## 4. Iconography System

The reference website uses **Lucide Icons** exclusively (SVG strokes `stroke-width="2" stroke="currentColor"`).  
No icon fonts or foreign icon sets are used on the reference site.

Key Lucide Icons Identified:
- `ShieldCheck` (Hero eyebrow guarantee, 90-day warranty)
- `Wrench` (Repair bench CTA, repair category badges)
- `Smartphone` (Device repair, phone accessories)
- `Clock` (Store hours 10 – 8)
- `MapPin` (10010 Halls Ferry Rd)
- `Phone` (Direct dial `314-441-2851`)
- `ShoppingBag` (Navbar Bag button)
- `Minus`, `Plus`, `X` (Cart drawer quantity and dismiss controls)
- `ArrowRight` (CTA button hover expansion)
- `Check` (Checklist items, verified badges)

---

## 5. Asset Directory Mapping

All assets are structured inside `public/assets/` to ensure offline, local-first zero-latency loading:
```
public/assets/
├── css/
│   ├── bootstrap.min.css         (Bootstrap 5.3.3 core)
│   ├── bugs-theme.css            (Exact reverse-engineered design system)
│   └── lucide-icons.css          (Lucide SVG symbol defs & helpers)
├── images/
│   ├── logo.png                  (Original 9c6ad8d0b_logo.png)
│   ├── lifestyle/
│   │   ├── hero-tech.png         (Original 28ec12444_generated_image.png)
│   │   ├── repair-bench.png      (Original 41b9158c6_generated_83ccd249.png)
│   │   └── store-display.png     (Original 445179722_generated_image.png)
│   └── products/
│       ├── case-fog-guard.png    (Original 8f9936f3e_generated_4062126e.png)
│       ├── screen-armor-glass.png(Original ae8e3a226_generated_ecbed8f7.png)
│       ├── audio-pulse-buds.png  (Original 449f67b51_generated_f9fb9662.png)
│       ├── power-ember-bank.png  (Original 409c37ddf_generated_d2f4253b.png)
│       └── ...
└── js/
    ├── bootstrap.bundle.min.js   (Bootstrap 5.3.3 JS)
    ├── gsap.min.js               (GSAP 3.12.5)
    └── bugs-app.js               (Cart, Age Gate, Marquee, Smooth Interactions)
```

