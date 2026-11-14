# CLONE ACCURACY CHECKLIST: BUGS WIRELESS & SMOKE SHOP
## Element-by-Element Reference Replication Tracking

**Reference Website:** `https://fanatic-luxe-mart-go.base44.app/`  
**Tracking Statuses:** `NOT INSPECTED` | `INSPECTED` | `IMPLEMENTED` | `VERIFIED` | `NEEDS CORRECTION` | `BLOCKED BY INACCESSIBLE REFERENCE`  
**Last Updated:** November 15, 2026  

---

## 1. Global Navigation & Layout Components

| Component / Element | Reference Detail | Status | Notes |
|---|---|---|---|
| **Header: Top Announcement Bar** | Desktop/Tablet sub-bar: "Same-day phone repair · walk-ins welcome", "90-day warranty · free diagnostics", "Open daily 10 – 8" | **VERIFIED** | Full-width sticky header sub-bar matching reference 1:1 |
| **Header: Brand Logo & Title** | 36px circular icon + `BUGS.` with steel blue dot (`text-[26px] font-semibold`) | **VERIFIED** | Matches reference |
| **Header: Brand Subtitle** | `Wireless & Repair` / `Smoke shop inside` (`font-mono text-[11px] uppercase tracking-wider`) | **VERIFIED** | Matches reference |
| **Header: Navigation Links** | `Repairs`, `Phone gear`, `Shop all`, `Smoke shop`, `Visit us`, `Your orders` | **VERIFIED** | Matches reference |
| **Header: Phone Pill** | `314-441-2851` pill with phone icon (`hidden xl:flex text-[13px]`) | **VERIFIED** | Matches reference |
| **Header: Fix My Phone CTA** | Primary button `Fix my phone` with wrench icon (`hidden sm:flex`) | **VERIFIED** | Matches reference |
| **Header: Cart Bag Trigger** | Rounded bag button with bag icon, "Bag" text, dynamic counter badge | **VERIFIED** | Synced to `/api/cart` |
| **Header: Mobile Menu Toggle** | Hamburger button (`h-10 w-10 place-items-center rounded-full lg:hidden`) | **VERIFIED** | Triggers mobile offcanvas |
| **21+ Age Gate Modal** | Centered modal: `BUGS.` logo, `Wireless · Repair · Smoke`, "Are you 21 or older?", copy, "Yes, I'm 21 or older" & "No, take me out" | **VERIFIED** | Exact copy & layout |
| **Cart Drawer (Aside Slide-Out)** | 420px aside slide-out with empty state, live item list, steppers, subtotal, checkout button | **VERIFIED** | Authoritative cart lifecycle |
| **Search Modal** | Floating modal with search input, popular categories, ESC badge | **VERIFIED** | Interactive search trigger |
| **Global Footer: Brand Column** | Logo `BUGS.`, subtitle, exact description, Instagram `@bugs_wirless_and_smoke_shop` | **VERIFIED** | Matches reference |
| **Global Footer: Repairs Column** | `Phone & tablet repair`, `Carrier activation`, `Data transfer & backup`, `Your orders` | **VERIFIED** | Exact link list |
| **Global Footer: Shop Column** | `Cases, glass & audio`, `Vapes & disposables`, `Glass & pipes`, `All products` | **VERIFIED** | Exact link list |
| **Global Footer: Visit Column** | Address `10010 Halls Ferry Rd`, Phone `314-441-2851`, Hours `Mon – Sun · 10:00 AM – 8:00 PM` | **VERIFIED** | Exact contact rows |
| **Global Footer: Policy Links** | `Delivery & pickup` (`/policies#shipping`), `Returns` (`/policies#returns`), `21+ age policy` (`/policies#age`), `Privacy` (`/policies#privacy`) | **VERIFIED** | Links to `/policies` |
| **Global Footer: Copyright & Warning** | `© 2026 Bugs Wireless & Smoke Shop. All rights reserved.` / `Tobacco & vape products for adults 21+ · Nicotine is addictive` | **VERIFIED** | Exact copy |

