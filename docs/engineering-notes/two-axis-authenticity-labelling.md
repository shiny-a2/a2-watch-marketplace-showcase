# Two-Axis Authenticity Labelling

## Problem

A single `authenticity_status` column cannot distinguish "we inspected this item and it is genuine" from "the seller says it is genuine". Both collapse into one value, and whichever label the interface picks is wrong for half the inventory.

## Context

A resale marketplace for high-value goods carries stock in several honest states at once:

- inspected by the marketplace, found genuine;
- inspected by the marketplace, found not genuine;
- not inspected, claimed genuine by the seller;
- not inspected, stated as not genuine by the seller.

All four are legitimately sellable when the label is explicit. Merging them forces a choice between overstating trust and hiding stock.

## Constraint

Public documentation must not describe how authentication is actually performed. The design question here is state modelling, not verification technique.

## Decision

Store two independent facts:

- **verification source** — who reached the judgement, the marketplace or the seller;
- **originality** — what the judgement was.

`authenticity_status` keeps its original job: where the item sits in the certification workflow. It is a lifecycle field and never a label. The pair produces four public labels, each with its own badge treatment, its own plain-language explanation, and its own catalogue facet.

A third originality value, "undeclared", exists only before a seller answers. It is not publishable and is not offered as a filter.

## Guardrails

The interesting part is what happens to invalid input:

- an unrecognised verification source degrades to *seller-declared*, never to *marketplace-verified*;
- an unrecognised originality degrades to *undeclared*, never to *genuine*;
- the publish gate refuses an undeclared item, and refuses the marketplace-verified label unless a physical inspection timestamp exists;
- a seller cannot relabel an item the marketplace has already inspected.

Every degradation path is deliberately biased toward understating trust. A bug should make a listing look less certain than it is, never more.

## Migration

Adding two columns with defaults is not free when the defaults are "seller-declared" and "undeclared", because undeclared is not publishable. Without a backfill, every live listing silently leaves the catalogue at the moment the columns appear. The backfill runs once, immediately after the schema install, and maps existing certified items to verified-genuine and everything else to the claim under which it was originally published.

## Tradeoff

Two columns and a value object cost more than one string. They buy an interface that can state exactly what is known about an item and by whom, and an audit trail where the label and its provenance cannot drift apart.

## Failure Mode

The failure this prevents is a buyer reading a marketplace badge as an inspection result when nobody inspected anything.
