# TYPOGRAPHY REFERENCE MAP: BUGS WIRELESS & SMOKE SHOP
## Reverse-Engineered Font & Typography Architecture

**Reference Single Source of Truth:** `https://fanatic-luxe-mart-go.base44.app/`  
**Reference Stylesheet:** `assets/index-BpWOTZT8.css`  
**Audit Date:** November 15, 2026  
**Implementation Target:** `bugs-theme.css` / Laravel Blade Architecture  

---

## 1. Font Family Manifest & Loaded Network Assets

The reference application uses three distinct web font families imported directly via Google Fonts CDN and defined in the root stylesheet:

```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400;1,500;1,600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
```

### Font Variable Declarations (Extracted from `:root`)

| CSS Variable | Family Definition | Role in Design System |
|---|---|---|
| `--font-heading` | `"Manrope", ui-sans-serif, system-ui, sans-serif` | Product titles, card headings, subheaders |
| `--font-body` | `"Manrope", ui-sans-serif, system-ui, sans-serif` | Body text, descriptions, navigation, buttons |
| `--font-display` | `"Manrope", ui-sans-serif, system-ui, sans-serif` | High-impact headlines, hero display titles |
| `--font-serif` | `"Cormorant Garamond", ui-serif, Georgia, serif` | Signature editorial italics (`.font-serif-display`) |
| `--font-mono` | `"JetBrains Mono", ui-monospace, SFMono-Regular, monospace` | Eyebrow badges, tabular prices, metadata numbers (`.num`, `.eyebrow`) |

---

## 2. Category-by-Category Typography Specifications

### 1. Main Hero Heading
- **Location:** Section 1 (Hero Title)
- **Computed Font Family:** `Manrope` (`var(--font-display)`) + `Cormorant Garamond` (italic span)
- **Font Weight:** `600` (semibold) for primary lines; `400` (italic) for `.font-serif-display`
- **Font Size:** `clamp(2.6rem, 6.4vw, 4.9rem)` (Desktop ~64px-78px, Mobile ~42px)
- **Line Height:** `1.05 - 1.1` (`leading-none` to `leading-tight`)
- **Letter Spacing:** `-0.03em` (`tracking-tight`)
- **Text Color:** `hsl(var(--foreground))` (`#ffffff`) with steel accent `hsl(var(--steel))` (`#5cb9ea`)

### 2. Section Headings (`h2`, `h3`)
- **Location:** All section introduction titles ("Broken today, fixed by tonight", "The smoke shop side", "Visit the counter")
- **Computed Font Family:** `Manrope` + `Cormorant Garamond`
- **Font Weight:** `600` (semibold) with `400` italic accent
- **Font Size:** `clamp(2rem, 4vw, 3.2rem)` (Desktop ~42px-51px, Mobile ~32px)
- **Line Height:** `1.15`
- **Letter Spacing:** `-0.025em`
- **Text Color:** `hsl(var(--foreground))` (`#ffffff`) with steel (`#5cb9ea`) or gold (`#ba9a6d`)

### 3. Body Paragraphs & Descriptions
- **Location:** Hero descriptions, section subtext, policy bodies, card descriptions
- **Computed Font Family:** `Manrope` (`var(--font-body)`)
- **Font Weight:** `400` (regular)
- **Font Size:** `16px - 17px` on desktop (`text-[17px]`, `text-[16px]`), `14px` on cards
- **Line Height:** `1.6` (`leading-relaxed`)
- **Letter Spacing:** Normal (`0`)
- **Text Color:** `hsl(var(--muted-foreground))` / `#94a3b8` (`rgb(148, 163, 184)`)

### 4. Header & Navigation Typography
- **Brand Title (`BUGS.`):** `font-family: var(--font-display); font-size: 26px; font-weight: 600; letter-spacing: -0.025em;`
- **Brand Subtitle:** `font-family: var(--font-mono); font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase; line-height: 1.5;`
- **Nav Links:** `font-family: var(--font-body); font-size: 13.5px; font-weight: 400; color: hsl(var(--muted-foreground));`
- **Telephone Pill:** `font-family: var(--font-mono); font-size: 13px; font-weight: 400; letter-spacing: 0.05em;`
- **Fix My Phone CTA:** `font-family: var(--font-body); font-size: 13px; font-weight: 600;`

