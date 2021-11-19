<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Builder;

/**
 * Interface Repository
 * @package App\Interfaces\Repositories
 */
interface Repository
{
    /**
     * @param array $with
     * @return $this
     */
    public function with(array $with): Repository;

    /**
     * @return Builder
     */
    public function model(): Builder;
}
