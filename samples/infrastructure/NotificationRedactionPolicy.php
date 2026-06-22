<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * Public-safe illustration of notification privacy-by-design.
 *
 * Transactional messages (one-time codes, payment links) are delivered while
 * the real recipient and body are in scope, but only a redacted record is kept
 * for audit. This policy returns what is safe to persist. The live gateway
 * adapter and templates stay private.
 */
final class NotificationRedactionPolicy
{
    /**
     * @param array<string,string> $message
     * @return array{to:string, preview:string, persist_raw:bool}
     */
    public function record(array $message): array
    {
        $to   = (string) ($message['to'] ?? '');
        $body = (string) ($message['body'] ?? '');

        return [
            'to'          => $this->mask($to),
            'preview'     => $this->preview($body),
            'persist_raw' => false,
        ];
    }

    private function mask(string $value): string
    {
        return strlen($value) > 4
            ? substr($value, 0, 2) . '***' . substr($value, -2)
            : '[redacted]';
    }

    private function preview(string $body): string
    {
        return mb_substr($body, 0, 24);
    }
}
