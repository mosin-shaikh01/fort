# Fort Explorer - Design System

## Brand Identity

**Theme Name:** Fort Explorer  
**Design Personality:** Premium • Historical • Modern • Realistic • Cinematic • Elegant • Travel Magazine Inspired

### Design Philosophy

Fort Explorer's design combines the prestige of heritage tourism with modern web aesthetics. Every design decision prioritizes visual storytelling, historical authenticity, and user experience. The theme feels sophisticated, inviting visitors to explore historical fortifications with the quality standards of premium travel publications.

### Visual Inspiration

- National Geographic editorial style
- Premium travel magazines (Condé Nast Traveler)
- Heritage tourism websites
- Luxury editorial blogs
- Museum exhibition design

### Design Avoid List

- ❌ Generic blog templates
- ❌ Excessive gradients
- ❌ Overly colorful/playful UI
- ❌ Stock photo appearance
- ❌ Heavy shadows and drop shadows
- ❌ Busy backgrounds
- ❌ Bright neon colors
- ❌ Too many font sizes
- ❌ Floating elements
- ❌ Animated everything

---

## Color System

### Primary Colors

| Name | Hex | RGB | Usage |
|------|-----|-----|-------|
| Brand Orange | #f66a01 | 246, 106, 1 | CTAs, highlights, accents |
| Forest Green | #355E3B | 53, 94, 59 | Secondary accents, badges |
| Dark Charcoal | #111827 | 17, 24, 39 | Text, backgrounds, depth |
| Cream Surface | #F8F7F4 | 248, 247, 244 | Page backgrounds, cards |
| Slate Text | #1E293B | 30, 41, 59 | Body text |

### Extended Color Palette

| Name | Hex | Usage |
|------|-----|-------|
| Light Gray | #F3F4F6 | Subtle backgrounds |
| Medium Gray | #E5E7EB | Borders, dividers |
| Border Gray | #D1D5DB | Form borders |
| Muted Text | #6B7280 | Secondary text |
| Success Green | #10B981 | Success states |
| Warning Amber | #F59E0B | Warnings |
| Error Red | #EF4444 | Errors |
| Info Blue | #3B82F6 | Information |

### Dark Mode Colors

| Name | Light | Dark |
|------|-------|------|
| Background | #FFFFFF | #0F172A |
| Surface | #F8F7F4 | #1E293B |
| Card | #FFFFFF | #334155 |
| Text Primary | #1E293B | #F1F5F9 |
| Text Secondary | #6B7280 | #CBD5E1 |
| Border | #D1D5DB | #475569 |

### CSS Variables

```css
:root {
  /* Colors - Primary */
  --color-primary: #f66a01;
  --color-secondary: #355E3B;
  --color-dark: #111827;
  --color-surface: #F8F7F4;
  --color-text: #1E293B;
  
  /* Colors - Extended */
  --color-text-secondary: #6B7280;
  --color-border: #D1D5DB;
  --color-bg-light: #F3F4F6;
  --color-success: #10B981;
  --color-warning: #F59E0B;
  --color-error: #EF4444;
  --color-info: #3B82F6;
  
  /* Neutral Scale */
  --color-gray-50: #F9FAFB;
  --color-gray-100: #F3F4F6;
  --color-gray-200: #E5E7EB;
  --color-gray-300: #D1D5DB;
  --color-gray-400: #9CA3AF;
  --color-gray-500: #6B7280;
  --color-gray-600: #4B5563;
  --color-gray-700: #374151;
  --color-gray-800: #1F2937;
  --color-gray-900: #111827;
}

@media (prefers-color-scheme: dark) {
  :root {
    --color-dark: #0F172A;
    --color-surface: #1E293B;
    --color-text: #F1F5F9;
    --color-text-secondary: #CBD5E1;
    --color-border: #475569;
    --color-bg-light: #334155;
  }
}
```

### Color Usage Guidelines

