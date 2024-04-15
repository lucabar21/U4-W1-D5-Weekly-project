<?php
$host = 'localhost';
$db = 'gestione_libreria';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

$stmt = $pdo->query('SELECT * FROM libri');
$libri = $stmt->fetchAll();
?>

<?php include __DIR__ . '/includes/initial.php'; ?>

<div class="row gap-3 justify-content-center text-center">
    <?php
    foreach ($libri as $book) {
        ?>
        <div class='col-auto'>
            <div class="card" style="width:350px; height:260px">
                <div class="card-body d-flex flex-column gap-3">
                    <h5 class="card-title"><?= $book['titolo'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $book['anno_pubblicazione'] ?></h6>
                    <p class="card-text"><?= $book['autore'] ?></p>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $book['genere'] ?></h6>
                    <div class="mx-auto d-flex gap-3">
                        <div id="btn"
                            style="width:35px; height:35px; border-radius: 50%; background-color: #0B5ED7; display:flex; justify-content: center; align-items: center">
                            <a style="color:white" href="edit.php/?id=<?= $book['id'] ?>" class="card-link"><i
                                    class="bi bi-pencil-square"></i></a>
                        </div>
                        <div id="btn"
                            style="width:35px; height:35px; border-radius: 50%; background-color: #9A031E; display:flex; justify-content: center; align-items: center">
                            <a style="color:white" href="delete.php/?id=<?= $book['id'] ?>" class="card-link"><i
                                    class="bi bi-trash3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>
</div>

<?php include __DIR__ . '/includes/end.php'; ?>