# Architecture Discussion

The marketplace model uses explicit states because high-value item workflows are trust workflows before they are catalog workflows. The public sample keeps the transition rules visible but avoids sensitive verification details.

The main compromise is slower scope expansion. Separating seller intake, review, certification, listing, reservation, custody, and delivery makes the system more verbose, but it prevents unsafe shortcuts.

## Open Questions

- Which states should be visible to sellers?
- Should auction timing be a separate module or part of listing state?
- What review evidence can be stored without creating privacy risk?

