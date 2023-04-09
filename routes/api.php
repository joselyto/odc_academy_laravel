<?php

use App\Models\User;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategorieResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/categories', function(Request $request){
    $categorie = Categorie::create([
        'name'=>$request->name,
        'description'=>$request->description
    ]);
    
    $categorie = new CategorieResource($categorie);
    return response()->json($categorie);
});
Route::put('/categories/{id}', function(Request $request, $id) {
    $requete = Categorie::find($id)->update([
        'name'=>$request->name,
        'description'=>$request->description
    ]);
    if($requete)
    {
        $result = Categorie::find($id);
        $categorie = new CategorieResource($result);
        return response()->json($categorie);
    }
    else {
        return response()->json(['message'=>'modification echouée']);
    }
});
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    $user = User::where('email', $request->email)->first();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message'=>'Email ou mot de passe incorrect']);
    }
    $token = $user->createToken($request->email)->plainTextToken;
    return response()->json(['data'=>$user, 'token'=>$token]);
});
Route::get('/cat', function(){
    $categories = CategorieResource::collection(Categorie::all());
    
    return response()->json($categories);
});
Route::get('/cat/{id}', function($id){
    $categories = new CategorieResource(Categorie::find($id));
    
    return response()->json($categories);
});

Route::get('/articles', function(){
    $articles = ArticleResource::collection(Article::all());
    
    return response()->json($articles);
});