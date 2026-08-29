# Mint, Do Not Borrow

## The failure

A visitor signs in by passing a one-time code sent to their phone. Minutes later a second flow in the same product asks them to pass the same challenge again — same number, same person, same session. As written, that path spends a second message and a second interruption on a fact the system has already established itself.

Both obvious answers are wrong. Re-asking is the failure. Skipping is worse: it reads *being signed in* as evidence of a specific fact that nothing recorded. A session says a person got through a door. It does not say which door, when, on what basis, or that anybody ever asked the question this flow needs answered.

## Why the sign-in's own proof cannot be consulted

The proof written when a login code is verified is bound to no account at all. It has to be: it is written before the session exists, at a moment when nobody is signed in yet. An authenticated flow cannot find that record without matching on something looser than the binding — and that binding is the isolation every other gate reading the same store depends on. Buying one saved message with a relaxed lookup relaxes it for all of them.

## The rule

Sign-in also leaves a durable artefact on the account: the value sealed, and a masked display copy, written together in one block by one writer.

1. Read that pair directly, not through the general "what is this account's phone number" accessor, which also answers with a storefront field nobody ever verified. Ask the narrow question.
2. Require the pair to round-trip: open the sealed value, re-derive the mask, compare. That establishes only that the two halves were written together, which catches a half left behind by a migration. It is the seal, not the comparison, that makes a forged half worthless, and the seal stays private.
3. If the flow already holds a different registered value for this person, refuse and let the challenge stand. Substituting the sign-in value would register them under something they did not choose.
4. Then **mint a new proof**, scoped to this purpose, this context, this user, with the lifetime and single-use consumption a code-verified proof would have had.

The minted proof is not a disguised one. It carries the same scope, lifetime and single-use semantics as a code-verified proof and differs in exactly one place: the basis it records. Both are enforceable at the same gate; the recorded basis is the only thing that tells them apart afterwards. A code the visitor requested for themselves still outranks the mint — the shortcut applies only when nothing is in flight.

The general form: **converting one proof into another is a mint, not a cast.** *What exactly did this visitor prove, and to which gate?* Restate the claim in the vocabulary of the gate that will consume it, and write down what the restatement rests on, or that gate is not being enforced at all.

See `samples/infrastructure/ScopedProofMintPolicy.php`. The same boundary fails from the other direction in [Private by policy, public by platform](private-by-policy-public-by-platform.md).

## Tradeoff

The round-trip check catches a half written without its partner and nothing else. It is silent about a writer that can set both halves consistently — anybody who can already write the account record — and is not a defence against them.

The structural cost is larger. Before the shortcut, an attacker holding the sign-in artefact held a stored value and no more, because no gate accepted it as evidence; once minting is legitimate, that artefact converts into a valid proof at every gate accepting a mint. Hence the deliberate narrowness — one purpose, one context, one user, short-lived, consumed on first use. A proof spendable anywhere would turn a stored value into a general credential, which is the borrowing the rule refuses.

## Failure Mode

The failure this prevents is a gate that treats being signed in as evidence of a particular fact — and, on the other side of the same shortcut, a mint broad enough to make one stored value worth more than the challenge it replaced.
