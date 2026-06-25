# Changelog

## 0.7.0 - Publication-Before-Certification & Handoff Boundaries

- Added a publication-before-certification note and policy sample: an item
  becomes publicly visible and purchasable on operator approval, while the
  "authenticity certified" label is a separate, later state earned only after
  the item is received and verified in custody. Buyer actions gate on the
  publication state, not on the label.
- Added a verification-fee-and-prepaid-handoff note and samples: a mandatory,
  configuration-driven verification fee (flat or proportional), optional
  additive services, and a prepaid custody handoff where carriage-due shipments
  are reconciled against the seller's settlement.

## 0.6.0 - Messaging, Privacy, SEO, and Caching Patterns

- Added an event-to-notification bridge sample: a single subscriber maps
  lifecycle events to transactional messages by audience and template.
- Added a reversible at-rest contact-storage sample (AEAD): masked for display,
  recoverable only at send time, never persisted as plaintext.
- Documented (architecture level) SEO-as-data landing/sitemap/JSON-LD,
  rate-limited onboarding, sensitive-media access auditing, and cache-aside
  reads with event-driven invalidation.

## 0.5.0 - Acquisition & Onboarding Boundaries

- Added a purchase-eligibility policy sample that composes publication state with certificate availability so off-custody or flagged items are never offered for checkout.
- Documented an SEO-landing-as-data approach (landing definitions drive both rendered content and head meta) and a seller identity-onboarding boundary (validate inputs, store the proof not the secret).

## 0.4.0 - Trust Engines & Runtime Proof

- Added an engineering note on offers, settlement, notifications, and verification boundaries.
- Added public-safe samples: offer-decision policy, exact-sum installment schedule builder, notification redaction policy, and a certificate-availability policy (certificate status separated from sale availability).
- Documented an offline runtime-proof approach (WordPress stub boot/render + SQLite-backed schema and service checks) at an architecture level.

## 0.3.0 - Activity Layer

- Added roadmap, known limitations, contribution notes, and issue template.
- Added review queue repository and publication policy samples.

## 0.2.0 - Engineering Case Study Rebuild

- Reworked README around marketplace trust boundaries, state transitions, and honest runtime status.
- Added workflow map.

## 0.1.0 - Initial Public Showcase

- Published public-safe marketplace architecture overview.

## Compatibility Notes

- Samples are architecture references and are not a production marketplace implementation.
- Sensitive verification, payment, and dispute logic is intentionally excluded.

