# The Modern Bible Theme

## 📌 Overview
This repository contains a **The Modern Bible Theme** built as part of the HTML Developer recruitment task.  
The theme is fully block-based, responsive, and styled using **vanilla CSS** without any frameworks.  
All sections are implemented as reusable Native Gutenberg blocks with clean, semantic HTML and accessibility considerations.

---

## WordPress Setup
- **Tested with WordPress Version:** `6.8.2`
- **PHP Version:** `8.3.19`
- **Theme Type:** Custom theme from scratch (no starter themes, no frameworks)

---

## Features
- Fully responsive layout (desktop, tablet, mobile)
- All sections built as **reusable blocks** (native Gutenberg)
- Clean, semantic HTML with basic ARIA attributes
- Vanilla CSS
- Optimized images with `loading="lazy"`
- **JavaScript-powered interactive blocks**:
  - Slick Slider for testimonial sections
  - Fancybox for video popup functionality

## Known Issues
- This page took more time to build as it was my first experience working entirely with the Gutenberg editor.

## Pending Features
- Editor view does not fully match the front-end layout, as this is my first time building a page entirely in the Gutenberg editor.

## 💡 Technical Reflection

### What I’d Improve with More Time
With additional time, I would enhance the Gutenberg editor experience so that the backend more closely matches the front-end layout, similar to how Elementor provides a visually accurate live preview. This would make the editing process more intuitive and manageable for non-technical users. I would also focus on further optimizing mobile performance.

### Suggestions for Scalability, Accessibility, and Performance
Using ACF blocks can save time by creating flexible, reusable sections without depending only on native Gutenberg blocks. Also,  If we use flexible blocks or flexible content, we can add backend options like setting the image position (left or right) and choosing colors for headings or background, which native Gutenberg blocks do not provide.

### Technical Choices Made
I chose native Gutenberg blocks for most sections to ensure long-term compatibility with WordPress core and easier maintenance. Vanilla CSS was used for full control over styling, keeping the codebase lightweight and framework-free as per requirements. I implemented the testimonial slider using Slick Slider for smooth transitions and the video popup using Fancybox for a clean, responsive user experience. These decisions were made to balance functionality, performance.

## Installation
1. Download or clone this repository into your /wp-content/themes/ directory.
2. Activate The Modern Bible Theme in WordPress Admin → Appearance → Themes.
3. Import the ACF JSON files via Custom Fields → Tools.
4. Import the provided database to include the pre-built sections.
