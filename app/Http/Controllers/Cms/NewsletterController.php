<?php

namespace App\Http\Controllers\Cms;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\NewsletterRepository;

class NewsletterController extends Controller
{
    public function __construct(
        protected NewsletterRepository $newsletterRepository,
        protected UserRepository $userRepository,
    ){parent::__construct();}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("cms.newsletter.index", [
            'newsletters' => $this->newsletterRepository->all(false),
            'columnNames' => User::$columnNames,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            if ($this->userRepository->find($user->id)) {
                $name = $user->first_name.' '.$user->last_name;

                $user->update([
                    'newsletter' => false,
                ]);

                return redirect()->route('cms.newsletter.index')->with('success', "De gebruiker ($name) is van de newsletter gehaald.");
            }
        } catch (Exception $e) {
            throw new Exception("Could not remove user from newsletter: ".$e->getMessage());
        }
    }
}
