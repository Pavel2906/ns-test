<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\MessageResource;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class AuthController extends Controller
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(
        public readonly UserRepository $userRepository
    ) {}

    /**
     * @param RegisterRequest $request
     * @return MessageResource
     */
    public function register(RegisterRequest $request): MessageResource
    {
        $this->userRepository->create($request->validated());

        return new MessageResource(
            ['message' => 'Registered successfully']
        );
    }

    /**
     * @param LoginRequest $request
     * @return MessageResource|JsonResponse
     */
    public function login(LoginRequest $request): MessageResource | JsonResponse
    {
        $request->session()->regenerateToken();

        if (Auth::attempt($request->validated())) {
            return new MessageResource(
                ['message' => 'Logged successfully']
            );
        }

        return new JsonResponse(['error' => 'Credentials is wrong'], 401);
    }

    /**
     * @param Request $request
     * @return MessageResource
     */
    public function logout(Request $request): MessageResource
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return new MessageResource(
            ['message' => 'User logged out']
        );
    }
}
