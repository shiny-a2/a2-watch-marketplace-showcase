# Physical Custody Ledger

## Problem

"Which items are in the building right now, and who last touched each one?" had no answer, because whereabouts lived in whichever domain happened to be handling the item — a shipment row, an intake row, a location string on the item itself. Nothing tied those together, and nothing noticed when one of them went stale.

## Context

When a marketplace takes physical possession of goods it does not own, losing one is not a data-integrity problem. It is a liability. The system has to be able to state, at any moment and without a human search, exactly what it is holding.

## Constraint

Public documentation must not describe storage locations, handling procedures, or security arrangements. The design question is the record, not the room.

## Decision

One append-only ledger, structured as chains and events:

- a **chain** is one visit of one item: opened when it arrives, closed only when it physically leaves;
- an **event** is one hop within that visit, appended and never edited.

Two rules carry most of the value:

1. **Every hop must name a location and a holder.** A hop that records neither is exactly the gap an item disappears into, so the service rejects it rather than storing a movement nobody is accountable for.
2. **The tracking code is generated, never typed.** An operator who types a code can type one that does not exist; an item booked in under an invented code is untracked while appearing tracked.

A second open chain for the same item is refused. Two open chains mean two people each assume the other is looking after it.

## Coupling To Workflow

The workflow that brings an item in is what opens the chain, and the step that sends it back is what closes it. Neither is a separate screen an operator might forget. Because the two writes happen in the same operation, the workflow record and the ledger cannot disagree about whether the item is still held.

## Reconciliation

A scheduled job cross-checks the paperwork against the shelf and **reports rather than repairs**:

- a workflow that says an item is held, with no open chain — the dangerous direction, since something is physically present and unrecorded;
- a chain still open after the work it belongs to closed — an item on a shelf that nobody is expecting to deal with;
- a chain with no movement for longer than a configured threshold.

Silently correcting any of these would hide the one thing worth looking at. The job exists to raise a question, not to make the numbers agree.

## Tradeoff

Mandatory location and holder fields make every operator action slower. That is the intended trade: the friction is the control.

## Failure Mode

The failure this prevents is discovering an item is missing weeks later, from a customer asking about it, with no record of who handled it last.
