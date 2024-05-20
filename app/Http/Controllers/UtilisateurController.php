<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use PDF;

/**
 * Class UtilisateurController
 * @package App\Http\Controllers
 */
class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Utilisateur::query();

        // Check if a search query is provided
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nom', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%');
        }

        // Get the value of 'entries' from the request, or default to 10
        $entries = $request->input('entries', 10);

        // Paginate the results
        $utilisateurs = $query->paginate($entries);

        return view('utilisateur.index', compact('utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $utilisateur = new Utilisateur();
        return view('utilisateur.create', compact('utilisateur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Utilisateur::$rules);

        $utilisateur = Utilisateur::create($request->all());

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);

        return view('utilisateur.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utilisateur = Utilisateur::find($id);

        return view('utilisateur.edit', compact('utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Utilisateur $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        request()->validate(Utilisateur::$rules);

        $utilisateur->update($request->all());

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $utilisateur = Utilisateur::find($id)->delete();

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur deleted successfully');
    }

    /**
     * Delete selected users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteSelected(Request $request)
    {
        $selectedIds = $request->input('selected');

        Utilisateur::whereIn('id', $selectedIds)->delete();

        return redirect()->back()->with('success', 'Selected utilisateurs deleted successfully');
    }

    public function export_user_pdf()
    {
        try {
            // Fetch all utilisateurs
            $utilisateurs = Utilisateur::all();

            // Check if any utilisateurs exist
            if ($utilisateurs->isEmpty()) {
                return redirect()->back()->with('error', 'No utilisateurs found to export.');
            }

            // Load the PDF view with the utilisateurs data
            $pdf = PDF::loadView('pdf.document', [
                'utilisateurs' => $utilisateurs
            ]);

            // Download the PDF
            return $pdf->download('document.pdf');
        } catch (\Exception $e) {
            // Handle any exceptions
            return redirect()->back()->with('error', 'Error exporting utilisateurs: ' . $e->getMessage());
        }
    }
}
