<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Services\ChallengeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ChallengeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $challenges = auth()->user()->challenges()->orderBy('created_at', 'desc')->get();

        return view('challenge.index', compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('challenge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request          $request
     * @param ChallengeService $challengeService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, ChallengeService $challengeService)
    {
        $data = $request->validate([
            'challenge.name' => 'required',
            'books.*.name'   => 'required',
        ]);

        $challenge = $challengeService->create($data);

        return redirect('/challenges/'.$challenge->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Challenge $challenge
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|View
     */
    public function show(Challenge $challenge)
    {
        try {
            $this->authorize('view', $challenge);
        } catch (\Throwable $e) {
            return redirect('/challenges');
        }

        $challenge->load('books');

        return view('challenge.show', compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Challenge $challenge
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Challenge           $challenge
     */
    public function update(Request $request, Challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Challenge        $challenge
     * @param ChallengeService $challengeService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Challenge $challenge, ChallengeService $challengeService)
    {
        $this->authorize('delete', $challenge);

        try {
            $challengeService->delete($challenge);
            Session::flash('success', 'The challenge was successfully deleted');
        } catch (\Throwable $e) {
            Session::flash('error', 'An error occurred when deleting your challenge. Please try again.');
        }

        return redirect('/challenges');
    }
}
