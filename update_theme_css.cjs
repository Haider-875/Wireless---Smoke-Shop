const fs = require('fs');
const path = 'public/assets/css/bugs-theme.css';

let content = fs.readFileSync(path, 'utf8');

const newRoot = `/**
 * BUGS Wireless & Smoke Shop — Design System
 * Pixel-Perfect Reverse-Engineered from https://fanatic-luxe-mart-go.base44.app/
 * Bootstrap 5.3 Extension — ZERO Tailwind CSS
 */

:root, [data-bs-theme="dark"], .dark {
  /* Reference HSL Space & Surface Variables */
  --background: 220 11% 4%;
  --foreground: 210 12% 96%;
  --card: 220 9% 7%;
  --card-foreground: 210 12% 96%;
  --popover: 220 9% 6%;
  --popover-foreground: 210 12% 96%;
  --primary: 208 16% 93%;
  --primary-foreground: 220 14% 8%;
  --secondary: 220 8% 12%;
  --secondary-foreground: 210 12% 96%;
  --muted: 220 8% 11%;
  --muted-foreground: 214 8% 63%;
  --accent: 220 8% 15%;
  --accent-foreground: 210 12% 96%;
  --destructive: 0 62% 50%;
  --destructive-foreground: 0 0% 98%;
  --border: 220 8% 17%;
  --input: 220 8% 19%;
  --ring: 202 70% 62%;
  --steel: 202 70% 62%;
  --steel-foreground: 220 14% 8%;
  --gold: 38 40% 58%;
  --gold-foreground: 220 14% 8%;
  --surface: 220 9% 6%;
  --surface-raised: 220 8% 8.5%;
  --surface-deep: 220 11% 3.5%;
  --radius: 0.875rem;

  /* Typography Families */
  --font-heading: 'Manrope', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
  --font-body: 'Manrope', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
  --font-display: 'Manrope', ui-sans-serif, system-ui, sans-serif;
  --font-serif: 'Cormorant Garamond', ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;
  --font-mono: 'JetBrains Mono', ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;

  /* Mapped Hex & RGB Tokens for Bootstrap 5.3 Compatibility */
  --bugs-bg: #090b0e;
  --bugs-card: #101215;
  --bugs-surface-1: #0e1012;
  --bugs-surface-2: #14161a;
  --bugs-surface-3: #181b20;
  --bugs-surface-4: #23262a;
  --bugs-card-alt: #07080a;
  --bugs-modal-bg: #0e1012;

  --bugs-fg: #f4f6f8;
  --bugs-fg-muted: #9ca2aa;
  --bugs-fg-pearl: #f4f6f8;

  --bugs-steel: #5cb9ea;
  --bugs-primary: #eaedf0;
  --bugs-primary-hover: #ffffff;
  --bugs-primary-fg: #111417;

  --bugs-gold: #ba9a6d;
  --bugs-gold-hover: #cbb085;

  --bugs-border: rgba(255, 255, 255, 0.08);
  --bugs-border-light: rgba(255, 255, 255, 0.15);
  --bugs-border-steel: rgba(92, 185, 234, 0.45);
  --bugs-border-gold: rgba(186, 154, 109, 0.45);

  --bs-body-bg: #090b0e;
  --bs-body-color: #f4f6f8;
  --bs-primary: #5cb9ea;
  --bs-primary-rgb: 92, 185, 234;
  --bs-link-color: #5cb9ea;
  --bs-link-hover-color: #7ecef5;
  --bs-focus-ring-color: rgba(92, 185, 234, 0.35);

  /* Spacing Tokens */
  --spacing-0: 0px;
  --spacing-25: 2px;
  --spacing-50: 4px;
  --spacing-75: 8px;
  --spacing-100: 12px;
  --spacing-200: 16px;
  --spacing-300: 24px;
  --spacing-400: 32px;
  --spacing-500: 40px;
  --spacing-600: 48px;
  --spacing-700: 64px;
  --spacing-800: 80px;
  --spacing-900: 96px;

  /* Status Colors */
  --bugs-destructive: #dc3545;
  --bugs-success: #198754;

  /* Motion Tokens */
  --ease-base: cubic-bezier(0.16, 1, 0.3, 1);
  --duration-layout: 500ms;
  --duration-interactive: 300ms;
}

/* Base Reference Typography & Display Classes */
.font-serif-display {
  font-family: var(--font-serif) !important;
  letter-spacing: -.01em !important;
  font-style: italic !important;
  font-weight: 400 !important;
}

.eyebrow {
  font-family: var(--font-mono) !important;
  letter-spacing: .2em !important;
  text-transform: uppercase !important;
  font-size: .6875rem !important;
  line-height: 1.4 !important;
}

.text-steel {
  color: hsl(var(--steel)) !important;
}

.text-gold {
  color: hsl(var(--gold)) !important;
}

.bg-surface {
  background-color: hsl(var(--surface)) !important;
}

.bg-surface-raised {
  background-color: hsl(var(--surface-raised)) !important;
}

.bg-surface-deep {
  background-color: hsl(var(--surface-deep)) !important;
}

.border-subtle {
  border-color: rgba(255, 255, 255, 0.07) !important;
}

/* Radial Glows */
.glow-steel {
  background: radial-gradient(circle at 50% 50%, hsl(var(--steel) / .16), transparent 70%) !important;
}

.glow-platinum {
  background: radial-gradient(circle at 50% 50%, hsl(var(--foreground) / .09), transparent 68%) !important;
}

.glow-gold {
  background: radial-gradient(circle at 50% 50%, hsl(var(--gold) / .16), transparent 70%) !important;
}

/* Animations */
.reveal {
  animation: .9s cubic-bezier(.16, 1, .3, 1) both rise;
}

.marquee-track {
  display: flex !important;
  width: max-content !important;
  animation: 42s linear infinite marquee !important;
}

.marquee-track:hover {
  animation-play-state: paused;
}

@keyframes marquee {
  0% { transform: translate(0); }
  to { transform: translate(-50%); }
}

@keyframes rise {
  0% { opacity: 0; transform: translateY(18px); }
  to { opacity: 1; transform: translateY(0); }
}

@media (prefers-reduced-motion: reduce) {
  .marquee-track, .reveal {
    animation: none !important;
  }
  html {
    scroll-behavior: auto !important;
  }
}
`;

// Replace from start until html {
const htmlIdx = content.indexOf('/* Base Document */') !== -1 ? content.indexOf('/* Base Document */') : content.indexOf('html {');
if (htmlIdx !== -1) {
  content = newRoot + '\n' + content.slice(htmlIdx);
  fs.writeFileSync(path, content, 'utf8');
  console.log('Successfully updated bugs-theme.css with reverse-engineered tokens');
} else {
  console.error('Could not find base document anchor');
}

