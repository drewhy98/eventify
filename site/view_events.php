<?php
include 'includes/header.php';
include 'includes/dbconnect.php'; // use $db

/* ---------- FETCH EVENTS ---------- */
$stmt = $db->query("
    SELECT id, event_type, title, place, event_date
    FROM events
    ORDER BY event_date ASC
");
$events = $stmt->fetchAll();
?>

<section class="sub-featured">
    <h3>Upcoming Events</h3>

    <?php if (count($events) === 0): ?>
        <p style="text-align:center;">No events available.</p>
    <?php else: ?>
        <table class="events-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Place</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?= htmlspecialchars($event['id']) ?></td>
                        <td><?= htmlspecialchars(ucfirst($event['event_type'])) ?></td>
                        <td><?= htmlspecialchars($event['title']) ?></td>
                        <td><?= htmlspecialchars($event['place']) ?></td>
                        <td><?= htmlspecialchars(date("d M Y", strtotime($event['event_date']))) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>

<?php
include 'includes/footer.php';
?>
