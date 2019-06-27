<?php

namespace L_forum\Http\Controllers;


use L_forum\Http\Controllers\Controller;
use Illuminate\Http\Request;
use L_forum\Channel;
use L_forum\Discussion;
use L_forum\Http\Requests\DiscussionRequest;
use L_forum\Reply;

class DisscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


      public function __construct()
      {
           $this->middleware(['auth','verified'])->only(['create','store']);
      }

    public function index()
    {
        return view('discussion.index')->with('discussions',Discussion::FilterByChannel()->paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscussionRequest $request)
    {
        auth()->user()->discussions()->create([
         'title'=>$request->title,
            'slug'=>str_slug($request->title),
            'contents'=>$request->contents,
            'channel_id'=>$request->channel

        ]);

        return $this->index();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('discussion.show')->with('discussion',Discussion::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


   public function Reply(Discussion $discussion, Reply $reply)
   {
       $discussion->reply_id=$reply->id;
       $discussion->save();

 return redirect()->back();

   }



}
