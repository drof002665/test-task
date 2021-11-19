<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Repositories\Repository as RepositoryInterface;
use App\Models\ShortLink;

/**
 * Interface PaymentRepositoryInterface
 * @package App\Interfaces\Repositories
 */
interface ShortLinkRepositoryInterface extends RepositoryInterface
{
    /**
     * @param string $token
     * @return ShortLink|null
     */
    public function findByToken(string $token): ?ShortLink;
}
