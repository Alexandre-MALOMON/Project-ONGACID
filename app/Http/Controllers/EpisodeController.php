<?php

namespace App\Http\Controllers;

use App\Models\Completion;
use Illuminate\Support\Str;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        return view('admin.episode.show', compact('episode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        return view('admin.episode.edit', compact('episode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'video' => "mimes:mp3,mp4",
        ]);


        $episode->title = $request->title;

        $episode->title = Str::slug($request->title);
        if ($request->hasFile('video')) {
            $video = $request->video;
            $video_new_name = time() . '.' . $video->getClientOriginalExtension();
            $video->move('storages/videoCours/', $video_new_name);
            $episode->video = '/storages/videoCours/' . $video_new_name;
        }
        $episode->description = $request->description;

        $content = $request->description;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/uploads/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        $episode->save();
        return redirect()->route('cours.index')->with('success', 'Cours mis à jours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        if ($episode) {
            if (file_exists(public_path($episode->video))) {
                unlink(public_path($episode->video));
            }
            $episode->delete();
        }
        return back()->with('success', 'Episode Supprimée');
    }

    public function completide(Request $request, Episode $episode)
    {
        $completions = Episode::where(['slug' => $episode->slug])->get();

        if ( $episode->episode_id != $completions[0]['id']) {
            $completion = new Completion();
            $completion::create([
                'user_id' => Auth::user()->id,
                'episode_id' => $completions[0]['id']
            ]);


            // dd($completion);
            return response([
                'status' => 200,
                'message' => $completion
            ]);
        }
    }
}
