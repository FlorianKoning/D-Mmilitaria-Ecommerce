<?php

namespace App\Http\Controllers\Cms;

use App\Exports\NewsletterExport;
use Exception;
use App\Models\User;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
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
    public function index(): View
    {
        return view("cms.newsletter.index", [
            'newsletters' => $this->newsletterRepository->all(false),
            'columnNames' => User::$columnNames,
        ]);
    }

    /**
     * Download een excel bestand van alle users die geaboneerd zijn op de newsbrief.
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function excelDownload()
    {
        return Excel::download(new NewsletterExport, 'newsletter.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
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
