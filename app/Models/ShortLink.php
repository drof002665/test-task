<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShortLink
 * @package App\Models
 *
 * @property string $url
 * @property string $token
 */
class ShortLink extends Model
{
    use HasFactory;

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @param string $url
     */
    public function setToken(string $url)
    {
        $this->token = $url;
    }
}
