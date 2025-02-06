<?php

namespace TinyBank\Controller;

use TinyBank\Service\BankService;

class BankController
{
    private BankService $bankService;

    public function __construct()
    {
        $this->bankService = new BankService();
    }

    public function handleRequest(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Routing
        if ($method === 'POST' && $uri === '/deposit') {
            $this->deposit();
        } elseif ($method === 'POST' && $uri === '/withdraw') {
            $this->withdraw();
        } elseif ($method === 'GET' && $uri === '/balance') {
            $this->balance();
        } elseif ($method === 'GET' && $uri === '/transactions') {
            $this->transactions();
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Route not found']);
        }
    }

    private function deposit(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $amount = (float) ($data['amount'] ?? 0);

        try {
            $this->bankService->deposit($amount);
            echo json_encode(['message' => "Deposited: " . number_format($amount, 2)]);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    private function withdraw(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $amount = (float) ($data['amount'] ?? 0);

        try {
            $this->bankService->withdraw($amount);
            echo json_encode(['message' => "Withdrew: " . number_format($amount, 2)]);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    private function balance(): void
    {
        echo json_encode($this->bankService->getBalance());
    }

    private function transactions(): void
    {
        echo json_encode($this->bankService->getTransactions());
    }
}
