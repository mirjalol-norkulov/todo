<?php

namespace App\Services;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Repositories\TodoRepository;
use App\Repositories\UserRepository;

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
                return app(TodoRepository::class);
            default:
                throw new RepositoryException('Repository not found');
        }
    }
}
