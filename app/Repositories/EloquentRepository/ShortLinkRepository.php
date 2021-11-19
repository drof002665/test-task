<?php

namespace App\Repositories\EloquentRepository;

use App\Interfaces\Repositories\ShortLinkRepositoryInterface;
use App\Models\ShortLink;

/**
 * Class PaymentRepository
 * @package App\Repositories\EloquentRepository
 */
class ShortLinkRepository extends Repository implements ShortLinkRepositoryInterface
{
    /**
     * @return string
     */
    protected function getModelClassName(): string
    {
        return ShortLink::class;
    }

    /**
     * @param string $token
     * @return ShortLink|null
     */
    public function findByToken(string $token): ?ShortLink
    {
        /** @var ShortLink|null $result */
        $result = $this->model()->where('token', $token)->first();

        return $result;
    }
}
