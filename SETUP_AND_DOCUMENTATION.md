# MANSA RAM MAHAJAN & CO — PRODUCTION E-COMMERCE SUITE
## WordPress Theme & WooCommerce Companion Plugin Documentation

---

### 1. Executive Summary & Deliverables

This distribution contains the complete, production-grade WordPress theme and companion WooCommerce split-payment plugin for **Mansa Ram Mahajan & Co**, faithfully replicating the visual structure, layout, shopping experience, and interactive flows demonstrated in the reference website ([Odhni](https://odhni.com/)) and the supplied reference screenshots.

#### Primary Deliverables:
1. **`mansa-ram-mahajan.zip`** (103.1 MB) — Installable WordPress theme package (tested & validated).
2. **`mrm-split-payment.zip`** (12.2 KB) — Installable companion split-payment WordPress plugin (tested & validated).
3. **`mansa-ram-mahajan/`** — Complete uncompressed theme source code.
4. **`mrm-split-payment/`** — Complete companion plugin source code.
5. **`preview/`** — Standalone browser preview and interactive testing environment.

---

### 2. File & Directory Architecture

```
mansa/
├── mansa-ram-mahajan.zip             # Installable WordPress Theme
├── mrm-split-payment.zip             # Installable Companion Plugin
├── SETUP_AND_DOCUMENTATION.md        # Comprehensive Setup Guide
│
├── mansa-ram-mahajan/                # Custom Theme Root
│   ├── style.css                     # Master Stylesheet & Design Tokens
│   ├── functions.php                 # Theme Setup, Enqueues & Providers
│   ├── theme.json                    # WordPress 6+ Global Styles Schema
│   ├── screenshot.png                # Theme Admin Preview (1200x900)
│   ├── header.php                    # Section 1 (Announcements) & Section 2 (Header)
│   ├── footer.php                    # Section 16 (Editorial Footer, Skyline & WhatsApp)
│   ├── front-page.php                # Sections 3-15 Homepage Architecture
│   ├── index.php                     # Fallback Blog & Post Template
│   ├── page.php                      # Single Page Template
│   ├── woocommerce.php               # WooCommerce Content Wrapper
│   │
│   ├── inc/
│   │   ├── customizer.php            # Announcement & Store Customizer Controls
│   │   └── woocommerce-setup.php     # WooCommerce Wrappers, Breadcrumbs & AJAX Search
│   │
│   ├── woocommerce/
│   │   ├── single-product.php        # Section 6 (Product Detail Page - Screenshot 2)
│   │   └── archive-product.php       # Section 5 (Catalog & Filter Sidebar)
│   │
│   ├── patterns/
│   │   └── hero.php                  # Gutenberg Block Pattern for Festive Hero
│   │
│   └── assets/
│       ├── css/
│       │   ├── header.css            # Navigation, Search & Drawer Styles
│       │   ├── homepage.css          # All 16 Homepage Sections Styles
│       │   ├── woocommerce.css       # Gallery, Variations & Delivery Timeline
│       │   └── responsive.css        # Responsive Queries (360px to 1920px)
│       ├── js/
│       │   ├── main.js               # Header Scroll, Search, Modals & Accordions
│       │   └── gallery.js            # Product Thumbnails, Video Switch & Pills
│       ├── images/                   # 21 Real High-Res Photos, Banners & SVGs
│       └── video/                    # 3 Real Client MP4 Videos
│
├── mrm-split-payment/                # Companion WooCommerce Plugin
│   ├── mrm-split-payment.php         # Plugin Header, AJAX Handlers & Modal Markup
│   ├── includes/
│   │   ├── class-mrm-split-settings.php # Deposit Config & Admin Settings Menu
│   │   └── class-mrm-split-order.php    # Server Calculation, Order Meta & Status
│   └── assets/
│       ├── css/mrm-modal.css         # Centered 2-Column Modal (Screenshot 3)
│       └── js/mrm-modal.js           # AJAX Order Calculation & Variation Sync
│
└── preview/                          # Standalone Verification Environment
    ├── index.html                    # Homepage Interactive Replica
    ├── product.html                  # Product Page with Live Split Payment Modal
    ├── shop.html                     # Catalog Archive with Sidebar Filters
    └── assets/                       # Mirrored Styles, Scripts & Media Assets
```

---

### 3. Installation Instructions

#### Step 1: Install the WordPress Theme
1. Log in to your WordPress Admin dashboard (`wp-admin`).
2. Navigate to **Appearance → Themes → Add New → Upload Theme**.
3. Choose the file `mansa-ram-mahajan.zip` from your computer.
4. Click **Install Now**, and once uploaded, click **Activate**.

#### Step 2: Install Required Plugins
The theme is designed to integrate seamlessly with standard WordPress and WooCommerce:
- **WooCommerce** (Version 6.0 or higher) — *Required for commerce catalog, cart, checkout, and inventory*.
- **MRM Split Payment** (`mrm-split-payment.zip`) — *Required for the Buy Now split-payment popup, partial online deposits, and balance-on-delivery tracking*.

To install the companion plugin:
1. Navigate to **Plugins → Add New → Upload Plugin**.
2. Choose `mrm-split-payment.zip`.
3. Click **Install Now** and then **Activate Plugin**.

#### Step 3: Configure WooCommerce Base Settings
1. Navigate to **WooCommerce → Settings → General**:
   - Store Currency: **Indian Rupee (INR - ₹)**
   - Selling Locations: Sell to all countries or select targeted domestic/international countries.
2. Navigate to **WooCommerce → Settings → Products**:
   - Set the Shop page to your Catalog page.
   - Placeholder Image: Choose `mansa-festive-banner.png` or `logo.svg`.
3. Navigate to **WooCommerce → Settings → Shipping**:
   - Add a Shipping Zone (e.g. *India Domestic*).
   - Add Shipping Method: **Free Shipping** with rule *"A minimum order amount"* set to **₹14,999**.
   - Add Standard Flat Rate (e.g. ₹150 for orders below ₹14,999).

---

### 4. Split-Payment Plugin Configuration

The **MRM Split Payment** plugin provides store owners with full server-side control over partial payment deposits without writing code.

1. Navigate to **WooCommerce → MRM Split Payment** in the WordPress Admin sidebar.
2. Configure your options:
   - **Enable Split Payment Modal**: Checked (`yes`).
   - **Option 1 (Token Deposit Online)**: Enter fixed deposit amount (default: `₹199.00`).
   - **Option 2 (Part-Payment Online)**: Enter higher deposit amount (default: `₹299.00`).
   - **Option 3 (Full Payment Online)**: Automatically calculates the full 100% order amount.
   - **Minimum Order Total Eligible**: Set the minimum threshold (default: `₹999.00`).
   - **COD Handling Charge**: Optional additional charge for cash collection on delivery.
3. Click **Save Changes**.

#### How Split Orders are Handled in WooCommerce:
- When a customer selects Option 1 or Option 2, the online deposit is charged via the active payment gateway.
- The order status is automatically assigned to:
  `wc-deposit-paid` (**Deposit Paid - Balance Due on Delivery**).
- The exact deposit paid and the outstanding balance due are stored in structured order metadata (`_mrm_deposit_paid`, `_mrm_balance_due`) and displayed prominently in:
  1. The **WooCommerce Admin Order Edit** screen.
  2. The **Order Confirmation Email** sent to both customer and merchant.
  3. The printed packing slip/invoice for courier dispatch.

---

### 5. Payment Gateway Setup Guide

For collecting the online deposit amount (e.g. ₹199, ₹299, or full ₹6,995):
1. Install an authorized Indian payment gateway plugin (such as **Razorpay for WooCommerce**, **Cashfree Payments**, or **PhonePe Payment Gateway**).
2. Enter your Merchant Key ID and Key Secret in test mode first.
3. Enable payment methods:
   - **UPI** (Google Pay, PhonePe, Paytm, BHIM)
   - **Credit / Debit Cards** (Visa, MasterCard, RuPay)
   - **Net Banking** (All major Indian banks)
4. Enable **Cash on Delivery (COD)** in WooCommerce Payments settings so balance collection on delivery is recognized.

---

### 6. Asset Inventory & Verification Audit

All client assets provided in `/Users/farhan/Downloads/mansa` have been carefully organized and integrated:

| Asset Name | Type / Size | Assigned Usage |
|---|---|---|
| `Mansa Festive Collection Editorial Banner.png` | 1774 x 887 | Homepage Section 3 (Asymmetric Hero Banner) |
| `Khushiyan Har Pal_ Bridal Elegance.png` | 1774 x 887 | Homepage Section 10 (Bridal Splendour Collage) |
| `Mansa Wedding Season Editorial.png` | 1774 x 887 | Homepage Section 10 (Editorial Hero Image) |
| `Olive Couture Gown Editorial Portrait.png` | 1672 x 941 | Homepage Section 11 (Cinematic Video Poster) |
| `Woman_wearing_red_bridal_lehenga_20261015215058.jpg` | 896 x 1200 | Product Detail Page Main Image & Hero Mobile |
| `Woman_modeling_red_bridal_lehenga_20261015215042.jpg` | 896 x 1200 | Product Gallery Angle 2 & Hover Image |
| `Model_wearing_red_bridal_lehenga_20261015215105.jpg` | 896 x 1200 | Product Gallery Angle 3 & Chandni Chowk Store |
| `Female_model_wearing_blue_lehenga_20261015215044.jpg` | 896 x 1200 | Wedding Collection & Karol Bagh Store |
| `Model_wearing_blue_lehenga_20261015215049.jpg` | 896 x 1200 | Blue Lehenga Hover Image |
| `Model_wearing_orange_gold_lehenga_20261015215028.jpg` | 896 x 1200 | Category Lehengas & Kohat Enclave Store |
| `Model_posing_in_lehenga_choli_20261015215038.jpg` | 896 x 1200 | South Extension Store & Sangeet Edit |
| `Model_wearing_teal_outfit_20261015215017.jpg` | 896 x 1200 | Category Suits & Rajouri Garden Store |
| `Model_wearing_traditional_outfit_20261015215051.jpg` | 896 x 1200 | Traditional Sharara Hover Image |
| `Model_posing_in_pink_outfit_20261015215033.jpg` | 896 x 1200 | Cocktail Saree Edit |
| `Model_wearing_salwar_kameez_20261015215113.jpg` | 896 x 1200 | Daytime Grace Anarkali |
| `Model_wearing_embroidered_outfit_20261015215056.jpg` | 896 x 1200 | Product Gallery Video Thumbnail |
| `Model_poses_in_pink_lehenga_20261015214840.mp4` | 17 MB MP4 | Section 3 Hero Mobile Video & Section 11 Video |
| `Model_showcasing_embroidered_leh...1080p.mp4` | 18 MB MP4 | Section 5 Lookbook Video 2 |
| `Model_wearing_embroidered_orange...1080p.mp4` | 4.3 MB MP4 | Single Product Gallery Inline Video Player |
| `logo.svg` | Vector SVG | Brand Monogram & Classic Serif Wordmark |
| `skyline.svg` | Vector SVG | Section 16 Delhi Monumental Skyline Illustration |

---

### 7. Responsive & Functional Verification Matrix

| Screen Size | Device Target | Layout Behavior Verified |
|---|---|---|
| **1920px & 1440px** | Large Desktop / iMac | Full wide asymmetric hero, 4 & 5-col grids, 2-col product page with sticky gallery, 2-column centered modal. |
| **1024px** | Tablet Landscape | Hero stacks gracefully, 3-col product grids, filters collapsible, payment modal balanced. |
| **768px** | Tablet Portrait | Mobile hamburger navigation triggers smooth drawer, hero panel prominent, 2-col product grids. |
| **430px & 390px** | iPhone 14/15/16 Pro | Single-column fluid product info, touch-friendly pill buttons, full-width modal, sticky WhatsApp button. |
| **360px** | Android Standard | Zero horizontal page-level overflow, crisp typography, accessible touch targets. |

---

### 8. Client Missing Details & Recommendations Before Launch

1. **GST Number & Registered Legal Name**: Add the store's official GSTIN and company registration number into the footer copyright bar.
2. **Payment Gateway Credentials**: Insert production Razorpay/Cashfree live API keys and test with a live ₹1 UPI transaction.
3. **Domain & SSL**: Ensure an active SSL certificate is bound to the domain to activate HTTPS for secure checkout.

---

### 9. Task 2: Complete Website Admin Control System

The theme and companion plugin have been extended with a native, executive-level administration system designed specifically for non-technical boutique owners to control the entire storefront without touching code.

#### 1. Top-Level WordPress Admin Menu: **MRM Website Control**
Located directly in the main WordPress admin sidebar with Dashicons store branding and 13 specialized management screens:

| Admin Submenu | Page Slug | View Template | Features & Controls |
|---|---|---|---|
| **Dashboard** | `mrm-dashboard` | `view-dashboard.php` | Real-time catalog metrics (Products, Orders, Boutiques), quick-navigation cards, WooCommerce links. |
| **Homepage Builder** | `mrm-homepage-builder` | `view-homepage-builder.php` | Individual toggle switches to enable/disable any of the 13 storefront sections without touching code. |
| **Header & Navigation** | `mrm-header-navigation` | `view-header-navigation.php` | Rotating announcement messages (1 per line), search/cart/wishlist icon visibility, logo upload & preview. |
| **Promotional Banners** | `mrm-promotional-banners` | `view-promotional-banners.php` | Section 3 Hero banner headline, subtitle, primary/secondary CTA text & links, background image, phone video & poster, trust pillars. |
| **Homepage Sections** | `mrm-homepage-sections` | `view-homepage-sections.php` | Section titles, subtitles, and CTA buttons for Wedding, Lehenga, and Saree collections, VIP concierge cards, and heritage stats. |
| **Campaigns & Videos** | `mrm-campaigns-videos` | `view-campaigns-videos.php` | Section 10 "Khushiyan Har Pal" editorial story, craft features, primary/secondary images, and Section 11 cinematic atelier video & poster. |
| **Categories & Collections** | `mrm-categories-collections`| `view-categories-collections.php`| 4 iconic arched category cards (titles, links, and Media Library image pickers) + WooCommerce taxonomy link. |
| **Store Locations** | `mrm-store-locations` | `view-store-locations.php` | Dynamic repeater table to add, edit, or remove Delhi NCR flagship boutiques (Pitampura, Karol Bagh, Chandni Chowk, South Ex, Kohat, Rajouri). |
| **Testimonials & Reviews** | `mrm-testimonials` | `view-testimonials.php` | Dynamic repeater table for verified bride testimonials (name, city, product tag, 1–5 star rating, quote). |
| **Payment Popup** | `mrm-payment-popup` | `view-payment-popup.php` | Dedicated Buy Now 2-column modal settings: enable/disable, Option 1 (₹199 token deposit), Option 2 (₹299 partial payment), Option 3 (100% full payment), order limits. |
| **Store Settings** | `mrm-store-settings` | `view-store-settings.php` | Live color pickers with hex sync for Primary Crimson, Gold Accent, Secondary Dark, Sale Badges, Free Shipping threshold (₹14,999). |
| **SEO Settings** | `mrm-seo-settings` | `view-seo-settings.php` | Homepage meta title, meta description, and OpenGraph social sharing image with media picker and preview. |
| **Import & Export** | `mrm-import-export` | `view-import-export.php` | 1-click JSON configuration backup, JSON import overwrite, and factory reset button. |
| **System Status** | `mrm-system-status` | `view-system-status.php` | Server PHP limits, WordPress & WooCommerce version check, asset readability, and options health check. |

#### 2. Media Library Integration (`wp.media`)
All image and video configuration fields include an **"Upload / Select from Media Library"** button that opens the native WordPress Media uploader modal. The administrator can select any image from the media library, upload new files, or clear existing selections with instant visual previews.

#### 3. Real-Time Dynamic Frontend Customization
- **CSS Variables Injection**: Changing colors in **Store Settings** dynamically injects CSS root variables in `wp_head`:
  ```css
  :root {
    --color-primary: #C42B59;
    --color-gold: #D4AF37;
    --color-secondary: #1A1A1A;
    ...
  }
  ```
- **Conditional Section Rendering**: When an administrator toggles off any section in **Homepage Builder**, the section is completely omitted from the HTML on the frontend.
- **Repeaters for Boutiques and Reviews**: The storefront dynamically loops through the active store locations and customer reviews configured in admin.

#### 4. Security & Role Governance
- **Strict Capability Checking**: All admin screens and action handlers verify `current_user_can('manage_options')`.
- **Nonce Protection**: Every form submission is validated via `check_admin_referer('mrm_save_settings_nonce', 'mrm_nonce_field')`.
- **Sanitization & Escaping**: All inputs are sanitized using `sanitize_text_field()`, `sanitize_textarea_field()`, `esc_url_raw()`, and `sanitize_hex_color()`. All frontend outputs use `esc_html()`, `esc_attr()`, and `esc_url()`.

---

### 10. Hero Slider & Video Collection Slider Updates

1. **Section 3: Pure 4-Slide Landscape Hero Slider**
   - Incorporates all 4 landscape images from the client directory at clean 2:1 uncropped aspect ratio:
     1. `Mansa Festive Collection Editorial Banner.png` (`mansa-festive-banner.png`) — Festive Collection 2026 / Royal Crimson Splendour
     2. `Mansa Wedding Season Editorial.png` (`mansa-wedding-season.png`) — Wedding Season Edit / Regal Heritage Weaves
     3. `Khushiyan Har Pal_ Bridal Elegance.png` (`mansa-bridal-elegance.png`) — Bridal Couture Atelier / Khushiyan Har Pal
     4. `Olive Couture Gown Editorial Portrait.png` (`mansa-couture-portrait.png`) — Evening Glamour & Gowns / Atelier Masterpieces
   - Images natively contain typography and promotional artwork; no redundant text overlays or cropping.
   - Includes two prominent call-to-action floating buttons: **SHOP NOW** and **EXPLORE BRIDAL**.
   - Zero video in the hero section for maximum speed and clean editorial presentation.
   - Features smooth 0.7s crossfade transitions, configurable autoplay timing (default 5000ms), pause on mouse hover, touch swipe support for mobile/tablets, previous/next buttons, and interactive navigation dots.
   - Configurable under **MRM Website Control → Promotional Banners**.

2. **Section 11: Atelier Video Collection Slider (3 Client Videos)**
   - Replaced single landscape video with an interactive **3-video collection slider**:
     - **Video Reel 01**: `Model_poses_in_pink_lehenga_20261015214840.mp4` (`video-campaign-pink.mp4`) — Runway Walk / Royal Crimson Bridal Movement
     - **Video Reel 02**: `Model_showcasing_embroidered_leh...1080p.mp4` (`video-lehenga-showcase.mp4`) — Sangeet Flare / Celebratory Gold Can-Can Flare
     - **Video Reel 03**: `Model_wearing_embroidered_orange...1080p.mp4` (`video-product-gallery.mp4`) — Atelier Fit / Artisanal Silk Draping & Silhouette
   - Each video card features portrait (9:14 / reels) aspect ratio, custom Play/Pause toggle button, Sound Mute/Unmute toggle, video metadata badge, title, description, and "Full Reel" modal viewer.
   - Includes carousel previous/next arrows on desktop and smooth horizontal touch swipe on mobile.
   - Fully customizable under **MRM Website Control → Campaigns & Videos**.

3. **Slide-in Cart Drawer (Right Side) & Cross-Sell Engine**
   - Interactive slide-in side cart panel triggered automatically when clicking "Add to cart" or the header bag icon.
   - Shows real-time cart items, quantity controls (+ / −), color/size metadata, and item removal.
   - Dynamic **Free Express Shipping Progress Bar** (unlocks at ₹14,999).
   - Integrated **Cross-Sell / Complete the Look** section with paired luxury accessories (Dupatta, Potli Bag) and instant 1-click `+ Add` action.
   - Live subtotal recalculation and high-visibility **CONTINUE TO CHECKOUT** primary button.
   - Direct shortcut to the ₹199 token deposit split-payment popup.