### 5. Buttons & Action Links
- **Hero Primary Button:** `font-family: var(--font-body); font-size: 15px; font-weight: 600; letter-spacing: -0.01em;`
- **Hero Secondary Button:** `font-family: var(--font-body); font-size: 15px; font-weight: 500;`
- **Section Action Buttons:** `font-family: var(--font-body); font-size: 14px; font-weight: 600;`
- **Modal Buttons:** `font-family: var(--font-body); font-size: 14px; font-weight: 600;`

### 6. Product Titles
- **Location:** Product grid cards (`/` and `/shop`)
- **Computed Font Family:** `Manrope` (`var(--font-heading)`)
- **Font Weight:** `500` (medium)
- **Font Size:** `15px` (`text-[15px]`)
- **Line Height:** `1.35` (`leading-snug`)
- **Letter Spacing:** `-0.01em`
- **Text Color:** `hsl(var(--foreground))` (`#ffffff`)

### 7. Product Prices & Tabular Numbers
- **Location:** Product card prices, cart subtotal, repair fee starting rates
- **Computed Font Family:** `JetBrains Mono` (`var(--font-mono)`, `.num`)
- **Font Weight:** `500` / `600`
- **Font Size:** `15px` (`text-[15px]`)
- **Font Variant Numeric:** `tabular-nums`
- **Text Color:** `hsl(var(--primary))` (`#5cb9ea` / steel accent)

### 8. Labels, Badges & Eyebrows
- **Eyebrow Headers (`.eyebrow`):** `font-family: var(--font-mono); font-size: 0.6875rem (11px); font-weight: 400; letter-spacing: 0.2em; text-transform: uppercase; line-height: 1.4;`
- **Discount Badges (`Save $10.00`):** `font-family: var(--font-mono); font-size: 10px; font-weight: 500; letter-spacing: 0.16em; text-transform: uppercase;`
- **Aisle Numbers (`01` - `05`):** `font-family: var(--font-mono); font-size: 11px; letter-spacing: 0.05em;`

### 9. Footer Typography
- **Section Headers:** `font-family: var(--font-mono); font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase; color: hsl(var(--muted-foreground));`
- **Footer Links:** `font-family: var(--font-body); font-size: 14px; font-weight: 400; color: hsl(var(--foreground)/0.8);`
- **Compliance Bar:** `font-family: var(--font-mono); font-size: 11px; letter-spacing: 0.18em; text-transform: uppercase; color: hsl(var(--muted-foreground));`
- **Copyright:** `font-family: var(--font-body); font-size: 12px; font-weight: 400; color: hsl(var(--muted-foreground));`

---

## 3. Centralized CSS Implementation

All font definitions and typography utility classes are centralized in `public/assets/css/bugs-theme.css`:

```css
:root {
  --font-heading: 'Manrope', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
  --font-body: 'Manrope', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
  --font-display: 'Manrope', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
  --font-serif: 'Cormorant Garamond', Georgia, serif;
  --font-mono: 'JetBrains Mono', SFMono-Regular, Menlo, Monaco, Consolas, monospace;
}

body {
  font-family: var(--font-body);
  font-feature-settings: "rlig" 1, "calt" 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.font-display {
  font-family: var(--font-display);
}

.font-serif-display {
  font-family: var(--font-serif) !important;
  letter-spacing: -0.01em;
  font-style: italic !important;
  font-weight: 400 !important;
}

.eyebrow {
  font-family: var(--font-mono) !important;
  letter-spacing: 0.2em !important;
  text-transform: uppercase !important;
  font-size: 0.6875rem !important;
  line-height: 1.4 !important;
}

.num {
  font-family: var(--font-mono) !important;
  font-variant-numeric: tabular-nums !important;
}
```
