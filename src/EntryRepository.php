<?php

namespace Statamic\Eloquent\Entries;

use Statamic\Contracts\Entries\Entry as EntryContract;
use Statamic\Eloquent\Entries\EntryModel as Model;
use Statamic\Entries\EntryCollection;
use Statamic\Stache\Repositories\EntryRepository as StacheRepository;

class EntryRepository extends StacheRepository
{
    public function query()
    {
        return new EntryQueryBuilder(Model::query());
    }

    public function find($id): ?EntryContract
    {
        if (! $model = Model::find($id)) {
            return null;
        }

        return Entry::fromModel($model);
    }

    public function all(): EntryCollection
    {
        return $this->transform(Model::all());
    }

    public function whereCollection(string $handle): EntryCollection
    {
        return $this->transform(
            Model::where('collection', $handle)->get()
        );
    }

    public function save($entry)
    {
        $model = $entry->toModel();

        $model->save();

        $entry->model($model);
    }

    public function make(): EntryContract
    {
        return new Entry;
    }

    protected function transform($models)
    {
        return EntryCollection::make($models->map(function ($model) {
            return Entry::fromModel($model);
        }));
    }

    public function eloquentModelToStatamicEntry($model)
    {
        return Entry::fromModel($model);
    }

    public function delete($entry)
    {
        $entry->model()->delete();
    }
}
