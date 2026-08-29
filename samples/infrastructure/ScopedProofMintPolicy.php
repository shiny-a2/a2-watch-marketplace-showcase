<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * Public-safe illustration of minting a scoped proof from a sign-in artefact.
 *
 * A sign-in proves something, but not what a later gate needs. Rather than
 * loosen the binding every gate reading the same store depends on, this decides
 * whether a *new* proof may be written for the new purpose: the scope, lifetime
 * and single-use semantics a code-verified proof carries, differing only in the
 * basis it records. Sealing, storage and the verification service stay private.
 */
final class ScopedProofMintPolicy
{
    /** Below this length the mask stops telling two values apart. */
    private const MIN_MASKABLE = 7;

    public function __construct(private string $purpose, private string $context, private int $lifetime = 1800) {}

    /**
     * @param array{opened:string,masked:string} $signIn Already unsealed.
     * @param array{id:int,registered_value:string,challenge_in_flight:bool} $viewer
     * @return array{mint:bool,reason:string,proof:array<string,mixed>}
     */
    public function decide(array $signIn, array $viewer, int $now): array
    {
        $userId = (int) ($viewer['id'] ?? 0);
        $opened = trim((string) ($signIn['opened'] ?? ''));
        $masked = trim((string) ($signIn['masked'] ?? ''));
        $known  = trim((string) ($viewer['registered_value'] ?? ''));

        if ($userId < 1) {
            return $this->refuse('no-session');
        }
        if (($viewer['challenge_in_flight'] ?? false) === true) {
            return $this->refuse('challenge-in-flight');
        }
        if ($masked === '' || strlen($opened) < self::MIN_MASKABLE) {
            return $this->refuse('sign-in-record-unusable');
        }
        if ($this->maskForComparison($opened) !== $masked) {
            return $this->refuse('sign-in-record-does-not-round-trip');
        }
        if ($known !== '' && $known !== $opened) {
            return $this->refuse('registered-value-differs');
        }

        return ['mint' => true, 'reason' => 'sign-in-record-round-tripped', 'proof' => [
            'subject'    => $opened,
            'purpose'    => $this->purpose,
            'context'    => $this->context,
            'user_id'    => $userId,
            'basis'      => 'sign-in-artefact',
            'expires_at' => $now + $this->lifetime,
            'single_use' => true,
        ]];
    }

    private function refuse(string $reason): array
    {
        return ['mint' => false, 'reason' => $reason, 'proof' => []];
    }

    /**
     * A derivation of its own, not NotificationRedactionPolicy::mask(): that one
     * keeps an audit line safe and collapses short values onto a placeholder,
     * which here would let two unrelated values round-trip against each other.
     */
    private function maskForComparison(string $value): string
    {
        return substr($value, 0, 3) . str_repeat('*', strlen($value) - 5) . substr($value, -2);
    }
}
