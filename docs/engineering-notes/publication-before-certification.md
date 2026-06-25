# Publication Before Certification

## Problem

"Listed" and "authenticity certified" are often collapsed into a single flag. They are different guarantees and should be different states.

## Context

After operator review, an item is trustworthy enough to be visible and purchasable. Physical authentication happens later, once the item is in custody. Buyers benefit from seeing inventory early, but the marketplace must not imply a certification it has not yet performed.

## Constraint

The public certification label must never appear before physical verification, and the verification methods stay private.

## Decision

Split the lifecycle into two independent signals:

- an approved item becomes publicly visible and purchasable;
- the "authenticity certified" label is a separate, later state, set only after the item is received and verified in custody;
- buyer actions (offer, reservation, checkout) gate on the publication state, not on the certification label.

## Tradeoff

Two states need more coordination than one flag. They also stop the marketplace from showing a guarantee it has not earned, and they let inventory be sellable without overclaiming.

## Failure Mode

The failure is reading the wrong half of the lifecycle: certifying before custody, showing a certified badge on an unverified item, or hiding sellable inventory until certification is finished.

## What I Would Improve Next

A public-safe transition table that shows which buyer actions unlock at "approved" versus at "certified".