- **Primary (#f66a01):** Buttons, links, key highlights - use sparingly for focus
- **Secondary (#355E3B):** Supporting accents, badges, secondary buttons
- **Dark (#111827):** Text, deep backgrounds, typography
- **Surface (#F8F7F4):** Page background, card backgrounds
- **Gray Scale:** Borders, dividers, disabled states

---

## Typography System

### Font Families

| Font | Usage | Weight | Style |
|------|-------|--------|-------|
| **Playfair Display** | Headings (H1-H3) | 700, 600 | Display font - elegant serif |
| **Inter** | Body text, UI | 400, 500, 600 | Sans-serif - modern, readable |
| **Cinzel** | Accent headings, dates | 500, 600 | Serif accent - historical feel |

### Font Import (Google Fonts)

```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&family=Cinzel:wght@500;600&display=swap" rel="stylesheet">
```

### Heading Scale

| Tag | Font | Size | Weight | Line Height | Spacing |
|-----|------|------|--------|-------------|---------|
| **H1** | Playfair Display | 48px / 3rem | 700 | 1.2 (57.6px) | 32px bottom |
| **H2** | Playfair Display | 40px / 2.5rem | 700 | 1.2 (48px) | 24px bottom |
| **H3** | Playfair Display | 32px / 2rem | 700 | 1.3 (41.6px) | 20px bottom |
| **H4** | Inter | 24px / 1.5rem | 600 | 1.3 (31.2px) | 16px bottom |
| **H5** | Inter | 20px / 1.25rem | 600 | 1.4 (28px) | 12px bottom |
| **H6** | Inter | 16px / 1rem | 600 | 1.5 (24px) | 12px bottom |

### Paragraph Scale

| Element | Font | Size | Weight | Line Height | Spacing |
|---------|------|------|--------|-------------|---------|
| **Body Large** | Inter | 18px / 1.125rem | 400 | 1.6 (28.8px) | 24px bottom |
| **Body** | Inter | 16px / 1rem | 400 | 1.6 (25.6px) | 16px bottom |
| **Body Small** | Inter | 14px / 0.875rem | 400 | 1.6 (22.4px) | 12px bottom |
| **Caption** | Inter | 12px / 0.75rem | 400 | 1.5 (18px) | 8px bottom |
| **Label** | Inter | 13px / 0.8125rem | 500 | 1.4 (18.2px) | - |

### CSS Typography Classes

```css
.text-h1 { font-family: 'Playfair Display'; font-size: 3rem; font-weight: 700; line-height: 1.2; margin-bottom: 2rem; }
.text-h2 { font-family: 'Playfair Display'; font-size: 2.5rem; font-weight: 700; line-height: 1.2; margin-bottom: 1.5rem; }
.text-h3 { font-family: 'Playfair Display'; font-size: 2rem; font-weight: 700; line-height: 1.3; margin-bottom: 1.25rem; }
.text-h4 { font-family: 'Inter'; font-size: 1.5rem; font-weight: 600; line-height: 1.3; margin-bottom: 1rem; }
.text-h5 { font-family: 'Inter'; font-size: 1.25rem; font-weight: 600; line-height: 1.4; margin-bottom: 0.75rem; }
.text-h6 { font-family: 'Inter'; font-size: 1rem; font-weight: 600; line-height: 1.5; margin-bottom: 0.75rem; }

.text-body-lg { font-family: 'Inter'; font-size: 1.125rem; font-weight: 400; line-height: 1.6; margin-bottom: 1.5rem; }
.text-body { font-family: 'Inter'; font-size: 1rem; font-weight: 400; line-height: 1.6; margin-bottom: 1rem; }
.text-body-sm { font-family: 'Inter'; font-size: 0.875rem; font-weight: 400; line-height: 1.6; margin-bottom: 0.75rem; }
.text-caption { font-family: 'Inter'; font-size: 0.75rem; font-weight: 400; line-height: 1.5; }
.text-label { font-family: 'Inter'; font-size: 0.8125rem; font-weight: 500; line-height: 1.4; }
```

### Typography Rules

- Avoid multiple weights in a single paragraph
- Use Cinzel for historical dates and accents only
- All headings single-line when possible
- Justify spacing based on visual weight, not formula
- Keep paragraphs to 65-75 characters per line
- Use proper quotes (curly quotes), not straight

---

## Spacing System

Consistent spacing creates visual harmony and rhythm. Based on 8px grid system.

| Scale | px | rem | Usage |
|-------|----|----|-------|
| xs | 4px | 0.25rem | Tiny gaps |
| sm | 8px | 0.5rem | Small gaps |
| md | 12px | 0.75rem | Element padding |
| lg | 16px | 1rem | Content padding |
| xl | 24px | 1.5rem | Section margins |
| 2xl | 32px | 2rem | Major sections |
| 3xl | 48px | 3rem | Hero sections |
| 4xl | 64px | 4rem | Page spacing |
| 5xl | 96px | 6rem | Large hero |

### CSS Spacing Variables

```css
:root {
  --space-xs: 0.25rem;    /* 4px */
  --space-sm: 0.5rem;     /* 8px */
  --space-md: 0.75rem;    /* 12px */
  --space-lg: 1rem;       /* 16px */
  --space-xl: 1.5rem;     /* 24px */
  --space-2xl: 2rem;      /* 32px */
  --space-3xl: 3rem;      /* 48px */
  --space-4xl: 4rem;      /* 64px */
  --space-5xl: 6rem;      /* 96px */
}
```

### Content Spacing Guidelines

- **Section top/bottom:** `--space-4xl` (64px)
- **Card internal padding:** `--space-lg` to `--space-xl` (16-24px)
- **Form fields spacing:** `--space-lg` (16px) gap
- **List items:** `--space-md` (12px) gap
- **Navigation spacing:** `--space-lg` (16px) each direction
- **Hero section:** `--space-5xl` (96px) top/bottom

---

## Layout System

### Container Widths

| Breakpoint | Name | Width | Padding |
|------------|------|-------|---------|
| < 640px | Mobile | 100% | 16px each side |
| 640px - 767px | Tablet Small | 100% | 20px each side |
| 768px - 1023px | Tablet | 100% | 24px each side |
| 1024px - 1279px | Desktop | 1024px | 32px each side |
| ≥ 1280px | Large Desktop | 1216px | auto margin |
| ≥ 1536px | Extra Large | 1216px | auto margin |

### CSS Container

```css
.container {
  width: 100%;
  margin: 0 auto;
  padding: 0 1rem;
}

@media (min-width: 768px) {
  .container {
    padding: 0 1.5rem;
  }
}

@media (min-width: 1024px) {
  .container {
    width: 1024px;
    padding: 0 2rem;
  }
}

@media (min-width: 1280px) {
  .container {
    width: 1216px;
  }
}
```

### Grid System

**12-column grid** for all layouts

```css
.grid {
  display: grid;
  grid-template-columns: repeat(12, 1fr);
  gap: 1.5rem;
}

/* Mobile: 2 columns */
@media (max-width: 767px) {
  .grid { grid-template-columns: repeat(2, 1fr); gap: 1rem; }
  .grid__full { grid-column: 1 / -1; }
  .grid__half { grid-column: span 1; }
}

/* Tablet: 6 columns */
@media (min-width: 768px) and (max-width: 1023px) {
  .grid { grid-template-columns: repeat(6, 1fr); gap: 1.5rem; }
  .grid__full { grid-column: 1 / -1; }
  .grid__half { grid-column: span 3; }
  .grid__third { grid-column: span 2; }
}

/* Desktop: 12 columns */
@media (min-width: 1024px) {
  .grid { grid-template-columns: repeat(12, 1fr); gap: 2rem; }
  .grid__full { grid-column: 1 / -1; }
  .grid__half { grid-column: span 6; }
  .grid__third { grid-column: span 4; }
  .grid__quarter { grid-column: span 3; }
}
```

---

## Component Library

### Component Guidelines

Every component follows these principles:

1. **Mobile-first:** Designed for mobile, enhanced for desktop
2. **Semantic HTML:** Proper heading hierarchy, structure
3. **Accessibility:** WCAG 2.1 AA compliant
4. **Performance:** Lazy-loaded images, minimal repaints
5. **Reusability:** Built as standalone modules
6. **Consistency:** Follows spacing/typography system

---

### Header Component

**Purpose:** Primary navigation and branding

**States:**
- Default (scrolled)
- Sticky (fixed during scroll)
- Mobile menu open
- Search active

**Mobile (< 768px):**
- Sticky to top
- Logo left aligned
- Hamburger menu right aligned
- Menu overlay on click
- Full-width navigation items

**Desktop (≥ 768px):**
- Logo left (120px width)
- Centered navigation menu (5 items max)
- Right-aligned search icon
- User menu (if logged in)
- No hamburger menu

**Heights:**
- Mobile: 64px (with logo centering)
- Desktop: 80px

**Navigation Items:**
- Home
- Explore Forts
- Blog
- About
- Contact

**Search:**
- Icon-only on desktop
- Full width on mobile
- Placeholder: "Search forts, articles..."

---

### Hero Section Component

**Purpose:** Immersive introduction with call-to-action

**Layout:**
- Full-width background image
- Semi-transparent dark overlay (0.4-0.5 opacity)
- Center-aligned text content
- Large heading with description
- Primary CTA button

**Desktop:**
- Height: 500-600px
- Image aspect ratio: 16:9
- Text centered, color white
- Heading: H1 (48px)
- Subtitle: Body Large (18px)
- Button size: Large (44px height)

**Mobile:**
- Height: 300-350px
- Heading: H2 (32px)
- Subtitle: Body (16px)
- Button size: Medium (40px height)
- Full-width button

**Image Requirements:**
- Cinematic quality photography
- Historical fort imagery
- Minimum 1920px width
- Optimized WebP + JPEG fallback
- Alt text describing fort

---

### Fort Card Component

**Purpose:** Display individual fort with quick information

**Layout:**
- Featured image (top)
- Content section (bottom)
- Hover effects

**Content:**
- Fort name (H4, 24px)
- Location with icon
- Category badge
- Quick facts (3 bullets)
- "View Details" link

**Sizing:**
- Desktop: 320px width (fits 4 per row in grid)
- Tablet: 280px width (fits 2-3 per row)
- Mobile: Full width with 8px padding

**Image:**
- Aspect ratio: 16:10
- Lazy loaded
- Responsive srcset

**Interactive:**
- Subtle shadow on hover
- Image slight zoom on hover
- Link color changes
- Smooth transitions (0.3s)

**CSS Classes:**
```css
.fort-card {}
.fort-card__image {}
.fort-card__content {}
.fort-card__title {}
.fort-card__location {}
.fort-card__category {}
.fort-card__facts {}
.fort-card__link {}
```

---

### Blog Card Component

**Purpose:** Display blog posts in magazine style

**Layout:**
- Featured image (left on desktop, top on mobile)
- Content right

**Desktop:**
- Image: 45% width (280px), aspect 4:3
- Content: 55% width (right side)
- Horizontal layout
- Height: ~280px

**Mobile:**
- Full-width layout
- Image: 100% width, aspect 16:9
- Content below

**Content:**
- Title (H3, 24px)
- Date (Cinzel, 14px, muted)
- Excerpt (2-3 lines, Body)
- "Read More" link
- Author byline (small)

**Interactive:**
- Hover: Image darkens, title color changes
- Link underlines on hover
- Smooth transitions

---

### State Card Component

**Purpose:** Display information about a state or region

**Similar to Fort Cards but:**
- Larger (400px width)
- More detailed description
- Statistics section
- Multiple forts listed underneath
- Different category badge color

---

### Category Card Component

**Purpose:** Link to fort categories or collections

**Simple layout:**
- Icon or image at top
- Category name (H4)
- Number of forts (Body Small)
- Arrow icon
- Equal-width squares in grid

**Colors:**
- Each category has own color accent
- Subtle background color
- Darker text

---

### Gallery Component

**Purpose:** Display multiple images in grid

**Layouts:**
- **Grid:** 3 columns desktop, 2 tablet, 1 mobile
- **Masonry:** Equal-height rows, varying column spans
- **Lightbox:** Click image to expand modal

**Image Sizes:**
- Desktop: 340px width
- Tablet: 300px width
- Mobile: Full width minus padding
- Aspect ratio: Consistent 4:3 or 16:9

**Lazy Loading:**
- Use `loading="lazy"` attribute
- Placeholder blur image

---

### Map Section Component

**Purpose:** Display fort locations on interactive map

**Layout:**
- Full-width map container
- Sidebar or overlay filters
- Fort list or markers

**Map Library:** Leaflet.js (lightweight)

**Features:**
- Marker clustering
- Custom markers (fort icons)
- Info windows on click
- Filter by state/category
- Search functionality

---

### Newsletter Section Component

**Purpose:** Email subscription call-to-action

**Layout:**
- Heading (H2)
- Short description (Body)
- Email input field
- Subscribe button
- Optional checkbox (stay informed)

**Styling:**
- Light background color
- Centered content
- Max width 600px
- Form fields styled consistently

**Mobile:**
- Full-width form
- Stack layout

---

### Footer Component

**Purpose:** Site information, links, legal

**Sections:**
1. **Logo + Description** (left/top)
2. **Quick Links** (4 columns on desktop, 2 on mobile)
3. **Social Links** (Icons)
4. **Newsletter mini** (optional)
5. **Legal** (bottom: Copyright, Privacy, Terms)

**Organization:**
- Explore
- About
- Resources
- Support

**Desktop Layout:**
- 4 columns grid
- Footer menu
- Social icons top-right
- Copyright bottom

**Mobile:**
- Single column
- Collapsed sections
- Full-width menu
- Copyright simple

**Colors:**
- Dark background (#111827)
- Light text (#F1F5F9)
- Subtle borders
- Links color: Primary (#f66a01)

---

### Form Components

**Text Input:**
- Height: 40px
- Padding: 12px 16px
- Border: 1px solid --color-border
- Border-radius: 4px
- Focus: Blue outline (--color-info)
- Label above, 12px margin-bottom

**Select/Dropdown:**
- Same dimensions as text input
- Custom styling (no browser select)
- Dropdown icon right-aligned
- Open overlay on mobile

**Checkbox/Radio:**
- Size: 18px × 18px
- Color: Primary when checked
- Label right, 8px margin

**Buttons:**
- See Button Section below

**Text Area:**
- Min height: 120px
- Resizable
- Same border styling as input
- Line-height: 1.5

---

### Button Component

**Primary Button:**
- Background: --color-primary (#f66a01)
- Text: White
- Height: 44px / 40px (large/medium)
- Padding: 0 24px
- Border-radius: 4px
- Font-weight: 600
- Hover: Darken 10%
- Active: Darken 20%
- Focus: Blue outline

**Secondary Button:**
- Background: --color-secondary (#355E3B)
- Text: White
- Same dimensions/behavior as primary
- Hover: Darken 10%

**Tertiary Button:**
- Background: transparent
- Border: 2px solid --color-primary
- Text: --color-primary
- Hover: Background light orange

**Button Sizes:**
- Large: 44px height, 16px font
- Medium: 40px height, 14px font
- Small: 32px height, 12px font

**Disabled:**
- Opacity: 0.5
- Cursor: not-allowed
- No hover effects

---

### Card Component

**Standard Card:**
- Background: White (or dark mode surface)
- Border-radius: 6px
- Box-shadow: 0 1px 3px rgba(0,0,0,0.1)
- Padding: 24px
- Hover-shadow: 0 10px 25px rgba(0,0,0,0.15)
- Transition: 0.3s ease

**Card Sizes:**
- Compact: 280px width
- Standard: 320px width
- Large: 400px width
- Full: 100%

---

## Animations & Transitions

### Principles

- **Subtle:** Motion enhances, doesn't distract
- **Purpose:** Animation serves UX, not decoration
- **Performance:** GPU-accelerated, 60fps
- **Accessibility:** Respect `prefers-reduced-motion`

### Timing Functions

```css
--ease-in-out: cubic-bezier(0.4, 0, 0.2, 1);
--ease-out: cubic-bezier(0, 0, 0.2, 1);
--ease-in: cubic-bezier(0.4, 0, 1, 1);
```

### Standard Durations

- **Fast:** 150ms (UI interactions)
- **Base:** 300ms (standard transitions)
- **Slow:** 500ms (large changes)

### Common Animations

**Hover Effects:**
```css
/* Card lift */
.card {
  transform: translateY(0);
  box-shadow: 0 1px 3px rgba(0,0,0,0.1);
  transition: all 0.3s var(--ease-in-out);
}
.card:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Image zoom */
.card__image {
  overflow: hidden;
  border-radius: 4px;
}
.card__image img {
  transform: scale(1);
  transition: transform 0.3s var(--ease-in-out);
}
.card:hover .card__image img {
  transform: scale(1.05);
}

/* Link underline */
a {
  position: relative;
  text-decoration: none;
  transition: color 0.3s var(--ease-in-out);
}
a::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--color-primary);
  transition: width 0.3s var(--ease-in-out);
}
a:hover::after {
  width: 100%;
}
```

**Fade In (Scroll Reveal):**
```css
.fade-in {
  opacity: 0;
  transform: translateY(20px);
  animation: fadeIn 0.6s var(--ease-out) forwards;
}
@keyframes fadeIn {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
```

**Accessibility:**
```css
@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
```

---

## Responsive Breakpoints

### Breakpoint Strategy

Mobile-first approach: Design for mobile first, enhance for larger screens.

| Name | Min Width | Max Width | Devices |
|------|-----------|-----------|---------|
| **Mobile** | 320px | 639px | Small phones, large phones |
| **Tablet** | 640px | 1023px | Small tablets, large tablets |
| **Desktop** | 1024px | 1279px | Small laptops, desktops |
| **Large** | 1280px | ∞ | Large desktops, displays |

### Media Query Syntax

```css
/* Mobile First */
.component { /* Mobile styles */ }

@media (min-width: 640px) { /* Tablet */ }
@media (min-width: 768px) { /* Tablet Large */ }
@media (min-width: 1024px) { /* Desktop */ }
@media (min-width: 1280px) { /* Large Desktop */ }

/* Touch Devices */
@media (hover: none) { /* Remove hover states */ }

/* High DPI Displays */
@media (-webkit-min-device-pixel-ratio: 2) { /* Crisp borders, images */ }
```

### Responsive Patterns

**Navigation:**
- Mobile: Hamburger menu with overlay
- Tablet: Horizontal menu, some items in dropdown
- Desktop: Full horizontal menu

**Grid:**
- Mobile: 1-2 columns
- Tablet: 2-3 columns
- Desktop: 3-4 columns

**Typography:**
- Mobile: Reduced sizes, tighter line-height
- Desktop: Increased sizes for breathing room

**Images:**
- Mobile: Full-width, lower resolution
- Tablet: 90% width
- Desktop: Constrained width in grid

---

## Accessibility Requirements

### WCAG 2.1 AA Compliance

**Visual:**
- ✓ Color contrast ≥ 4.5:1 for normal text
- ✓ Color contrast ≥ 3:1 for large text (18px+)
- ✓ No color-only information (icons, text, or patterns too)
- ✓ Text not justified (hard to read)

**Navigation:**
- ✓ Keyboard access to all functionality
- ✓ Logical tab order (top-to-bottom, left-to-right)
- ✓ Focus indicators visible (not removed)
- ✓ Skip to main content link
- ✓ Breadcrumbs on sub-pages

**Content:**
- ✓ Proper heading hierarchy (H1, H2, H3... no skips)
- ✓ Alt text on all images (descriptive, not "image of...")
- ✓ Form labels associated with inputs
- ✓ Error messages clear and linked to inputs
- ✓ Instructions clear for complex forms

**Media:**
- ✓ Captions on videos
- ✓ Transcripts for podcasts/audio
- ✓ No autoplay video/audio
- ✓ No flashing content (≥ 3 times per second)

**Code:**
- ✓ Semantic HTML (no `<div>` for buttons)
- ✓ ARIA labels where needed (not overused)
- ✓ Landmarks: main, nav, contentinfo
- ✓ Focus management in modals

### Accessibility Testing

- Test with keyboard only (Tab, Enter, Escape, Arrow keys)
- Test with screen reader (NVDA on Windows)
- Test color contrast (WebAIM Contrast Checker)
- Test responsive design at all breakpoints
- Test with browser zoom at 200%

---

## Design Tokens Summary

```json
{
  "colors": {
    "primary": "#f66a01",
    "secondary": "#355E3B",
    "dark": "#111827",
    "surface": "#F8F7F4",
    "text": "#1E293B",
    "textSecondary": "#6B7280",
    "border": "#D1D5DB"
  },
  "typography": {
    "fontHeading": "'Playfair Display', serif",
    "fontBody": "'Inter', sans-serif",
    "fontAccent": "'Cinzel', serif"
  },
  "spacing": {
    "xs": "0.25rem",
    "sm": "0.5rem",
    "md": "0.75rem",
    "lg": "1rem",
    "xl": "1.5rem",
    "2xl": "2rem",
    "3xl": "3rem",
    "4xl": "4rem"
  },
  "breakpoints": {
    "mobile": "320px",
    "tablet": "640px",
    "desktop": "1024px",
    "large": "1280px"
  }
}
```

---

## Implementation Notes

This design system is enforced by:

1. **CSS Variables:** All colors/spacing in `:root`
2. **Component Classes:** BEM naming for consistency
3. **Utility Classes:** Reusable for common patterns
4. **Design Review:** Every component reviewed for aesthetic quality
5. **Testing:** Responsive and accessibility testing required

All generated UI must pass visual review before deployment.

---

## References

- [WCAG 2.1 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)
- [Material Design System](https://material.io/design/)
- [Tailwind Design System](https://tailwindui.com/)
- [Apple Human Interface Guidelines](https://developer.apple.com/design/human-interface-guidelines/)
