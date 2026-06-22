<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * Public-safe illustration of "certificate status != sale availability".
 *
 * An authenticity certificate persists even after a watch leaves custody, but
 * the item is only purchasable while it is in custody and not flagged. This
 * policy keeps the two concerns separate so a returned-but-certified item is
 * never shown as buyable. Re-verification rules stay private.
 */
final class CertificateAvailabilityPolicy
{
    /**
     * @param array<string,mixed> $state
     * @return array{certificate_kept:bool, sale_available:bool, reason:string}
     */
    public function decision(array $state): array
    {
        $status   = (string) ($state['certificate_status'] ?? '');
        $location = (string) ($state['physical_location'] ?? 'in_custody');

        $blocked = in_array($status, ['flagged', 'suspended', 'revoked', 'reverification_required'], true);
        $available = ! $blocked && $location === 'in_custody';

        return [
            // The certificate is retained regardless of availability.
            'certificate_kept' => $status !== '',
            'sale_available'   => $available,
            'reason'           => $available ? 'available' : ($blocked ? 'status-blocked' : 'out-of-custody'),
        ];
    }
}
