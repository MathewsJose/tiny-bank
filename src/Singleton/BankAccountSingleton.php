<?php

namespace TinyBank\Singleton;

class BankAccountSingleton
{
    private static ?BankAccountSingleton $instance = null;
    private float $balance = 0.0;
    private array $transactions = [];

    private function __construct() {
        if (!isset($_SESSION['balance'])) {
            $_SESSION['balance'] = 0;
        }
        if (!isset($_SESSION['transactions'])) {
            $_SESSION['transactions'] = [];
        }
    }

    public static function getInstance(): BankAccountSingleton
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new \Exception("Deposit amount must be positive");
        }
        
        $this->balance += $amount;
        $_SESSION['balance'] += $amount;
        $_SESSION['transactions'][] = ['type' => 'deposit','amount' => $amount, 'timestamp' => date("Y-m-d H:i:s")];
        $this->transactions[] = "Deposited: " . number_format($amount, 2);
    }

    public function withdraw(float $amount): void
    {
        if ($amount <= 0) {
            throw new \Exception("Withdraw amount must be positive");
        }
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            $this->transactions[] = "Withdrew: " . number_format($amount, 2);

            $_SESSION['balance'] -= $amount;
            $_SESSION['transactions'][] = ['type' => 'withdraw','amount' => $amount, 'timestamp' => date("Y-m-d H:i:s")];
        } else {
            throw new \Exception("Insufficient funds");
        }
    }

    public function getBalance(): array
    {
        return ["balance" => $_SESSION['balance']];
    }

    public function getTransactions(): array
    {
        return $_SESSION['transactions'];
    }
}
