# A failed upload is still the same watch

A seller can lose connectivity halfway through sending photos. Retrying that form should complete the existing watch record, not create another review task and another customer conversation.

The submission flow keeps an opaque retry identifier tied to the authenticated seller, reuses an incomplete record under the existing submission lock, and validates the completed photos before exposing it to reviewers. Older clients retain the existing reference and photo replay checks. A reviewed record cannot be rewritten through the draft path, and the same identifier cannot access another seller's record.

The repair queue reads only submitted records ready for review. Incomplete drafts and historical versions remain available as history without appearing as new work. Notifications follow readiness, so a retry does not produce another acceptance event. Different physical watches are not merged merely because their brand matches.

Marketplace repair review and private photographs also use an explicit specialist assignment. General repair privileges alone are insufficient; independent back-office operator permissions retain their existing contract.

Validation included injected upload failure followed by changed photos/reference, stable case and watch identifiers, cross-owner denial, immutable reviewed records, repeat submission, queue exclusion, review/pricing flows and private-media checks. The seller wizard was exercised in light/dark at mobile/desktop widths with required price, description and photograph rules. Tests used isolated data and stubbed transports. Live read-only verification after the scoped release confirmed queue filtering and repair access; no test purchases or customer messages were sent.
