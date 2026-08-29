# Private by Policy, Public by Platform

## The failure

An upload the application treated as private passed through a deliberate two-axis visibility policy: default deny, with publication requiring both an explicit context and an explicit flag. Every route the project wrote consulted it.

The same bytes were also, separately, a WordPress attachment post. WordPress publishes attachments by default, and a published attachment is readable through a core REST collection by an anonymous caller, filename and canonical URL included. That behaviour is documented and long-standing; nothing about it is a defect.

The application's policy was not bypassed on that route. It was never asked. It was not the application's route.

## The fix is one line, and the line is not the lesson

Set the record private at creation, before the file is moved into place, so that the window in which the record exists and the policy does not is closed rather than narrowed.

The lesson is the inventory question. **A record can be private by policy and public by platform.** The question is not *what does my policy allow* but *how many handles exist on these bytes, and who governs each one*. Everything the system did not write itself — a stock route, an admin screen, a sitemap, a media library — is a handle, and each one has its own idea of what the record is for.

This is the shape [A policy needs a choke point](policies-need-a-choke-point.md) describes with both routes inside the project. Inherited routes are the harder half: you cannot put a rule in front of a caller you did not write, so the state itself has to be safe before that caller can reach it.

## Why relocating the file is not the boundary

The file was also moved out of the publicly served tree. That move is best-effort by design — it may fail rather than risk losing the file — and a mitigation permitted to fail is a second layer, never the thing standing between those bytes and an anonymous request. Shut it at the source first, then relocate.

## Tradeoff

Counting inherited handles is not an audit that finishes. A dependency upgrade can add a route, and nothing in the application's own policy will mention it. The alternative — assuming the routes you wrote are the routes that exist — costs nothing until it costs everything.

## Failure Mode

The failure this prevents is a record that every screen in the application correctly declines to show, served in full by a route nobody on the project wrote.
