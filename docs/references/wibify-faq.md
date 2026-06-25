# Reference: Wibify FAQ

Source: https://wibify.agency/en

## Use As Inspiration

- FAQ section with a clear heading, numbered questions, and direct answers.
- Compact structure that makes briefing calls easier.
- Strong visual order through numbering and dividers.

## Do Not Copy

- Do not copy Wibify questions, answers, pricing, technology stack claims, or wording.
- Do not copy their exact accordion styling.

## Implementation Notes

- Use AIV-web FAQ from `docs/content.md`.
- Prefer `aiv/faq` if it outputs accessible disclosure markup.
- If implemented in theme, use native `<details>` and `<summary>` where suitable.
- The public FAQ platform answer should describe a reliable CMS, custom lightweight development, and no heavy visual builders. Mention WordPress only in a technical context or if the client directly asks about the CMS.
- Keep answers direct and business-focused.

## Performance Constraints

- Prefer native disclosure behavior over JavaScript accordions.
- Avoid animating height with layout-heavy scripts.
- Ensure keyboard and screen reader accessibility.
- Keep FAQ content indexable in the initial HTML.

## Target Files To Edit Later

- `patterns/home-faq.php` if no suitable block exists
- `assets/scss/sections/_faq.scss`
- `templates/front-page.html`
- AIV block configuration if using `aiv/faq`
