<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BooksCollectionModel;
use Illuminate\Support\Facades\Storage;
use Str;
class BooksCollectionController extends Controller
{
    public function bookCollection_list()
    {
        $data['getRecords'] = BooksCollectionModel::getRecordsImage();
        return view('backend/liby/booksCollection/bookCollection_list',$data);
    }

    public function bookCollection_add()
    {
        return view('backend/liby/booksCollection/bookCollection_add');
    }
    public function bookCollection_insert(Request $request)
    {

        $save = new BooksCollectionModel;
        $save->title = trim($request->title);
        $save->nobooks = trim($request->nobooks);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = BooksCollectionModel::where('slug','=', $slug)->first();

        if(!empty($checkSlug))
        {
            $bdslug = Str::slug($request->title).'-'.$save->id;
        }
        else
        {
            $bdslug = $slug;
        }
        $save->slug = $bdslug;
        $save->save();
        return redirect('bookCollection_list')->with('success','Book uploaded successfully');
    }
    public function bookCollection_edit($id)
    {
        $data['getRecord'] = BooksCollectionModel::getSingle($id);
        return view('backend/liby/booksCollection/bookCollection_edit',$data);
    }

    public function bookCollection_update($id, Request $request)
    {
        $save = BooksCollectionModel::getSingle($id);
        $save->title = trim($request->title);
        $save->nobooks = trim($request->nobooks);
        $save->save();

        return redirect('bookCollection_list')->with('success','Book updated successfully');
    }
    public function bookCollection_delete($id)
    {
        $save = BooksCollectionModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','book deleted successfully');
    }
}
