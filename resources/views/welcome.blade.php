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
