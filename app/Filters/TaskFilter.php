<?php
namespace App\Filters;
class TaskFilter extends \App\Filters\QueryFilter{
    public function status($status){
        return $this->builder->where('status', $status);
}
}
