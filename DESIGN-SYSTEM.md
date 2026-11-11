# DESIGN-SYSTEM.md — BUGS Wireless & Smoke Shop Design Specification

## Overview
This design system defines the visual language, typography, color tokens, component architecture, and responsive behaviors reverse-engineered directly from the live reference website `https://fanatic-luxe-mart-go.base44.app/repairs`.

All components and styles are implemented using **pure Bootstrap 5.3 + custom CSS**.

---

## 1. Color Palette & CSS Variables

```css
:root {
  /* Core Backgrounds */
  --bugs-bg: #0a0a0b;               /* hsl(240, 6%, 4%) - Main Dark Backdrop */
  --bugs-card: #111113;             /* hsl(240, 6%, 7%) - Card Surface */
  --bugs-card-alt: #08080a;         /* Process steps section background */
  --bugs-modal-bg: #0d0d0f;         /* Age gate modal surface */
  
  /* Text & Foreground */
  --bugs-fg: #f2f2f2;               /* hsl(0, 0%, 95%) - Primary readable text */
  --bugs-fg-muted: #9999a1;         /* hsl(240, 4%, 62%) - Subtitles & descriptions */
  
  /* Primary Accent (Luxury Warm Gold) */
  --bugs-primary: #b89766;          /* hsl(39, 42%, 56%) - Gold Accent */
  --bugs-primary-hover: #c8a776;    /* Lightened Gold for interactive states */
  --bugs-primary-fg: #0f0f12;       /* hsl(240, 8%, 6%) - Contrast text on gold */
  
  /* Borders & Surfaces */
  --bugs-border: rgba(255, 255, 255, 0.07);
  --bugs-border-light: rgba(255, 255, 255, 0.12);
  --bugs-border-gold: rgba(184, 151, 102, 0.45);
  
  /* Status */
  --bugs-destructive: #dc3545;
  --bugs-success: #198754;
}
```

---

## 2. Typography Specification

### Font Families
1. **Primary Body & Display**: `Space Grotesk`, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif
2. **Luxury Serif Accent**: `Cormorant Garamond`, Georgia, serif (Italicized for contrasting emphasis words)
3. **Monospaced Utility**: `JetBrains Mono`, SFMono-Regular, Menlo, Monaco, Consolas, monospace

### Typography Classes & Styles
- **Headings (`h1`, `h2`, `h3`)**:
  - `h1`: Font weight 600, fluid sizing `clamp(2.4rem, 5.6vw, 4.4rem)`, letter-spacing `-0.02em`.
  - `h2`: Font weight 600, fluid sizing `clamp(1.8rem, 3.4vw, 2.6rem)`.
  - `h3`: Font weight 500, font size `1.25rem` (`20px`).
- **`.font-serif-display`**:
  - Font family: `Cormorant Garamond`, serif.
  - Font style: `italic`.
  - Color: `var(--bugs-primary)`.
  - Letter spacing: `-0.01em`.
- **`.eyebrow`**:
  - Font family: `JetBrains Mono`, monospace.
  - Font size: `0.6875rem` (`11px`).
  - Text transform: `uppercase`.
  - Letter spacing: `0.22em`.
  - Line height: `1.4`.
- **`.num`**:
  - Font family: `JetBrains Mono`, monospace.
  - Font variant numeric: `tabular-nums`.

---

## 3. UI Effects & Lighting

### Glow Effect (`.glow-gold`)
```css
.glow-gold {
  position: absolute;
  pointer-events: none;
  background: radial-gradient(circle at 50% 50%, rgba(184, 151, 102, 0.16), transparent 68%);
  filter: blur(40px);
}
```

### Backdrop Blurs
- Sticky Navbar (default): `background: rgba(10, 10, 11, 0.4); backdrop-filter: blur(12px);`
- Sticky Navbar (scrolled > 16px): `background: rgba(10, 10, 11, 0.88); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255, 255, 255, 0.06);`

---

## 4. Component Rules

### Buttons
- **Primary Pill**:
  - Class: `.btn-bugs-primary`
  - Shape: `border-radius: 9999px` (`rounded-pill`)
  - Padding: `0.875rem 1.75rem`
  - Colors: Background `var(--bugs-primary)`, Text `var(--bugs-primary-fg)`, Font weight `500`
  - Animation: `transition: transform 0.2s ease, background-color 0.2s ease;`
  - Hover: `transform: translateY(-2px);`
- **Secondary Outlined Pill**:
  - Class: `.btn-bugs-outline`
  - Shape: `border-radius: 9999px`
  - Colors: Border `1px solid rgba(255, 255, 255, 0.15)`, Text `var(--bugs-fg)`
  - Hover: Border `1px solid var(--bugs-primary-hover)`, Text `var(--bugs-primary)`

### Cards
- **Service Cards**:
  - Background: `var(--bugs-card)` (`#111113`)
  - Border: `1px solid rgba(255, 255, 255, 0.07)`
  - Border Radius: `1.25rem` (`20px`)
  - Padding: `1.5rem` (`24px`)
  - Hover state: Border turns to `rgba(184, 151, 102, 0.4)` with smooth 0.3s transition.
  - Icon Container: 40px x 40px circle with `border: 1px solid rgba(255, 255, 255, 0.1)`, text `var(--bugs-primary)`.

### Modals & Drawers
- **Age Verification Modal**:
  - Fixed full viewport backdrop: `rgba(0, 0, 0, 0.85)` with `backdrop-filter: blur(8px)`.
  - Dialog card: Max width 448px (`28rem`), border-radius `1.5rem` (`24px`), background `#0d0d0f`.
- **Cart Bag Drawer**:
  - Bootstrap Offcanvas component (`.offcanvas-end`) customized with dark surface `#0d0d0f`, border-left `1px solid rgba(255, 255, 255, 0.08)`.
  - Header with item count and close button.
  - Item row with image thumbnail (80x80 rounded-xl), quantity modifier (+ / -), and delete icon.
  - Subtotal footer with checkout button.

---

## 5. Responsive Breakpoints (Bootstrap 5 Standards)
- **Extra Small (Phones)**: `< 576px`
- **Small (Landscape phones)**: `≥ 576px` (`sm`)
- **Medium (Tablets)**: `≥ 768px` (`md`)
- **Large (Desktops)**: `≥ 992px` (`lg`)
- **Extra Large (Wide screens)**: `≥ 1200px` (`xl`)
- **Extra Extra Large (Max Container)**: `≥ 1400px` (`xxl`)

