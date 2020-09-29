# Statamic Eloquent Entries

This package allows you to store your Statamic v3 entries in a database.

At the moment, this mostly serves as an example or jumping-off point for building your own [entry repository](https://statamic.dev/extending/repositories).

[This package is built as a walkthrough on the Statamic Knowledge Base](https://statamic.dev/knowledge-base/storing-entries-in-a-database).

## Installation

```
composer require statamic/eloquent-entries
php artisan migrate
```

## Schema

Most of the entries' blueprint fields are in a catch-all JSON `data` column. This allows us to not need to update the DB schema when you change the blueprint.

The `id` and `origin_id` columns are strings, to make migrating from files easier. If they were incrementing integers, you'd need to update anywhere the IDs
are referenced. Relationship field values, collections' mount values, structures, etc.
