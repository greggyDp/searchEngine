<?php

namespace App\Component\Helpers\DataParsing;

use App\Exception\Filters\NoFiltersDetectedException;

/**
 * Class JsonFiltersParser
 * @package App\Component\Helpers\DataParsing
 */
class JsonFiltersParser
{
    /**
     * @param string $json
     * @return string
     */
    public function createQueryStringFromJsonFilters(string $json): string
    {
        $queryString = '';
        $filters = json_decode($json);

        if (empty($filters)) {
            throw new NoFiltersDetectedException('No filters were detected, or invalid format!');
        }

        foreach ($filters as $state => $conditionsArray) {
            $stringifyConditions = [];
            foreach ($conditionsArray as $conditions) {
                $stringifyConditions[] = '(' . implode(' ', $conditions) . ')';
            }
            $queryString .= '(' . implode(' '. $state . ' ', $stringifyConditions) . ')';
            if ($conditionsArray !== end($filters)) {
                $queryString .= ' AND ';
            }
        }

        return $queryString;
    }
}