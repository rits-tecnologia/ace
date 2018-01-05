<?php

namespace Rits\Ace\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Rits\Ace\Concerns\LeavesCrumbs;
use Rits\Ace\Concerns\HasModel;
use Rits\Ace\Concerns\HasRoutes;
use Rits\Ace\Concerns\HasTranslations;

class BackendController extends Controller
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests,
        # Ace helpers
        HasModel,
        HasRoutes,
        HasTranslations,
        LeavesCrumbs;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $this->authorize('list', $this->resourceType);
        $this->addBreadcrumb('list');

        $search = $request->get('q');
        $order = $request->get('order');

        return $this->view('index')
            ->with('resource', $this->getRepository()->getInstance())
            ->with('resources', $this->getRepository()->index($search, $order));
    }
}