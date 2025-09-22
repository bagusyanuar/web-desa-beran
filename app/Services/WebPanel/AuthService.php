<?php

namespace App\Services\WebPanel;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\AuthServiceInterface;
use App\Models\User;
use App\Schemas\WebPanel\Login\LoginSchema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    public function login(LoginSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();
            $user = User::with([])
                ->where('username', '=', $schema->getUsername())
                ->first();
            if (!$user) {
                return ServiceResponse::notFound('user not found');
            }
            $isPasswordValid = Hash::check($schema->getPassword(), $user->password);
            if (!$isPasswordValid) {
                return ServiceResponse::unauthorized('password did not match');
            }
            Auth::login($user);
            return ServiceResponse::statusOK("successfully login");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
