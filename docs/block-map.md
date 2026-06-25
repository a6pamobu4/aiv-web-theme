# Homepage Block Map

The companion `aiv-blocks` plugin exists and should provide reusable blocks: `aiv/hero`, `aiv/section`, `aiv/services-grid`, `aiv/pricing-cards`, `aiv/faq`, and `aiv/cta`.

Use existing AIV blocks where they fit the required structure. Use theme patterns first for project-specific homepage composition, especially scroll-reveal positioning text, the process section, floating contact buttons, and any AIV-web-specific layout or visual composition.

Do not modify `aiv-blocks-plugin` during this pass unless a missing structure is clearly reusable across future client projects. If something is needed only for this website, implement it in `aiv-web-theme` as a theme pattern or theme component.

`aiv/section` can be used as a wrapper where it helps keep spacing, anchors, labels, and layout consistent.

## Header

- Target files: `parts/header.html`, `assets/scss/components/_header.scss`.
- Optional script: `assets/js/header-scroll.js`.
- Implementation: theme-owned template part and component styles.
- Notes: hide/reveal behavior belongs in the theme because it is layout chrome, not reusable content.

## Hero

- Pattern: `patterns/home-hero.php`.
- Companion block: `aiv/hero`.
- Implementation preference: use `aiv/hero` where it fits the required structure; use `patterns/home-hero.php` for AIV-web-specific composition around the block if needed.

## Scroll Text

- Pattern: `patterns/home-scroll-text.php`.
- Implementation: theme pattern plus optional lightweight vanilla JS for active phrase progress.
- Notes: keep content editable where practical; avoid animation libraries.

## Services

- Companion block: `aiv/services-grid`.
- Implementation preference: use `aiv/services-grid` where it fits the four-service structure and tag lists.
- Fallback: theme pattern first only if the current block cannot express the required homepage layout without plugin changes.

## Process

- Preferred implementation: theme pattern first.
- Plugin proposal: only create a reusable AIV block if the same process component will be reused across multiple projects.

## Pricing

- Companion block: `aiv/pricing-cards`.
- Notes: homepage should show a preview, not necessarily full pricing detail.

## FAQ

- Companion block: `aiv/faq`.
- Notes: use accessible disclosure markup if implemented in theme or block.

## CTA

- Companion block: `aiv/cta`.
- Notes: keep copy short and action-focused.

## Floating Contacts

- Implementation: theme component, not plugin.
- Target files: likely `footer` or template-level markup plus `assets/scss/components/_floating-contacts.scss`.
- Optional script: none unless contact panel toggles are added.
- Primary action: `Telegram` with TODO placeholder for the actual Telegram URL.
- Secondary action: `Обсудить проект` linking to `#contact` or `#brief`.
- Notes: do not add phone by default. Do not add WhatsApp unless an official business WhatsApp number is provided. Keep controls keyboard-accessible, small, and less intrusive on mobile.
