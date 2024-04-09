<?php

$bookReviews = [
    ['name' => 'Alice Johnson', 'job' => 'Librarian', 'book' => 'The Great Gatsby', 'content' => 'A timeless classic that offers a vivid peek into the American life of the 1920s.'],
    ['name' => 'Anibal Sanchez', 'job' => 'Data Scientist', 'book' => 'Head First Java: A Brain-Friendly Guide', 'content' => 'it is a book that deserves its place on every bookshelf of a developer.'],
    ['name' => 'Josh Barrett', 'job' => 'Software Engineer', 'book' => 'Clean Code: A Handbook of Agile Software Craftsmanship', 'content' => 'Clean Code is indispensable for anyone who takes software development seriously. The principles and practices that Robert C. Martin introduces not only enhance code quality but they also make maintenance and collaborative work far more manageable. The book goes beyond mere theory by providing real-world examples and case studies that demonstrate how to write code that is both efficient and readable. It is a must-read for developers at any stage of their career.'],
    ['name' => 'Emily Carter', 'job' => 'Front-end Developer', 'book' => 'You Don’t Know JS: Up & Going', 'content' => 'You Don’t Know JS: Up & Going by Kyle Simpson is a fantastic resource for both newcomers and experienced developers who want to deepen their understanding of JavaScript. Simpson breaks down complex concepts into approachable explanations and challenges the reader to think critically about code. By covering the foundational aspects of JS with clear examples, this book sets readers on a path to mastering the language in an enjoyable and engaging way. I found the practical tips and insights incredibly beneficial for writing more effective and efficient JavaScript code.'],
    ['name' => 'Ethan Tremblay', 'job' => 'Backend Developer', 'book' => 'Design Patterns: Elements of Reusable Object-Oriented Software', 'content' => "Often referred to as the 'Gang of Four' book, Design Patterns is a timeless guide to object-oriented software design. The authors Erich Gamma, Richard Helm, Ralph Johnson, and John Vlissides provide a comprehensive catalog of common patterns that help solve recurring design problems. Reading this book, I gained insights into high-level design principles and best practices for software architecture. I recommend it to any developer looking to understand the fundamentals of software design patterns and elevate their coding strategies."]

];

$searchResult = [];
$searchQuery = '';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])) {
    $searchQuery = strtolower(trim($_POST['search']));

    // Filter reviews by book name
    foreach ($bookReviews as $review) {
        if (stripos(strtolower($review['book']), $searchQuery) !== false) {
            $searchResult[] = $review;
        }
    }
}

include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reviews</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>

<body>

    <section class="book-reviews">
        <h2>Book Reviews</h2>

        <!-- Search form -->
        <form action="" method="post">
            <input type="text" name="search" placeholder="Enter book name..."
                value="<?php echo htmlspecialchars($searchQuery); ?>">
            <button type="submit">Search</button>
        </form>

        <!-- Display search results if any -->
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="search-results">
                <?php if (empty($searchResult)): ?>
                    <p>No reviews found for "<?php echo htmlspecialchars($searchQuery); ?>"</p>
                <?php else: ?>
                    <?php foreach ($searchResult as $review): ?>
                        <div class="review-item">
                            <h3><?php echo htmlspecialchars($review['book']); ?></h3>
                            <p class="reviewer-name"><?php echo htmlspecialchars($review['name']); ?>,
                                <?php echo htmlspecialchars($review['job']); ?></p>
                            <blockquote><?php echo htmlspecialchars($review['content']); ?></blockquote>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>

    <?php include 'footer.php'; ?>

</body>

</html>