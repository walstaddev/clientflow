# ClientFlow

ClientFlow is a CRM-style internal web application built with Laravel, Blade and SQLite, focused on client management and sales follow-up for a small business context.

This project was developed as part of my backend/full stack portfolio rebuild, with the goal of demonstrating practical skills in authentication, CRUD development, relational database design, and internal business-oriented tools.

## Project Overview

ClientFlow allows an authenticated user to:

- manage clients from a private dashboard
- create, view, edit and delete client records
- assign status and source information to each client
- store general observations
- add follow-up notes to each client
- review recent activity and summary metrics from the dashboard

The application is designed as a simple internal CRM for freelancers, small businesses or sales-oriented workflows.

## Tech Stack

- Laravel 13
- PHP 8.4
- Blade
- SQLite
- Tailwind CSS
- Laravel Breeze
- Eloquent ORM

## Main Features

- authentication system (login, logout, profile)
- private dashboard with live metrics
- client listing
- create client
- client detail view
- edit client
- delete client
- follow-up notes linked to each client
- note author and timestamp tracking
- latest clients and latest notes displayed in the dashboard

## Dashboard Metrics

The dashboard currently includes:

- total clients
- total leads
- total closed clients (status = `cliente`)
- total follow-up notes
- latest registered clients
- latest follow-up notes

## Database Structure

### users
- name
- email
- password
- role

### clients
- assigned_user_id
- name
- company
- email
- phone
- status
- source
- observations

### client_notes
- client_id
- user_id
- content

## Local Setup

1. Clone the repository

2. Install PHP dependencies
```bash
composer install

3. Install frontend dependencies
```bash
npm install

4. Copy the environment file
```bash
cp .env.example .env

5. Generate the application key
```bash
php artisan key:generate

6. Create the SQLite database file or configure your database connection in .env

7. Run migrations
```bash
php artisan migrate

8. Start Vite
```bash
npm run dev

9. Serve the project locally using Laravel Herd or your local Laravel environment
What This Project Demonstrates

This project demonstrates my ability to build a practical internal business application using Laravel, including:

MVC structure
authentication
relational database modeling
CRUD workflows
validation
dashboard data aggregation
user-linked activity tracking
business-oriented backend logic
Current Status

MVP completed and functional.

Possible Future Improvements
role-based access restrictions (admin / user)
client search and filters
pagination
improved dashboard analytics
UI refinement
deployment configuration


---

# Dos ajustes que te recomiendo hacer en ese README

## 1. “closed clients”
Como decidimos que el dashboard representa `status = cliente`, ahí está bien decir:

- **closed clients**

queda mejor que “active clients”, porque es más consistente con la lógica actual.

## 2. SQLite
Yo lo dejaría indicado tal cual, porque es verdad y no pasa nada.

---

# Una nota importante sobre este comando del README

En Windows, esta línea:

```bash id="6bhl95"
cp .env.example .env



## Screenshot








