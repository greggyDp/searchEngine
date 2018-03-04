<?php

namespace App\Entity\Dynamic;

/**
 * Class SearchResultsCollection
 * @package App\Entity\Dynamic
 */
class SearchResultsCollection
{
    /** @var array */
    private $searchResults = [];

    /**
     * @param SearchResult $searchResult
     */
    public function addSearchResult(SearchResult $searchResult): void
    {
        $this->searchResults[] = $searchResult;
    }

    /**
     * @return SearchResult[]
     */
    public function getSearchResultsArray(): array
    {
        $result = [];

        foreach ($this->searchResults as $searchResult) {
            $result[] = $searchResult->jsonSerialize();
        }

        return $result;
    }
}