<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-red?logo=laravel" />
  <img src="https://img.shields.io/badge/PHP-8.2-blue?logo=php" />
  <img src="https://img.shields.io/badge/MySQL-8-orange?logo=mysql" />
  <img src="https://img.shields.io/badge/TailwindCSS-3.4-cyan?logo=tailwindcss" />
  <img src="https://img.shields.io/badge/AOS-Animations-purple" />
</p>

<h1 align="center">📚 Blog CRUD — Corso Laravel + PHP + MySQL</h1>

<p align="center">
Progetto didattico sviluppato durante il corso di Laravel e PHP con MySQL.<br>
Include CRUD completo, layout moderno, animazioni AOS e design professionale.
</p>

---

## 🚀 Funzionalità

- CRUD completo per articoli del blog  
- Layout Blade riutilizzabile con `<x-layout>`  
- Interfaccia moderna con TailwindCSS  
- Effetti Glassmorphism  
- Animazioni AOS  
- Pagine responsive e professionali  
- Routing RESTful con Controller dedicato  
- Validazione form con Laravel  

---

## 📦 Requisiti

- PHP 8.2+
- Composer
- Laravel 11
- MySQL 5.7+ / MariaDB
- Browser moderno

---

## 🛠 Installazione

### 1️⃣ Clona il progetto

```bash
git clone https://github.com/tuo-username/blog-laravel-course.git
cd blog-laravel-course


## 2️⃣ Installa le dipendenze

    composer install

## 3️⃣ Configura l’ambiente
- Copia il file .env:
    cp .env.example .env


##### Imposta il database:
    DB_DATABASE=blog_course
    DB_USERNAME=root
    DB_PASSWORD=

## 4️⃣ Genera la chiave
    php artisan key:generate

## 5️⃣ Migra il database
    php artisan migrate

## 6️⃣ Avvia il server
    php artisan serve
