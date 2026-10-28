# Marketplace authenticity guidance — 2026-10-29

The authenticity page now explains the difference between an initial photo review, a physical inspection and an issued digital card. Buyers can check the current standing on each watch listing; holders of an issued card can open its link or QR to inspect its current public details. The title and description reflect those limits, and the page uses informational structured data rather than a product collection type. The separate listing-specific request form is excluded from indexing while the public guide remains indexable.

The live page was checked after a targeted cache purge. PHP syntax, the focused storefront checks and 326 offline marketplace flow checks passed. Phone and desktop views were inspected in light and dark themes, including text readability, destinations, input focus and horizontal containment. No certificate lookup with customer data, authenticated transaction or search ranking outcome was tested. The installed plugin version remains 0.159.33.

# Marketplace overview for buyers and sellers — 2026-10-28

The marketplace overview now introduces both buying a used watch and submitting one for sale. Its heading, introduction and search description point to the matching catalogue and seller guide without implying that watches are currently available. The overview guide can also be opened with a keyboard.

The scoped update was checked on the live overview page after deployment. PHP syntax and 326 offline marketplace flow checks passed. Phone and desktop views were inspected in light and dark themes, including the opened guide, keyboard operation and horizontal containment. Search ranking and authenticated transactions were not tested. The installed plugin version remains 0.159.33.

# Seller guide aligned with the registration form — 2026-10-28

The public selling guide now answers the practical question of how to sell a used watch. It makes the reference number optional, points to the form’s missing-box choice, and explains how to mention a missing card. The copy follows the form and existing seller rules without promising a sale, a price or an authenticity result.

The scoped page-content update was checked on the live selling page. Offline marketplace flow checks passed (326 checks), and the page was inspected at phone and desktop widths in light and dark themes, including the opened guide and keyboard focus. Authenticated submission and search ranking outcomes were not tested. The installed plugin version remains 0.159.33.

# Marketplace catalogue availability and search description — 2026-10-28

The watch catalogue now says clearly when no watches are available to buy. A filtered search still explains that its filters found no match, while brand pages retain their own availability message. The catalogue search description describes browsing and comparison without implying that listings are currently in stock.

The scoped production update was checked on the live catalogue and representative filtered and brand pages. Offline workflow checks passed (326 checks), and the catalogue and filters were inspected at phone and desktop widths in light and dark themes, including keyboard focus and expanded filters. Search ranking and future stock availability were not tested. The installed plugin version remains 0.159.33.

# Seller rules and search clarity — 2026-10-28

The marketplace's public seller rules now match its current intake: a watch reference can be omitted, a proposed price is required, and the box choice describes whether a box accompanies the watch. The rules page also has a specific search description and a clearer introduction to the listing, review and settlement stages. This removes conflicting guidance at the point where a seller agrees to the rules.

Validation covered 326 offline flow checks, PHP syntax, and the live public rules page at phone and desktop widths in light and dark themes. The live URL was checked after a targeted page-cache purge. The authenticated seller form was not exercised with a real account, and no search ranking outcome is claimed. The production change was limited to the four affected runtime files; the installed plugin version remains 0.159.33.

# 0.159.34 — Consistent listing edit screens, 2026-10-27

Listing edit and review pages now use the marketplace navigation and footer. Sellers see the current price beside their proposed price, a clear choice between price and content edits, and separate sections for details, photos and review notes. Gallery controls are easier to select on a phone, and the review comparison stacks vertically on smaller screens.

Validation covered 34 existing workflow checks and eight synthetic views across phone and desktop sizes in light and dark themes, including photo selection, text entry, focus and expanded descriptions. Authenticated submissions and real notifications were not tested. This note describes the source update; production rollout is not claimed.

# 0.159.33 — Make review explanations visible, 2026-10-26

When a watch review proposes a different price, the seller now sees the technician's explanation beside the proposed amount. Previously, that explanation was stored but omitted from the proposal card. Correction feedback also has a clear next step and a link to repair messages. The change works with existing stored feedback and does not resend customer notifications.

The cards use the shared light/dark palette, preserve multiline explanations and escape submitted text. Internal operator notes remain private, and staff are represented by a department label. Price consent no longer implies that requested corrections or final publication review can be skipped.

