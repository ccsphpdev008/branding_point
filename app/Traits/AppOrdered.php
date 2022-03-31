<?php

namespace App\Traits;

trait AppOrdered {
    protected $orderBy = 'position';
    protected $orderDirection = 'asc';

    public function newQuery($ordered = true)
    {
        $query = parent::newQuery();

        if (empty($ordered)) {
            return $query;
        }

        return $query->orderBy($this->orderBy, $this->orderDirection);
    }
}