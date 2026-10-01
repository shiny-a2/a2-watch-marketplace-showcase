## 0.157.3 — Clearer operator refusals

Marketplace operators now provide a reason when declining a watch or asking its seller for changes. The seller sees the explanation beside that watch, with a direct path to correct and resubmit it. The seller overview flags items needing attention. Automated checks cover reason validation, notification behavior, seller correction and the existing review flow.

## 0.157.1 — Production theme compatibility

Resolved host dark-mode card-background overrides and SEO-plugin title precedence on virtual landing pages after live verification.

## 0.157.0 — Clearer catalogue cards

Redesigned the shared marketplace card across browse pages, landing rails and auctions. Product imagery, authenticity status, price and the details action now have distinct space. Adaptive columns, accessible wishlist controls, the shared site font and coordinated light/dark colors improve comparison on phones and desktops. Virtual landing routes now load their missing styles and use the correct page title.

Validated with the existing 310-check flow harness, 28 boot pages, virtual-route regression cases and responsive browser previews. No product or customer data was changed by this design update.

## 0.156.0 — Reviewed listing changes

Sellers and administrators can request edits to marketplace watch prices, descriptions and photos. A repair review shows the current and proposed details; approval applies the changes and rejection explains the reason in the seller ticket. Live details stay unchanged during review.

The release adds responsive request/review screens, ownership checks, duplicate and stale-edit protection, transactional ticket replies and optional provider-approved SMS patterns. Validation includes 29 targeted workflow assertions, 310 existing flow checks and eight mobile/desktop theme layouts. SMS activation requires provider pattern registration; no real customer notification was sent during tests.

# Changelog

## 0.17.1 — Clearer Offer Amount Entry

- Make the buyer offer field show grouped amounts while typing and explain the amount unit in plain language.
- Accept Persian and Arabic digits through the shared storefront formatter while keeping the submitted value numeric.
- Validate the form syntax and confirm the deployed marketplace remains available.

## 0.17.0 — Clearer Product Photography and Accessible Zoom

- Refined public watch galleries with uncropped photography, a scrollable thumbnail strip and a clear zoom action.
- Added full-size viewing, magnification, touch navigation, keyboard controls and focus restoration while preserving media privacy boundaries.
- Verified responsive browser interactions and existing application/media checks. No customer data or internal access details are included in this update.

## 0.16.0 - One Fact, One Message & Decisions Outlive Their Workflow

- Documented the two faults the previous release's refusal shipped with, both
  invisible to tests that only asserted that a message was sent: one action
  dispatched two events, both mapped to the same template, so the recipient was
  told the same thing twice a second apart; and the message carried prose
  written for a screen through a transport whose spaced value slots have a hard
  ceiling, so what arrived was a fragment and an ellipsis. The rule that answers
  it — one fact, one message; two forms of every reason with the short one
  measured against the ceiling by the suite; the leading reason recorded where
  it is chosen rather than parsed back out of prose; the notification as the
  summons and the panel as the record.
- Recorded what a changed route does to the guards and tests left behind it.
  Moving a refused item from a second party's approval queue to the submitter
  invalidated the approval step, which then tried to close a record the
  submitter had been invited to correct, and disarmed a guard that had worked by
  finding a related open row rather than by asking the question it meant. Close
  a decision where it is made when nothing further is owed on it; guard on the
  state that means the thing being guarded; and re-run everything that touches a
  route when the route moves — two suites here had been red since the previous
  release and were reported green.

## 0.15.0 - A Verdict Must Move The File

- Documented a decision that was recorded and never delivered: a specialist
  refusing an incoming submission wrote the finding correctly and left the
  record in the status it already had, so it waited in an operator's queue for
  a verdict that had already been given, while the only person who could act on
  the reason — the submitter holding the object — was told nothing. An event
  was dispatched; nothing listened to it, which made the refusal observable in
  a log and invisible everywhere a person looks.
- Recorded the rule that answers it: a recorded verdict changes the record's
  state in the same operation that writes the finding, and routes the item to
  the state that names the party who can act rather than back to the party who
  cannot. The specialist's typed sentence travels with the reason labels into
  both the record and the message, so the submitter's own panel and their
  notification say the same thing.
- Noted the two edges that make it safe to run twice: the transition is
  idempotent at the destination, so a second refusal records its finding and
  leaves the first answer intact; and the state gets its own message template,
  because borrowing the rejection wording tells a submitter their item was
  turned down when what is wanted is a correction.

## 0.14.0 - Mint, Do Not Borrow & Private by Policy, Public by Platform

- Documented why an authenticated session is not evidence of any particular
  fact, and the mint-do-not-borrow rule that answers it: read the sealed and
  masked pair the sign-in writes through a narrow accessor, require the two to
  round-trip so a half left behind by a migration is caught, then write a fresh
  proof bound to the new purpose, context and user rather than loosening the
  binding every other gate reads the same store through. It is the seal, not the
  comparison, that makes a forged half worthless, and the seal stays private.
- Recorded the surface-inventory lesson from the other side of the same
  boundary: a record can be private by policy and public by platform, because a
  core WordPress route serves the same bytes without ever consulting the
  application's policy. Shut it at the source, and treat a best-effort
  relocation as a second layer rather than as the boundary.
- Added the missing half of the choke-point rule documented in 0.13.0. Moving a
  checksum into the storage method closes it for callers nobody remembers, but
  a stored value can be older than the rule, so the point of use is checked
  again and a bad value stops in front of somebody who can fix it.
- Documented three read-side failures of decisions that were recorded
  correctly: a message field whose slot was inferred from whether its value
  had a space in it, so a short answer loses its text; a
  supersede-not-overwrite write that doubles every corrected item in the
  submitter's own list; and one screen serving a refusal and a suspension,
  which are different states with different next steps.
- Recorded the harness rule from the opposite face of that same class of
  failure: three lanes reported green suites while an end-to-end probe that
  rendered each page found defects none of them could reach. Assertions about
  functions are not assertions about pages.
- Added a public-safe sample showing a scoped-proof mint — round-trip the pair
  the sign-in wrote using a derivation of its own, refuse a value too short to
  mask, refuse when a challenge is already in flight or a registered value
  disagrees, and emit a proof that records its basis alongside purpose,
  context, user and expiry.

## 0.13.0 - Policies Need a Choke Point

- Documented a class of failure worth naming: a business rule implemented as a
  predicate, called by the write path, and consulted by none of the four read
  paths that could show the excluded state to a customer.
- Recorded the rule that fixes it — enforce at the narrowest point every caller
  must pass through, so surfaces added later inherit correctness without their
  authors knowing the rule exists — and where the predicate still belongs, which
  is the write side, where a human deserves an explanation.
- Added the second-half audit: filtering reads hides bad state without
  preventing it, and the writers that produce it are rarely a single path.

## 0.12.0 - Custody Visibility Boundaries

- Documented why a custody record needs two projections rather than one filtered
  view: the operator answer contains staff names and internal locations, and the
  owner answer must not.
- Recorded the allow-list rule that makes the public timeline safe by
  construction — it renders mapped event labels and timestamps only, so a new
  column added to the underlying table is invisible there unless somebody
  deliberately adds it.
- Added the access boundary for code-only lookups: acceptable when the keyspace
  makes guessing impractical and the payload is non-sensitive, still rate limited
  because an existence oracle should never answer at machine speed.
- Documented why the operator view sorts by oldest movement rather than arrival,
  and why reconciliation runs on a timer instead of on page load.

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
