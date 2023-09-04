<?php
declare(strict_types=1);
namespace MageMastery\Todo\Service;

use MageMastery\Todo\Api\TaskManagementInterface;
use MageMastery\Todo\Api\TaskRepositoryInterface;
use MageMastery\Todo\Api\TaskStatusManagementInterface;
use MageMastery\Todo\Model\Task;

class TaskStatusManagement implements TaskStatusManagementInterface
{
    /**
     * @var TheRepositoryInterface
     */
        private $repository;
      
        /**
        * @var TaskManagementInterface
        */
    private $management;
    
    /**
     *TaskStatusManagement constructor.
     * @param TaskRepositoryInterface $taskRepository
     * @param TaskMangementInterface $taskManagement
     */
    public function __construct(
        TaskRepositoryInterface $taskRepository,
        TaskMangementInterface $taskManagement

    ){
        $this->repository = $taskRepository;
        $this->management = $taskManagement;
    }
        /**
         * @param integer $taskId
         * @param string $status
         * @return boolean
         */
        public function change(int $taskId, string $status): bool
        {
            if(!in_array($status, ['open', 'comlete'])) {
                return false;
            }
            $task = $this->repository->get($taskId);
            $task->setData(Task::STATUS, '$status');
            

            $this->management->save($task);
       
            return true;
        }

    }