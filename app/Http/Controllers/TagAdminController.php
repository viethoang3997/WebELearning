<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

class TagAdminController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(config('variable.paginate'));
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create([
            'name' => $request->name,
        ]);
        return redirect('admin/tags')->with('message', __('messages.success.add'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tags = Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tags'));
    }

    public function update(TagRequest $request, $id)
    {
        $data = $request->all();
        $tags = Tag::find($id);
        $tags->update($data);
        return redirect('admin/tags')->with('message', __('messages.success.edit'));
    }

    public function destroy($id)
    {
        $tags = Tag::findOrFail($id)->delete();
        return redirect('admin/tags');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $tags = Tag::where('name', 'like', '%' . $search . '%')->paginate(config('variable.paginateLesson'));
        return view('admin.tags.index', compact(['search', 'tags']));
    }
}
