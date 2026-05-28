# Observability And Instrumentation

Marketplace observability should explain state transitions and trust-boundary decisions without exposing seller or buyer data.

## Measure

- submission count by state;
- review queue age;
- rejected transition attempts;
- reservation idempotency collisions;
- custody state changes;
- certificate visibility changes;
- settlement eligibility decisions.

## Do Not Log Publicly

- seller identity;
- buyer identity;
- verification procedure details;
- payment payloads;
- custody addresses or private handling notes;
- dispute evidence.

## Threshold Concepts

- review queue age rising beyond operational expectation;
- repeated invalid state transitions;
- duplicate reservation attempts;
- certificate visibility changes without review trail;
- settlement eligibility requested before custody is final.

## Debug Workflow

1. Read the current state and last valid transition.
2. Check the requested transition against the state machine.
3. Verify idempotency before treating a reservation as new.
4. Inspect visibility and settlement decisions separately.
5. Keep sensitive verification procedures out of public logs and docs.