---

## 2. Homepage (`/`)

| Section / Element | Reference Detail | Status | Notes |
|---|---|---|---|
| **Section 1: Hero Ambient Blooms** | Dual radial glows: `.glow-platinum` (top-left) and `.glow-steel` (bottom-right) | **VERIFIED** | Exact position and size |
| **Hero: Eyebrow Badge** | Map-pin icon + `Certified repair counter · St. Louis` | **VERIFIED** | Exact copy & icon |
| **Hero: Main Heading** | `Phone repair,` / `<span class="font-serif-display text-steel">the same day</span>` / `on Halls Ferry.` | **VERIFIED** | Exact typography |
| **Hero: Body Description** | "Cracked screen, tired battery, dead charging port — our technicians work the bench in front of you..." | **VERIFIED** | Exact copy |
| **Hero: Action Buttons** | Primary `Fix my phone` (wrench + arrow), Outline `Shop phones & accessories` | **VERIFIED** | Exact labels & routes |
| **Hero: Proof List (`dl`)** | 3-column stats: `30 min` (Most screen repairs), `90 days` (Parts & labour warranty), `All carriers` (Activation & data transfer) | **VERIFIED** | Exact numbers & labels |
| **Hero: Visual Asset** | Image `28ec12444_generated_image.png` (alt: `A technician replacing a phone screen at a repair bench`) | **VERIFIED** | Exact image asset |
| **Hero: Floating Diagnostics Card** | `Free diagnostics` / `Bring it in — we quote the repair before we start.` + circular call button | **VERIFIED** | Exact copy & action |
| **Section 2: Announcement Marquee** | Infinite ticker between Hero and Repair bench with 8 exact guarantees | **VERIFIED** | Positioned directly between Hero and Repair Bench |
| **Section 3: Repair Bench Image** | Image `41b9158c6_generated_83ccd249.png` (alt: `A technician repairing a phone at the bench`) + 90-day warranty badge | **VERIFIED** | Exact image & badge |
| **Repair Bench: Heading & Text** | Eyebrow `The repair bench`, Heading `Broken today, fixed by tonight`, exact description | **VERIFIED** | Exact copy |
| **Repair Bench: 6 Services List** | Screen ($79), Battery ($59), Charging port ($49), Liquid damage ($39), Data transfer ($29), Carrier activation (no charge) with Lucide icons | **VERIFIED** | Exact price tags (`from $79`, etc.) and subtitles |
| **Repair Bench: Action Buttons** | Primary `See repair services` -> `/repairs`, Outline `Call the bench` -> `tel:+13144412851` | **VERIFIED** | Exact button labels and targets |
| **Section 4: Wireless Counter** | Eyebrow `The wireless counter`, Heading `Gear for the phone you just fixed.`, `Shop all products` link | **VERIFIED** | Exact copy & link |
| **Wireless Counter: 4 Product Cards** | `Fog Guard Clear Case` ($19.99), `Armor Glass` ($14.99), `Pulse Buds` ($49.99), `Ember Bank` ($34.99) | **VERIFIED** | Exact 4 products |
| **Section 5: Smoke Shop Aisles** | Eyebrow `Also in store · 21+ counter`, Heading `The smoke shop side of the counter.`, exact description | **VERIFIED** | Exact copy |
| **Smoke Shop: 5 Aisle Tiles** | `01 Vapes`, `02 E-Liquids`, `03 Glass & Pipes`, `04 Hookah`, `05 Phone Accessories` | **VERIFIED** | Exact numbers & categories |
| **Section 6: Visit the Counter** | Eyebrow `Visit the counter`, Heading `Repairs, activation and a look around.`, exact description | **VERIFIED** | Exact copy |
| **Visit: 4 Contact Rows** | Address, Call the counter (`314-441-2851`), Hours (`Mon – Sun · 10:00 AM – 8:00 PM`), 90-day warranty row | **VERIFIED** | Exact icons & text |
| **Visit: Visual & Action** | Image `445179722_generated_image.png` + `Get directions` button on image | **VERIFIED** | Exact image & button |

