# TYPOGRAPHY & DESIGN SYSTEM REVERSE-ENGINEERING
**Project:** BUGS Wireless & Smoke Shop Clone  
**Source of Truth:** `https://fanatic-luxe-mart-go.base44.app/assets/index-BpWOTZT8.css`  
**Date:** November 15, 2026  

---

## 1. Typography Hierarchy & Font Families

The reference typography utilizes a high-contrast pairing of a modern geometric sans-serif for UI structure and technical clarity, combined with a classical high-contrast serif for editorial headings, and a monospace font for technical specifications.

### Primary Font Stacks
```css
/* Core Typography Variables */
--font-heading: "Manrope", ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
--font-body: "Manrope", ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
--font-display: "Manrope", ui-sans-serif, system-ui, sans-serif;
--font-serif: "Cormorant Garamond", ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;
--font-mono: "JetBrains Mono", ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
```

### Google Fonts Direct Embed
```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400;1,500;1,600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
```

### Type Scale & Hierarchy
| Level | Font Family | Size (Desktop / Mobile) | Weight | Line Height | Letter Spacing | Case |
|---|---|---|---|---|---|---|
| **Display H1** | `Manrope` / `Cormorant Garamond` (italic span) | `clamp(2.6rem, 6.4vw, 4.9rem)` | 600 / 400 italic | 1.05 | `-0.03em` | Sentence |
| **Section H2** | `Manrope` | `clamp(1.9rem, 3.8vw, 2.75rem)` | 600 | 1.15 | `-0.025em` | Sentence |
| **Subsection H3** | `Manrope` | `1.15rem – 1.35rem` (18–21px) | 600 | 1.25 | `-0.015em` | Sentence |
| **Eyebrow / Subhead**| `Manrope` / `JetBrains Mono` | `0.75rem – 0.8125rem` (12–13px) | 600 / 500 | 1.2 | `+0.08em` | Uppercase / Title |
| **Body Large** | `Manrope` | `1.0625rem` (17px) | 400 | 1.6 | normal | Normal |
| **Body Standard** | `Manrope` | `0.9375rem` (15px) | 400 | 1.55 | normal | Normal |
| **Body Small / Muted**| `Manrope` | `0.8125rem` (13px) | 400 | 1.45 | normal | Normal |
| **Price (Current)** | `Manrope` | `1.0625rem – 1.25rem` | 600 | 1.0 | `-0.01em` | Normal |
| **Price (Compare)** | `Manrope` | `0.875rem` (14px) | 400 | 1.0 | normal | Strikethrough |
| **Button Text** | `Manrope` | `0.8125rem – 0.9375rem` | 600 | 1.0 | `+0.01em` | Normal |

---

## 2. Color System (HSL & Hex Mapping)

The reference website uses an HSL color system in CSS variables mapped to dark luxury obsidian surfaces.

```css
:root, .dark {
  /* Surface & Base */
  --background: 220 11% 4%;           /* #090b0e - Deep obsidian black */
  --foreground: 210 12% 96%;          /* #f4f6f8 - Crisp platinum white */
  --surface: 220 9% 6%;               /* #0e1012 - Elevated dark surface */
  --surface-raised: 220 8% 8.5%;      /* #14161a - Card surface */
  --surface-deep: 220 11% 3.5%;       /* #07080a - Deepest background */

  /* Components */
  --card: 220 9% 7%;                  /* #101215 - Container surface */
  --card-foreground: 210 12% 96%;     /* #f4f6f8 */
  --popover: 220 9% 6%;               /* #0e1012 */
  --popover-foreground: 210 12% 96%;

  /* Action & Primary */
  --primary: 208 16% 93%;             /* #eaedf0 - High contrast bright CTA */
  --primary-foreground: 220 14% 8%;   /* #111417 - Dark text on bright CTA */

  /* Secondary & Muted */
  --secondary: 220 8% 12%;            /* #1c1e22 - Dark secondary chip */
  --secondary-foreground: 210 12% 96%;
  --muted: 220 8% 11%;                /* #1a1c1f */
  --muted-foreground: 214 8% 63%;     /* #9ca2aa - Subtext and secondary labels */

  /* Accents */
  --accent: 220 8% 15%;               /* #23262a */
  --accent-foreground: 210 12% 96%;
  --steel: 202 70% 62%;               /* #5cb9ea - Signature electric steel blue */
  --steel-foreground: 220 14% 8%;
  --gold: 38 40% 58%;                 /* #ba9a6d - Warm luxury metallic gold */
  --gold-foreground: 220 14% 8%;

  /* Borders & Dividers */
  --border: 220 8% 17%;               /* #282b30 */
  --input: 220 8% 19%;                /* #2c3035 */
  --ring: 202 70% 62%;                /* #5cb9ea */

  /* Status */
  --destructive: 0 62% 50%;           /* #d12e2e */
  --destructive-foreground: 0 0% 98%;

  /* Global Radii */
  --radius: 0.875rem;                 /* 14px */
}
```

---

## 3. Spacing, Containers & Grid System

- **Max Container Width:** `max-w-[1400px]` (1400px).
- **Horizontal Page Gutter:**
  - Mobile (`< 768px`): `px-5` (20px).
  - Tablet/Laptop (`768px – 1024px`): `px-8` (32px).
  - Desktop (`> 1024px`): `px-10` (40px).
- **Vertical Section Spacing:**
  - Standard Sections: `py-16` (64px) mobile, `py-24` (96px) desktop.
  - Border Dividers between sections: `border-t border-white/[0.07]`.
- **Card Radii:**
  - Large Hero Cards & Modals: `rounded-3xl` (24px).
  - Product Cards & Aisle Tiles: `rounded-2xl` (16px).
  - Buttons, Pills & Badges: `rounded-full` (9999px).
- **Shadows & Elevated Glows:**
  - Card Shadow: `shadow-[0_20px_50px_-20px_rgba(0,0,0,0.8)]`.
  - Button Glow on Hover: `box-shadow: 0 18px 44px -18px hsl(var(--foreground))`.
  - Steel Glow Aura: `radial-gradient(circle, rgba(92, 185, 234, 0.14) 0%, transparent 70%)`.
  - Platinum Glow Aura: `radial-gradient(circle, rgba(234, 237, 240, 0.12) 0%, transparent 70%)`.

---

## 4. Animation Keyframes & Motion Timing

All animations respect `@media (prefers-reduced-motion: reduce)`.

```css
/* Ticker Continuous Marquee */
@keyframes marquee {
  0% { transform: translateX(0%); }
  100% { transform: translateX(-50%); }
}
.marquee-track {
  display: flex;
  width: max-content;
  animation: marquee 35s linear infinite;
}
.marquee-track:hover {
  animation-play-state: paused;
}

/* Card Hover Lift */
.ref-card-hover {
  transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease;
}
.ref-card-hover:hover {
  transform: translateY(-4px);
  border-color: rgba(255, 255, 255, 0.16);
}

/* Modal / Drawer Transitions */
.drawer-enter {
  transform: translateX(100%);
  transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}
.drawer-enter-active {
  transform: translateX(0%);
}
```