Validation: 8 focused feedback checks, 31 refusal/notification checks with a mocked provider and 129 price-proposal checks passed. Synthetic browser checks covered phone and desktop widths in both themes, keyboard focus, hover, expandable details, text contrast and horizontal containment. A separate broader suite still has two pre-existing automatic-approval expectation failures, reproduced on the unchanged baseline. No real customer messages or financial records were created for testing; handset delivery and an authenticated end-to-end rejection were not tested.

# 0.159.31–0.159.32 — Clearer seller guidance and keyboard access, 2026-10-26

Search queries showed that sellers wanted to know whether the marketplace buys their used watches directly. The sell page now answers that question in plain language: a submission starts review and possible listing, and it does not promise an immediate purchase or a completed sale. This helps sellers understand what happens before they provide watch details.

The guide's expand control is now reachable through the keyboard. Space opens it, a visible focus ring identifies the control, and clicking still opens or closes it. The released page and plugin version were checked in production. Offline workflow checks passed (325 checks); the page was inspected at phone and desktop widths in light and dark themes, including the expanded guide and focus state. Search ranking changes and authenticated seller submissions were not tested.

# 0.159.30 — Marketplace search intent released 2026-10-26

A marketplace can split the same buying or selling intent across several landing URLs while virtual pages inherit unrelated metadata from a host CMS. The released update assigns one canonical page to each primary intent, redirects duplicate routes, aligns virtual-page metadata and structured data with their visible content, and removes misleading modification dates from its sitemap. Empty or withdrawn watch details are excluded from indexing. The buying page now has a clear primary heading, and the selling guide describes the actual review and price-approval process without blanket authenticity or timing promises. A Persian keyword seed map separates browsing, selling, authenticity, services and auctions without treating candidate phrases as verified search volume or promising stock and guarantees. The live canonical routes, sitemap and metadata were checked after deployment; offline workflow checks passed (325 checks), and the touched public pages were inspected at phone and desktop widths in both themes. Search-engine indexation and authenticated transactions were not tested.

# 0.159.29 — One clear identity review entry

The marketplace operations dashboard now places the identity-document sub-count inside the seller-verification card. Operators keep the review signal while seeing one route to that queue. A focused offline check confirms the destination appears once and the count remains visible.

# 0.159.28 — Service wizard visual polish

The service flow keeps the page's natural starting position and places later steps below the sticky navigation. Headings follow the shared light and dark text palette, and step motion respects reduced-motion preferences. Mobile and desktop visual checks passed in both themes.

# 0.159.27 — Browse service prices before sign-in

Visitors can choose a watch brand and see available starting prices before signing in. Their watch and service choices carry through phone sign-in, so they can continue the request without repeating the first steps. The page now has one clear service wizard instead of repeated introductions.

# 0.159.26 — Multi-service watch care request

The customer service page now guides watch details, selected services, up to three optional photos and a final price review through four steps. Starting prices come from the established repair catalog, and unpriced work cannot enter checkout. Selected services remain itemized for the customer and workshop. Synthetic payment and duplicate-submission checks passed; no real payment or customer message was sent for testing.

# 0.159.25 — Seller declarations in workshop review

Authorized workshop staff can now read the seller's watch description, movement type, declared accessories and asking price together when reviewing a submission or receiving a parcel. The bridge passes only watch details needed for that work and uses one bounded lookup for parcel submissions. Synthetic data and responsive visual checks covered missing legacy fields and both themes; no customer record or transaction was created for testing.

# 0.159.24 — Clear post-payment continuation

After a confirmed service checkout, customers can return directly to their request to record how the watch will arrive. A continuation link also appears on the ordinary order receipt path. Synthetic checks covered the service-only routing without placing a real order.

# 0.159.23 — Standalone watch-service request flow

The private marketplace now has a separate customer request path for watch services. It keeps a clear progression from request and reviewed estimate to payment status, watch handoff and workshop intake. Duplicate actions and interrupted checkout attempts have explicit recovery paths. The customer and staff screens use the same responsive light/dark visual system. Synthetic lifecycle and visual checks passed; no real purchase or customer message was created for testing.

# 0.159.22 — Service pricing and payment-unit safety

Marketplace seller-service quotes now use the confirmed workshop starting-price catalog while keeping completed order snapshots stable. New checkout paths convert displayed marketplace amounts to the store's payment currency and verify the same unit on callback and in payment records; older pending orders retain their original snapshot for explicit handling. Missing prices stop a paid service instead of silently creating a free order. Live sample quotes and synthetic payment cases passed verification. The separate public-service checkout remains disabled pending its full operational rollout.

