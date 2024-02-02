<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\posts;
use Illuminate\Http\Request;
use Exception;

class PostsController extends Controller
{

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $postsObjects = posts::paginate(25);

        return view('posts.index', compact('postsObjects'));
    }

    /**
     * Show the form for creating a new posts.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('posts.create');
    }

    /**
     * Store a new posts in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $data = $this->getData($request);
        
        posts::create($data);

        return redirect()->route('posts.posts.index')
            ->with('success_message', 'Posts was successfully added.');
    }

    /**
     * Display the specified posts.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $posts = posts::findOrFail($id);

        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified posts.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $posts = posts::findOrFail($id);
        

        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified posts in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $data = $this->getData($request);
        
        $posts = posts::findOrFail($id);
        $posts->update($data);

        return redirect()->route('posts.posts.index')
            ->with('success_message', 'Posts was successfully updated.');  
    }

    /**
     * Remove the specified posts from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $posts = posts::findOrFail($id);
            $posts->delete();

            return redirect()->route('posts.posts.index')
                ->with('success_message', 'Posts was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'content' => 'required|string|min:1|max:4294967295',
            'published_at' => 'nullable|date_format:j/n/Y g:i A',
            'title' => 'required|string|min:1|max:400', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
