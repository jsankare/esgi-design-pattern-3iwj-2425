<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class PayPalPaymentAdapter implements LegacyPaymentProcessor
{
    private PayPalGateway $gateway;

    public function __construct(PayPalGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Amount must be more than zero');
        }

        $paymentData = [
            'amount' => $amount,
            'currency' => $currency,
            'email' => $paymentDetails['email'] ?? null,
            'token' => $paymentDetails['paypal_token'] ?? null
        ];

        $response = $this->gateway->charge($paymentData);

        return [
            'transaction_id' => $response['payment_id'],
            'status' => $response['state'] === 'approved' ? 'success' : 'failed',
            'amount' => $response['amount']['total'],
            'currency' => $response['amount']['currency'],
            'timestamp' => strtotime($response['create_time'])
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $response = $this->gateway->verifyPayment($transactionId);
        return $response->state === 'approved' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $response = $this->gateway->refund($transactionId);
        return $response->state === 'completed';
    }
}