<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface NewsletterRepositoryInterface
{
    public function all(bool $noEmptyValue = true): Collection;
}
