<?php

namespace Statamic\Eloquent\Entries;

use Statamic\Stache\Repositories\CollectionRepository as StacheRepository;

class CollectionRepository extends StacheRepository
{
    public function updateEntryUris($collection, $ids = null)
    {
        $collection
            ->queryEntries()
            ->get()->each(function ($entry) {
                EntryModel::where('id', $entry->id())->update(['uri' => $entry->uri()]);
            });
    }
}
