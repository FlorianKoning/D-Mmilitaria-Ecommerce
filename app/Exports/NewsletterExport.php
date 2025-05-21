<?php

namespace App\Exports;

use App\Models\User;
use App\Repositories\UserRepository;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsletterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $userRepository = app(UserRepository::class);

        return $userRepository->newsletter(false);
    }
}
