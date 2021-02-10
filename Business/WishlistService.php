<?php
declare(strict_types=1);

require_once __DIR__.'/../data/WishlistDAO.php';

class WishlistService
{

    public function getPersoonWishlist(int $gebruikersAccountId) : ?array
    {
        $wishlistDAO = new WishlistDAO();
        return $wishlistDAO->getAllbyPersoon($gebruikersAccountId);

    }

    public function addtoWishlist($filmId, $gebruikersAccountId, $date, $reden) {
        $wishlistDAO = new WishlistDAO();
        return $wishlistDAO->create($filmId, $gebruikersAccountId, $date, $reden);
    }

    public function DeleteWishListItem(int $wishListItemId) {
        $wishlistDAO = new WishlistDAO();
        $wishlistDAO->delete($wishListItemId);
    }
}