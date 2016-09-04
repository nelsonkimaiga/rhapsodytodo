<?php

final class TodoSearchCriteria {

    private $status = null;


    /**
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @return TodoSearchCriteria
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

}
