# AIV-web Development Rules

## Source Of Truth

- Use current WordPress Developer Resources as the primary source of truth.
- Prefer the Theme Handbook, Block Editor Handbook, Code Reference, and WordPress Coding Standards.
- Do not rely on outdated WordPress Codex pages when current Developer Resources are available.

## WordPress Standards

- Follow WordPress Coding Standards where practical for PHP, CSS, documentation, escaping, sanitization, and internationalization.
- Target PHP 8.1+ and the current stable WordPress release.
- Run `composer run lint:php` after PHP changes.
- Run `composer run fix:php` only for intentional PHPCS autofixes.
- Keep `functions.php` as a loader only.
- Keep theme logic in `inc/`.
- Keep templates, template parts, and patterns editable in the block editor.

## Theme Architecture

- This is a starter theme, not a shared parent theme.
- Do not turn it into a parent/child theme system.
- Preserve the WordPress-required `style.css` theme header.
- Use `style.css` for theme metadata only.
- Do not add page builders.
- Do not add Bootstrap, Tailwind, CSS frameworks, jQuery, external fonts, external icons, sliders, or animation libraries.
- Use `theme.json` as the design system for color, spacing, typography, layout, and design tokens.
- Keep global styles neutral and minimal. Client themes own final visual design.
- Keep WooCommerce compatibility basic unless a client project explicitly requires deeper integration.
- Do not add global performance hacks. Global performance optimizations belong in `aiv-performance`.

## SCSS And CSS Build Rules

- SCSS is the source of truth for custom styles.
- Theme SCSS sources live in `assets/scss/`.
- Compiled theme CSS is generated into `assets/css/`.
- Do not edit compiled CSS files manually.
- Do not enqueue SCSS files in WordPress.
- Enqueue only compiled CSS from theme PHP.
- Use `npm run start` for watch/autocompilation during development.
- Run `npm run build` after SCSS changes and before committing, packaging, or delivering style changes.
- Keep SCSS modular and organized by responsibility when the stylesheet grows.
- Avoid large utility systems and broad global selectors.
- Use CSS custom properties and `theme.json` presets where possible.
- Prefer native CSS features over extra dependencies.

## Gutenberg Block Styling

- Reusable custom Gutenberg blocks should live in a companion plugin such as `aiv-blocks`, not in this starter theme.
- For block projects, keep `style.scss` and `editor.scss` inside each block folder.
- Compile block SCSS into the block build output.
- Keep block CSS scoped to stable block classes and minimal.
- Do not edit generated block CSS directly.

## Dependencies

- Keep dependencies limited to tooling needed by the project.
- Do not add Bootstrap, Tailwind, Sass frameworks, CSS utility libraries, external fonts, external icons, sliders, or animation libraries unless explicitly approved.
- Keep runtime behavior in WordPress and PHP simple.

## Verification

- Run `npm run build` after SCSS changes.
- Run PHP linting with Composer after PHP changes.
- Confirm `theme.json` remains valid JSON after edits.

## Repository Discipline

- Before changing code, inspect the existing file structure, naming conventions, and build setup.
- Prefer small targeted changes over broad rewrites.
- Do not reorganize folders, rename public files, or change build output paths unless explicitly requested.
- Do not mix unrelated refactors with feature work.
- Do not commit stale generated CSS.
