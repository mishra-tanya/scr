<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\Models\Reg_User;
use App\Models\Flash;
use App\Models\FlashTest;

class NotesController extends Controller
{
    public function index(){
        $notes=Note::all();
        $user = auth()->user();
        $chapterNotes = json_decode($user->chapter_notes, true) ?? [];
// dd($chapterNotes);
        return view('users.notes.scr_notes', compact('notes', 'chapterNotes'));
    }

    public function getchapternotes($chapter){
        // dd(preg_match('/^flash_chapter/', $chapter));
            if (preg_match('/^Chapter/', $chapter)) {
                $chapter_notes = Note::where("page_url", $chapter)->first();
                return view('users.notes.chapter_notes', ['chapter_notes' => $chapter_notes]);
            } 
            elseif (preg_match('/^flash_chapter/', $chapter)) {
                $numericPart = preg_replace('/[^0-9]/', '', $chapter);
                $page_url = 'ch' . $numericPart;
// dd($page_url);            
                $flash_chapter_notes = FlashTest::where("chapter", $page_url)->get();
                // dd($flash_chapter_notes);
                return view('users.notes.flash_lo_chapter_notes', ['flash_chapter_notes' => $flash_chapter_notes, 'chapter'=>$numericPart]);
            } else {
                abort(404);
            }
    }
        
    public function store(Request $request)
    {
                $chapter = $request->input('chapter');
        
                $user = auth()->user(); 
                $currentChapterNotes = json_decode($user->chapter_notes, true) ?? [];
        
                if (!in_array($chapter, $currentChapterNotes)) {
                    $currentChapterNotes[] = $chapter;
                }
                $user->update(['chapter_notes' => json_encode($currentChapterNotes)]);
        
                return redirect('/scr_notes/' . $chapter);
    }

    

    public function flashCards(){
        $user = auth()->user();
        $chapterNotes = json_decode($user->chapter_notes, true) ?? [];
// dd($chapterNotes);
        return view ('users.notes.flash_cards', compact('chapterNotes'));
    }

    public function flash_lo( $chapter,$id){
        $user = auth()->user();
        // dd($id,$chapter);
        $flashCards = Flash::where('lo_test', $id)
        ->where('page_url', $chapter)
        ->get();

        // dd($flashCards);
        return view ('users.notes.flash_chapter_notes',[        
        'flashCards' => $flashCards,
        'id' => $id,
        'chapter' => $chapter
]);
    }
}