# 0.159.21 — Precise case lookup

Exact seller reference IDs now appear first in live verification search, even when the same digits occur in many phone numbers. Short terms no longer scan unrelated metadata.

# 0.159.20 — Faster seller verification and a focused operator dashboard

Seller verification now offers an access-controlled live search across case identifiers, names, contact details and linked accounts. The command dashboard shows actionable queues without repeating idle navigation stages. The search component was checked in light and dark themes at mobile and desktop widths, including interactive results and keyboard focus.
# 0.159.19 — Marketplace identity reaches one customer file

Verified marketplace sign-in and completed buyer or seller profiles now emit narrow events for a shared, phone-keyed customer record. This lets an operator recognize a marketplace-origin visitor without creating a second customer file; details supplied later enrich the same file. Existing acquisition sources and operator edits remain protected. Offline checks covered account reuse and duplicate prevention.

# 0.159.18 — Make older incomplete requests visible

The seller review queue now identifies older watch requests that lack a price, description or required image and names the missing item beside each case. Reviewers can open the case and request a correction; the update does not silently change a customer's status or send a message. The current registration path rejects incomplete submissions, including attempts to use the retired unknown-price field. Synthetic journey checks and mobile/desktop light/dark form previews passed.

# 0.159.17 — A clear service fallback

The public services page now respects its availability setting. When online requests are not configured, it gives visitors a direct support action instead of exposing a form that cannot be fulfilled. Watch-linked service purchases retain their existing flow. The service page was checked in light and dark themes at mobile and desktop widths.

# 0.159.16 — Accurate marketplace guidance

The services, authenticity lookup and auction pages now use shorter Persian explanations tied to what is actually available. The copy no longer promises a certificate for every watch or an active auction when none exists. Informational sections follow the same responsive light/dark visual system and were checked at mobile and desktop widths. The previous page text is retained for rollback.

# 0.159.15 — Clearer marketplace support journeys

The marketplace's services, authenticity-card lookup, custody tracking and auction browsing pages now share a cleaner responsive layout in light and dark themes. Certificate QR links open the correct verification page while preserving private card access; the auction list shows only lots currently open for bids and keeps auction status separate from authenticity information. Service requests collect the watch model and validate contact details. Offline regression checks and mobile/desktop visual previews passed; no customer order, bid or certificate was created for testing.

# 0.159.14 — Complete watch registration before review

Seller registration now requires a meaningful watch description, an asking price, and the required photographs. The former unknown-price option is gone. A watch enters the review queue only after its images are saved, and older incomplete records cannot be approved until corrected. The seller form was checked at mobile and desktop widths in light and dark themes; synthetic checks cover missing text, price, photographs and the old-watch box exception. No live listing was created for testing.

# 0.159.13 — Clearer marketplace routes and buyer guidance

Marketplace pages now use a focused navigation and clearer buyer/seller copy about deposits, inspection and final settlement. Legacy entry links lead to the active marketplace pages. The update removes blanket product claims from shared archive copy and keeps the marketplace footer focused on relevant destinations.

# 0.159.12 — Easier marketplace administration on phones

Marketplace status filters now read as compact, accessible controls instead of crowded text links. Wide operations tables scroll within their own panels on small screens, keeping the rest of the page stable. The final-payment invitation view now uses clear Persian labels and keeps technical diagnostics optional. All 21 active admin screens were checked at phone and desktop widths without page overflow, and the existing 321 workflow checks passed. No customer purchase, message or financial record was created for testing.

# 0.159.11 — A focused marketplace operations desk

The marketplace admin menu now keeps daily review and fulfilment queues prominent, while specialist diagnostics remain available from Settings. Pending-watch and identity-review counts follow the same records operators can open, including long queues; completed identity files are shown as a useful sub-count without inflating the overall total. The dashboard prioritizes work that needs attention and tucks secondary reports behind a disclosure. Review lists now paginate, and legacy action fallbacks return to active admin pages instead of broken destinations. Offline workflow checks and responsive light/dark browser previews passed; no customer records or transactions were created for testing.

# 0.159.10 — A clearer path from watch to checkout

