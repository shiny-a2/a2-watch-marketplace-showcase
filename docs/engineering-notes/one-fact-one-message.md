# One Fact, One Message

## Problem

A single refusal notified the recipient twice, and what each message carried was
a fragment ending in an ellipsis. Both faults were introduced by the change that
made the refusal work at all, and both were invisible to the tests that covered
it, because each test asserted that a message was sent — not how many, and not
that what it carried survived the trip.

## Context

Refusing a submission does two things: it records the decision, and it moves the
record to the party who can act on it. Each is dispatched as its own event, and
both were mapped to the same notification template. One action, two events, two
messages a second apart.

The second fault is a property of the transport rather than of the code. The
messaging gateway accepts pattern-based sends whose variable slots have a hard
ceiling when the value contains spaces — and it rejects the whole message when a
value exceeds it, not just the value. Trimming to fit was already in place, so
what arrived was the first few words of a reason and an ellipsis.

## Constraint

The recipient must be told what to fix, in the words of the person who examined
the item, and a notification cannot be the place where that text lives.

## Decision

- One fact gets one message. Where two events describe the same action, the one
  the recipient is actually being notified of does the telling; the other keeps
  travelling for listeners that want it and is not mapped to a template.
- Write two forms of every reason: the full label for the screen, and a short
  form authored to fit the transport's ceiling, measured by the test suite rather
  than by eye.
- Record which reason was led with at the moment the decision is made — the only
  point that knows it — rather than parsing it back out of prose later.
- Treat the notification as the summons and the panel as the record. The full
  sentence stays where there is room for it.

## Tradeoff

Two phrasings of one reason is duplication, and they can drift. The alternative
is a message that either does not arrive or arrives meaning nothing, so the
duplication is asserted rather than avoided: every short form is checked against
the ceiling on every run.

## Failure Mode

The failure is a test that asserts a message was sent. It passes when one is
sent and when three are, and it passes on a message whose payload was silently
truncated to a fragment. The assertions have to be about the message that
leaves — how many, addressed to whom, carrying what, with no token left unfilled
and no escape sequence leaking through.

## What I Would Improve Next

A single place that knows the transport's limits, so a template author can be
told at authoring time that a slot will not carry what they are putting in it,
instead of finding out from a recipient.
