# Request Lifecycle

The marketplace path is a state-transition system before it is a payment or listing system.

```mermaid
flowchart TD
    A[Seller submission] --> B[Intake validation]
    B --> C[Private review queue]
    C --> D{Operator decision}
    D -->|request info| E[Return to seller draft state]
    D -->|reject| F[Closed non-public state]
    D -->|approve review| G[Certification state]
    G --> H{Public visibility allowed?}
    H -->|yes| I[Public listing]
    I --> J[Buyer reservation]
    J --> K[Custody state]
    K --> L[Settlement eligibility check]
    L --> M[Settlement boundary]
```

## Operating Notes

- Seller submissions should not become public listings automatically.
- Reservation and custody changes need idempotency and state checks.
- Certificate/public visibility is a separate decision from internal verification work.
- Settlement should wait for final custody and review boundaries.