Marketplace buyers now move from a watch's Buy action to a dedicated checkout after phone verification. The page shows the watch price, deposit and remaining balance together, then asks for delivery province, city, postal code and full address before payment. Buyers explicitly accept the purchase conditions with a typed name; a valid unfinished payment still opens its original order. The buyer view was checked at mobile and desktop widths in light and dark themes, including city selection, conditions and code-verification states. No live purchase or customer message was created for testing.

# 0.159.9 — Marketplace navigation with a clear store exit

The matching private update gives marketplace pages a dedicated header, logo destination and mobile menu. Buyers can reach watch listings, selling, services, tracking and their account within the marketplace, while a single clearly labelled route leads to the main new-watch store. The header reuses the site's theme preference and was inspected across phone, tablet and desktop widths in light and dark themes. Navigation and keyboard interactions passed synthetic checks; no customer transaction was created.

# 0.159.8 — Clearer post-reservation hand-offs

The matching private update adds a concise operator view of confirmed reservations and each next hand-off. Seller pages now make the service and shipment steps easier to find, while shipping status and receipt costs are recorded without changing existing settlement math. The update also prepares separate transactional notices for the seller; those notices require approved provider templates before they can send. Offline flow checks passed, and the touched seller view was inspected at phone and desktop widths in light and dark themes. No live payment or message was created for testing.

# 0.159.7 — Continue a pending watch purchase

When a buyer has already started an eligible deposit for a watch, the watch page now offers a direct way to continue that original payment. The link belongs only to the right account and is checked again on use, so a return visit does not create a duplicate payment attempt. Synthetic checks cover ownership, expiry, payment state and amount; the action was inspected on phone and desktop widths in light and dark themes.

# 0.159.6 — Clearer buyer return path and verification states

Marketplace sign-in now returns a buyer to the same watch and purchase section. The purchase review reuses an already verified account phone, while buyer identity details can be validated once and reused on later visits. The operator queue now distinguishes a seller account decision from completed identity review, and reports failed saves clearly. Synthetic checks cover return navigation, identity validation and review states; responsive purchase views were inspected in both themes. No live purchase or customer message was created for testing.

# 0.159.5 — Recoverable deposits and editable pending photos

Buyers can resume an eligible unpaid marketplace deposit from their account using the existing payment order. The action checks ownership, time limit, order state and amount again before opening the bank payment flow, avoiding a duplicate reservation or charge request.

Sellers can add or replace photos while a watch edit is awaiting review. Their changes stay in the same review request and ticket, so repair staff can assess the latest proposal without duplicate cases. The buyer payment action and review form were checked at mobile and desktop widths in light and dark themes. Automated checks covered invalid and expired payments, photo amendments and rollback on ticket failure; no live payment or customer message was generated by testing.

# 0.158.0 — Replay-safe seller intake and readable reviews

The matching private update serializes repeated seller uploads, preserves one case on correction retries and distinguishes another physical unit of the same model. Change review uses compact before/after information and consistent light/dark surfaces. Repair decisions retain valuation and separate registration/publication timestamps. Exact-photo duplicate maintenance preserves history and skips financial/custody-linked records. Synthetic checks cover replay and approval boundaries, with mobile/desktop review and decision interactions in both themes. Historical missing values are not invented. Production records, credentials and implementation remain private.

## 0.157.5 — Honest marketplace purchase status

Ordinary watch pages now show auction controls only when an active public auction exists. A watch whose seller verification is incomplete clearly explains why payment and offers are unavailable; the server-side identity check remains in place. Mobile and desktop storefront views were checked after release.

## 0.157.4 — Seller identity corrections before approval

Sellers can now replace their ID-card photo or record a new verification video while review is pending, without re-entering their identity and bank details. The panel shows any review reason and keeps approved records locked. Mobile recording now uses the actual output format and lets recording finish before releasing the camera. The existing identity and marketplace checks passed.

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

## 0.18.0 — Reviewed Watch Deposits

- Added a clear review step before a buyer pays a watch reservation deposit, showing the watch price, deposit, remaining balance and next steps.
- Added mobile verification and explicit acceptance of the reservation terms before handing off to the selected bank gateway.
- Checked payment-unit consistency so the amount confirmed by the buyer matches the amount requested at payment.
- Verified the responsive review and code-confirmation states in light and dark themes. No customer records or payment credentials are included here.

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
