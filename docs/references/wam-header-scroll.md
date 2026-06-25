# Reference: WAM Header Scroll

Source: https://wamdigital.com/

## Use As Inspiration

- Fixed navigation that feels present at the top of the viewport.
- Header behavior that can disappear while scrolling down and reappear when the user scrolls up.
- Minimal navigation hierarchy with clear primary links and contact action.

## Do Not Copy

- Do not copy WAM text, logo, menu labels, colors, graphics, assets, or exact dimensions.
- Do not copy their animation timing or implementation details directly.
- Do not reproduce the header pixel-for-pixel.

## Implementation Notes

- Build as AIV-web theme chrome in `parts/header.html`.
- Use `position: sticky` or `position: fixed` depending on layout testing.
- Add a small vanilla JS controller only if CSS alone is not enough.
- Toggle classes such as `.is-header-hidden` and `.has-scrolled`.
- Ensure keyboard users do not lose focus when header visibility changes.
- Respect `prefers-reduced-motion`.

## Performance Constraints

- Use passive scroll listeners.
- Throttle work with `requestAnimationFrame`.
- Only read scroll position and toggle classes; avoid layout-heavy calculations.
- Keep the script small and load it only on the front end.

## Target Files To Edit Later

- `parts/header.html`
- `assets/scss/components/_header.scss`
- `assets/js/header-scroll.js`
- `functions.php` or `inc/enqueue.php` for script enqueueing
