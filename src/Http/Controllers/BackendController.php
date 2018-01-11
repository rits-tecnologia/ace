<?php

namespace Rits\Ace\Http\Controllers;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Rits\Ace\Concerns\HasBreadcrumbs;
use Rits\Ace\Concerns\HasForm;
use Rits\Ace\Concerns\HasModel;
use Rits\Ace\Concerns\HasViews;
use Rits\Ace\Support\Eloquent\Model;

class BackendController extends Controller
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests,
        # Ace helpers
        HasBreadcrumbs,
        HasForm,
        HasModel,
        HasViews;

    /**
     * Clean instance of the resource.
     *
     * @var Model
     */
    protected $instance;

    /**
     * BackendController constructor.
     */
    public function __construct()
    {
        $this->instance = $this->getRepository()->getInstance();

        $this->addBreadcrumb($this->instance, 'index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $this->authorize('list', $this->resourceType);

        $search = $request->get('q');
        $order = $request->get('order');

        $resources = $this->getRepository()->index($search, $order);

        return $this->view('index')
            ->with('type', $this->resourceType)
            ->with('instance', $this->instance)
            ->with('resources', $resources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function new()
    {
        $this->addBreadcrumb($this->instance, 'new');
        $this->authorize('create', $this->resourceType);

        return $this->view('new')
            ->with('type', $this->resourceType)
            ->with('instance', $this->instance);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function create()
    {
        $this->authorize('create', $this->resourceType);

        if ($resource = $this->getRepository()->create($this->formParams())) {
            return $this->afterCreate($resource);
        }

        return $this->afterFailed('created');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $instance = $this->getRepository()->find($id);

        $this->addBreadcrumb($instance, 'edit');
        $this->authorize('update', $instance);

        return $this->view('edit')
            ->with('type', $this->resourceType)
            ->with('instance', $instance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function update($id)
    {
        $instance = $this->getRepository()->find($id);

        $this->authorize('update', $instance);

        if ($resource = $this->getRepository()->update($instance, $this->formParams())) {
            return $this->afterUpdate($resource);
        }

        return $this->afterFailed('updated');
    }

    /**
     * Where to redirect after creating the resource.
     *
     * @param Model $resource
     * @return RedirectResponse
     */
    protected function afterCreate(Model $resource)
    {
        /** @var Authorizable $user */
        $user = auth()->user();
        $route = null;

        if ($user->can('view', $resource)) {
            $route = $resource->route('show');
        } elseif ($user->can('list', $this->resourceType)) {
            $route = $resource->route('index');
        }

        $route = $route ? redirect()->to($route) : back();

        return $route->with(
            'success',
            crudAction($this->resourceType, 'success.created')
        );
    }

    /**
     * Where to redirect after updating resource.
     *
     * @param Model $resource
     * @return RedirectResponse
     */
    protected function afterUpdate($resource)
    {
        /** @var Authorizable $user */
        $user = auth()->user();
        $route = null;

        if ($user->can('view', $resource)) {
            $route = $resource->route('show');
        }

        $route = $route ? redirect()->to($route) : back();

        return $route->with(
            'success',
            crudAction($this->resourceType, 'success.updated')
        );
    }

    /**
     * Return with errors and message.
     *
     * @param string $action
     * @return RedirectResponse
     */
    private function afterFailed($action)
    {
        return back()->withInput()
            ->with('warning', crudAction($this->resourceType, 'failed.' . $action));
    }
}
