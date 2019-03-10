<?php
namespace App\Http\Controllers\API\Profile;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\Profile\Other\GetUserRequest;

class OtherProfileController extends BaseController
{
    /**
     * Получение пользователя
     */
    public function getUser(GetUserRequest $request) {
        $user = User::find($request->id);

//        $this->sendError(123, 404);

//        return $this->sendError(serialize($request->all()), 404);

        if (!$user) {
            return $this->sendError('The user could not be found.', 404);
        }

        // if just return new UserResource($user) then json be {data: <user>}
        return response()->json(new UserResource($user));
    }
}
