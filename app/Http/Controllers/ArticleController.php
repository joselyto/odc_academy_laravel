<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::orderBy('id', 'desc')->paginate(5);
        return view('articles.index', compact('articles'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'content'=>'required',
            'categorie'=>'required',
          
        ]);

        if($request->hasFile('pic')){
            $nameFile = date('Ymdhis').'.'.$request->pic->extension();
            $pic = $request->pic->storeAs('articles', $nameFile,'public');
        }else{
            $pic=null;
        }

        Article::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'content'=>$request->content,
            'categorie_id'=>$request->categorie,
            'pic'=>$pic
        ]);

        return redirect()->route('articles.create')->with('success', "l'article est enregister avec success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.single', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Categorie::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {   
        //
        
        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'content'=>'required',
            'categorie'=>'required',
        ]);
   
        Article::find($article->id)->update([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'content'=>$request->content,
            'categorie_id'=>$request->categorie,
        ]);

        return redirect()->route('articles.index')->with('success', "l'article modifier avec success");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success1', "Suppression effectuer");
    }
}
