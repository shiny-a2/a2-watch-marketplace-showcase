# Offers, Settlement, Notifications, and Verification Boundaries

A public-safe note on the trust engines that sit on top of the base marketplace
state machine. No pricing, verification, payment, or client-specific rules are
included.

## Price offers as a moderated state machine

A buyer offer is not applied directly. It moves through admin moderation, then a
vendor decision (accept / reject / counter), then a buyer response to a counter,
and finally a reserved-price checkout window. Modeling this as explicit statuses
with a small decision policy keeps the flow auditable and prevents a buyer offer
from silently changing a public price.

See `samples/infrastructure/OfferDecisionPolicy.php`.

## Settlement as a configurable rule, not a single payout

A settlement can carry a payout rule: a single delayed cash payout, an even
installment schedule, or manual stages. The interesting engineering detail is
that installment amounts are split so they reconcile **exactly** to the net —
the rounding remainder lands on the final stage — and the settlement only closes
once every stage is paid.

See `samples/infrastructure/InstallmentScheduleBuilder.php`.

## Notifications: deliver in scope, persist redacted

Delivery sits behind a provider interface (a log-only provider for development,
a live gateway for production). Transactional messages are dispatched while the
real recipient and body are still in memory, and only a masked, preview-only
record is persisted for audit. Sensitive destinations never reach the durable
queue.

See `samples/infrastructure/NotificationRedactionPolicy.php`.

## Identity verification: store the proof, not the secret

Seller identity checks validate inputs (including a national-id check digit) but
persist them only as a salted hash plus a masked display value — the raw value
is never stored. An internal reliability signal is adjusted with an append-only
event log. The verification **rules themselves stay private**; only the
storage/privacy pattern is shown here.

## Certificate status is not sale availability

An authenticity certificate persists even after an item leaves custody, but the
item is only purchasable while it is in custody and not flagged. Keeping these
two concerns separate means a returned-but-certified item is never shown as
buyable, and a post-return mismatch can flag the certificate without erasing the
authentication history.

See `samples/infrastructure/CertificateAvailabilityPolicy.php`.

## Proving it without a live site

The private project includes an offline harness that boots the plugin against a
WordPress stub, renders each admin screen in isolation, materializes the
activation schema on an in-memory SQLite database, and runs the real services
end-to-end. This turns "should work" into repeatable evidence and catches
activation, schema, and logic regressions before a live deploy.
