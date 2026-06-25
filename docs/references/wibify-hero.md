# Reference: Wibify Hero

Source: https://wibify.agency/en

## Use As Inspiration

- Strong first viewport with large typography and direct positioning.
- Clear CTA hierarchy near the hero message.
- Compact proof points that support performance, reach, or credibility.
- Editorial layout mood: confident, spacious, and conversion-oriented.

## Do Not Copy

- Do not copy Wibify text, imagery, background, stats, logo, or exact layout.
- Do not use their brand assets or visual identity.
- Do not copy their technology claims.

## Implementation Notes

- Create `patterns/home-hero.php` unless `aiv/hero` already supports the needed fields and layout.
- Use AIV-web copy from `docs/content.md`.
- Keep the first viewport focused on speed, SEO, clean development, content management, and business outcomes.
- Do not mention WordPress in public-facing hero copy.
- Use real AIV-web proof points only when available; otherwise keep claims general.

## Performance Constraints

- Avoid heavy hero media until an optimized asset plan exists.
- Reserve space for any media to prevent layout shift.
- Keep hero CSS critical and minimal.
- No external fonts or icon libraries.

## Target Files To Edit Later

- `patterns/home-hero.php`
- `assets/scss/sections/_hero.scss`
- `theme.json`
- `templates/front-page.html`
