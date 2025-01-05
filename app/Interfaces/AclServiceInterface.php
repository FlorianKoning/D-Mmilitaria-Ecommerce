<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AclServiceInterface
{
    /**
     * Sets the file name for the acl permission using the directory
     * @return void
     */
    public function setFileAndFunctionName(string $direcoty): void;


    /**
     * Sets the role permissions file fomr an json to a object array
     * @return void
     */
    public function setRolePermissionJson(): void;


    /**
     * Checks if the user is a super_user
     * @return bool
     */
    public function superUserCheck(): bool;


    /**
     * Checks if the user is a administator
     */
    public function administatorCheck(): bool;


    /**
     * Checks fi the user a a user
     */
    public function userCheck(): bool;

    /**
     * Middleware acl permission check
     */
    public function middlewareAcl(Request $request): bool;
}