---

## 3. Repair Services (`/repairs`)

| Element | Reference Detail | Status | Notes |
|---|---|---|---|
| **Repairs Hero** | Eyebrow `The repair bench`, Heading `We fix all phones while you wait.`, exact description, Call & Quote buttons, Address link | **VERIFIED** | Exact copy |
| **What We Fix Section** | Eyebrow `Full service capability`, Heading `What we fix`, disclaimer about upfront pricing | **VERIFIED** | Exact copy |
| **6 Service Detail Cards** | Screen ($79), Battery ($59), Charging port ($49), Liquid damage ($39), Data transfer ($29), Carrier activation (no charge) with full descriptions | **VERIFIED** | Exact copy |
| **3-Step Process** | `01 Bring it in`, `02 Free quote`, `03 Same-day fix` with exact step paragraphs | **VERIFIED** | Exact copy |
| **CTA Counter Banner** | `Open Mon – Sun · 10:00 AM – 8:00 PM`, `Bring it by the counter.`, `Free diagnosis · no appointment needed`, Quote & Call buttons | **VERIFIED** | Exact copy |
| **Repair Quote Modal** | Interactive modal form storing inquiry in SQLite/MySQL database with validation | **VERIFIED** | Verified & tested |

---

## 4. Shop Catalog (`/shop`)

| Element | Reference Detail | Status | Notes |
|---|---|---|---|
| **Catalog Header** | Eyebrow `Phones, gear & the 21+ counter`, Heading `Everything in stock.` | **VERIFIED** | Exact copy |
| **Category Filter Pills** | `All`, `Phone Accessories`, `Vapes`, `E-Liquids`, `Glass & Pipes`, `Hookah` + product count badge | **VERIFIED** | Exact pills |
| **10 Reference Products** | 10 products with exact names, prices, categories, badges, and 1:1 square image containers | **VERIFIED** | Exact catalog |
| **Quick Add-to-Bag** | Interactive circular button adding item directly to session cart drawer | **VERIFIED** | Fully functional |

---

## 5. Product Detail View (`/shop/{slug}`)

| Element | Reference Detail | Status | Notes |
|---|---|---|---|
| **Breadcrumbs & Category** | Back button + category link + product name | **VERIFIED** | Exact layout |
| **Product Media & Information** | High-res image, price, description, brand tag, stock availability | **VERIFIED** | Exact layout |
| **Add to Bag Stepper** | Numeric quantity stepper + Add to bag button + 21+ ID badge | **VERIFIED** | Fully functional |
| **More in Category** | Related products grid from the same category | **VERIFIED** | Exact related items |

---

## 6. Policies Page (`/policies`)

| Element | Reference Detail | Status | Notes |
|---|---|---|---|
| **Policies Header** | Eyebrow `The fine print`, Heading `Pickup, returns & the rules.`, contact disclaimer | **VERIFIED** | Matches reference 1:1 with `314-441-2851` link |
| **Section `#shipping`** | Heading `Pickup, delivery & shipping` with 3 exact paragraphs | **VERIFIED** | 1-hour free pickup, $5 local delivery (free over $50), $8 shipping |
| **Section `#returns`** | Heading `Returns` with 3 exact paragraphs | **VERIFIED** | 14-day unopened, nicotine exclusion, fitting guarantee |
| **Section `#age`** | Heading `21+ age policy` with 3 exact paragraphs | **VERIFIED** | Mandatory 21+ ID check, online cancellation rule, health notice |
| **Section `#privacy`** | Heading `Your details` with 2 exact paragraphs + Visit information block | **VERIFIED** | Minimal fulfillment data, deletion request policy, store visit box |

---

## 7. Account / Orders Page (`/account`)

| Element | Reference Detail | Status | Notes |
|---|---|---|---|
| **Account View** | Header `Welcome back`, Subtitle `Log in to your account` / Order lookup form | **VERIFIED** | Allows customers to track order status |
