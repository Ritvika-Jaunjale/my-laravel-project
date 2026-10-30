
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Book Library</title>

    <style>

        :root {
            --ivory: #F5EFE3;
            --cream: #FFF9EF;
            --sage: #DCE8D8;
            --sage-deep: #71866B;
            --rose: #EBD9D2;
            --gold: #D6B56D;
            --gold-light: #E8D5A9;
            --walnut: #604633;
            --brown: #795B46;
            --terracotta: #A66F56;
            --taupe: #D8C8B5;
            --ink: #49382D;
            --muted: #857568;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Georgia, "Times New Roman", serif;
            background: var(--ivory);
            color: var(--ink);
            margin: 0;
            padding: 30px;
            line-height: 1.55;
        }

        .container {
            max-width: 1100px;
            margin: 18px auto;
            background: var(--cream);
            padding: 30px;
            border: 1px solid var(--taupe);
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(96, 70, 51, 0.10);
        }

        h1, h2, h3 {
            color: var(--walnut);
            font-family: Georgia, "Times New Roman", serif;
        }

        h1 {
            text-align: center;
            font-size: clamp(2rem, 4vw, 2.7rem);
            letter-spacing: 1px;
            margin: 5px 0 28px;
        }

        h1::after {
            content: "";
            display: block;
            width: 92px;
            height: 3px;
            margin: 13px auto 0;
            background: var(--gold);
            border-radius: 5px;
        }

        h2 {
            margin-top: 28px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--taupe);
        }

        .count-box {
            background: linear-gradient(135deg, #E8EBDD, var(--sage));
            padding: 22px;
            border: 1px solid #C5D3BF;
            border-radius: 14px;
            margin-bottom: 25px;
        }

        .count-box h2 {
            margin-top: 0;
            border-bottom-color: rgba(113, 134, 107, 0.35);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 16px;
        }

        .stat-card {
            background: rgba(255, 249, 239, 0.88);
            padding: 18px;
            border-radius: 12px;
            border: 1px solid #C9D5C3;
            box-shadow: 0 4px 12px rgba(96, 70, 51, 0.05);
        }

        .stat-card h3 {
            margin-top: 0;
            color: var(--brown);
            font-size: 1.05rem;
        }

        .percentage {
            font-size: 27px;
            font-weight: bold;
            color: var(--sage-deep);
        }

        .stat-card p {
            color: var(--muted);
            margin-bottom: 0;
        }

        progress {
            width: 100%;
            height: 13px;
            accent-color: var(--sage-deep);
            margin-top: 8px;
        }

        input, select {
            padding: 11px 13px;
            margin: 5px;
            border: 1px solid var(--taupe);
            border-radius: 8px;
            background: #FFFCF6;
            color: var(--walnut);
            font-family: Arial, sans-serif;
            font-size: 14px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: var(--sage-deep);
            box-shadow: 0 0 0 3px rgba(113, 134, 107, 0.14);
        }

        button {
            padding: 10px 15px;
            border: 1px solid #C3A45F;
            border-radius: 8px;
            cursor: pointer;
            color: var(--walnut);
            background: var(--gold-light);
            margin: 4px;
            font-family: Arial, sans-serif;
            font-weight: 600;
            transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
        }

        button:hover {
            background: var(--gold);
            box-shadow: 0 4px 10px rgba(96, 70, 51, 0.12);
            transform: translateY(-1px);
        }

        .edit-btn {
            background: #DCE8D8;
            border-color: #B8C9B1;
            color: #42563D;
        }

        .edit-btn:hover {
            background: #C8D9C2;
        }

        .delete-btn {
            background: #EBD9D2;
            border-color: #D8BEB4;
            color: #7B493A;
        }

        .delete-btn:hover {
            background: #DFC5BB;
        }

        .bookmark-btn {
            background: #F0E2B9;
            border-color: var(--gold);
            color: #725A2C;
        }

        .bookmark-btn:hover {
            background: var(--gold-light);
        }

        .filters {
            margin-top: 22px;
            padding: 17px;
            background: var(--rose);
            border: 1px solid #DCC4BB;
            border-radius: 12px;
        }

        .filters h3 {
            margin-top: 0;
            color: var(--walnut);
        }

        .filters button {
            background: #FFF5EF;
            border-color: #D7BEB4;
            color: #765345;
        }

        .filters button:hover {
            background: #DCC2B8;
        }

        .search-box {
            width: 90%;
            max-width: 450px;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            overflow: hidden;
            border: 1px solid var(--taupe);
            border-radius: 10px;
            background: var(--cream);
        }

        th, td {
            border-right: 1px solid #E4D9CB;
            border-bottom: 1px solid #E4D9CB;
            padding: 13px 12px;
            text-align: left;
        }

        th {
            background: var(--terracotta);
            color: #FFF9EF;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        td {
            color: var(--ink);
            background: #FFFCF6;
        }

        tbody tr:nth-child(even) td {
            background: #F3EBDD;
        }

        tbody tr:hover td {
            background: #E9E8D9;
        }

        th:last-child, td:last-child {
            border-right: none;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        @media (max-width: 700px) {
            body {
                padding: 12px;
            }

            .container {
                padding: 17px;
                margin: 5px auto;
            }

            .count-box {
                padding: 15px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            #bookForm input, #bookForm select {
                width: calc(100% - 10px);
                margin: 5px;
            }

            .search-box {
                width: calc(100% - 10px);
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
                font-size: 13px;
            }

            th, td {
                padding: 9px;
            }
        }

    </style>
</head>

<body>
<div class="container">

    <h1>My Book Library</h1>

    <!-- Reading Statistics -->
    <div class="count-box">
        <h2>My Reading Statistics</h2>

        <div class="stats">
            <div class="stat-card">
                <h3>Total Books</h3>
                <div class="percentage" id="totalBooks">0</div>
            </div>

            <div class="stat-card">
                <h3>Bookmarked Books</h3>
                <div class="percentage" id="totalBookmarks">0</div>
            </div>

            <div class="stat-card">
                <h3>Finished Books</h3>
                <div class="percentage" id="totalFinished">0</div>
            </div>
        </div>

        <div class="stats">
            <div class="stat-card">
                <h3>Reading Completion</h3>
                <div class="percentage">
                    <span id="readingPercentage">0</span>%
                </div>
                <progress id="readingProgress" value="0" max="100"></progress>
                <p>Percentage of books you have finished.</p>
            </div>

            <div class="stat-card">
                <h3>Liked Books Percentage</h3>
                <div class="percentage">
                    <span id="likedPercentage">0</span>%
                </div>
                <progress id="likedProgress" value="0" max="100"></progress>
                <p>Percentage of books you have bookmarked.</p>
            </div>
        </div>
    </div>

    <h2>Add New Book</h2>

    <form id="bookForm">
        <input type="text" id="title" placeholder="Enter Book Title" required>
        <input type="text" id="author" placeholder="Enter Author Name" required>

        <select id="status">
            <option value="to_read">To Read</option>
            <option value="reading">Currently Reading</option>
            <option value="finished">Finished</option>
        </select>

        <button type="submit">Add Book</button>
    </form>

    <h2>Search Books</h2>

    <input
        type="text"
        id="searchInput"
        class="search-box"
        placeholder="Search by book title or author..."
    >

    <div class="filters">
        <h3>My Reading Lists</h3>

        <button onclick="setFilter('all')">All Books</button>
        <button onclick="setFilter('bookmarked')">★ Bookmarked</button>
        <button onclick="setFilter('to_read')">To Read</button>
        <button onclick="setFilter('reading')">Currently Reading</button>
        <button onclick="setFilter('finished')">Finished / History</button>
    </div>

    <h2 id="listHeading">All Books</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Bookmark</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody id="bookTable">
            <tr>
                <td colspan="6">Loading books...</td>
            </tr>
        </tbody>
    </table>

</div>

<script>
    let allBooks = [];
    let currentFilter = 'all';

    // Generate a unique display ID using the database ID
    function generateBookID(id) {
        return 'ID-A' + String(id).padStart(3, '0');
    }

    // Load all books
    async function loadBooks() {
        const table = document.getElementById('bookTable');

        try {
            const response = await fetch('/api/books');

            if (!response.ok) {
                throw new Error('Unable to load books');
            }

            const data = await response.json();
            allBooks = data.books || [];

            const total = allBooks.length;

            const finished = allBooks.filter(
                book => book.status === 'finished'
            ).length;

            const bookmarked = allBooks.filter(
                book => book.is_bookmarked === true ||
                        book.is_bookmarked === 1
            ).length;

            // Calculate percentages
            const readingPercent = total === 0
                ? 0
                : Math.round((finished / total) * 100);

            const likedPercent = total === 0
                ? 0
                : Math.round((bookmarked / total) * 100);

            // Display total counts
            document.getElementById('totalBooks').textContent = total;

            document.getElementById('totalBookmarks').textContent =
                bookmarked;

            document.getElementById('totalFinished').textContent =
                finished;

            // Display percentages
            document.getElementById('readingPercentage').textContent =
                readingPercent;

            document.getElementById('readingProgress').value =
                readingPercent;

            document.getElementById('likedPercentage').textContent =
                likedPercent;

            document.getElementById('likedProgress').value =
                likedPercent;

            displayBooks();

        } catch (error) {
            table.innerHTML =
                '<tr><td colspan="6">Error loading books.</td></tr>';
            console.error(error);
        }
    }

    // Display books
    function displayBooks() {
        const table = document.getElementById('bookTable');

        const search = document.getElementById('searchInput')
            .value.toLowerCase().trim();

        const filteredBooks = allBooks.filter(book => {
            const title = (book.title || '').toLowerCase();
            const author = (book.author || '').toLowerCase();

            const matchesSearch =
                title.includes(search) || author.includes(search);

            let matchesFilter = true;

            if (currentFilter === 'bookmarked') {
                matchesFilter =
                    book.is_bookmarked === true ||
                    book.is_bookmarked === 1;
            } else if (currentFilter !== 'all') {
                matchesFilter = book.status === currentFilter;
            }

            return matchesSearch && matchesFilter;
        });

        table.innerHTML = '';

        if (filteredBooks.length === 0) {
            table.innerHTML =
                '<tr><td colspan="6">No books found.</td></tr>';
            return;
        }

        filteredBooks.forEach(book => {
            const row = document.createElement('tr');

            const uniqueID = generateBookID(book.id);

            const values = [
                uniqueID,
                book.title,
                book.author,
                {
                    to_read: 'To Read',
                    reading: 'Currently Reading',
                    finished: 'Finished'
                }[book.status] || 'To Read'
            ];

            values.forEach(value => {
                const cell = document.createElement('td');
                cell.textContent = value;
                row.appendChild(cell);
            });

            // Bookmark
            const bookmarkCell = document.createElement('td');
            const bookmarkButton = document.createElement('button');

            const isBookmarked =
                book.is_bookmarked === true ||
                book.is_bookmarked === 1;

            bookmarkButton.textContent = isBookmarked
                ? '★ Saved'
                : '☆ Bookmark';

            bookmarkButton.className = 'bookmark-btn';
            bookmarkButton.onclick = () => toggleBookmark(book);

            bookmarkCell.appendChild(bookmarkButton);
            row.appendChild(bookmarkCell);

            // Edit and Delete
            const actionCell = document.createElement('td');

            const editButton = document.createElement('button');
            editButton.textContent = 'Edit';
            editButton.className = 'edit-btn';
            editButton.onclick = () => editBook(book);

            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.className = 'delete-btn';
            deleteButton.onclick = () => deleteBook(book);

            actionCell.appendChild(editButton);
            actionCell.appendChild(deleteButton);

            row.appendChild(actionCell);
            table.appendChild(row);
        });
    }

    // Search
    document.getElementById('searchInput').addEventListener(
        'input',
        displayBooks
    );

    // Filter reading lists
    function setFilter(filter) {
        currentFilter = filter;

        const headings = {
            all: 'All Books',
            bookmarked: 'Bookmarked Books',
            to_read: 'Books To Read',
            reading: 'Currently Reading',
            finished: 'Finished Books / Reading History'
        };

        document.getElementById('listHeading').textContent =
            headings[filter];

        displayBooks();
    }

    // Add book
    document.getElementById('bookForm').addEventListener(
        'submit',
        async function(event) {
            event.preventDefault();

            const title = document.getElementById('title').value.trim();
            const author = document.getElementById('author').value.trim();
            const status = document.getElementById('status').value;

            try {
                const response = await fetch('/api/books', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        title,
                        author,
                        status,
                        is_bookmarked: false
                    })
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Unable to add book');
                }

                alert('Book added successfully!');
                document.getElementById('bookForm').reset();

                await loadBooks();

            } catch (error) {
                alert(error.message);
            }
        }
    );

    // Edit book
    async function editBook(book) {
        const newTitle = prompt('Enter book title:', book.title);
        if (newTitle === null) return;

        const newAuthor = prompt('Enter author name:', book.author);
        if (newAuthor === null) return;

        const statusMessage =
            'Enter status:\n' +
            'to_read = To Read\n' +
            'reading = Currently Reading\n' +
            'finished = Finished';

        const newStatus = prompt(
            statusMessage,
            book.status || 'to_read'
        );

        if (newStatus === null) return;

        if (!newTitle.trim() || !newAuthor.trim()) {
            alert('Title and author cannot be empty.');
            return;
        }

        if (!['to_read', 'reading', 'finished'].includes(newStatus.trim())) {
            alert('Enter to_read, reading, or finished.');
            return;
        }

        try {
            const response = await fetch('/api/books/' + book.id, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    title: newTitle.trim(),
                    author: newAuthor.trim(),
                    status: newStatus.trim()
                })
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message || 'Unable to update book');
            }

            alert('Book updated successfully!');
            await loadBooks();

        } catch (error) {
            alert(error.message);
        }
    }

    // Bookmark and unbookmark
    async function toggleBookmark(book) {
        try {
            const response = await fetch('/api/books/' + book.id, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    is_bookmarked: !(
                        book.is_bookmarked === true ||
                        book.is_bookmarked === 1
                    )
                })
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message || 'Unable to update bookmark');
            }

            await loadBooks();

        } catch (error) {
            alert(error.message);
        }
    }

    // Delete book
    async function deleteBook(book) {
        const confirmDelete = confirm(
            'Are you sure you want to delete "' + book.title + '"?'
        );

        if (!confirmDelete) return;

        try {
            const response = await fetch('/api/books/' + book.id, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message || 'Unable to delete book');
            }

            alert('Book deleted successfully!');
            await loadBooks();

        } catch (error) {
            alert(error.message);
        }
    }

    // Load books when page opens
    loadBooks();
</script>

</body>
</html>
