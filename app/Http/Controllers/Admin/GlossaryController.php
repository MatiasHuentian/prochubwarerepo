<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Glossary;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class GlossaryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('glossary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.glossary.index');
    }

    public function create()
    {
        abort_if(Gate::denies('glossary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.glossary.create');
    }

    public function edit(Glossary $glossary)
    {
        abort_if(Gate::denies('glossary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.glossary.edit', compact('glossary'));
    }

    public function show(Glossary $glossary)
    {
        abort_if(Gate::denies('glossary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.glossary.show', compact('glossary'));
    }
}
