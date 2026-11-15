# Service payment review before handoff

The standalone watch-service flow now rechecks the exact order, customer and charged amount when a payment callback arrives and again before the customer schedules handoff or the repair desk accepts the watch. A refund or later order change leaves the request visible, explains that payment needs review and removes the intake action. When the payment is clear, the ordinary handoff and intake steps remain available.

This is a paired marketplace and repair update. Synthetic checks covered partial refunds, ownership and amount changes, duplicate callbacks, intake denial and the ordinary cleared path. Customer and staff review states were inspected at phone and desktop widths in light and dark themes, without creating a purchase or message.

The reviewed source was deployed on 2026-11-16 with matching installed file hashes. A real gateway callback, an authenticated technician session and reconciliation of the first natural service request remain open checks. This note does not claim a completed live transaction.
