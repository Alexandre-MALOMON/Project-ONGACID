<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookTransaction;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(10);
        return view('admin.livres.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Document::all();
        return view('admin.livres.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'document_id' => 'required',
            'title' => 'required|unique:books,title',
            'photo' => 'required|file|mimes:png,jpg,jpeg,psd',
            'auteur' => 'required',
            'livre' => 'mimes:pdf',
            'description' => 'required',
            'type' => 'required',
        ]);

        $book = new Book();
        $book->user_id = Auth::user()->id;
        $book->document_id = $request->document_id;
        $book->title = $request->title;
        $book->slug = Str::slug($request->title);
        if ($request->file('photo')) {
            $photo = $request->photo;
            $photo_new_name = $request->title . '.' . $photo->getClientOriginalExtension();
            $photo->move('storages/book/', $photo_new_name);
            $book->photo = '/storages/book/' . $photo_new_name;
        }

        if ($request->file('livre')) {
            $livre = $request->livre;
            $livre_new_name = $request->title . '.' . $livre->getClientOriginalExtension();
            $livre->move('storages/livre/', $livre_new_name);
            $book->livre = '/storages/livre/' . $livre_new_name;
        }
        $book->auteur = $request->auteur;
        $book->prix = $request->prix;
        $book->lien = $request->lien;
        $book->type = $request->type;
        $book->description = $request->description;
        $book->save();
        return back()->with('success', 'Livre enrégistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.livres.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Document::all();
        $documents = Document::all();
        return view('admin.livres.edit', compact('categories', 'documents', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'document_id' => 'required',
            'title' => 'required',
            'photo' => 'file|mimes:png,jpg,jpeg,psd',
            'auteur' => 'required',
            'livre' => 'mimes:pdf',
            'description' => 'required',
            'type' => 'required',
        ]);


        $book->user_id = Auth::user()->id;
        $book->document_id = $request->document_id;
        $book->title = $request->title;
        $book->slug = Str::slug($request->title);
        if ($request->file('photo')) {
            $photo = $request->photo;
            $photo_new_name = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('storages/book/', $photo_new_name);
            $book->photo = '/storages/book/' . $photo_new_name;
        }

        if ($request->file('livre')) {
            $livre = $request->livre;
            $livre_new_name = time() . '.' . $livre->getClientOriginalExtension();
            $livre->move('storages/livre/', $livre_new_name);
            $book->livre = '/storages/livre/' . $livre_new_name;
        }
        $book->auteur = $request->auteur;
        $book->prix = $request->prix;
        $book->lien = $request->lien;
        $book->type = $request->type;
        $book->description = $request->description;
        $book->save();
        return redirect()->route('book.index')->with('success', 'Livre mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if ($book) {
            if (file_exists(public_path($book->photo))) {
                unlink(public_path($book->photo));
            }
            $book->delete();
            return back()->with('success', 'Livre supprimé');
        }
    }

    public function achat(Book $book)
    {
        $achats = BookTransaction::where(['book_id' => $book->id])->paginate(20);

        return view('admin.livres.achat', compact('achats','book'));
    }
}
