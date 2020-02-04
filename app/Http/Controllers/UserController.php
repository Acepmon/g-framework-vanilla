<?php

namespace App\Http\Controllers;

use Modules\System\Entities\User;
use Modules\System\Entities\Group;
use Modules\System\Entities\GroupMeta;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
// use App\Http\Controllers\Controller;
use Modules\Content\Http\Controllers\Ajax\GroupController;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $remember = false;

        if ($request->has('remember')) {
            $remember = true;
        }

        if (Auth::attempt(['email' => request('username'), 'password' => request('password')], $remember)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else if (Auth::attempt(['username' => request('username'), 'password' => request('password')], $remember)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:100',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:6',
            'name' => 'required|max:100',
            'language' => 'required|max:2',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        if (array_key_exists('groupId', $input) && $input['groupId']) {
            $group = Group::findOrFail($input['groupId']);
            // If make row per dealer
            if ($group->title == 'Auto Dealer') {
                $company = GroupController::register($group, $input);
                $user->groups()->attach($company);
                $user->groups()->attach($group);
            }
        }
        $user->groups()->attach(config('system.register.defaultGroup'));

        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
