<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Throwable;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function index(): View|Factory|RedirectResponse|Application
    {
        try {
            $users = User::all();
            if ($users === null) {
                return back()->with('msg', ['type'=>'warning', 'message' => 'No users found.']);
            }

            return view('home', compact('users'));
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return back()->with('msg', ['type'=>'danger', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('user.show', ['user' => null, 'edit' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validateUserCreate = Validator::make($request->all(), User::validationRules);
            if ($validateUserCreate->fails()) {
                Session::flash('errors', $validateUserCreate->errors());

                return redirect()->back()->withInput($request->input());
            }

            if ($validateUserCreate->validated()) {
                $params = $request->except('_token', '_method');
                $params['password'] = Hash::make('password');
                User::create($params);
            }

            return redirect('/home')->with('msg', ['type'=>'success', 'message'=> 'User created.']);
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return back()->with('msg', ['type'=>'danger', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(int $id): Application|Factory|View|RedirectResponse
    {
        try {
            $user = User::find($id);

            return view('user.show', ['user' => $user, 'edit' => false]);
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return back()->withErrors(['danger' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View|RedirectResponse
     */
    public function edit(int $id): View|RedirectResponse
    {
        try {
            $user = User::find($id);

            return view('user.show', ['user' => $user, 'edit' => true]);
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return back()->with('msg', ['type'=>'danger', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|void
     */
    public function update(Request $request, int $id)
    {
        try {
            $user = User::find($id);
            if ($user === null) {
                return back()->with('msg', ['errors', "User `{$id}` not found"]);
            }
            $rules = User::validationRules;
            if ($request->get('password') === null) {
                unset($rules['password']);
            }

            $validateUserUpdate = Validator::make($request->all(), $rules);

            if ($validateUserUpdate->fails()) {
                Session::flash('errors', $validateUserUpdate->errors());

                return redirect()->back()->withInput();
            }

            if ($validateUserUpdate->validated()) {
                $user->update(array_filter($request->except(['_token', '_method'])));
            }

            return redirect()->back()->with('msg', ['type'=>'success', 'message' => "User `{$id} updated."]);
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('msg', ['type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $user = User::find($id);
            if ($user === null) {
                return back()->withErrors(['danger' => "User `{$id}` not found."]);
            }
            $user->delete();

            return back()->with('success', 'User successful deleted.');
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return back()->withErrors(['danger' => $e->getMessage()]);
        }
    }
}
