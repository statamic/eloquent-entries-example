# Statamic Eloquent Entries Example

> ⚠️ This repository is intended to be a learning tool, and not used in production.

[This is built in a walkthrough on the Statamic Knowledge Base](https://statamic.dev/knowledge-base/storing-entries-in-a-database).

A package intended for real usage exists at [statamic/eloquent-driver](https://github.com/statamic/eloquent-driver).

## Installation

- Clone or download this repository.
- Add a repository in your project's `composer.json` pointing to where you cloned it:
    ``` json
    "repositories": [
        {
            "type": "path",
            "url": "path/to/repo"
        }
    ]
    ```
- Require it with `composer require statamic/eloquent-entries-example`
- Run migrations with `php artisan migrate`

## Schema

Most of the entries' blueprint fields are in a catch-all JSON `data` column. This allows us to not need to update the DB schema when you change the blueprint.

The `id` and `origin_id` columns are strings, to make migrating from files easier. If they were incrementing integers, you'd need to update anywhere the IDs
are referenced. Relationship field values, collections' mount values, structures, etc.
