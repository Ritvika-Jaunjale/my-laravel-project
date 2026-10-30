
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #263238;
        }

        header {
            background: #243b55;
            color: white;
            padding: 22px 30px;
        }

        header h1 {
            margin: 0;
            font-size: 25px;
        }

        header p {
            margin-bottom: 0;
            color: #dce6f1;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .summary {
            background: white;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #00000012;
            margin-bottom: 25px;
        }

        .summary h2 {
            margin-top: 0;
            font-size: 18px;
            color: #536579;
        }

        .count {
            font-size: 36px;
            font-weight: bold;
            color: #243b55;
        }

        .table-card {
            background: white;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #00000012;
            overflow-x: auto;
        }

        .table-card h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #edf2f7;
        }

        .empty {
            text-align: center;
            color: #68778a;
            padding: 30px;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #68778a;
        }
    </style>
</head>

<body>
    <header>
        <h1>Book Management System</h1>
        <p>Manage your books in one place</p>
    </header>

    <main>
        <section class="summary">
            <h2>Total Books</h2>
            <div class="count" id="totalBooks">Loading...</div>
        </section>

        <section class="table-card">
            <h2>All Books</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book Title</th>
                        <th>Author</th>
                    </tr>
                </thead>

                <tbody id="booksTable">
                    <tr>
                        <td colspan="3" class="empty">
                            Loading books...
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        Book Management System | Laravel Project
    </footer>

    <script>
        async function loadBooks() {
            const totalElement = document.getElementById('totalBooks');
            const tableElement = document.getElementById('booksTable');

            try {
                const response = await fetch('/api/books');

                if (!response.ok) {
                    throw new Error('Unable to load books');
                }

                const data = await response.json();
                const books = data.books || [];

                totalElement.textContent =
                    data.total_books ?? books.length;

                tableElement.replaceChildren();

                if (books.length === 0) {
                    const row = document.createElement('tr');
                    const cell = document.createElement('td');

                    cell.colSpan = 3;
                    cell.className = 'empty';
                    cell.textContent = 'No books found. Add books to see them here.';

                    row.appendChild(cell);
                    tableElement.appendChild(row);
                    return;
                }

                books.forEach(book => {
                    const row = document.createElement('tr');

                    [book.id, book.title, book.author].forEach(value => {
                        const cell = document.createElement('td');
                        cell.textContent = value ?? '';
                        row.appendChild(cell);
                    });

                    tableElement.appendChild(row);
                });
            } catch (error) {
                totalElement.textContent = '—';

                const row = document.createElement('tr');
                const cell = document.createElement('td');

                cell.colSpan = 3;
                cell.className = 'empty';
                cell.textContent =
                    'Could not load books. Check that Laravel and the API are running.';

                row.appendChild(cell);
                tableElement.replaceChildren(row);
            }
        }

        loadBooks();
    </script>
</body>
</html>
