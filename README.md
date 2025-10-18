# ArtRewards Backend Task – Laravel

## Overview
This project implements the backend logic for the provided ArtRewards front-end.  
It includes:
- Collections management (CRUD, search, sort, pagination)
- Artworks management (CRUD, search, sort, pagination)
- Polymorphic image handling for artworks
- Clean OOP structure using Repository Pattern
- Mock data generated via Laravel seeders

## Setup
1. Clone the repo
2. Run:
   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
