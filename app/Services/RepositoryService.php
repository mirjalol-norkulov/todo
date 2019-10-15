<?php

namespace App\Services;

use Illuminate\Contracts\Container\BindingResolutionException;
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
     * @throws BindingResolutionException
     */
    public function repository(string $repository): RepositoryInterface
    {
        if (!$repositoryClass = $this->getRepositoryClass($repository)) {
            throw new RepositoryException("Repository with name \"$repository\" not found");
        }

        return app()->make($repositoryClass);
    }

    /**
     * @param string $repository
     * @return string|mixed
     */
    private function getRepositoryClass(string $repository)
    {
        return collect([
            'todo' => TodoRepository::class,
            'user' => UserRepository::class
        ])->get($repository);
    }
}
