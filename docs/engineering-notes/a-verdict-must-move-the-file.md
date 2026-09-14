# A Verdict Must Move The File

## Problem

A specialist recorded a judgement and the record did not move. The finding was
written correctly, and the item kept the status it already had: waiting in an
operator's queue for a verdict that had already been given. The only person who
could act on the finding — the submitter, whose item it was — was never told.

## Context

Two different roles look at an incoming submission. One judges the object
itself; the other judges the paperwork around it, releases it for publication
and is the audience of the queue. When the first role refuses, nothing the
second role can do will help: the reference does not match the case, or the
photographs are not good enough to judge from. Both of those are answerable
only by the person holding the object.

An event was dispatched on refusal. Nothing was listening to it, so the refusal
was observable in a log and invisible everywhere a person looks.

## Constraint

The refusal has to reach the submitter in their own words — the reason codes a
specialist ticks are shorthand, and the sentence they type is the part that can
be acted on. It must not read as a final rejection, because it is an invitation
to correct. And a second refusal must not erase the first answer.

## Decision

- A recorded verdict changes the record's state in the same operation that
  writes the finding. Writing a finding and leaving the status alone is not a
  half-done refusal; it is a refusal that did not happen.
- Route the refused item to the state that names the party who can act, not
  back to the queue of the party who cannot.
- Carry the specialist's typed sentence alongside the reason labels into the
  message and into the record, so the submitter's panel and their notification
  say the same thing.
- Make the transition idempotent at the destination: if the item is already
  with the submitter, refused, or closed, record the finding and leave the
  state and the first answer alone.
- Give the state its own message template. Borrowing the rejection template
  saves a registration and tells the submitter their item was turned down when
  what is wanted is a correction — the wording is the feature.

## Tradeoff

Coupling a finding to a state change means the finding write can now fail for a
reason that belongs to the state machine. That is worth accepting only if the
failure is loud: the finding is still recorded, and the un-routed item is
logged under its own name rather than swallowed.

## Failure Mode

The failure is a decision that is recorded and not delivered. It looks healthy
from every angle an engineer checks — the row is there, the event fired, the
tests over the service pass — and it is inert, because no queue changed and no
person was addressed. Its signature is a queue that accumulates items whose
verdicts already exist.

## What I Would Improve Next

A fixture that asserts the destination state, the preserved sentence, and the
delivered message as one sequence, rather than three separate assertions that
can each pass while the chain between them is broken.
