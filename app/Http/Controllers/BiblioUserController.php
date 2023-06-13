<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookTransaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class BiblioUserController extends Controller
{
    public function index()
    {

        $biblioUsers = BookTransaction::where(['user_id' => Auth::user()->id])->where( "status" ,'!=', "REFUSED")->paginate(10);

        return view('home.bibliothequeuser.index', compact('biblioUsers'));
    }

    public function showBook(Book $book)
    {

        /* $filePath = storage_path($book->livre);
dd($filePath);
        if (!Storage::exists($filePath)) {
            abort(404);
        }
    
        $fileContents = Storage::get($filePath);
    
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="example.pdf"');
    dd($response);
     /*    return $response; */
        /*  $file= public_path($book->livre);
  $headers = [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; '.$book->livre,
     ];
dd
  return response()->file($file, $headers);  */

        return view("home.bibliothequeuser.book", compact("book"));
    }
}
