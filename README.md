# Offers Dashboard

A simple Laravel-based dashboard to manage promotional offers and expose them via a secure API endpoint.

## Features

* Add and delete offers from dashboard
* Mobile responsive UI
* API endpoint to fetch offers
* API key validation
* Returns only **active** and **non-expired** offers

---

# Tech Stack

* Laravel
* PHP
* MySQL
* Bootstrap 5
* SweetAlert2

---

# Installation & Setup

Follow the steps below to run the project locally.

## 1. Clone the Repository

git clone https://github.com/YOUR_USERNAME/offers-dashboard.git

cd offers-dashboard

## 2. Install Dependencies

composer install

## 3. Setup Environment File

Copy the example environment file:

cp .env.example .env

## 4. Configure Environment Variables

Open `.env` and update database credentials:

DB_DATABASE=offers_dashboard
DB_USERNAME=root
DB_PASSWORD=

Also set your API key:

API_KEY=offers_secret_key

## 5. Generate Application Key

php artisan key:generate

## 6. Run Database Migration

php artisan migrate

## 7. Start Development Server

php artisan serve

The application will run at:

http://127.0.0.1:8000

---

# API Endpoint

Fetch available offers:

GET /api/offers

Example request:

http://127.0.0.1:8000/api/offers

## Response

Returns only:

* Active offers
* Non-expired offers

Example response:

[
    {
      "id": 4,
      "title": "Flipcart",
      "description": "Description",
      "expiry_date": "2026-03-18",
      "active": 1,
      "created_at": "2026-03-16T20:05:41.000000Z",
      "updated_at": "2026-03-16T20:05:41.000000Z"
    }
]

---

# Project Structure

app/Controllers
app/Models
routes/web.php
resources/views
public/css
public/js

---

# Author

Mohammad Faizan Raza

