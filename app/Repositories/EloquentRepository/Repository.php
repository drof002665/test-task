<?php

namespace App\Repositories\EloquentRepository;

use Illuminate\Database\Eloquent\Builder;
use \App\Interfaces\Repositories\Repository as RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    protected array $with = [];

    /**
     * @return string
     */
    abstract protected function getModelClassName(): string;


    /**
     * @param array $with
     * @return $this
     */
    public function with(array $with): Repository
    {
        $this->with = $with;
        return $this;
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    protected function prepareQuery(Builder $query): Builder
    {
        if ($this->with) {
            $query->with($this->with);
        }

        return $query;
    }

    /**
     * @return Builder
     */
    final public function model(): Builder
    {
        $className = $this->getModelClassName();

        return $this->prepareQuery($className::query());
    }
}
