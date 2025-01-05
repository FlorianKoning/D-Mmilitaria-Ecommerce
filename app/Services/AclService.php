<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\AclServiceInterface;
use Illuminate\Support\Facades\Storage;

class AclService implements AclServiceInterface
{
    // other variables
    protected string $userRole;
    protected string $fileName;
    protected string $functionName;
    protected object $rolePermissionsJson;


    /**
     * An array to get the string name of the role_id
     * @var array
     */
    protected array $aclRoleArray = [
        1 => 'user',
        2 => 'administator',
        3 => 'super_user',
    ];


    /**
     * Constructor function
     */
    public function __construct()
    {
        $this->userRole = $this->aclRoleArray[Auth::user()->role_id];
    }


    /**
     * Sets the file and function name for the acl permission using the directory
     */
    public function setFileAndFunctionName(string $directory): void
    {
        $explode = explode('\\', $directory);
        $count = count($explode) - 1;

        $secondExplode = explode('@', $explode[$count]);
        $secondCount = count($secondExplode) - 1;

        $this->fileName = $secondExplode[0];
        $this->functionName = $secondExplode[$secondCount];
    }


    /**
     * Sets the role permissions file fomr an json file to a object array
     * @return void
     */
    public function setRolePermissionJson(): void
    {
        $this->rolePermissionsJson = json_decode(Storage::disk('acl')->get('acl/role_permission.json'));
    }


    /**
     * Checks if the user is a super_user
     * @return bool
     */
    public function superUserCheck() : bool
    {
        if ($this->userRole == 'super_user') {
            return true;
        }

        return false;
    }


    /**
     * Checks if the user is a administrator
     * @return bool
     */
    public function administatorCheck() : bool
    {
        if ($this->userRole == 'administator') {
            return true;
        }

        return false;
    }


    /**
     * Chekcs if the user is a normal user
     * @return bool
     */
    public function userCheck() : bool
    {
        if ($this->userRole == 'user') {
            return true;
        }

        return false;
    }


    /**
     * Middleware acl permission check
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function middlewareAcl(Request $request): bool
    {
        // Sets up the file and function name
        $this->setFileAndFunctionName($request->route()->getAction()['controller']);

        // Sets up the role_permissions json file
        $this->setRolePermissionJson();

        // Other variables
        $userRole = $this->userRole;
        $fileName = $this->fileName;
        $functionName = $this->functionName;

        // Checks if the user has the file and function permission
        if (isset($this->rolePermissionsJson->roles->$userRole->$fileName)) {
            $functions = $this->rolePermissionsJson->roles->$userRole->$fileName;

            if ($this->functionPermissionCheck($functionName, $functions)) {
                return true;
            }
        } elseif (isset($this->rolePermissionsJson->global->$fileName)) {
            $functions = $this->rolePermissionsJson->global->$fileName;

            if ($this->functionPermissionCheck($functionName, $functions)) {
                return true;
            }
        }


        return false;
    }


    /**
     * Checks if the given function name is equal to the role_permission function name
     * @param string $functionName
     * @param array $functions
     * @return bool
     */
    private function functionPermissionCheck(string $functionName, array $functions): bool {
        foreach ($functions as $value) {
            if ($functionName == $value || $value == '*') {
                return true;
            }
        }

        return false;
    }
}
