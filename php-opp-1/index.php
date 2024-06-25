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
    private $genres = [];
    private $actors = [];
    private static $movieCount = 0;

    // Costruttore
    public function __construct($title, $director, $year, $genre = [], $actors = []) {
        if (empty($title) || empty($director) || empty($year)) {
            throw new Exception("Titolo, regista e anno sono obbligatori.");
        }
        if (!is_numeric($year) || $year < 1888 || $year > intval(date("Y"))) {
            throw new Exception("L'anno deve essere un numero valido tra il 1888 e l'anno corrente.");
        }
        $this->title = $title;
        $this->director = $director;
        $this->year = $year;
        $this->genres = $genre;
        $this->actors = $actors;
        self::$movieCount++;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        if (empty($title)) {
            throw new Exception("Il titolo è obbligatorio.");
        }
        $this->title = $title;
    }

    public function getDirector() {
        return $this->director;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        if (!is_numeric($year) || $year < 1888 || $year > intval(date("Y"))) {
            throw new Exception("L'anno deve essere un numero valido tra il 1888 e l'anno corrente.");
        }
        $this->year = $year;
    }

    public function getGenres() {
        return $this->genres;
    }

    public function addGenre($genre) {
        if ($genre !== null) {
            $this->genres[] = $genre;
        }
    }

    public function getActors() {
        return $this->actors;
    }

    public function addActor($actor) {
        if ($actor !== null) {
            $this->actors[] = $actor;
        }
    }

      // Metodo per ottenere le informazioni del film
    public function getMovieInfo() {
        $genreNames = [];
        foreach ($this->genres as $genre) {
            if ($genre !== null) {
                $genreNames[] = $genre->getGenreName();
            }
        }

        $actorNames = [];
        foreach ($this->actors as $actor) {
            if ($actor !== null) {
                $actorNames[] = $actor->getActorName();
            }
        }

        return "Titolo: " . $this->title . 
            ", Regista: " . $this->director . 
            ", Anno: " . $this->year . 
            ", Generi: " . implode(", ", $genreNames) . 
            ", Attori: " . implode(", ", $actorNames);
    }

    public static function getMovieCount() {
        return self::$movieCount;
    }
}


// Istanziamento di due oggetti Movie e stampa delle proprietà
try {
    // Creazione dei generi
    $genre1 = new Genre("Sci-Fi");
    $genre2 = new Genre("Action");
    $genre3 = new Genre("Drama");

    // Creazione degli attori
    $actor1 = new Actor("Leonardo DiCaprio");
    $actor2 = new Actor("Keanu Reeves");

    // Creazione dei film e aggiunta di generi e attori
    $movie1 = new Movie("Inception", "Christopher Nolan", 2010, [$genre1]);
    $movie1->addActor($actor1);

    $movie2 = new Movie("The Matrix", "The Wachowskis", 1999, [$genre2, $genre3]);
    $movie2->addActor($actor2);

    // Stampa delle informazioni sui film
    echo $movie1->getMovieInfo() . "<br>";
    echo $movie2->getMovieInfo() . "<br>";

    // Stampa del conteggio totale dei film
    echo "Totale film creati: " . Movie::getMovieCount() . "<br>";

} catch (Exception $e) {
    echo "Errore: " . $e->getMessage();
}
        ?>
    </main>
</body>
</html>