<?php

namespace App\Repositories;

use App\Models\Exhibition;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class ExhibitionRepository
{
   /**
    * Returns all the exhibitions where the owner is present.
    * If there are no exhibitions a exception will be thrown.
    * @throws \Exception
    * @return Collection<int, Exhibition>
    */
   public function all(): Collection|Exception
   {
        $exhibitions = Exhibition::all()->where('present', true);

        if (count($exhibitions) <= 0) {
            throw new Exception('There are no exhibitions at the moment, please select a different payment method.');
        }

        return $exhibitions;
   }
}
