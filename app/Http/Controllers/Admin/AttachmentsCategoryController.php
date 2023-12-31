<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Admin\AttachmentsCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class AttachmentsCategoryController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('attachments_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.attachments-category.index');
    }

    public function create()
    {
        abort_if(Gate::denies('attachments_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.attachments-category.create');
    }

    public function edit(AttachmentsCategory $attachmentsCategory)
    {
        abort_if(Gate::denies('attachments_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.attachments-category.edit', compact('attachmentsCategory'));
    }

    public function show(AttachmentsCategory $attachmentsCategory)
    {
        abort_if(Gate::denies('attachments_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.attachments-category.show', compact('attachmentsCategory'));
    }

    public function __construct()
    {
        $this->csvImportModel = AttachmentsCategory::class;
    }
}
