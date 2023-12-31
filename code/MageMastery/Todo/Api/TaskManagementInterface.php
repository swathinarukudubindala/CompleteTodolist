<?php
declare(strict_types=1);
namespace MageMastery\Todo\Api;

use MageMastery\Todo\Api\Data\TaskInterface;

/*
 * @api
 */
interface TaskManagementInterface
{
    /**
     * @param TaskInterface $task
     * @return int
     */
    public function save(TaskInterface $task): int;

/**
 * @param TaskInterface $task
 * @return boolean
 */
public function delete(TaskInterface $task): bool;
}