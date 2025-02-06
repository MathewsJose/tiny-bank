# Tiny Bank API

A simple banking API built with **PHP 8.2** that allows you to:
- Deposit money
- Withdraw money
- View balance
- View transaction history

This API stores data temporarily using **PHP Sessions** and runs inside a **Docker container**.

---

## 🚀 Getting Started

### 1️⃣ Prerequisites
Ensure you have the following installed:
- **Docker** ([Install Docker](https://docs.docker.com/get-docker/))
- **Composer** ([Install Composer](https://getcomposer.org/download/))

### 2️⃣ Clone the Repository
```bash
git clone https://github.com/MathewsJose/tiny-bank.git
cd tiny-bank
```
### 3️⃣ Install Dependencies

```bash
composer install
```
This will install all required dependencies.

### 4️⃣ Run the Application using Docker

```bash
docker-compose up --build
```

This starts a PHP server on **http://localhost:8080**

* * * * *

🔗 API Endpoints
----------------

The API has the following endpoints:

### ✅ Deposit Money

**Request:**

```bash
curl -X POST -d '{"amount":500}' http://localhost:8080/deposit
```

**Response:**
```json
{
  "message": "Deposited 500"
}
```

### ✅ Withdraw Money

**Request:**

```bash
curl -X POST -d '{"amount":100}' http://localhost:8080/withdraw
```

**Response:**

```json
{
  "message": "Withdrawn 100"
}
```

### ✅ Check Balance

**Request:**

```bash
curl -X GET http://localhost:8080/balance
```

**Response:**
```json
{
  "balance": 300
}
```

### ✅ View Transaction History

**Request:**

```bash
curl -X GET http://localhost:8080/transactions
```

**Response:**

```json
[
  {"type": "deposit", "amount": 500, "timestamp": "2025-02-05 12:00:00"},
  {"type": "withdraw", "amount": 200, "timestamp": "2025-02-05 12:10:00"}
]
```

* * * * *

📌 Project Structure
--------------------

```bash
tiny-bank/
│── src/
│   ├── Controllers/
│   │   ├── BankController.php
│   ├── Singleton/
│   │   ├── BankAccountSingleton.php
│   ├── Services/
│   │   ├── BankService.php
│   ├── index.php
│── public/
│   ├── index.php
│── composer.json
│── docker-compose.yml
│── Dockerfile
│── README.md
```
* * * * *

🏛️ Design Patterns Used
------------------------

This project follows clean code principles and utilizes the following design patterns:

-   **MVC (Model-View-Controller):** Separates concerns between the controller (handling requests), model (data structure), and service (business logic).
-   **Singleton:** Used in session management to ensure a single instance of data storage.
-   **Repository Pattern:** Encapsulates data access logic within the `BankService` class.

* * * * *

🛠️ Stopping the Application
----------------------------

To stop the container, press **CTRL+C** or run:

```bash
docker-compose down
```

* * * * *

📜 Assumptions & Trade-offs
---------------------------

-   Only **one bank account** exists (no authentication needed).
-   No database is used; data is stored temporarily in PHP **sessions**.
-   Basic error handling is implemented but **not exhaustive**.

* * * * *

📧 Contact
----------

For any questions, feel free to reach out!

📩 Email: mathewsfrj@gmail.com\
🌍 GitHub: [Your GitHub](https://github.com/MathewsJose)