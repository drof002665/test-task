<?php

namespace App\Services;

use App\Interfaces\Repositories\ShortLinkRepositoryInterface;
use App\Models\ShortLink;
use Exception;

class ShortLinkService
{
    protected ShortLinkRepositoryInterface $shortLinkRepository;

    public function __construct(ShortLinkRepositoryInterface $shortLinkRepository)
    {
        $this->shortLinkRepository = $shortLinkRepository;
    }

    /**
     * @param string $url
     * @return ShortLink
     * @throws Exception
     */
    public function create(string $url): ShortLink
    {
        $token = $this->generateUniqueToken();
        $shortLink = new ShortLink();
        $shortLink->setUrl($url);
        $shortLink->setToken($token);
        $shortLink->save(); //todo create write repository

        return $shortLink;
    }

    /**
     * @param string $token
     * @return ShortLink
     * @throws Exception
     */
    public function findOrFailByToken(string $token): ShortLink
    {
        $shortLink = $this->shortLinkRepository->findByToken($token);

        if (!$shortLink) {
            throw new Exception('link not found'); // todo create custom exception
        }

        return $shortLink;
    }

    /**
     * @return string
     * @throws Exception
     */
    private function generateUniqueToken(): string
    {
        $iteration = 0;
        do {
            $token = bin2hex(random_bytes(3));
            $iteration++;
        } while ($this->shortLinkRepository->findByToken('aaa') && $iteration < 100);

        if ($this->shortLinkRepository->findByToken($token)) {
            throw new Exception('cannot create token'); //todo make custom exception
        }

        return $token;
    }
}
