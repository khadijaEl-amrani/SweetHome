<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::with(['produit', 'client'])->paginate(10);
        return view('admin.commentaires.index', compact('commentaires'));
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return redirect()->route('admin.commentaires.index')
            ->with('success', 'Commentaire supprimé avec succès.');
    }
}