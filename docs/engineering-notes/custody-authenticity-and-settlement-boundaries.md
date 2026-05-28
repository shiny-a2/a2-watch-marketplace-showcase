# Custody, Authenticity, And Settlement Boundaries

## Problem

Custody, authenticity verification, and settlement are related, but they should not be one implementation concern.

## Context

A high-value watch marketplace has to answer separate questions:

- Is the item authentic enough to list?
- Who currently holds the item?
- Is the buyer commitment valid?
- Is settlement allowed?

## Constraint

Public documentation must not expose verification rules or dispute procedures that could be abused.

## Decision

Keep boundaries separate:

- authenticity state controls trust;
- custody state controls physical responsibility;
- settlement state controls financial readiness;
- operator review links them without merging them.

## Tradeoff

Separate states require more coordination. They also make exceptions easier to reason about.

## Failure Mode

The failure is allowing settlement to move forward because one status looked "approved" while custody or verification was still unresolved.

## What I Would Improve Next

Add a public-safe state matrix that shows dependencies without revealing verification methods.

