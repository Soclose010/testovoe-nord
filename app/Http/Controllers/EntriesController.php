<?php

namespace App\Http\Controllers;

use App\Dto\SortDto;
use App\Dto\EntryDto;
use App\Http\Requests\SortEntriesRequest;
use App\Http\Requests\EntryCreateRequest;
use App\Services\EntriesService;

class EntriesController extends Controller
{

    public function __construct(
        private readonly EntriesService $service
    )
    {
    }

    public function index(SortEntriesRequest $request)
    {
        $sortDto = SortDto::fromArray($request->validated());
        $entries = $this->service->getPaginate($sortDto, 5);
        $sortParams = $this->service->getSortParams();
        return view("index", compact("entries", "sortDto", "sortParams"));
    }

    public function create()
    {
        return view("create");
    }

    public function store(EntryCreateRequest $request)
    {
        $data = [
            ...$request->validated(),
            "ip" => $request->ip(),
            "browser" => $request->userAgent()
        ];
        $dto = EntryDto::fromArray($data);
        $this->service->store($dto);
        return redirect()->route("home");
    }
}
