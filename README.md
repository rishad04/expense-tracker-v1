

## Expense tracker

# ExpenseTracker - Laravel App

Simple expense tracking system with monthly reports and categories.

## Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/rishad04/expense-tracker-v1
   then
   cd expense-tracker-v1
   ```

2. **Install dependencies**
   ```bash
   cp .env.example .env
   composer install
   npm install
   ```

3. **Configure environment**
   ```bash
   php artisan key:generate
   ```
   
   Update `.env` with your database credentials:
   ```env
   DB_DATABASE=expense-tracker-v1
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```
   Or, 
   Import expenses.sql from root to your database

4. **Setup database**
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Run the application**
   ```bash
   npm run dev
   php artisan serve
   ```

6. **Visit** http://localhost:8000


7. Create own user or you can visit with 'Login as demo user'

## Features

- Add daily expenses (title, amount, date, category)
- Categories: Food, Transport, Shopping, Others
- Monthly reports with charts
- User authentication required

## Usage

1. Register/Login
2. Add expenses from dashboard
3. View monthly breakdown with visual charts

---

That's it! Start tracking your expenses. 💰
