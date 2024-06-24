<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opp movies</title>
</head>
<body>
    <main>
        <h1>
            PHP OPP Movies
        </h1>
        <?php
        // classe movie
       class Movie {
    // Variabili d'istanza
    public $title;
    public $director;
    public $year;
    public $genre;

    // Costruttore
    public function __construct($title, $director, $year, $genre) {
        if (empty($title) || empty($director) || empty($year) || empty($genre)) {
            throw new Exception("All fields are required.");
        }
        if (!is_numeric($year) || $year < 1888 || $year > intval(date("Y"))) {
            throw new Exception("Year must be a valid number between 1888 and the current year.");
        }
        $this->title = $title;
        $this->director = $director;
        $this->year = $year;
        $this->genre = $genre;
    }
}
        ?>
    </main>
</body>
</html>