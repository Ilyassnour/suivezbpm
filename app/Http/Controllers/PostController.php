<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Exports\ComptesExport;
use App\Imports\Comptesimport;
use Excel;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::where('ccl', Auth::user()->name)->latest()->paginate(7);
        return view('index',compact('posts'));
        
        
    }
    public function index2()
    {
        $posts=Post::where('etat', Liee)->get();
        return view('index2')->with('posts',$posts);
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

      //$input= postes::where('cif','=',$input['cif'])->exist();

     //  if($b_existe){

      ///session()->falsh('error','compte existe');
      //return redirect("/homme");
   
      $validatedData = $request->validate([
        'cif' => 'required|unique:posts|max:255',
    ],[

        'cif.required' =>'',
        'nom.unique' =>'',


    ]);

    




        if($request->hasFile("cover")){
            $file=$request->file("cover");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);
            
            $post =new Post([
                "cif" =>$request->cif,
                "nom" =>$request->nom,
                "nutelephone" =>$request->nutelephone,
                "adhesion" =>$request->adhesion,
                "ccl" =>(Auth::user()->name),
                "etat" =>$request->etat,
                "cover" =>$imageName,
            ]);
            
           $post->save();
          // session()->falsh('Add','compte bien');
        

            if($request->hasFile("images")){
                $files=$request->file("images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['post_id']=$post->id;
                    $request['image']=$imageName;
                    $file->move(\public_path("/images"),$imageName);
                    Image::create($request->all());

                }
            }
          //  session()->falsh('Add','compte bien');
          session()->flash('Add', 'Bien ajoute');
        
            return redirect("/homme");
      
        }
    }


   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('show', [
            'posts' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $posts=Post::findOrFail($id);
        return view('edit',compact('posts'))->with('posts',$posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
     $post=Post::findOrFail($id);
     if($request->hasFile("cover")){
         if (File::exists("cover/".$post->cover)) {
             File::delete("cover/".$post->cover);
         }
         $file=$request->file("cover");
         $post->cover=time()."_".$file->getClientOriginalName();
         $file->move(\public_path("/cover"),$post->cover);
         $request['cover']=$post->cover;
     }

        $post->update([
            "cif" =>$request->cif,
                "nom" =>$request->nom,
                "nutelephone" =>$request->nutelephone,
                "adhesion" =>$request->adhesion,
                "ccl" =>(Auth::user()->name),
                "etat" =>$request->etat,
            "cover"=>$post->cover,
        ]);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request["post_id"]=$id;
                $request["image"]=$imageName;
                $file->move(\public_path("images"),$imageName);
                Image::create($request->all());

            }
        }
        session()->flash('edit','Bien edit');
        return redirect("/homme");
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    
   
    public function destroy($id)
    {
         $posts=Post::findOrFail($id);

         if (File::exists("cover/".$posts->cover)) {
             File::delete("cover/".$posts->cover);
         }
         $images=Image::where("post_id",$posts->id)->get();
         foreach($images as $image){
         if (File::exists("images/".$image->image)) {
            File::delete("images/".$image->image);
        }
         }
         $posts->delete();
         return back();


    }

    public function deleteimage($id){
        $images=Image::findOrFail($id);
        if (File::exists("images/".$images->image)) {
           File::delete("images/".$images->image);
       }

       Image::find($id)->delete();
       return back();
   }

   public function deletecover($id){
    $cover=Post::findOrFail($id)->cover;
    if (File::exists("cover/".$cover)) {
       File::delete("cover/".$cover);
   }
   return back();
}

public function liee()
    {
       
        $liee = DB::table('posts')
        ->where('etat','Liee')
        ->where('ccl', Auth::user()->name)->latest()->paginate(7);
                                return view('liee')->with('posts',$liee);
                               // $posts=Post::latest()->paginate(7);
                                //return view('index',compact('posts'));
                                
                                
    }


    public function nonliee()
    {
       
        $nonliee =DB::table('posts')
        ->where('etat','Non liee')
        ->where('ccl', Auth::user()->name)->latest()->paginate(7);
                                return view('nonliee')->with('posts',$nonliee);
    }

    
public function incomplet()
{
   
    $incomplet=DB::table('posts')
    ->where('etat','Inscription incomplet')
    ->where('ccl', Auth::user()->name)->latest()->paginate(7);
                            return view('incomplet')->with('posts',$incomplet);
}





public function search()
    {
        $q =request()-input('q');
        
        $posts = Post::where('nom', 'like', '%' . $q . '%')
                                ->orWhere('cif', 'like', '%' . $q . '%')->get();
                                return view('reach')->with('posts',$posts);
    }







    public function export() 
    {
        
        return \Excel::download(new ComptesExport, 'Comptes.xlsx');
    
    }

    public function import(Request $request)
    {

        $path = $request->file('mcafile')->getRealPath();
        $data = \Excel::import(new Comptesimport,$path);
        
        Excel::import(new Comptesimport, $request->file);
        return "Records are imported";
        
       // return redirect('/')->with('success', 'All good!');
    }


}











