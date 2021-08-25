<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use Storage;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(9);

        return view('items.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item;

        return view('items.create', [
            'item' => $item,
        ]);
        
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'bland' => 'required|max:100',
            'type' => 'nullable|max:100',
            'area' => 'nullable|max:100',
            'alcohol_content' => 'nullable|max:100',
            'distillery' => 'nullable|max:100',
            'memo' => 'nullable|max:500',
            'image' => 'required|file|image|mimes:jpeg,png',
        ]);
        
        $item = new Item;
        
        $item->bland = $request->bland;
        $item->type = $request->type;
        $item->area = $request->area;
        $item->alcohol_content = $request->alcohol_content;
        $item->distillery = $request->distillery;
        $item->memo = $request->memo;
        
        $item->user_id = $request->user()->id;
        
        if ($request->hasfile('image')) {
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('test', $image, 'public');
        $item->image = $path;
        $item->image = Storage::disk('s3')->url($path);
        $item->save();
        return redirect('/');
        
        } else{
            return redirect('/items/create');
        }

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        
        return view('items.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);

        if (\Auth::id() === $item->user_id) {
            return view('items.edit', [
            'item' => $item,
        ]);
        } else {
            return back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bland' => 'required|max:100',
            'type' => 'nullable|max:100',
            'area' => 'nullable|max:100',
            'alcohol_content' => 'nullable|max:100',
            'distillery' => 'nullable|max:100',
            'memo' => 'nullable|max:500',
            'image' => 'file|image|mimes:jpeg,png',
        ]);
        
        $item = Item::findOrFail($id);
        
        $item->bland = $request->bland;
        $item->type = $request->type;
        $item->area = $request->area;
        $item->alcohol_content = $request->alcohol_content;
        $item->distillery = $request->distillery;
        $item->memo = $request->memo;
        
        $item->user_id = $request->user()->id;
        
         if ($request->hasfile('image')) {
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('test', $image, 'public');
        $item->image = Storage::disk('s3')->url($path);
        
        }
        $item->save();
        return redirect('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        
        if (\Auth::id() === $item->user_id) {
            $item->delete();
        }

        return redirect('/');
    }
    
}
