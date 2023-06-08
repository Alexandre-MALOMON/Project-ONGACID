<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookTransaction;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class WebiteController extends Controller
{
    public function livregratuit()
    {
        $categories = Document::orderBy('name', 'asc')->get();
        $bibliotheques = Book::where(['type' => '2'])->orderBy('created_at', 'desc')->paginate(15);

        return view('home.bibliothèque.gratuite', compact('bibliotheques', 'categories'));
    }

    public function downloadBook(Book $bibliotheque)
    {
        $bibliotheque->telechargement = (1 + $bibliotheque->telechargement);
        $bibliotheque->save();
        $filePath = public_path($bibliotheque->livre);
        $headers = ['content-type:application/pdf'];
        $fileName = $bibliotheque->title . '.pdf';
        return response()->download($filePath, $fileName, $headers);
    }
    public function searchDocument(Request $request)
    {
        $categories = Document::orderBy('name', 'asc')->get();

        $books = Document::join('books', 'documents.id', 'books.document_id')
            ->where('books.document_id', $request->categorie_id)
            ->where('books.title', 'like', '%' . $request->title . '%')
            ->where('books.type', '2')->orderBy('books.created_at', 'desc')->paginate(10);
        return view('home.bibliothèque.docsearch', compact('books', 'categories'));
    }

    public function searchDocumentPayant(Request $request)
    {
        $categories = Document::orderBy('name', 'asc')->get();

        $bibliotheques = Document::join('books', 'documents.id', 'books.document_id')
            ->where('books.document_id', $request->categorie_id)
            ->where('books.title', 'like', '%' . $request->title . '%')
            ->where('books.type', '1')->orderBy('books.created_at', 'desc')->paginate(10);

        return view('home.bibliothèque.searchdocpayant', compact('bibliotheques', 'categories'));
    }

    public function livrepayant(Request $request)
    {
        $categories = Document::orderBy('name', 'asc')->get();
        $bibliotheques = Book::where(['type' => '1'])->orderBy('created_at', 'desc')->paginate(15);

        return view('home.bibliothèque.livrepayant', compact('bibliotheques', 'categories',));
    }

    public function bookTransaction(Request $request, Book $book)
    {
          BookTransaction::create([
            'user_id' => Auth::user()->id,
            'book_id' => $book->id,
            'montant' => $request->montant,
            'transaction_id' => $request->transaction_id,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
        ]); 

        $book->telechargement = (1 + $book->telechargement);
        $book->save();
        $files = public_path($book->livre);

        $data['email'] = Auth::user()->email;
        $data['nom'] = Auth::user()->lastname;
        $data['prenom'] = Auth::user()->firstname;
        Mail::send('home.email.download', $data, function ($message) use ($data, $files) {
            $message->to($data["email"], $data["email"]);
            $message->attach($files);
        });

        /*  $filePath = public_path($book->livre);
        $headers = ['content-type:application/pdf'];
        $fileName = $book->title . '.pdf';
        return response()->download($filePath, $fileName, $headers);*/
        return response()->json([
            'status' => 200,
            'book' => $book
        ]);
    }
}
