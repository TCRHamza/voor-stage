<?php
class music
{
    public $Bach;
    public $genre;
    public $listen;


    /**
     * @param string $Bach
     * @param string $genre
     * @param int $listen
     */

    public function __construct($Bach, $genre, $listen,)


    {
        $this->name = $Bach;
        $this->genre = $genre;
        $this->seen = $listen;
    }

    public function getName()
    {
        return $this->Bach;
    }
}    
