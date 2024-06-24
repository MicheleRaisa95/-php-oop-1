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
        // Definizione della classe Movie
        class Movie {
            // Variabili d'istanza
            public $title;
            public $director;
            public $year;
            public $genres = [];

            // Costruttore
            public function __construct($title, $director, $year, $genres) {
                // Validazione dei campi obbligatori
                if (empty($title) || empty($director) || empty($year) || empty($genres)) {
                    throw new Exception("All fields are required.");
                }
                // Validazione dell'anno
                if (!is_numeric($year) || $year < 1888 || $year > intval(date("Y"))) {
                    throw new Exception("Year must be a valid number between 1888 and the current year.");
                }
                // Assicurati che $genres sia un array
                if (!is_array($genres)) {
                    throw new Exception("Genres must be provided as an array.");
                }
                // Validazione dei generi
                foreach ($genres as $genre) {
                    $this->validateGenre($genre);
                    $this->genres[] = $genre;
                }

                // Assegnazione delle altre proprietà
                $this->title = $title;
                $this->director = $director;
                $this->year = $year;
            }

            // Metodo privato per validare un singolo genere
            private function validateGenre($genre) {
                // Esempio di validazione semplice
                $validGenres = ["Action", "Adventure", "Comedy", "Drama", "Fantasy", "Horror", "Mystery", "Sci-Fi", "Thriller"];
                if (!in_array($genre, $validGenres)) {
                    throw new Exception("Invalid genre: $genre");
                }
            }

            // Metodo per ottenere le informazioni del film
            public function getMovieInfo() {
                $genreStr = implode(", ", $this->genres);
                return "<div><strong>Title:</strong> " . $this->title . "<br>"
                    . "<strong>Director:</strong> " . $this->director . "<br>"
                    . "<strong>Year:</strong> " . $this->year . "<br>"
                    . "<strong>Genres:</strong> " . $genreStr . "</div>";
            }
        }

        // Istanziamento di due oggetti Movie e stampa delle proprietà
        try {
            $movie1 = new Movie("Inception", "Christopher Nolan", 2010, ["Sci-Fi", "Action"]);
            echo $movie1->getMovieInfo() . "\n";

            $movie2 = new Movie("The Matrix", "The Wachowskis", 1999, ["Action", "Sci-Fi"]);
            echo $movie2->getMovieInfo() . "\n";
        } catch (Exception $e) {
            echo "<div>Error: " . $e->getMessage() . "</div>";
        }
        ?>
    </main>
</body>
</html>