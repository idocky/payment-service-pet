<?php

namespace App\Services;

use App\Models\Subscription;
use Stripe\StripeClient;

class PaymentService
{
    private StripeClient $stripeClient;
    public function __construct()
    {
        $this->stripeClient = new StripeClient(config('services.stripe.secret_key'));
    }

    public function createPaymentSession(array $data)
    {
        $subscription = Subscription::where('type', $data['type'])
            ->where('currency_id', $data['currency_id'])
            ->with('currency')
            ->first();

        $price = $this->stripeClient->prices->create([
            'currency' => $subscription->currency->code,
            'unit_amount' => 1000,
            'recurring' => ['interval' => 'month'],
            'product_data' => ['name' => 'Gold Plan'],
        ]);

        $session = $this->stripeClient->checkout->sessions->create([
            'success_url' => 'https://example.com/success',
            'line_items' => [
                [
                    'price' => $price->id,
                    'quantity' => 1,
                ],
            ],
            'mode' => 'subscription',
        ]);

        return $session;
    }
}
