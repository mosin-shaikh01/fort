# Fort Explorer - Development Standards & Guidelines

## Project Overview

**Project Name:** Fort Explorer  
**Platform:** WordPress (Latest LTS)  
**Theme Type:** Custom Child/Parent Theme  
**Purpose:** Historical Fort Information and Blogging Platform  
**Target Audience:** History enthusiasts, tourists, educational institutions  
**Status:** Development Phase

---

## Development Standards

### WordPress Standards

- **Version:** WordPress 6.4+
- **Coding Standards:** [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- **Output Escaping:** All dynamic content must be escaped using appropriate functions
  - `esc_html()` for HTML content
  - `esc_attr()` for HTML attributes
  - `wp_kses_post()` for post content with allowed HTML
  - `esc_url()` for URLs
  - `esc_js()` for JavaScript strings
- **Input Sanitization:** All user input must be sanitized
  - `sanitize_text_field()` for general text
  - `sanitize_email()` for email addresses
  - `sanitize_url()` for URLs
  - `wp_kses_post()` for allowed HTML content
- **Nonce Verification:** All AJAX requests and form submissions require nonce verification
- **Translation Ready:** All strings must use `__()`, `_e()`, or `_x()` functions
  - Text domain: `fort-explorer`
  - Create `/languages/` directory for translation files
- **Accessibility:** WCAG 2.1 AA compliance required
  - Proper heading hierarchy (H1 → H6)
  - Alt text on all images
  - Keyboard navigation support
  - ARIA labels where needed
  - Color contrast ratios ≥ 4.5:1 for normal text
- **Gutenberg Compatibility:** Full block editor support
  - Register custom blocks with proper metadata
  - Support default/native blocks
  - Use block.json for configuration
- **No Page Builder Dependency:** Theme works without page builders
  - Custom template files for content
  - No Elementor/Beaver Builder requirement
- **Performance:** Core Web Vitals optimization
  - LCP (Largest Contentful Paint) < 2.5s
  - FID (First Input Delay) < 100ms
  - CLS (Cumulative Layout Shift) < 0.1

### PHP Standards

- **Version:** PHP 8.3+ (strict types)
- **Type Declarations:** All function parameters and returns must have types
- **Error Handling:** Try-catch blocks for external API calls
- **Namespacing:** Use namespaces for custom classes
  - Root namespace: `FortExplorer`
  - Example: `FortExplorer\Admin\Settings`
- **Constants:** Define theme constants in `/inc/constants.php`
  - `FORT_THEME_VERSION`
  - `FORT_THEME_DIR`
  - `FORT_THEME_URI`
- **Functions:** Prefix all custom functions with `fort_`
  - Example: `fort_get_fort_location()`
- **Classes:** Use PascalCase naming
  - Example: `class FortPostMeta {}`
- **Deprecated Functions:** Never use deprecated WordPress functions
  - Use `wp_get_theme()` instead of `get_theme_data()`
  - Use `get_the_post_thumbnail_url()` instead of `wp_get_attachment_image_src()`
- **Code Organization:** Functions grouped by purpose in separate files
  - `/inc/helpers.php` - General helper functions
  - `/inc/template-functions.php` - Template display functions
  - `/inc/woocommerce.php` - WooCommerce hooks (if needed)
- **Comments:** Minimal comments, clear naming speaks for itself
  - Add comments for "why", not "what"
  - Document complex logic only

### CSS Standards

- **Methodology:** BEM (Block Element Modifier)
  - `.block {}` - Main component
  - `.block__element {}` - Child element
  - `.block--modifier {}` - Variation
  - Example: `.fort-card__image--featured`
- **Approach:** Mobile-first responsive design
  - Base styles for mobile (< 640px)
  - Tablet breakpoint: 768px
  - Desktop breakpoint: 1024px
  - Large desktop: 1280px
- **Variables:** CSS Custom Properties for theming
  - `:root { --color-primary: #f66a01; }`
  - All colors, spacing, typography in variables
  - Dark mode variables supported
- **No Frameworks:** Pure CSS, no Bootstrap/Tailwind
  - Custom grid system using CSS Grid
  - Flexbox for component layouts
  - Custom utility classes only when necessary
- **File Organization:**
  - `/assets/css/style.css` - Main stylesheet
  - `/assets/css/editor.css` - Block editor styles
  - Use CSS imports to organize
- **Performance:** Critical CSS inline in `<head>`
  - Minimize render-blocking CSS
  - Defer non-critical styles
- **Units:** Mix of units for best results
  - `rem` for spacing and sizing (1rem = 16px)
  - `px` for borders
  - `%` for responsive sizing
  - `vw/vh` for hero sections

### JavaScript Standards

- **Framework:** Vanilla JavaScript (no jQuery)
- **Format:** ES6+ module syntax
  - Use `.js` for JavaScript files
  - Minify with build process
- **Approach:** Progressive enhancement
  - Core functionality works without JS
  - JS enhances experience
- **Module Structure:**
  - Each feature in separate module
  - Export only necessary functions
  - IIFE pattern for non-module code
- **Event Handling:**
  - Use event delegation for dynamic content
  - Cleanup event listeners to prevent memory leaks
  - Use `addEventListener()` only, never `onclick` attributes
- **AJAX Patterns:**
  - Use `fetch()` API, not `XMLHttpRequest`
  - Always verify nonce: `wp.ajax.post()` or custom `X-WP-Nonce` header
  - Handle errors gracefully
  - Show loading states
- **Deferred Loading:**
  - Use `defer` attribute on scripts
  - Avoid `async` unless necessary
  - Load above-the-fold JS inline, rest defer
- **No Globals:** Avoid polluting global scope
  - Wrap in modules or IIFE
  - Use object namespacing if necessary
  - Example: `window.FortExplorer = { ... }`
- **Browser Support:** Modern browsers only
  - Chrome 90+
  - Firefox 88+
  - Safari 14+
  - Edge 90+

### Performance Rules

- **Image Optimization:**
  - Lazy load off-screen images with `loading="lazy"`
  - Responsive images with `srcset` and `sizes`
  - Optimize source with `wp_get_attachment_image()`
  - Use WebP format with fallbacks
  - Maximum image width: 1920px
- **HTTP Requests:**
  - Combine CSS files into one
  - Combine fonts into one request
  - Minimize third-party scripts
  - No autoplaying videos
- **Caching Strategy:**
  - Implement browser caching headers
  - Use WordPress object cache (Redis if available)
  - Cache expensive queries with `wp_cache_*()` functions
  - 1-hour cache for post data
  - 24-hour cache for metadata
- **Asset Delivery:**
  - Minify CSS and JavaScript
  - Gzip compression enabled
  - Use CDN for static assets (optional)
  - Inline critical fonts
- **Database:**
  - Efficient WP_Query parameters
  - Limit posts_per_page in loops
  - Avoid N+1 queries with proper joins
  - Index frequently queried post meta

### Security Rules

- **Nonce Verification:** All forms and AJAX requests
  - Create: `wp_nonce_field('action_name', 'nonce_field')`
  - Verify: `wp_verify_nonce($_POST['nonce_field'], 'action_name')`
  - Use `check_ajax_referer()` for AJAX
- **Capability Checks:** Before any admin action
  - `current_user_can('edit_posts')`
  - `current_user_can('manage_options')` for theme settings
- **Data Sanitization:**
  - Always sanitize `$_GET`, `$_POST`, `$_REQUEST`
  - Use appropriate sanitization functions
  - Never trust user input
- **Output Escaping:**
  - Escape before output, not at retrieval
  - Use correct escape function for context
  - Never disable escaping
- **AJAX Security:**
  - Always verify nonce
  - Always check capabilities
  - Use `wp_send_json()` for responses
  - Use `wp_send_json_error()` for errors
  - Never output sensitive data
- **SQL Injection Prevention:**
  - Always use `$wpdb->prepare()`
  - Never concatenate SQL queries
  - Use `get_post_meta()` for post meta
- **File Upload Security:**
  - Validate file types
  - Rename uploaded files
  - Store outside web root when possible
  - Use media library for images
- **SSL/HTTPS:**
  - Force HTTPS in production
  - Use `wp_safe_remote_get()` for external requests
  - Verify SSL certificates
- **Admin Areas:**
  - Add capability checks to admin pages
  - Use settings API for admin forms
  - Never hardcode options in admin

---

## File Structure Rules

```
fort-explorer/                         # Theme root
├── assets/                            # Static files
│   ├── css/
│   │   ├── style.css                  # Main stylesheet (compiled)
│   │   ├── editor.css                 # Block editor styles
│   │   └── src/                       # SCSS source files
│   │       ├── variables.scss         # CSS variables
│   │       ├── typography.scss        # Typography styles
│   │       ├── layout.scss            # Layout system
│   │       ├── components.scss        # Component styles
│   │       └── utilities.scss         # Utility classes
│   ├── js/
│   │   ├── app.js                     # Main JavaScript (compiled)
│   │   ├── editor.js                  # Block editor scripts
│   │   └── src/                       # ES6 source files
│   │       ├── modules/               # Feature modules
│   │       ├── utilities.js           # Utility functions
│   │       └── app.js                 # App initialization
│   ├── images/                        # Static images
│   ├── fonts/                         # Custom fonts
│   └── icons/                         # SVG icons
├── inc/                               # PHP includes
│   ├── constants.php                  # Theme constants
│   ├── helpers.php                    # Helper functions
│   ├── template-functions.php         # Template display functions
│   ├── hooks.php                      # WordPress hooks
│   ├── sanitize.php                   # Sanitization functions
│   └── admin/                         # Admin-only files
│       └── settings.php               # Theme customizer
├── template-parts/                    # Reusable template parts
│   ├── header/                        # Header variations
│   ├── footer/                        # Footer variations
│   ├── content/                       # Content templates
│   ├── components/                    # Reusable components
│   │   ├── fort-card.php
│   │   ├── blog-card.php
│   │   ├── gallery.php
│   │   └── ...
│   └── sections/                      # Page sections
├── templates/                         # Full page templates
│   ├── front-page.php                 # Homepage
│   ├── single-fort.php                # Single fort page
│   ├── archive-fort.php               # Fort archive
│   ├── single.php                     # Blog post
│   ├── archive.php                    # Blog archive
│   └── 404.php                        # 404 page
├── blocks/                            # Custom Gutenberg blocks
│   ├── fort-card/                     # Block name
│   │   ├── block.json
│   │   ├── edit.js
│   │   ├── save.js
│   │   └── style.scss
│   └── ...
├── classes/                           # PHP classes
│   └── FortExplorer/
│       ├── Admin/
│       │   └── Settings.php
│       ├── Post/
│       │   └── Types.php
│       └── Utils/
│           └── Cache.php
├── languages/                         # Translation files
│   └── fort-explorer.pot              # Translation template
├── tests/                             # Tests (optional)
│   └── test-helpers.php
├── functions.php                      # Main functions file
├── style.css                          # Theme header
├── screenshot.png                     # Theme thumbnail
├── .editorconfig                      # Code formatting
├── .gitignore                         # Git ignore rules
└── README.md                          # Theme documentation
```

### Key Rules:

- Keep `/inc/` flat for simple functions, organize classes in `/classes/`
- All template files use `.php` extension
- All styles use `.css` (compiled from SCSS if using preprocessor)
- All scripts use `.js` (ES6 modules)
- Prefix all filenames with purpose: `template-parts/header/header-main.php`
- Keep template parts modular (max 50 lines)
- No inline styles or scripts

---

## Code Review Checklist

Every generated file must pass this checklist before completion:

### ✅ WordPress Standards
- [ ] All output escaped with correct function
- [ ] All input sanitized with correct function
- [ ] All forms have nonce field
- [ ] All AJAX calls verify nonce
- [ ] Strings use proper translation functions
- [ ] Proper `wp_enqueue_script()` and `wp_enqueue_style()`
- [ ] No deprecated WordPress functions used
- [ ] Capability checks where needed

### ✅ PHP Standards
- [ ] Type declarations on all function parameters
- [ ] Type declarations on function returns
- [ ] No syntax errors or warnings
- [ ] Proper error handling (try-catch where needed)
- [ ] Functions prefixed with `fort_` or namespaced
- [ ] No PHP short tags `<?`
- [ ] Closing `?>` tags removed (if last in file)

### ✅ CSS Standards
- [ ] BEM naming convention followed
- [ ] Mobile-first responsive approach
- [ ] CSS variables used for colors/spacing
- [ ] No hardcoded colors (use variables)
- [ ] No Bootstrap or external frameworks
- [ ] Properly scoped styles
- [ ] No inline styles
- [ ] No `!important` flags

### ✅ JavaScript Standards
- [ ] Vanilla JavaScript (no jQuery)
- [ ] ES6+ syntax used
- [ ] No global variables
- [ ] Proper event listener cleanup
- [ ] Uses `fetch()` API for AJAX
- [ ] Error handling implemented
- [ ] Loading states provided
- [ ] Deferred loading where applicable

### ✅ Accessibility
- [ ] Proper heading hierarchy
- [ ] Alt text on all images
- [ ] Color contrast ≥ 4.5:1
- [ ] Keyboard navigation support
- [ ] ARIA labels where needed
- [ ] Focus states visible
- [ ] Form labels properly associated

### ✅ Performance
- [ ] Images lazy loaded
- [ ] Responsive images with srcset
- [ ] No render-blocking CSS
- [ ] Scripts deferred or async
- [ ] Minimal HTTP requests
- [ ] No unnecessary plugins

### ✅ Security
- [ ] Nonce verification on forms
- [ ] Nonce verification on AJAX
- [ ] Input sanitization applied
- [ ] Output escaping applied
- [ ] No direct $_GET/$_POST access
- [ ] No eval() or create_function()
- [ ] No hardcoded user roles/capabilities

### ✅ File Organization
- [ ] File in correct directory
- [ ] Proper naming convention
- [ ] Consistent indentation (2 spaces)
- [ ] No trailing whitespace
- [ ] No console.log() statements (production)
- [ ] No debug code left
- [ ] Proper line endings (LF)

### ✅ Documentation
- [ ] Clear variable/function names
- [ ] Comments for "why", not "what"
- [ ] No commented-out code
- [ ] README updated if needed
- [ ] Complex logic documented

---

## Development Workflow

### Before Starting Any Feature:
1. Review DESIGN.md for component specifications
2. Check file structure for where to place code
3. Plan component hierarchy
4. Consider mobile/tablet/desktop views

### During Development:
1. Follow coding standards above
2. Use version control with clear commits
3. Test in browser at each breakpoint
4. Verify accessibility with keyboard
5. Test with screen reader

### Before Submission:
1. Run through code review checklist
2. Test all functionality
3. Verify responsive design
4. Check accessibility
5. Verify all strings translatable
6. Run performance audit

---

## Theme Configuration

**Theme Name:** Fort Explorer  
**Text Domain:** fort-explorer  
**Author:** Fort Explorer Team  
**License:** GPL v2 or later  
**Minimum PHP:** 8.3  
**Requires WordPress:** 6.4+

---

## Support & References

- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [WordPress Security Handbook](https://developer.wordpress.org/plugins/security/)
- [WCAG 2.1 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)
- [Web.dev - Core Web Vitals](https://web.dev/vitals/)
