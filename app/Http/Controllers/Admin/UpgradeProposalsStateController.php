<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UpgradeProposalsState;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UpgradeProposalsStateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('upgrade_proposals_state_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upgrade-proposals-state.index');
    }

    public function create()
    {
        abort_if(Gate::denies('upgrade_proposals_state_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upgrade-proposals-state.create');
    }

    public function edit(UpgradeProposalsState $upgradeProposalsState)
    {
        abort_if(Gate::denies('upgrade_proposals_state_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upgrade-proposals-state.edit', compact('upgradeProposalsState'));
    }
}
