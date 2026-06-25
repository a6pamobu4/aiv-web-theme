# Reference: Wibify Services

Source: https://wibify.agency/en

## Use As Inspiration

- Numbered services with a compact label, clear heading, short description, and tag list.
- Strong section title with service rows/cards that feel structured and editorial.
- Visual rhythm created by spacing, dividers, and repeated metadata.

## Do Not Copy

- Do not copy Wibify service categories, text, tags, arrows, spacing, or exact card layout.
- Do not copy their interaction details or typography treatment pixel-for-pixel.

## Implementation Notes

- Use AIV-web services from `docs/content.md`.
- Prefer `aiv/services-grid` if it supports four services, tags, and responsive layout cleanly.
- If the block is not suitable, build a theme pattern first.
- Do not mention WordPress in public-facing service copy unless the client directly asks about the CMS.
- Keep cards/rows accessible as normal content, not hover-only content.

## Performance Constraints

- CSS-only hover states.
- Avoid scroll-triggered animation unless it adds clear value.
- Keep tag rendering simple.
- Avoid large decorative images in service cards.

## Target Files To Edit Later

- `patterns/home-services.php` if using a theme pattern
- `assets/scss/sections/_services.scss`
- `templates/front-page.html`
- AIV block configuration if using `aiv/services-grid`
