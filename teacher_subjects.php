<?php
// 1. Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=homestead', 'jeff', '8501');

// 2. Fetch teacher IDs randomly
$stmt = $pdo->query("SELECT id FROM users WHERE user_type = 'teacher' ORDER BY RAND()");
$teachers = $stmt->fetchAll(PDO::FETCH_COLUMN);

if (count($teachers) == 0) {
    die("No teachers found!");
}

// 3. Fetch subjects
$stmt = $pdo->query("SELECT id FROM subjects ORDER BY id");
$subjects = $stmt->fetchAll(PDO::FETCH_COLUMN);

// 4. Assign teachers to subjects evenly, cycling through teacher IDs
$teacherCount = count($teachers);

foreach ($subjects as $index => $subjectId) {
    // Calculate which teacher to assign (cycle through teachers)
    $teacherId = $teachers[$index % $teacherCount];

    // Update subject with assigned teacher_id
    $update = $pdo->prepare("UPDATE subjects SET teacher_id = ? WHERE id = ?");
    $update->execute([$teacherId, $subjectId]);
}

echo "Teachers assigned to subjects evenly and randomly.\n";
?>
