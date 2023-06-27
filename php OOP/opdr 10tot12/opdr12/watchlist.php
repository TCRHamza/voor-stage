<?php
class Watchlist
{
    public array $movies = [];

    public function addmovie(movie $movie)
    {
        $this->movies[] = $movie;
    }
}
?>