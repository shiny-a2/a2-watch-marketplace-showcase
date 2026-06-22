<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * Public-safe illustration of exact-sum installment scheduling.
 *
 * Splits a net payout into N stages whose amounts reconcile EXACTLY to the net
 * (the rounding remainder lands on the final stage). The private settlement
 * engine also supports delayed cash and manual stages; commission and timing
 * rules stay private.
 */
final class InstallmentScheduleBuilder
{
    /**
     * @return list<array{stage:int, amount:int}>
     */
    public function build(int $net, int $count): array
    {
        $count = max(1, $count);
        $per   = intdiv($net, $count);
        $rem   = $net - ($per * $count);

        $schedule = [];
        for ($i = 0; $i < $count; $i++) {
            $schedule[] = [
                'stage'  => $i + 1,
                'amount' => $per + ($i === $count - 1 ? $rem : 0),
            ];
        }

        return $schedule;
    }
}
