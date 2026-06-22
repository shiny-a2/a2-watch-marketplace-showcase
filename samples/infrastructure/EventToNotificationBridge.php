<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * Public-safe illustration of an event -> notification bridge.
 *
 * Domain engines emit lifecycle events; a single subscriber maps the
 * transactional ones to a notification with the right audience and template,
 * recovering the recipient only at dispatch time. Keeping this mapping in one
 * place means new events opt into messaging declaratively, and the messaging
 * concern stays out of the business services.
 */
final class EventToNotificationBridge
{
    /**
     * @return array<string, array{audience:string, template:string}>
     */
    public function map(): array
    {
        return [
            'offer_forwarded_to_vendor' => ['audience' => 'buyer',  'template' => 'offer_under_review'],
            'offer_accepted'            => ['audience' => 'buyer',  'template' => 'offer_accepted'],
            'offer_countered'           => ['audience' => 'buyer',  'template' => 'offer_countered'],
            'verification_decided'      => ['audience' => 'seller', 'template' => 'verification_result'],
            'settlement_ready'          => ['audience' => 'seller', 'template' => 'settlement_ready'],
        ];
    }

    /**
     * @param callable(int):string $resolveRecipient Recovers the recipient for an entity.
     * @param callable(string,string,array):void $send Queues the message.
     */
    public function handle(string $event, int $entityId, callable $resolveRecipient, callable $send): void
    {
        $cfg = $this->map()[$event] ?? null;
        if ($cfg === null) {
            return;
        }
        $to = $resolveRecipient($entityId);
        if ($to === '') {
            return; // No recoverable contact: a safe no-op, never a fatal.
        }
        $send($to, $cfg['template'], ['event' => $event]);
    }
}
