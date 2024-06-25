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
        // class genere
        class Genere {
            private $name;

            public function __construct($name) {
                if (empty($name)) {
                    throw new Exception("Il nome del genere e obbligatorio");
                }
                $this->name = $name;
            }
            
            public function getGenerateName() {
                return $this->name;
            }
            
        }

        // classe attori

        class Actor {
            private $name;

            public function __construct($name) {
                if (empty($name)) {
                     throw new Exception("Il nome dell'attore è obbligatorio.");
                }
                $this->name = $name;
            }
            public function getActorName() {
                return $this->name;
            }
            public function setActorName($name) {
                
            }
        }

        // classe movie
       class Movie {
    // Variabili d'istanza
    private $title;
    private $director;
    private $year;
    private $genre = [];

    // Costruttore
    public function __construct($title, $director, $year, $genre = []) {
        if (empty($title) || empty($director) || empty($year) || empty($genre)) {
            throw new Exception("Titolo, regista e anno sono obbligatori.");
        }
        if (!is_numeric($year) || $year < 1888 || $year > intval(date("Y"))) {
            throw new Exception("L'anno deve essere un numero valido tra il 1888 e l'anno corrente.");
        }
        $this->title = $title;
        $this->director = $director;
        $this->year = $year;
        $this->genres = $genre;
    }
      // Metodo per ottenere le informazioni del film
    public function getMovieInfo() {
      $genereNames = arr
    }
}

// Istanziamento di due oggetti Movie e stampa delle proprietà
try {
    $movie1 = new Movie("Inception", "Christopher Nolan", 2010, "Sci-Fi");
    echo $movie1->getMovieInfo() . "\n";

    $movie2 = new Movie("The Matrix", "The Wachowskis", 1999, "Action");
    echo $movie2->getMovieInfo() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
        ?>
    </main>
</body>
</html>