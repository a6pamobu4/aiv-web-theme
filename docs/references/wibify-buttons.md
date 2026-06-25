# Reference: Wibify Buttons And Floating Contacts

Source: https://wibify.agency/en

## Use As Inspiration

- Compact primary CTA with directional arrow feeling.
- Hover interaction that feels precise, quick, and tactile.
- Floating contact buttons in the bottom-right corner for direct action.
- Strong contrast and restrained shape language.

## Do Not Copy

- Do not copy Wibify labels, icons, arrows, brand marks, colors, or exact button geometry.
- Do not copy contact details or form content.
- Do not use external icon libraries.

## Implementation Notes

- Button styles should come from theme SCSS and align with `theme.json` tokens where possible.
- Use text plus CSS-generated arrow or a simple inline character only if it fits the design.
- Floating contacts should be a theme component, not a plugin block.
- First AIV-web implementation should use `Telegram` as the primary action with a TODO placeholder for the actual Telegram URL.
- Secondary action should be `Обсудить проект` linking to `#contact` or `#brief`.
- Do not add phone by default. Do not add WhatsApp unless an official business WhatsApp number is provided.
- Provide accessible names and visible focus styles.
- On mobile, floating contacts must not cover CTAs, cookie notices, or form controls.

## Performance Constraints

- Button hover should be CSS-only.
- Avoid JavaScript for simple hover states.
- Keep floating contact markup small.
- Avoid box-shadow or filter effects that are expensive during animation.

## Target Files To Edit Later

- `assets/scss/components/_buttons.scss`
- `assets/scss/components/_floating-contacts.scss`
- `parts/footer.html` or a future template part for floating contacts
- `theme.json` if button tokens need adjustment
