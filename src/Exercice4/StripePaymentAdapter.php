<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class StripePaymentAdapter implements LegacyPaymentProcessor
{
    private StripeGateway $gateway;

    public function __construct(StripeGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Amount must be above zero');
        }

        $paymentData = [
            'amount' => $amount,
            'currency' => $currency,
            'source' => $paymentDetails['card_number'] ?? null,
            'exp_month' => $paymentDetails['expiry_month'] ?? null,
            'exp_year' => $paymentDetails['expiry_year'] ?? null,
            'cvc' => $paymentDetails['cvv'] ?? null
        ];

        $response = $this->gateway->charge($paymentData);

        return [
            'transaction_id' => $response['id'],
            'status' => $response['status'] === 'succeeded' ? 'success' : 'failed',
            'amount' => $response['amount'],
            'currency' => $response['currency'],
            'timestamp' => $response['created']
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $response = $this->gateway->verifyPayment($transactionId);
        return $response->status === 'succeeded' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $response = $this->gateway->refund($transactionId);
        return $response->status === 'refunded';
    }
}