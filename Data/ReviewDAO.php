<?php
//Data/FilmDAO
declare(strict_types = 1);

require_once __DIR__.'/DBConfig.php';
require_once __DIR__.'/FilmDAO.php';
//require_once __DIR__.'/../entities/film.php';
require_once __DIR__.'/../entities/review.php';


class ReviewDAO {
    public function getFilmReviews(int $filmId) : ?array {
        $filmDAO = new FilmDAO();
        $film = $filmDAO->getById($filmId);
        if (is_null($film)) {
            return null;
        }
        $filmId = $film->getId();


        $sql = "select * from reviews where filmId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $filmId));
        
        $reviews = [];
       
        while (($result = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
            $reviewId = (int) $result['ReviewId'];
            $nickname = $result['nickname'];
            $score = (int) $result['score'];
            $commentaar = $result['commentaar'];
            $datum = $result['datum'];
            $filmId = (int) $result['filmId'];
            $review = new Review($reviewId, $nickname, $score, $commentaar, $datum, $filmId);
            $reviews[] = $review;
        }

        return $reviews;

    }

    public function create($nickname, $score, $commentaar, $date, $filmId) {
        $sql = "insert into reviews (nickname, score, commentaar, datum, filmId) values (:nickname, :score, :commentaar, :datum, :filmId)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':nickname' => $nickname, ':score' => $score, ':commentaar' => $commentaar, ':datum' => $date, ':filmId' => $filmId));
        $dbh = null;

    }
}