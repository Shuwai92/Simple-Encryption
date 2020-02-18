<?php

namespace App\Http\Controllers;
use App\User; // 
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function index()
    {
 
        $users = User::all();
        // return view('users.index', compact('users'));
        // $a1 = User::all()->toArray();

        // $a2 = $a1->rand_key;
        // $a3 = $a1->encr_text;
        // $b = $this->decrypt_string($a2,$a3);

        // $users = array_merge($a1,$b);

        return view('users.index', compact('users'));
    }
    //
    public function create(){
    
        return view('users.create');
    }


/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
 
//public function store(Request $request){

//     $user = new User([
//         'ori_text' => $request->get('ori_text'),
//         'rand_key'=> $request->get('rand_key'),
//         'encr_text' => $request->get('encr_text'),
        
//     ]);

//     $user->save();

//     return redirect('/users')->with('success', 'Success!');
// }
    
// }
public function store(Request $request)
    {
        //
        $key = random_int(1, 9);

        $input = $request->get('ori_text');
        $randkey = $this->unique_key($key);
        $encrypted = $this->encrypt_string($input, $key);

    
        $decrypted = $this->decrypt_string($encrypted, $key);
        $user = new User([
            'rand_key' => $randkey,
            'encr_text' => $encrypted,
            'decr_text' => $decrypted
        ]);

        $user->save();
        return redirect('/users')->with('success', 'Success!');
    }
    public function encrypt_string($input, $randkey)
    {

        $from = $to = "";
        $sequences = array("ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz");

        foreach ($sequences as $seq) {
            $d = $randkey % strlen($seq);
            $from .= $seq;
            $to .= substr($seq, $d) . substr($seq, 0, $d);
        }

        $shifted = strtr($input, $from, $to);
        return $shifted;
    }


    public function decrypt_string($input, $randkey)
    {

        $to = $from = "";
        $sequences = array("ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz");

        foreach ($sequences as $seq) {
            $d = $randkey % strlen($seq);
            $from .= $seq;
            $to .= substr($seq, $d) . substr($seq, 0, $d);
        }

        $shifted = strtr($input, $to, $from);
        return $shifted;
    }

    function unique_key($randkey)
    {
        $d = User::where('rand_key',$randkey)->first();

        if($d){
           return false;
        }

        return random_int(1,9);
    }
}