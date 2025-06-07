<?php

namespace App\Http\Controllers\Cms;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Utils\ControllerOptions;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CmsUserRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CmsUserUpdateRequest;
use Illuminate\Database\Eloquent\Collection;

class CmsUserController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository,
        protected RoleRepository $roleRepository,
    ){parent::__construct();}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if (isset($request->option)) {
            $users = $this->options($request->option);
        }

        return view("cms.users.index", [
            'users' => (isset($users)) ? $users : $this->userRepository->all(false),
            'columnNames' => User::$columnNames,
            'roleArray' => Role::$roleArray,
            'orderOptions' => ControllerOptions::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("cms.users.create", [
            'roles' => $this->roleRepository->all(),
            'roleArray' => Role::$roleArray,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CmsUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $validated['role_id'],
            'newsletter' => (isset($validated['newsletter'])) ? true : false,
        ]);

        return redirect()->route('cms.users.index')->with('success','Nieuwe gebruiker is succesvol aangemaakt.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view("cms.users.edit", [
            'user' => $user,
            'roles' => $this->roleRepository->all(),
            'roleArray' => Role::$roleArray,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CmsUserUpdateRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();
        $name = $validated['first_name'].' '.$validated['last_name'];

        $user->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => (isset($validated['password'])) ? Hash::make($validated['password']) : $user->password,
            'role_id' => $validated['role_id'],
            'newsletter' => (isset($validated['newsletter'])) ? true : false,
        ]);

        return redirect()->route('cms.users.index')->with('success',"$name is succesvol geupdate.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        try {
            if ($this->userRepository->find($user->id)) {
                $name = $user->first_name.' '.$user->last_name;
                $user->delete();

                return redirect()->route('cms.users.index')->with('success',"$name is succesvol verwijderd");
            }
        } catch (Exception $e) {
            throw new Exception("Kon de gebruiker niet verwijderen: ".$e->getMessage(), 404);
        }
    }

    /**
     * Returns data from the user repository based on the given option.
     * @param string $option
     * @return Collection
     */
    private function options(string $option)
    {
        switch ($option) {
            case 'thisWeek':
                return $this->userRepository->newUsers('thisWeek');
        }
    }
}
