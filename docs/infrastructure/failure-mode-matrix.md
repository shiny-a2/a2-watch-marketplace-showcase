# Failure Mode Matrix

| Failure mode | Likely cause | Detection signal | Safe behavior | Recovery path | What not to do |
| --- | --- | --- | --- | --- | --- |
| Double reservation | Retry or concurrent buyer action | Idempotency collision | Keep first valid reservation | Reconcile reservation state | Create two active reservations |
| Payment callback out of order | Gateway/network delay | Callback state mismatch | Hold for review or ignore safely | Reprocess against current state | Move state backward blindly |
| Custody mismatch | Item state differs from expected handoff | Invalid custody transition | Block settlement | Operator review and correction | Release settlement automatically |
| Certificate visibility mistake | Public flag changed too early | Visibility without review trail | Hide certificate/listing | Restore previous visibility state | Expose unverified public claims |
| Settlement before final custody | Settlement check skipped | Eligibility decision fails | Block payout/release | Complete custody review | Treat payment event as custody proof |

