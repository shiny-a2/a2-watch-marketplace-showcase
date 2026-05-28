# Marketplace State Machine Before Payments

## Problem

Marketplace projects often jump to payments too early. For high-value items, payment is not the first hard problem. State and trust are.

## Context

Seller submission, operator review, authenticity checks, listing approval, reservation, custody, delivery, and settlement all have different responsibilities.

## Constraint

The system must prevent invalid transitions before money or custody logic is added.

## Decision

Model the marketplace as explicit states first:

- submitted;
- under review;
- approved/rejected/needs information;
- listed;
- reserved;
- in custody;
- delivered or returned.

## Tradeoff

State-machine work feels slow before the UI exists. It prevents expensive ambiguity later.

## Failure Mode

The failure is a payment flow attached to an item that was never validly reviewed, certified, or publishable.

## What I Would Improve Next

Add a transition table and test fixture before expanding auction or settlement concepts.

