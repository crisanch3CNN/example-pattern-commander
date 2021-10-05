<?php

namespace App\Services\Commands\Tasks;

use App\Models\Task;

class UpdateCommand implements CommandInterface
{
    private $task;
    private $parameters;

    public function __construct(Task $task, array $parameters)
    {
        $this->task = $task;
        $this->parameters = $parameters;
    }

    public function execute(): Task
    {
        $this->task->update(
            collect($this->parameters)->filter()->all()
        );

        return $this->task;
    }

    public static function new(Task $task, array $parameters)
    {
        return new static($task, $parameters);
    }
}
