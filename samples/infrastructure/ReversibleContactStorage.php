<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * Public-safe illustration of reversible at-rest contact storage.
 *
 * The marketplace shows only masked phone numbers, but some transactional
 * messages (a single-use 24h payment link) must reach the real number after the
 * action that captured it. The pattern: store the number encrypted (AEAD, key
 * derived from a site secret) and recover it only at send time — never persist
 * plaintext, and never log the raw value.
 */
final class ReversibleContactStorage
{
    private const CIPHER = 'aes-256-gcm';

    public function __construct(private string $secret) {}

    public function encrypt(string $plain): string
    {
        $iv  = random_bytes(12);
        $tag = '';
        $ct  = openssl_encrypt($plain, self::CIPHER, $this->key(), OPENSSL_RAW_DATA, $iv, $tag);
        return 'enc:' . base64_encode($iv . $tag . $ct);
    }

    public function decrypt(string $token): string
    {
        if (! str_starts_with($token, 'enc:')) {
            return '';
        }
        $raw = base64_decode(substr($token, 4), true);
        if ($raw === false || strlen($raw) < 28) {
            return '';
        }
        $plain = openssl_decrypt(
            substr($raw, 28),
            self::CIPHER,
            $this->key(),
            OPENSSL_RAW_DATA,
            substr($raw, 0, 12),
            substr($raw, 12, 16)
        );
        return $plain === false ? '' : $plain;
    }

    private function key(): string
    {
        return hash('sha256', 'contact|' . $this->secret, true);
    }
}
