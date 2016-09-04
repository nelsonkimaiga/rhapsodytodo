<?php

final class TodoValidator {

    private function __construct() {
    }

    /**
     * Validate the given {@link Todo} instance.
     * @param Todo $todo {@link Todo} instance to be validated
     * @return array array of {@link Error} s
     */
    public static function validate(Todo $todo) {
        $errors = array();
        if (!$todo->getCreatedOn()) {
            $errors[] = new Error('createdOn', 'Empty or invalid Created On.');
        }
        if (!$todo->getLastModifiedOn()) {
            $errors[] = new Error('lastModifiedOn', 'Empty or invalid Last Modified On.');
        }
        if (!trim($todo->getTitle())) {
            $errors[] = new Error('title', 'Title cannot be empty.');
        }
        if (!$todo->getDueOn()) {
            $errors[] = new Error('dueOn', 'Empty or invalid Due On.');
        }
        if (!trim($todo->getPriority())) {
            $errors[] = new Error('priority', 'Priority cannot be empty.');
        } elseif (!self::isValidPriority($todo->getPriority())) {
            $errors[] = new Error('priority', 'Invalid Priority set.');
        }
        if (!trim($todo->getStatus())) {
            $errors[] = new Error('status', 'Status cannot be empty.');
        } elseif (!self::isValidStatus($todo->getStatus())) {
            $errors[] = new Error('status', 'Invalid Status set.');
        }
        return $errors;
    }

    /**
     * Validate the given status.
     * @param string $status status to be validated
     * @throws Exception if the status is not known
     */
    public static function validateStatus($status) {
        if (!self::isValidStatus($status)) {
            throw new Exception('Unknown status: ' . $status);
        }
    }

    /**
     * Validate the given priority.
     * @param int $priority priority to be validated
     * @throws Exception if the priority is not known
     */
    public static function validatePriority($priority) {
        if (!self::isValidPriority($priority)) {
            throw new Exception('Unknown priority: ' . $priority);
        }
    }

    private static function isValidStatus($status) {
        return in_array($status, Todo::allStatuses());
    }

    private static function isValidPriority($priority) {
        return in_array($priority, Todo::allPriorities());
    }

}
