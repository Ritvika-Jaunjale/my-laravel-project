# 📚 Book Management Website

The **Book Management Website** is a web-based application developed using PHP and Laravel. It allows users to manage their personal book collection, organize reading lists, bookmark favourite books, and monitor their reading progress through an interactive dashboard.

## 🌟 Features

- **Add Books:** Add new books with title, author, and reading status.
- **View Books:** Display all books in your personal library.
- **Edit Books:** Update book details and reading status.
- **Delete Books:** Remove books from the library.
- **Search Books:** Search for books by title or author.
- **Bookmark Books:** Bookmark and unbookmark your favourite books.
- **Reading Lists:** Filter books into different categories:
  - All Books
  - Bookmarked Books
  - To Read
  - Currently Reading
  - Finished Books
- **Reading Statistics:** View total books, bookmarked books, finished books, and reading progress.
- **Vintage Library Design:** A warm pastel colour theme with ivory, sage green, dusty rose, antique gold, and brown accents.

## 🛠️ Technologies Used

- **Backend:** PHP, Laravel
- **Frontend:** HTML, CSS, JavaScript
- **Database:** SQLite
- **API:** Laravel REST API
- **Development Environment:** Visual Studio Code

## 📂 Project Structure

```text
rbu-pp-2026/
│
├── app/
│   ├── Http/Controllers/
│   │   └── BookController.php
│   └── Models/
│       └── Book.php
│
├── database/
│   ├── migrations/
│   └── database.sqlite
│
├── resources/
│   └── views/
│       └── welcome.blade.php
│
├── routes/
│   ├── api.php
│   └── web.php
│
├── public/
├── .env.example
└── README.md
```

## ⚙️ Installation and Setup

Follow these steps to run the project locally.

### 1. Clone the Repository

```bash
git clone https://github.com/Ritvika-Jaunjale/my-laravel-project.git
```

### 2. Navigate to the Project Folder

```bash
cd my-laravel-project
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Configure the Environment

Create your environment file:

```powershell
copy .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 5. Configure the Database

Open your `.env` file and configure SQLite:

```env
DB_CONNECTION=sqlite
```

Make sure the SQLite database file exists at:

```text
database/database.sqlite
```

If the file does not exist, create it using PowerShell:

```powershell
New-Item database/database.sqlite -ItemType File
```

### 6. Run Database Migrations

```bash
php artisan migrate
```

### 7. Start the Laravel Development Server

```bash
php artisan serve
```

Open your browser and visit:

**http://127.0.0.1:8000**

## 📖 How to Use

1. Open the website in your browser.
2. Add books by entering their title, author, and reading status.
3. View your books in the library table.
4. Use the search bar to find specific books.
5. Bookmark your favourite books.
6. Edit or delete book records when required.
7. Use reading filters to organize your collection.
8. Track your reading progress through the statistics dashboard.

## 🎨 Website Design

The website uses a pastel vintage-library theme designed to provide a comfortable and visually appealing reading experience.

**Colour Palette:**

- Warm Ivory
- Cream
- Sage Green
- Dusty Rose
- Antique Gold
- Walnut Brown
- Muted Terracotta

## 👩‍💻 Author

**Ritvika Jaunjale**

## 📄 License

This project is developed as an educational project using the Laravel framework.