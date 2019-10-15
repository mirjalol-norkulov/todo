<?php

namespace App\Http\Controllers\Todos;

use App\Criterias\Todos\FilterByUserCriteria;
use App\Criterias\Todos\UndoneTodosCriteria;
use App\Http\Requests\Todos\TodoReorderRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Todos\Todo;
use App\Http\Resources\Todos\TodoCollection;
use App\Http\Requests\Todos\TodoCreateRequest;
use App\Http\Requests\Todos\TodoUpdateRequest;

/**
 * Class TodoController
 * @package App\Http\Controllers\Todos
 */
class TodoController extends Controller
{
    /**
     * Show view
     */
    public function __invoke()
    {
        return view('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return TodoCollection
     */
    public function index(Request $request)
    {
        return new TodoCollection(
            app('service')
                ->repository('todo')
                ->pushCriteria(new UndoneTodosCriteria())
                ->pushCriteria(new FilterByUserCriteria($request))
                ->paginate($request->get('limit', 10))
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TodoCreateRequest $request
     * @return Todo
     */
    public function store(TodoCreateRequest $request)
    {
        if ($request->has('sub_tasks')) {
            $subTasks = collect($request->get('sub_tasks'))->map(function ($subTask) {
                $subTask['done'] = false;
                return $subTask;
            })->toArray();
            $request->merge([
                'sub_tasks' => $subTasks
            ]);
        }

        return new Todo(
            app('service')
                ->repository('todo')
                ->create([
                    'task' => $request->task,
                    'due_date' => $request->get('due_date', Carbon::tomorrow()),
                    'done' => false,
                    'sub_tasks' => $request->get('sub_tasks', []),
                    'user_id' => $request->user()->id
                ]));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Todo
     */
    public function show($id)
    {
        return new Todo(
            app('service')
                ->repository('todo')
                ->find($id)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TodoUpdateRequest $request
     * @param int $id
     * @return Todo
     */
    public function update(TodoUpdateRequest $request, $id)
    {
        return new Todo(
            app('service')
                ->repository('todo')
                ->update($request->only('task', 'due_date', 'done', 'sub_tasks'), $id)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        app('service')
            ->repository('todo')
            ->delete($id);
        return new JsonResponse('Successfully deleted', 204);
    }

    /**
     * @param TodoReorderRequest $request
     * @return JsonResponse
     */
    public function reorder(TodoReorderRequest $request)
    {
        app('service')->repository('todo')
            ->setNewOrder($request->get('ids'));

        return new JsonResponse(['success' => true]);
    }
}
