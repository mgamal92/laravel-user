<?php


namespace MG\User\Controllers;

use App\Http\Controllers\Controller;
use MG\User\Requests\UserRequest;
use MG\User\Resources\UserResource;
use MG\User\Services\UserService;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function __construct(protected UserService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response(['data' => UserResource::collection($this->service->list())], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): Response
    {
        $user = $this->service->store($request->validated());

        return response(['data' => new UserResource($user)], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Response
    {
        return response(['data' => new UserResource($this->service->show($id))], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id): Response
    {
        $user = $this->service->update($id, $request->validated());

        return response(['data' => new UserResource($user->refresh())], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): Response
    {
        $this->service->destroy($id);

        return response(['data' => [], 'message' => __('users.deleted')], Response::HTTP_OK);
    }

    /**
     * Block the specified resource.
     */
    public function block(): Response
    {
        return response(Response::HTTP_OK);
    }

    /**
     * Get the specified resources' activities logs
     */
    public function activityLog(): Response
    {
        return response(Response::HTTP_OK);
    }
}