<?php
$errors = [];
$titolo = '';
$autore = '';
$anno_pubblicazione = '';
$genere = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["titolo"], $_POST['autore'], $_POST['anno_pubblicazione'], $_POST['genere'])) {

        $titolo = $_POST['titolo'];
        $autore = $_POST['autore'];
        $anno_pubblicazione = $_POST['anno_pubblicazione'];
        $genere = $_POST['genere'];

        if (empty($titolo)) {
            $errors['titolo'] = 'Il campo titolo è richiesto.';
        }
        if (empty($autore)) {
            $errors['autore'] = 'Il campo autore è richiesto.';
        }
        if (empty($anno_pubblicazione)) {
            $errors['anno_pubblicazione'] = 'Il campo data di pubblicazione è richiesto.';
        }
        if (empty($genere)) {
            $errors['genere'] = 'Il campo genere è richiesto.';
        }

        if (empty($errors)) {
            try {
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

                $stmt = $pdo->prepare('UPDATE libri SET titolo = :titolo, autore = :autore, anno_pubblicazione = :anno_pubblicazione, genere = :genere WHERE id = :id');
                $stmt->execute([
                    'titolo' => $titolo,
                    'autore' => $autore,
                    'anno_pubblicazione' => $anno_pubblicazione,
                    'genere' => $genere,
                    'id' => $_GET['id']
                ]);

                header("Location: /U4-W1-D5%20Weekly%20project/");
                exit();
            } catch (PDOException $e) {
                $errors['general'] = 'Errore nel database: ' . $e->getMessage();
            }
        }
    } else {
        $errors['general'] = 'Si è verificato un errore nei dati inviati.';
    }
} elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
    try {
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

        $stmt = $pdo->prepare('SELECT * FROM libri WHERE id = :id');
        $stmt->execute(['id' => $_GET['id']]);
        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($book) {
            $titolo = $book['titolo'];
            $autore = $book['autore'];
            $anno_pubblicazione = $book['anno_pubblicazione'];
            $genere = $book['genere'];
        } else {
            $errors['general'] = 'Il libro selezionato non è presente nel nostro database.';
        }
    } catch (PDOException $e) {
        $errors['general'] = 'Errore nela ricezione dei dati: ' . $e->getMessage();
    }
}
?>

<?php include __DIR__ . '/includes/initial.php'; ?>

<div class="p-2">
    <h3 class="text-center">Modifica informazioni libro</h3>
    <form action="" method="post" novalidate>
        <div class="mb-3">
            <label for="exampleInputTitolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="titolo" value="<?= ($titolo) ?>" id="exampleInputTitolo"
                aria-describedby="TitoloHelp" placeholder="Es. I pilastri della terra">
            <div style="color:red"><?= $errors['titolo'] ?? '' ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputAutore" class="form-label">Autore</label>
            <input type="text" class="form-control" name="autore" value="<?= ($autore) ?>" id="exampleInputAutore"
                aria-describedby="AutoreHelp" placeholder="Es.Ken Follett">
            <div style="color:red"> <?= $errors['autore'] ?? '' ?></div>
        </div>
        <div class="mb-3">
            <label for="exampleInputAnno_pubblicazione" class="form-label">Data di pubblicazione</label>
            <input type="text" class="form-control" name="anno_pubblicazione" value="<?= ($anno_pubblicazione) ?>"
                id="exampleInputAnno_pubblicazione" aria-describedby="Anno_pubblicazioneHelp" placeholder="Es. 1989">
            <div style="color:red"><?= $errors['anno_pubblicazione'] ?? '' ?></div>
        </div>
        <div class="mb-3">
            <label for="exampleInputGenere" class="form-label">Genere</label>
            <input type="text" class="form-control" name="genere" value="<?= ($genere) ?>" id="exampleInputGenere"
                aria-describedby="GenereHelp" placeholder="Es.Romanzo storico">
            <div style="color:red"><?= $errors['genere'] ?? '' ?></div>
        </div>
        <div class="d-flex justify-content-center"><button class="btn btn-primary">Invia</button></div>
    </form>
</div>

<?php include __DIR__ . '/includes/end.php'; ?>