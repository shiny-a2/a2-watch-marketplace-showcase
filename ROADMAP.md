# Roadmap

This repository is an architecture showcase. It does not represent a production launch.

## Recently Added

- Publication-before-certification note and policy sample: sellable on operator approval, with the certified label gated on in-custody verification.
- Verification-fee and prepaid-handoff note and samples: configuration-driven fee (flat or proportional) and carriage-due settlement reconciliation.
- Offer-decision, installment-schedule, notification-redaction, and certificate-availability samples.
- Engineering note on offers, settlement, notifications, and verification boundaries.
- Architecture-level description of an offline runtime-proof harness.

## Near Term

- Add a compact state-transition table (which buyer actions unlock at "approved" versus "certified").
- Add fixtures for publication policy decisions and for fee resolution (flat versus proportional) and settlement adjustment (prepaid versus carriage-due).
- Add a short ADR for separating auction workflows from base marketplace listing.
- Document operator review states more clearly.

## Later

- Add synthetic UI state diagrams.
- Add review queue pagination notes.
- Add custody/delivery state testing examples.

## Not Planned

- Publishing seller verification rules.
- Publishing payment, dispute, or custody procedures.
- Claiming production launch without runtime verification.

