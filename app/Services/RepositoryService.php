<?php

namespace App\Services;

use App\Models\Todo;
use App\Repositories\UserRepository;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class RepositoryService
 * @package App\Services
 */
class RepositoryService
{
    /**
     * @param string $repository
     * @return RepositoryInterface
     * @throws RepositoryException
     */
    public function repository(string $repository)
    {
        switch ($repository) {
            case 'user':
                return app(UserRepository::class);
            case 'todo':
                return app(Todo::class);
            default:
                throw new RepositoryException('Repository not found');
        }
    }
}
