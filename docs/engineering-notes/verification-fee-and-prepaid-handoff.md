# Verification Fee And Prepaid Handoff

## Problem

When a sale begins, the seller owes obligations — a mandatory verification step and a set of optional services — and the item has to move into custody. Encoding fee amounts and carriage rules inline makes them brittle and unsafe to expose.

## Context

A high-value sale needs a verification step before settlement. The price of that step varies by deployment and is best expressed as policy, not as a hardcoded number. Items are expected to ship prepaid into custody; some arrive carriage-due, where the recipient pays the carrier on delivery.

## Constraint

Public documentation must not expose fee amounts, rates, custody addresses, or settlement procedures.

## Decision

- Treat the verification fee as a mandatory, configuration-driven policy that resolves to either a flat amount or a proportion of the item value.
- Treat additional services as optional, additive line items the seller can choose.
- Expect a prepaid handoff to the custody address; when an item arrives carriage-due, reconcile the carriage cost against the seller's settlement rather than absorbing it silently.

## Tradeoff

Policy-driven fees add a layer of indirection, but they keep amounts out of code and let the same flow serve different deployments without edits.

## Failure Mode

The failure is a fee or carriage rule baked into the checkout path: it leaks numbers, resists change, and lets carriage-due shipments quietly erode the seller's settlement.

## What I Would Improve Next

A small fixture set that asserts fee resolution (flat versus proportional) and settlement adjustment (prepaid versus carriage-due) without revealing any real amounts.
