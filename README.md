# NOTflix - Laravel Version

A movie and series streaming platform built with Laravel, refactored from vanilla PHP.

![NOTflix Logo](public/assets/img/5027d5fc-d38c-4aba-ab1c-e41212bf9e10_200x200.png)

## About NOTflix

NOTflix is a comprehensive entertainment platform where users can:
- Browse movies, series, and novels
- View detailed information about actors, directors, and prizes
- Create accounts and manage favorites
- Rate and review content
- Admin users can add and manage content

## Tech Stack

- **Framework:** Laravel 11.x
- **Database:** MySQL
- **Frontend:** Bootstrap 5, jQuery
- **Fonts:** Google Fonts (Cookie, Acme, Balsamiq Sans, Montserrat)
- **Icons:** Font Awesome

## Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL 5.7+ or MariaDB 10.3+
- Node.js & NPM (optional, for asset compilation)

### Setup Instructions

1. **Clone the repository**
   ```bash
   cd /home/nada/NOTflix/laravel_Notflix
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure your database**

   Edit `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=notflix
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**

   Open your browser and navigate to `http://localhost:8000`

## Features

### ✅ Implemented
- User authentication (Sign up, Sign in, Logout)
- Home page with movie filtering (genre, language, era, prize)
- Movie and Series detail pages
- Actor and Director profile pages
- User profile management
- Favorites system
- Admin dashboard
- Responsive design

### 🚧 Coming Soon
- Add content pages (Movies, Series, Actors, etc.)
- Edit content functionality
- Delete content functionality
- Advanced search
- Rating system improvements
- Novel module completion

## Project Structure

```
laravel_Notflix/
├── app/
│   ├── Http/Controllers/
│   │   ├── ActorController.php
│   │   ├── AdminController.php
│   │   ├── AuthController.php
│   │   ├── DirectorController.php
│   │   ├── HomeController.php
│   │   ├── MovieController.php
│   │   ├── SeriesController.php
│   │   └── UserController.php
│   ├── Models/
│   │   ├── Actor.php
│   │   ├── Advertisement.php
│   │   ├── Director.php
│   │   ├── Genre.php
│   │   ├── Movie.php
│   │   ├── Prize.php
│   │   ├── Series.php
│   │   └── User.php
├── resources/views/
│   ├── admin/
│   │   └── dashboard.blade.php
│   ├── auth/
│   │   ├── signin.blade.php
│   │   └── signup.blade.php
│   ├── user/
│   │   ├── profile.blade.php
│   │   └── edit-profile.blade.php
│   ├── actor.blade.php
│   ├── director.blade.php
│   ├── home.blade.php
│   ├── movie.blade.php
│   ├── series.blade.php
│   └── series-list.blade.php
├── public/assets/
│   ├── css/
│   ├── js/
│   └── img/
└── routes/
    └── web.php
```

## User Roles

### Regular User
- Browse content
- View details
- Manage favorites
- Edit profile

### Admin
- All user capabilities
- Add new content (Movies, Series, Actors, etc.)
- Edit existing content
- Delete content
- Manage advertisements

## Database Schema

Key tables:
- `users` - User accounts
- `movie` - Movie information
- `series` - Series information
- `actor` - Actor profiles
- `director` - Director profiles
- `genre` - Genre classifications
- `prize` - Awards and prizes
- `advertisement` - Advertisements

## API Routes

### Public Routes
- `GET /` - Home page
- `GET /signup` - Sign up page
- `GET /signin` - Sign in page
- `GET /series` - Series listing
- `GET /actor/{id}` - Actor details
- `GET /movie/{id}` - Movie details
- `GET /series/{id}` - Series details
- `GET /director/{id}` - Director details

### Protected Routes
- `GET /profile` - User profile
- `GET /profile/edit` - Edit profile
- `GET /admin` - Admin dashboard
- `POST /favorites/*` - Manage favorites

## Contributing

This is a student project for CMP Department, Cairo University.

**Team:** 2nd year CMP students
**Year:** 2023

## License

This project is open-source software.

## Contact

For questions or support:
- Email: contact@notflix.com
- Address: Cairo University Rd, Oula, Giza District, Giza Governorate
- Phone: +1 141992110

## Acknowledgments

- Original PHP version developers
- Laravel framework
- Bootstrap team
- Font Awesome
- Google Fonts

---

**Note:** See `PROJECT_REFACTORING.md` for detailed refactoring progress and technical documentation.

# Demo

---

<p align="center">
  <img src="https://raw.githubusercontent.com/DoniaEsawi/NotFlix/main/Screenshot%20(260).png" width="600px" alt="Screenshot 260"/>
</p>

<p align="center">
  <img src="https://github.com/DoniaEsawi/NotFlix/blob/main/ezgif-6-7e49ffef7dbd.gif" width="600px" alt="Gif 1"/>
</p>

<p align="center">
  <img src="https://i.ibb.co/HNxGhbN/ezgif-com-gif-maker-1.gif" width="600px" alt="Gif 2"/>
</p>

<p align="center">
  <img src="https://raw.githubusercontent.com/DoniaEsawi/NotFlix/main/Screenshot%20(263).png" width="600px" alt="Screenshot 263"/>
</p>
