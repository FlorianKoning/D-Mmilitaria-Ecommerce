<?php

namespace App\Interfaces\repositories;

use Illuminate\Database\Eloquent\Collection;

interface NewsletterRepositoryInterface
{
    public function all(bool $noEmptyValue = true): Collection;
}
