<?php

$conn = new mysqli('localhost', 'admin', '1234', 'college');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$page_limit = 10;

$page = (isset($_GET['page']) && $_GET['page'] > 0) ? intval($_GET['page']) : 1;
$offset = ($page > 1) ? ($page_limit * ($page - 1)) : 0;

$query_count = "SELECT count(id) AS count FROM angular";
$res_obj = mysqli_query($conn, $query_count);
$results_count = mysqli_fetch_assoc($res_obj);
$total_count = $results_count['count'];

$query_col = "SELECT * FROM angular ORDER BY id LIMIT $offset, $page_limit";
$res_obj = mysqli_query($conn, $query_col);
$results = mysqli_fetch_all($res_obj, MYSQLI_ASSOC);
$pages = ($total_count % $page_limit == 0) ? ($total_count / $page_limit) : (ceil($total_count / $page_limit));
$paging = [
    'total' => $total_count,
    'current' => $page,
    'from' => ($offset + 1),
    'to' => min(($offset + $page_limit), $total_count), // Corrected to handle the last page
    'pages' => $pages
];

$page_link = 'mywebsite.com/mypage?page=';

if (!empty($results)) {
    echo '<table class="table table-striped table-bordered">';
    echo ' <tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo ' </tr>';
    foreach ($results as $res) {
        echo '<tr><td><b>#' . $res['id'] . '</b></td><td>' . $res['firstname'] . '</td></tr>';
    }
    echo ' <tr><td colspan="2">';
    echo 'Displaying ' . $paging['from'] . ' to ' . $paging['to'] . ' of ' . $paging['total'] . ' records at page #' . $paging['current'];
    echo '</td></tr>';
    echo ' <tr><td colspan="2">';
    for ($page_counter = 1; $page_counter <= $paging['pages']; $page_counter++) {
        if ($page_counter == $paging['current']) { ?>
            <span class="pagenum"><?= $page_counter; ?></span>
        <?php } else { ?>
            <a class="pagenum" href="<?= $page_link . $page_counter; ?>"><?= $page_counter; ?></a>
        <?php }
    }
    echo '</td></tr>';
    echo '</table>';
}
?>
