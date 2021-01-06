<?php
declare(strict_types=1);

require_once __DIR__.'/../data/ReviewDAO.php';

class ReviewService
{

    public function getFilmsReviews(int $filmId) : ?array
    {
        $filmreview = new ReviewDAO();
        $reviews = $filmreview->getFilmReviews($filmId);
        if (is_null($reviews)) {
            return null;
        }

        return $reviews;
    }

    public function addReview(string $nickname, int $score, string $commentaar, string $date, int $filmId) {
        $reviewDAO = new ReviewDAO();
        return $reviewDAO->create($nickname, $score, $commentaar, $date, $filmId);

    }
}