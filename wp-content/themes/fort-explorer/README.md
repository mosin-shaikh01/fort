# Fort Explorer WordPress Theme

A premium WordPress theme designed for historical fort information websites and editorial blogs.

## Features

- ✨ Modern, responsive design
- 🏰 Historical fort showcase
- 📝 Blog/editorial support
- 🎨 Premium typography (Playfair Display, Inter, Cinzel)
- 🎯 Brand color system
- ♿ WCAG 2.1 AA accessibility
- ⚡ Core Web Vitals optimized
- 📱 Mobile-first approach
- 🚫 No page builder dependency
- 🧩 Gutenberg block editor support

## Installation

1. Download the theme zip file
2. Go to **Appearance > Themes > Add New**
3. Click **Upload Theme**
4. Select the fort-explorer.zip file
5. Click **Install Now**
6. Click **Activate Theme**

## Requirements

- **WordPress:** 6.4+
- **PHP:** 8.3+
- **Browser Support:** Modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+)

## File Structure

```
fort-explorer/
├── assets/              # CSS, JavaScript, images, fonts
│   ├── css/
│   ├── js/
│   ├── images/
│   └── fonts/
├── inc/                 # PHP includes
├── template-parts/      # Reusable template components
├── templates/           # Full page templates
├── blocks/              # Custom Gutenberg blocks
├── classes/             # PHP classes
├── languages/           # Translation files
├── functions.php        # Theme setup
├── header.php           # Header template
├── footer.php           # Footer template
├── index.php            # Fallback template
└── style.css            # Main stylesheet
```

## Development Standards

All development must follow the standards defined in:
- **CLAUDE.md** - Development standards and guidelines
- **DESIGN.md** - Design system and component specifications

## Customization

### Colors

All colors are defined as CSS variables in `assets/css/style.css`:

```css
--color-primary: #f66a01
--color-secondary: #355E3B
--color-dark: #111827
--color-surface: #F8F7F4
--color-text: #1E293B
```

### Typography

Fonts are loaded from Google Fonts:
- **Playfair Display** - Headings
- **Inter** - Body text
- **Cinzel** - Accents

### Adding Custom Styles

1. Create a new file in `assets/css/src/`
2. Import it in `style.css`
3. Follow BEM naming convention

### Adding Custom Scripts

1. Create a new file in `assets/js/src/`
2. Export functions as needed
3. Enqueue in `functions.php`

## Security

This theme includes:
- Nonce verification for forms
- Proper input sanitization
- Output escaping with appropriate functions
- Capability checks for admin actions
- SQL injection prevention with prepared statements

## Accessibility

WCAG 2.1 AA compliant:
- Proper heading hierarchy
- Alt text on images
- Color contrast ≥ 4.5:1
- Keyboard navigation support
- ARIA labels where needed
- Focus states visible

## Performance

Optimized for Core Web Vitals:
- Lazy loading images
- Responsive image sizes
- Minimized HTTP requests
- Deferred JavaScript loading
- Optimized CSS delivery

## Support & References

- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [WCAG 2.1 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)

## License

GPL v2 or later - See LICENSE.txt for details

## Version

1.0.0

## Author

Fort Explorer Team
