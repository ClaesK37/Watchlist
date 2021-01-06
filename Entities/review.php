<?php
declare(strict_types=1);

class Review {
    private int $reviewId;
    private string $nickname;
    private int $score;
    private string $commentaar;
    private $date;
    private int $filmId;

    public function __construct(int $reviewId, string $nickname, int $score, string $commentaar, $date, int $filmId) {
        $this->id = $reviewId;
        $this->nickname = $nickname;
        $this->score = $score;
        $this->commentaar = $commentaar;
        $this->date = $date;
        $this->filmId = $filmId;
    }

    public function getId(): int {
        return $this->reviewId;
    }

    public function getNickname() : string {
        return $this->nickname;
    }

    public function getScore() : int {
        return $this->score;
    }

    public function getCommentaar() : string {
        return $this->commentaar;
    }

    public function getDate() : string {
        return $this->date;
    }

    public function getFilmId() : int {
        return $this->filmId;
    }

    public function setNickname(string $nickname) {
        $this->nickaname = $nickname;
    }

    public function setScore(int $score) {
        $this->score = $score;
    }

    public function setCommentaar(string $commentaar) {
        $this->commentaar = $commentaar;
    }

    public function setDate(DateTime $date) : void {
        $this->date = $date;
    }

    public function setFilmId(int $filmId) {
        $this->filmId = $filmId;
    }

}