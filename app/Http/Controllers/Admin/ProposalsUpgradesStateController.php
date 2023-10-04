<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProposalsUpgradesState;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProposalsUpgradesStateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('proposals_upgrades_state_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proposals-upgrades-state.index');
    }

    public function create()
    {
        abort_if(Gate::denies('proposals_upgrades_state_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proposals-upgrades-state.create');
    }

    public function edit(ProposalsUpgradesState $proposalsUpgradesState)
    {
        abort_if(Gate::denies('proposals_upgrades_state_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proposals-upgrades-state.edit', compact('proposalsUpgradesState'));
    }

    public function show(ProposalsUpgradesState $proposalsUpgradesState)
    {
        abort_if(Gate::denies('proposals_upgrades_state_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proposalsUpgradesState->load('user');

        return view('admin.proposals-upgrades-state.show', compact('proposalsUpgradesState'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['proposals_upgrades_state_create', 'proposals_upgrades_state_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('max_width', 100000),
                    request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new ProposalsUpgradesState();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
