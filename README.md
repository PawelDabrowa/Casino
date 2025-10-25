# Casino WordPress Theme

A production-ready WordPress theme built with modern web technologies including Webpack 5, Sass, and Babel.

## Features

- **Modern Build System**: Webpack 5 with code splitting and optimization
- **Sass/SCSS**: Preprocessed CSS with variables and mixins
- **Babel**: Modern JavaScript with ES6+ support
- **Performance**: Lazy loading, code splitting, and optimized assets
- **Accessibility**: Semantic HTML and keyboard navigation
- **Responsive**: Mobile-first design approach
- **WordPress Standards**: Follows WordPress coding standards and best practices

## Tech Stack

- **Webpack 5**: Module bundler with code splitting
- **Node.js 20+**: Runtime environment
- **Babel**: JavaScript transpiler
- **Sass (SCSS)**: CSS preprocessor
- **PostCSS + Autoprefixer**: CSS post-processing
- **ESLint**: JavaScript linting
- **Stylelint**: SCSS linting

## Project Structure

```
wp-content/themes/casino/
├── package.json                 # NPM dependencies and scripts
├── webpack.config.js           # Webpack configuration
├── postcss.config.js           # PostCSS configuration
├── .browserslistrc             # Browser support targets
├── .editorconfig               # Editor configuration
├── .gitignore                  # Git ignore rules
├── README.md                   # This file
├── style.css                   # WordPress theme header
├── functions.php               # Theme functions
├── inc/
│   └── setup.php              # Theme setup and configuration
├── assets/
│   ├── js/
│   │   ├── main.js            # Main JavaScript entry point
│   │   └── modules/
│   │       └── nav.js         # Navigation module (dynamic import)
│   ├── scss/
│   │   ├── main.scss         # Main SCSS file
│   │   └── _variables.scss   # SCSS variables
│   └── images/
│       └── placeholder.webp  # Placeholder image
├── dist/                      # Built assets (gitignored)
├── templates/
│   └── parts/
│       ├── head.php          # HTML head template
│       └── footer-scripts.php # Footer scripts template
├── header.php                 # Theme header
├── footer.php                 # Theme footer
└── index.php                  # Main template
```

## Setup Instructions

### Prerequisites

- Node.js 20 or higher
- NPM or Yarn package manager
- WordPress installation

### Installation

1. **Navigate to the theme directory:**
   ```bash
   cd wp-content/themes/casino
   ```

2. **Install dependencies:**
   ```bash
   npm install
   ```

3. **Development build:**
   ```bash
   npm run dev
   ```

4. **Production build:**
   ```bash
   npm run build
   ```

5. **Watch mode (development):**
   ```bash
   npm run watch
   ```

6. **Lint code:**
   ```bash
   npm run lint
   ```

## Build Process

### Development Mode
- Unminified assets with source maps
- Fast rebuild times
- Hot reloading support
- Debug-friendly output

### Production Mode
- Minified and optimized assets
- Content hashing for cache busting
- Code splitting for better performance
- Stable file names for WordPress enqueue

## Asset Management

### CSS/SCSS
- Main styles in `assets/scss/main.scss`
- Variables in `assets/scss/_variables.scss`
- Built to `dist/main.css` and `dist/styles.[hash].css`

### JavaScript
- Main script in `assets/js/main.js`
- Modular architecture with dynamic imports
- Built to `dist/main.js` and `dist/main.[hash].js`
- Navigation module loaded dynamically

### Images
- Optimized and copied to `dist/media/`
- WebP support with fallbacks
- Lazy loading by default

## WordPress Integration

### Theme Support
- Title tag support
- Post thumbnails
- HTML5 markup
- Custom menus
- Custom logo

### Performance Features
- Lazy loading for images
- Deferred JavaScript loading
- Code splitting for non-critical features
- Optimized asset delivery

### Enqueue System
- Automatic versioning via `filemtime()`
- Defer attribute for main script
- Conditional loading (admin vs frontend)

## Adding New Features

### New JavaScript Modules
1. Create module in `assets/js/modules/`
2. Use dynamic import in `main.js`:
   ```javascript
   const { initModule } = await import('./modules/new-module');
   initModule();
   ```

### New SCSS Files
1. Create file in `assets/scss/`
2. Import in `main.scss`:
   ```scss
   @import 'new-file';
   ```

### New Entry Points
1. Add entry in `webpack.config.js`:
   ```javascript
   entry: {
     main: './assets/js/main.js',
     newEntry: './assets/js/new-entry.js'
   }
   ```

## Browser Support

Targets modern browsers with:
- >0.5% usage
- Last 2 versions
- Not dead browsers

## Performance Optimizations

- **Code Splitting**: Dynamic imports for non-critical features
- **Lazy Loading**: Images load only when needed
- **Asset Optimization**: Minification and compression
- **Caching**: Content hashing for long-term caching
- **Critical CSS**: Inline critical styles

## Development Workflow

1. **Start development:**
   ```bash
   npm run watch
   ```

2. **Make changes** to SCSS or JavaScript files

3. **Test in browser** - assets auto-rebuild

4. **Lint code:**
   ```bash
   npm run lint
   ```

5. **Build for production:**
   ```bash
   npm run build
   ```

## Troubleshooting

### Common Issues

**Build fails:**
- Check Node.js version (20+ required)
- Clear `node_modules` and reinstall
- Verify all dependencies are installed

**Assets not loading:**
- Check file paths in `functions.php`
- Verify `dist/` directory exists
- Check WordPress file permissions

**Linting errors:**
- Run `npm run lint` to see issues
- Fix errors or update linting rules
- Check `.eslintrc` and `.stylelintrc` configs

### Debug Mode

Enable debug mode in WordPress:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

## Contributing

1. Follow WordPress coding standards
2. Use semantic HTML
3. Write accessible code
4. Test across browsers
5. Optimize for performance

## License

GPL v2 or later - Compatible with WordPress theme requirements.

## Support

For issues and questions:
1. Check this README
2. Review WordPress documentation
3. Check browser console for errors
4. Verify build process is working
