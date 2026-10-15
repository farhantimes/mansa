# Mansa Ram Mahajan & Co — Luxury E-Commerce Platform

[![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-blue.svg)](https://wordpress.org/)
[![WooCommerce](https://img.shields.io/badge/WooCommerce-Compatible-purple.svg)](https://woocommerce.com/)
[![License](https://img.shields.io/badge/License-Proprietary-gold.svg)]()
[![Status](https://img.shields.io/badge/Status-Production%20Ready-success.svg)]()

> A bespoke, high-performance WordPress + WooCommerce e-commerce website and executive administration suite engineered for **Mansa Ram Mahajan & Co**, a premier women's luxury ethnic couture retailer in Delhi NCR.

---

## 🏛 Project Highlights

- **Visual Inspiration**: Closely crafted following the shopping experience, visual hierarchy, and interactive flows demonstrated in [Odhni](https://odhni.com/).
- **Section 3: Pure 4-Slide Landscape Hero Slider**:
  - Full-width luxury 2:1 aspect ratio slider incorporating all 4 client landscape editorial banners with crossfade transitions and auto-advance.
  - Interactive previous/next navigation arrows, active dot pagination, and touch-swipe support.
  - Floating dual action buttons: **SHOP NOW** and **EXPLORE BRIDAL**.
  - Zero video in the hero section; hero images natively contain artwork typography. All client videos are featured in the dedicated Section 11 Video Collection Slider.
- **Section 11: Atelier Video Collection Slider**:
  - Interactive 3-card collection slider featuring all 3 client MP4 videos.
  - Portrait 9:14 reel aspect ratio, custom Play/Pause toggle buttons, Sound Mute/Unmute toggle, metadata badges, and fullscreen modal player.
- **Product Detail Experience**:
  - 2-column layout with sticky left media gallery (multiple angles + inline MP4 video player).
  - Color and size variation selectors, live price recalculation, urgency badges, and imperial size guide modal.
  - Dynamic 3-step delivery timeline (Purchased → Processing → Delivered) with automatically calculated business days.
- **Buy Now Split Payment Engine (`mrm-split-payment`)**:
  - Centered 2-column modal: Pay ₹199 Token Deposit, ₹299 Partial Tailoring Advance, or 100% Full Payment Online.
  - Remaining balance collected via Cash/UPI on delivery.
  - Dedicated custom WooCommerce order statuses (`wc-deposit-paid`, `wc-part-paid`).
- **Complete Website Control Admin System**:
  - 14 executive admin screens under **MRM Website Control** in WordPress Admin.
  - Non-technical controls for homepage sections, hero slides, video collection, store locations, customer reviews, split payments, and brand colors.
- **Zero Build-Step Standalone Preview**:
  - Complete static preview in `preview/` with working storefront, product page, catalog, and admin control center.

---

## 📁 Repository Structure

```
.
├── mansa-ram-mahajan/          # Custom WordPress Theme Source
│   ├── style.css               # Design tokens, fonts, master styles
│   ├── functions.php           # Theme setup, assets enqueuing, providers
│   ├── header.php              # Announcement strip, navigation header, mobile drawer
│   ├── footer.php              # Editorial footer, Delhi skyline artwork, WhatsApp concierge
│   ├── front-page.php          # Sections 1-16 Homepage architecture
│   ├── inc/                    # Admin controller, theme customizer, WooCommerce setup
│   │   ├── admin/              # MRM Website Control (14 view templates)
│   │   └── woocommerce-setup.php
│   ├── woocommerce/            # Single product & archive catalog templates
│   └── assets/                 # CSS stylesheets, JS scripts, images, and videos
│
├── mrm-split-payment/          # Companion WooCommerce Plugin Source
│   ├── mrm-split-payment.php   # Plugin bootstrap, AJAX handlers, modal markup
│   ├── includes/               # Settings & server order calculation classes
│   └── assets/                 # Modal CSS and JavaScript
│
├── preview/                    # Standalone Static Preview Environment
│   ├── index.html              # Homepage with 4-slide Hero & 3-video Slider
│   ├── product.html            # Product Page with Buy Now Split Payment Modal
│   ├── shop.html               # Catalog Archive with Sidebar Filters
│   ├── admin.html              # Executive Admin Control Center Replica
│   └── assets/                 # Mirrored CSS, JS, and client media
│
├── mansa-ram-mahajan.zip       # Ready-to-install WordPress Theme Archive
├── mrm-split-payment.zip       # Ready-to-install Companion Plugin Archive
├── SETUP_AND_DOCUMENTATION.md  # Comprehensive Setup & Deployment Guide
├── .gitignore                  # Production repository ignore rules
└── README.md                   # This documentation
```

---

## 🚀 Installation & Deployment

### Method 1: Installing into WordPress

1. **Theme Installation**:
   - Go to **WordPress Admin → Appearance → Themes → Add New → Upload Theme**.
   - Choose `mansa-ram-mahajan.zip` and click **Install Now** → **Activate**.
2. **Companion Plugin Installation**:
   - Go to **Plugins → Add New → Upload Plugin**.
   - Choose `mrm-split-payment.zip` and click **Install Now** → **Activate**.
3. **WooCommerce Setup**:
   - Ensure **WooCommerce** (6.0+) is installed and active.
   - Set currency to **INR (₹)** under **WooCommerce → Settings → General**.
   - Enable **Cash on Delivery (COD)** under **WooCommerce → Settings → Payments** to allow doorstep collection of remaining balances.
4. **Customization**:
   - Access **MRM Website Control** in the WordPress sidebar to manage all banners, sliders, stores, reviews, and payment deposit thresholds.

### Method 2: Testing Standalone Preview Locally

You can preview the entire application immediately without installing PHP or WordPress:

```bash
# Navigate to the project folder
cd /path/to/mansa

# Start a local HTTP server
python3 -m http.server 8899 --directory preview

# Open in your browser:
# Storefront: http://localhost:8899/index.html
# Product & Split Payment Modal: http://localhost:8899/product.html
# Catalog Archive: http://localhost:8899/shop.html
# Admin Control System: http://localhost:8899/admin.html
```

---

## 🎨 Brand Design System

| Token | Value | Description |
|---|---|---|
| `--color-primary` | `#C42B59` | Royal Crimson / Deep Rani Pink |
| `--color-gold` | `#D4AF37` | Imperial Zari Gold Accent |
| `--color-secondary` | `#1A1A1A` | Deep Charcoal Black |
| `--font-serif` | `'Playfair Display', serif` | Editorial Haute Couture Typography |
| `--font-sans` | `'Montserrat', sans-serif` | Clean Modern UI Typography |

---

## 📦 Pushing to Your GitHub Repository

```bash
# 1. Initialize git (if not already initialized)
git init

# 2. Add files and create initial commit
git add .
git commit -m "feat: complete Mansa Ram Mahajan & Co luxury e-commerce suite with 4-slide hero slider & 3-video collection slider"

# 3. Connect to your GitHub repository and push
git branch -M main
git remote add origin https://github.com/<YOUR-USERNAME>/<YOUR-REPOSITORY>.git
git push -u origin main
```

---

## 📄 License & Attribution

Copyright © 2026 Mansa Ram Mahajan & Co. All Rights Reserved.  
Crafted with bespoke WordPress + WooCommerce architecture.
