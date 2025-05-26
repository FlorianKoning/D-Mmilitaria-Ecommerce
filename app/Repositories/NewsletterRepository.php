<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\repositories\NewsletterRepositoryInterface;
use App\Models\User;

class NewsletterRepository implements NewsletterRepositoryInterface
{
    public function all(bool $noEmptyValue = true): Collection
    {
        $newsletters = User::where('users.newsletter', true)->get();

        if (count($newsletters) == 0 && $noEmptyValue) {
            throw new Exception("There where no users found that subscribed to the newsletter.", 404);
        }

        return $newsletters;
    }
}
