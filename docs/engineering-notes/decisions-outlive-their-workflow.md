# Decisions Outlive Their Workflow

## Problem

Changing where a refused item goes silently invalidated what happened to it
afterwards. The refusal used to wait for a second party to approve it; once it
started going back to the submitter instead, that approval step tried to close a
record the submitter had been invited to correct — from a state the status
machine rightly refuses to leave. It failed loudly, which was the only fortunate
part.

## Context

Two guards and two test suites encoded the old route. A guard that made an item
answerable only once worked by finding an open decision attached to it; when
decisions stopped being left open, the guard stopped guarding. The suites
asserted the old destination and had not been run against the change that moved
it.

## Constraint

A decision already delivered to the person who must act on it cannot be quietly
re-decided by somebody else.

## Decision

- Close a decision where it is made when nothing further is owed on it. An
  approval queue is for decisions somebody still has to answer, and a refusal
  that has already been routed and announced is not one of them.
- Guard on the state that means the thing being guarded. "Is this answerable"
  is a question about the record's review state, not about whether a related
  row happens to still be open — a guard that works by side effect stops working
  the moment the side effect is tidied up.
- Let a stale approval be refused by the already-answered check rather than made
  into a no-op. Turning it away says what happened; succeeding silently does not.
- When a route changes, re-run everything that touches the route, not just the
  suite written for the change. Two suites in this instance had been red since
  the previous release and were reported green.

## Tradeoff

Closing a decision at the point of making it removes a second pair of eyes.
That is acceptable only where the decision has already been acted on and is
reversible by the party who received it — here the submitter corrects and
resubmits, and the reviewing party retains an independent power to refuse.

## Failure Mode

The failure is a workflow change that leaves the old workflow's guards and tests
in place. Nothing is obviously broken: the new path works, the old assertions
keep describing a route that no longer exists, and the collision surfaces at the
one moment a real person takes the superseded step.

## What I Would Improve Next

An assertion that enumerates the states a decision can be made from, so moving a
route has to change that list rather than quietly leaving it describing a road
nobody drives on any more.
