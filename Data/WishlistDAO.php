<?php
//Data/WishlistDAO
declare(strict_types = 1);

require_once __DIR__.'/DBConfig.php';
require_once __DIR__.'/../entities/Wishlist.php';
require_once __DIR__.'/../entities/Film.php';
require_once __DIR__.'/../entities/Persoon.php';


class WishlistDAO {
    public function getAllByPersoon($gebruikersAccountId) : Array {
        $sql = "select wishListItemId, filmId, wishlistitems.gebruikersAccountId, datum, reden from wishlistitems join gebruikersaccounts on gebruikersaccounts.gebruikersAccountId = wishlistitems.gebruikersAccountId where gebruikersaccounts.gebruikersAccountId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $gebruikersAccountId));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wishlists = array();
        if ($resultSet) {
            foreach($resultSet as $rij) {
                $wishlist = new Wishlist((int)$rij["wishListItemId"], (int)$rij["filmId"], (int)$rij["gebruikersAccountId"], $rij["datum"], (string)$rij["reden"]);
                array_push($wishlists, $wishlist);
            }
        }
        $dbh = null;
        return $wishlists;
    }


    public function create($filmId, $gebruikersAccountId, $date, $reden) {
        $sql = "insert into wishlistitems (filmId, gebruikersAccountId, datum, reden) values (:filmId, :gebruikersAccountId, :datum, :reden)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':filmId' => $filmId, ':gebruikersAccountId' => $gebruikersAccountId, ':datum' => $date, ':reden' => $reden));
        $dbh = null;

    }

    public function delete(int $wishListItemId) {
        $sql = "delete from wishlistitems where wishListItemId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $wishListItemId));
        $dbh = null;
    }


}
