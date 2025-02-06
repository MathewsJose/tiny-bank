<?php

namespace TinyBank\Service;

use TinyBank\Singleton\BankAccountSingleton;

class BankService
{
    private BankAccountSingleton $account;

    public function __construct()
    {
        $this->account = BankAccountSingleton::getInstance();
    }

    public function deposit(float $amount): void
    {
        $this->account->deposit($amount);
    }

    public function withdraw(float $amount): void
    {
        $this->account->withdraw($amount);
    }

    public function getBalance(): array
    {
        return $this->account->getBalance();
    }

    public function getTransactions(): array
    {
        return $this->account->getTransactions();
    }
}
