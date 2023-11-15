<?php

namespace App\Http\Controllers;

use App\Models\Collabo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Email;

class CollaboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $ls_collabo = Collabo::where('id_boutique', $_SESSION['boutique_marchand'])->get();
        return response()->json(['ls_collabo' => $ls_collabo, 'marchand'=> $user]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function notifierCollabo(User $user)
    // {
    //     if (!Auth::user()->isCollabs($user->email)) {
    //         // Create a new follow instance for the authenticated user
    //         Auth::user()->follows()->create([
    //             'target_id' => $user->id,
    //         ]);

    //         return back()->with('success', 'You are now friends with '. $user->name);
    //     }
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lastThreeInvite()
    {
        // $dogs = Dogs::orderBy('id', 'desc')->take(5)->get();->count();
        $user = Auth::user();
        $ls_collabo = Collabo::where('mail_sender', $user->email)
                             ->where('role_collabo','=','Invitation envoyée')
                              ->orderBy('id', 'desc')->get();
        $compte = Collabo::where('mail_sender', $user->email)
                           ->where('role_collabo','=','Invitation envoyée')->count();
        return response()->json(['ls_three_collabo' => $ls_collabo, 'compte_collabo'=> $compte]);
    }

    public function collablist(){
        $user = Auth::user();
        $collist = Collabo::where('mail_sender',$user->email)
                       ->where('role_collabo' ,'!=', 'Invitation envoyée')->get();

        return $collist;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collaboForChangerRole()
    {
        $user = Auth::user();
        $ls_collabo = DB::table('collabos')
                        ->join('users', 'collabos.id_utilisateur', 'users.id')
                        ->where('mail_sender', $user->email)
                        ->whereIn('role_collabo', ["Gérant de la boutique", "Éditeur", "Démarcheur","Membre simple"])
                        ->get();
        return response()->json(['ls_collabo' => $ls_collabo, 'marchand'=> $user]);
    }

    public function changerpro(Request $request){
            $user = Auth::user();

            $iduser = Auth::user()->id;
            $pass = DB::table('users')
                    ->where('id', $iduser)
                    ->select('users.password')->get();

                
            if (Hash::check($request->pswcr, $pass[0]->password)) {
            
                  
               $userinf = DB::table('users')
                     ->join('collabos', 'collabos.id_utilisateur','=','users.id')
                     ->select('users.id','users.nom','users.prenom')
                     ->where('users.email', $request->bjr)
                     ->get();
                 
              $userinf2 = DB::table('users')
                     ->where('users.email',$request->bjr)
                     ->update(['role'=>$user->role]);
               
              
              $rl_btk =DB::table('marchands')
                    ->where('marchands.id_utilisateur', $user->id)
                    ->update(['id_utilisateur'=>$userinf[0]->id,'nom'=>$userinf[0]->nom,'prenom'=>$userinf[0]->prenom]);

                    $del = DB::table('collabos')
                    ->where('collabos.mail_collabo',$request->bjr)
                    ->select('collabos.id')
                    ->get();
  
              $dele = DB::table('collabos')
                    -> where('collabos.id', $del[0]->id)
                    ->delete();


              $user = DB::table('users')
                   ->where('users.id',$user->id)
                   ->update(['role'=>6]);

                   Auth::logout();

            return  "Good";
            }
            
            
            else{
                $user = DB::table('users')
                   ->where('marchands.id_utilisateur',$user->id)
                   ->update(['role'=>2]);
                return "Mot de passe incorrect";
            }
           
          
        
           
           
               
            
        
            // {
                
        
        
          

                    
                    

        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $byId = Collabo::find( $id);
        return response()->json($byId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collabo  $collabo
     * @return \Illuminate\Http\Response
     */
    public function edit(Collabo $collabo)
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
    public function update(Request $request, $id)
    {
        $updateCollabo = Collabo::where('id', $id)->update(['statut_collabo' => "Désactivé"]);
        // var_dump("Le collabo : ",$updateCollabo);
        return response()->json($updateCollabo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRole(Request $request, $id)
    {
        $updateCollabo = Collabo::where('id', $id)->update(['role_collabo' => $request->changer_role_collabo]);
        return response()->json($updateCollabo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collabo  $collabo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collabo $collabo)
    {
        //
    }
}
