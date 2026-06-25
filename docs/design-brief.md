# Design Brief: AIV-web

## Visual Direction

AIV-web should feel like a premium monochrome digital agency: black and white as the base, strong typography, lots of negative space, precise grid, thin dividers, and minimal but confident motion.

The mood is technology + design + performance. The site should look sharp, deliberate, and calm: no visual clutter, no decorative noise, no generic startup gradients, no heavy illustration system.

## Brand Expression

- Premium, restrained, technical.
- Monochrome foundation with limited accent use only where it helps interaction.
- Large typography as the main visual asset.
- Layouts built around rhythm, spacing, alignment, and contrast.
- Thin rules, subtle borders, and clean section transitions.
- Copy and interface should communicate speed, SEO, clean development, convenient content management, scalability, support, and business value.
- Public-facing homepage copy should not position AIV-web as a WordPress agency. WordPress can appear in technical documentation and implementation notes, but marketing copy should emphasize speed, clean development, convenient content management, SEO-ready structure, performance, scalability, support, growth, and business value.

## Layout Principles

- Use a strong desktop grid with generous margins.
- Keep sections spacious and scannable.
- Favor full-width section layouts over nested cards.
- Use numbered section labels for orientation.
- Keep services, process, pricing, and FAQ visually connected through consistent indexing, dividers, and tag styling.
- Mobile layouts should preserve hierarchy without relying on tiny decorative details.

## Interaction Principles

- Motion should support comprehension, not decorate.
- Header may hide on scroll down and reappear on scroll up.
- Scroll-reveal text may shift from muted to active color as the user progresses.
- Button hover should feel tactile and precise.
- Floating contact buttons should be useful, compact, and non-intrusive.
- First floating contact implementation should use Telegram as the primary action and a contact/brief anchor as the secondary action.
- Respect `prefers-reduced-motion`.

## Technical Constraints

- No page builders.
- No Bootstrap.
- No Tailwind.
- No jQuery.
- No GSAP.
- No heavy animation libraries.
- No external fonts.
- No external icons.
- Use SCSS as source of truth.
- Keep compiled CSS generated from `assets/scss/`.
- Use lightweight vanilla JavaScript only where CSS cannot cover the interaction.
- Keep Core Web Vitals in mind: avoid layout shifts, blocking scripts, large media, and expensive scroll handlers.

## Reference Sources

- WAM Digital: https://wamdigital.com/
- Wibify: https://wibify.agency/en

References are for interaction patterns, layout logic, visual hierarchy, and mood only. Do not copy text, images, icons, logos, brand assets, animations, or pixel-level layouts.
