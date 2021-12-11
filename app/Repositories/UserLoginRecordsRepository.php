<?php

namespace App\Repositories;

use App\Models\UserLoginRecords;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserLoginRecordsRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserLoginRecordsRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return UserLoginRecords::class;
    }
}
