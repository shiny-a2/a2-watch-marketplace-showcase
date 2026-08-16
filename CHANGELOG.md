# Changelog

## 0.11.0 - Two-Axis Trust Labelling And Physical Custody Boundaries

- Documented why a single authenticity column cannot separate "the marketplace
  inspected this" from "the seller claims this", and the two-column model that
  makes all four honest combinations publishable under explicit labels.
- Recorded the degradation rule that keeps the model safe: every unrecognised
  value falls toward the weaker claim, so a defect understates trust rather
  than overstating it.
- Added the migration boundary for introducing a non-publishable default: a
  backfill must run in the same operation as the schema change, or live
  listings leave the catalogue the moment the column appears.
- Documented the physical custody ledger: append-only chains opened on arrival
  and closed only on departure, with location and holder mandatory on every hop
  and tracking codes generated rather than typed.
- Recorded why custody writes belong inside the workflow operation that moves
  the item, so the workflow record and the ledger cannot disagree about whether
  the item is still held.
- Added the reconciliation boundary: scheduled cross-checks report discrepancies
  and never repair them, because silently agreeing the numbers hides the only
  signal worth acting on.
- Added a public-safe sample showing facet-key parsing that rejects anything
  which does not round-trip, so a hand-edited query string cannot widen a filter.

## 0.10.0 - Durable and Atomic OTP State Boundaries

- Documented why a shared object cache cannot be the sole source of truth for a
  login flow that spans the mobile-entry and code-verification requests.
- Added the generation-bound transition rule: reserve attempts before comparing
  a code, consume success atomically, and never let stale cache revive a token.
- Extended the same boundary to abuse controls: hourly IP/mobile SMS budgets are
  durable atomic counters and fail closed when their storage is unavailable.
- Recorded the failure-recovery boundary that prevents an older provider failure
  from deleting or rolling back a newer OTP generation.

## 0.9.0 - Progressive OTP and Session Boundaries

- Documented the boundary between host-storefront identity proof and
  marketplace-specific buyer/seller authorization and dashboard routing.
- Added the progressive-authentication rule: one shared server contract powers
  both an in-place AJAX transition and a server-rendered form fallback.
- Recorded two reliability controls for OTP interfaces: persist pending state
  before sending a code, and exclude nonce-bearing authentication pages from
  public full-page caches.

## 0.8.0 - Shared Identity and Catalog Consistency Boundaries

- Documented how a marketplace module can reuse an established storefront
  identity without merging marketplace buyer/seller authorization into the
  general customer account model.
- Added the canonical-taxonomy rule used to prevent free-text brand drift from
  breaking public facets and operator review.
- Recorded the responsive-navigation lesson that module navigation must replace,
  not sit behind, an existing fixed mobile navigation layer.

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
