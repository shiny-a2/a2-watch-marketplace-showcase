# Custody Visibility Boundaries

## Problem

A custody ledger that nobody reads is an audit trail, not a control. The same record has to serve two audiences with opposite needs, and the naive answer — one view, filtered by role — leaks the wrong half to whichever audience the filter forgets.

## Context

Two questions, two readers:

- the person who handed over the item asks *where is my property and is it safe*;
- the operator asks *what am I responsible for right now, and what has been sitting untouched*.

The operator answer contains staff names and internal locations. The owner answer must not.

## Constraint

Public documentation must not describe storage arrangements. The design question is which fields cross which boundary.

## Decision

Build the public view as a **separate projection**, not a filtered version of the internal one.

The internal record stores an event key, a location and a holder. The public timeline renders only the event key, mapped through a label table, plus its timestamp. The location string and the holder name are never selected into the public shape, so no future field addition can accidentally surface through it — a new column is invisible to the public view unless somebody deliberately adds it there.

That is the whole boundary: the public projection is an allow-list of meanings, not a deny-list of secrets.

## Access

The tracking code is the only credential. That is acceptable when the code is long enough that guessing is impractical and the payload is non-sensitive by construction. Lookups are still rate limited per visitor — not because the keyspace is weak, but because an endpoint that answers "does this identifier exist" should never answer it at machine speed.

## Operator View

Ordered oldest-movement-first. Sorting by arrival, or by code, buries the one row that matters: the item nobody has touched in a fortnight. Idle time is displayed as a number and highlighted past a configurable threshold, so the exception is visible without reading every row.

## Scheduling

Reconciliation runs on a timer, not on page load. Discrepancies do not wait for an operator to open a screen, and the run that finds something at 3am is exactly the one worth having. Its findings are stored and surfaced at the top of the operator view, worst first.

## Tradeoff

Two projections mean two places to update when the event vocabulary grows. That is the cost of making a privacy leak require a deliberate act rather than an oversight.

## Failure Mode

The failure this prevents is a customer-facing tracking page that quietly starts printing a staff member's name because somebody added a column to the underlying table.
