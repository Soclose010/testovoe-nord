<?php

namespace App\Services;

use App\Dto\SortDto;
use App\Dto\EntryDto;
use App\Models\Entry;
use Illuminate\Database\Eloquent\Builder;

class EntriesService
{
    public function store(EntryDto $dto) : Entry 
    {
        $entry = Entry::create($dto->toArray());
        return $entry;
    }

    public function getPaginate(SortDto $dto, int $count)
    {
        $columns = [
            "username",
            "email",
            "body",
            "created_at"
        ];

        $entriesQuery = Entry::query()->select($columns);
        $entriesQuery = $this->sort($entriesQuery, $dto);
        return $entriesQuery->toBase()->simplePaginate($count);
    }

    private function sort(Builder $builder,SortDto $dto): Builder
    {
        foreach (get_object_vars($dto) as $key =>$param) {
            if ($param != "no")
            {
                $builder = $builder->orderBy($key, $param);
            }
        }
        return $builder;
    }

    public function getSortParams(): array
    {
        return [
            "username" => "Имя пользователя",
            "email" => "Электронная почта",
            "created_at" => "Дата создания"
        ];
    }

}
