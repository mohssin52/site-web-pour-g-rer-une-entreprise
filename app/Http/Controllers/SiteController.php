<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post,App\Service,App\Slide,App\Page,App\Message;

use function Doctrine\Common\Cache\Psr6\get;

class SiteController extends Controller
{
    
public function index(){
   $slide = Slide::orderBy('created_at','desc')->take(3)->get();
   $services = Service::take(3)->get(); 
   $post = Post::take(4)->get(); 
 return view('site.accueil',['slides' =>$slide ,'service' =>$services,'post'=>$post]);
}
public function services(){
   $services = Service::all();
   return view('site.services',['services'=>$services]) ;
}

public function service($id){
   $service = Service::find($id);
   return view('site.service',['service'=>$service]);
}
public function blog(){
   $categorier = Category::all(); 
    $posts = Post::paginate(4);
   return view('site.blog',['posts' => $posts,'category' =>$categorier]);
}

public function about(){
   $page = Page::where('slug','hello-world')->first();
   return  view('site.about', ['page'=>$page]);
}
public function contact(){
  return view('site.Contact')  ;
}
//pour sauvegarder un nouveau meesage
public function storeContact( Request $request){
  $data= $request->validate([

   'name'   =>'required',
   'email'  =>'required|email',
   'message'=>'required|min:5|max:300'
]);

$message  =  new Message();
$message->name = $data['name'];
$message->email = $data['email'];
$message->message = $data['message'];
$message->save();
 return redirect('/Contact')->with('status', "salut $message->name votre demmande sera traité dans quelque instant");
}
public function show($slug){

   $post = Post::where('slug',$slug)->first();
   return view('site.show',['post' => $post]);
 }
 public function getPostForCategory($slug){

    $categor = Category::where('slug',$slug)->first();
   
    $posts = $categor->posts()->paginate(4);

    $categorier = Category::all(); 

  return view('site.blog',['posts' => $posts,'category' =>$categorier]);
 }

}
