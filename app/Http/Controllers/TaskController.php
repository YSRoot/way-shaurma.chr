<?php


namespace App\Http\Controllers;


use App\Models\Task;
use App\Repositories\TaskRepositories;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller

{
    protected $taskRepositories;

    /**
     * Создание нового экземпляра контроллера.
     *
     * @return void
     */
    public function __construct(TaskRepositories $taskRepositories)
    {
        $this->middleware('auth');
        $this->taskRepositories = $taskRepositories;
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function tasks(Request $request)
    {
        return view('tasks', [
            'tasks' => $this->taskRepositories->forUser($request->user()),
        ]);
    }

    /**
     * Добавление нового таска
     *
     * @param Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addTask(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * Удалить таск
     *
     * @param Request $request
     * @param Task $task
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function removeTask(Request $request, Task $task)
    {
        $this->authorize('removeTask', $task);

        $task->delete();

        return redirect('/tasks');
    }
}
