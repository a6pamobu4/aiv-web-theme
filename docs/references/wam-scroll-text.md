# Reference: WAM Scroll Text

Source: https://wamdigital.com/

## Use As Inspiration

- Large positioning statement that becomes the main visual event of the section.
- Scroll-linked emphasis where text shifts from muted to active color.
- A simple message about creativity, technology, partnership, and business outcomes.

## Do Not Copy

- Do not copy WAM text, wording, sequence, brand colors, graphics, or exact animation.
- Do not use their assets or visual marks.
- Do not create a heavy scroll animation system.

## Implementation Notes

- Create a theme pattern at `patterns/home-scroll-text.php`.
- Structure the text as short phrases or lines so they can become active progressively.
- Use CSS custom properties for inactive and active text color.
- Use IntersectionObserver or simple scroll progress only if needed.
- Provide a static readable fallback if JavaScript is disabled.

## Performance Constraints

- Avoid per-character DOM updates on every scroll event.
- Prefer line-level or phrase-level activation.
- Avoid pinned sections that create layout instability on mobile.
- Respect `prefers-reduced-motion` by showing active readable text without scroll animation.

## Target Files To Edit Later

- `patterns/home-scroll-text.php`
- `assets/scss/components/_scroll-text.scss`
- `assets/js/scroll-text.js` if needed
- `inc/enqueue.php`
