# The Read Side of a Decision

## The failure

An operator refused a submission and typed the reason. The write side was right in every respect: the refusal was recorded, the reason was stored in a field of its own rather than sharing one with approval notes, the earlier verdict was kept, and a message went out.

The notice the applicant's own screen renders announces the refusal and carries an empty reason.

It is one of three defects that sat entirely on the read side of a decision taken correctly. They have nothing in common in the code and everything in common in shape.

## Inferring a field's role from its shape

The messaging gateway permits spaces in some token slots and not in others. The code decided which slot a value belonged in by testing whether the value contained a space.

Prose usually does, so it usually worked. A single-line field invites short answers, and a reviewer who writes one word defeats the test: that answer goes to a slot the template never reads, and the message renders around a gap where the explanation should be.

The sender knows which of its fields are free text. The inspector can only guess, and guesses right most of the time, which is exactly what makes the failure rare, late and confusing. **Declare, do not infer.** A short list of free-form keys, consulted before the value is looked at at all, replaces the heuristic; whitespace stops being load-bearing. Line breaks are folded at the same point and for the same reason: what the transport accepts is a property of the transport, not something to rediscover per value.

## Supersede-not-overwrite has a read side

A refused item can be corrected and sent again. A resend opens a fresh record and closes the refused one instead of writing over it, so the operator keeps both the verdict and the answer to it, and no resubmission can erase why the first attempt was refused.

It also, silently, doubles every corrected item in the submitter's own list, which counts rows. Somebody who does exactly what was asked — fix the one photo, send it again — is shown two items where they have one, the answered refusal still sitting among them.

**Any write-side decision to keep history is also a read-side decision about what to hide.** The list now skips superseded records, and recognises them by either of two independent marks — the archived status, and a pointer on the original to its replacement — so neither mark alone has to be trusted.

## Two outcomes that are not the same outcome

One screen and one sentence covered both a refusal and a suspension: *not approved, contact support*.

They are opposite situations. A refused applicant has been told what is wrong, can fix it and can apply again; sending them to a human spends an operator on a self-service path. A suspended one cannot proceed at all without a human; calling their state "not approved" misdescribes it, and leaving the form on screen offers a submit button the service is guaranteed to refuse — a dead end with no destination on it.

Two verdicts, two screens. The refusal leads with the operator's own words and reopens the form, because correcting is the entire point. The suspension leads with the word, draws no journey it cannot open, and offers one route: to a person.

A status enum is a write-side vocabulary. It does not tell you how many distinct things a reader has to be told, and the count is usually higher than the number of statuses.

## How these were found

Three separate test lanes reported green suites over this code. An end-to-end probe that **rendered each page** and read the words actually printed on it found defects none of the suites could reach, including all three above.

The suites were not wrong. They asserted what functions returned, and the functions returned what they were asked for. None of them assembled a screen, so none of them could observe a notice promising a status the page did not carry, a control guaranteed to fail, or a row printed twice.

The same class of failure has an opposite face: a fixture that hard-codes a friendly value the real world never supplies, so the suite tests the fixture. The rule generalises in both directions — **the harness has to exercise the thing the person meets.** For a screen, that means rendering it and asserting on the text. Anything less is an assertion about a function, and a function is not a page. The offline render harness described in [Offers, settlement, notifications, and verification boundaries](offers-settlement-notifications-and-verification.md) is the same instrument, pointed at operator screens.

## What to take

Every decision the system records has a reader. For each one, ask:

- does it arrive intact, or is a transport heuristic allowed to decide where it lands?
- what does it do to every list, count and badge that reads around it?
- how many distinct situations does this one status put a person in, and does each get its own sentence and its own next step?

Then check the answers where the person is: on the page.
