<?php

namespace App\Overrides\CrudGenerator\Common;

class GeneratorConfig extends \Codiksh\Generator\Common\GeneratorConfig
{
    public function prepareTable()
    {
        if ($this->getOption('table')) {
            $this->tableName = $this->getOption('table');
        } else {
            $this->tableName = $this->modelNames->snakePlural;
        }

        if ($this->getOption('primary')) {
            $this->primaryName = $this->getOption('primary');
        } else {
            $this->primaryName = 'uuid';
        }

        if ($this->getOption('connection')) {
            $this->connection = $this->getOption('connection');
        }
    }
}
