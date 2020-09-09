<?php

namespace Statamic\Eloquent\Entries;

use Statamic\Contracts\Entries\Entry as EntryContract;
use Statamic\Eloquent\Entries\EntryModel as Model;
use Statamic\Stache\Repositories\EntryRepository as StacheRepository;
use Statamic\Support\Str;

class EntryRepository extends StacheRepository
{
    public static function bindings(): array
    {
        return [
            EntryContract::class => Entry::class,
        ];
    }

    public function query()
    {
        return new EntryQueryBuilder(Model::query());
    }

    public function save($entry)
    {
        $model = $entry->toModel();

        if (! $entry->id()) {
            $model->id = (string) Str::uuid();
        }

        $model->save();

        $entry->model($model);
        $entry->id($model->id);
    }

    public function delete($entry)
    {
        $entry->model()->delete();
    }
}
