# A Policy Needs a Choke Point

## The failure

A marketplace decided to stop trading non-genuine goods. The rule was written as a predicate — `is_publishable(source, originality)` — with a comment block explaining the reasoning, and it was called from the publish path.

Every public read still returned the excluded items. The archive, the category landings, the public API and the sitemap each queried the repository directly, and none of them called the predicate. The rule was real, tested, and enforced nowhere a customer could see.

The most uncomfortable part: the item carried a label whose own tooltip read *"items like this are not offered here"* — displayed on a page offering it, with a working checkout button.

## Why a predicate was not enough

A predicate is available to callers. A policy has to be unavoidable.

Four surfaces read the same table through the same repository method. Each had its own filters, its own caller, its own author. Expecting all four — and the fifth added next quarter — to remember an unrelated rule is not a design; it is a hope.

## The rule

**Enforce at the narrowest point every caller must pass through.**

Here that was one `WHERE` clause in the shared query method. Four surfaces inherited it at once, and the surface added next quarter inherits it without its author knowing the rule exists. That is the property worth buying: correctness that does not depend on knowledge.

## Where the predicate still belongs

Not deleted — moved to the write side, where a human is making a decision and deserves an explanation rather than a silently filtered result. Reads get the invisible fence; writes get the argument.

## The second half

Filtering reads hid the bad state; it did not stop it being created. Three write paths could still produce it:

- one of two inspection routes recorded the same verdict without acting on it, because the consequence had been implemented in the other route only;
- revoking a credential set a search-engine flag but left the badge that credential backed;
- a second publish button checked a different precondition than the first.

Each is the same shape: **two paths to one outcome, and the rule attached to one of them.** Worth auditing for directly — find the state, then enumerate every route that can produce it, rather than trusting that the obvious route is the only one.

## Guards do not reach backwards

Some identifiers arrive in a published format that can check itself, and the check was written into the form handler that collected one. A second, older screen wrote the same field through the same service and never called it — the same shape again, with the same fix: move the check into the storage method, and every caller inherits it, including the ones nobody remembers.

What that fix does not touch is the rows already stored. **A stored value can be older than the rule that would have refused it.** Validating writes from today onward says nothing about what was written before today, and a value of this kind is not inert: a later step reads it and acts on it, and whoever is affected by that step need not be whoever typed the value.

So a second check went in at the point of use — the moment the value is about to be acted on rather than merely held — where a bad value stops in front of somebody who can fix it instead of travelling on unremarked. Reads were deliberately left alone: a rule introduced today should not shut somebody out of their own record for having satisfied the rules that existed when they filled it in. Only the next write, and the moment of consequence, refuse.

## What to take

When a rule matters, ask three questions. *What is the narrowest point every reader passes through?* — put it there. *What are all the writers that can produce the state I am excluding?* — the answer is rarely one. *What already exists that predates the rule?* — check again where the value does its damage.
