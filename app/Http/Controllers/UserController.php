<?php

namespace App\Http\Controllers;

use App\User;
use App\Friend;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function register()
    {
        return view('users/register');
    }

    public function handleRegister(Request $request)
    {
        $user = new \App\User();
        $user->name = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $fields = $request->input('inlineRadioOptions');
        if ($fields == 'buddy') {
            $user->buddy = "Buddy";
        } else {
            $user->buddy = "Searcher";
        }
        $user->bio = $request->input('bio');
        $user->profile_picture = "https://images.unsplash.com/photo-1586162258051-1c33862abf57?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80";
        $user->password = \Hash::make($request->input('password'));
        $user->save();

        $data['user'] = \App\User::find($user->id)->where('id', $user->id)->first();
        $name = $data['user']->name;

        $request->session()->put('name', $name);

        return redirect('/user/login');
    }

    public function login()
    {
        return view('users/login');
    }

    public function handleLogin(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (\Auth::attempt($credentials)) {
            $user = auth()->user();

            $data['user'] = \App\User::find($user->id)->where('id', $user->id)->first();

            $name = $data['user']->name;
            $uid = $data['user']->id;

            $request->session()->put('name', $name);
            $request->session()->put('uid', $uid);
            /**
             * ->with is the same as flash
             * return redirect('/')->with('name', $name);
             *  */

            return redirect('/');
        };

        return redirect()->route('login')->withErrors('Your email or password was incorrect!');;
    }

    public function logout()
    {
        \Auth::logout();
        \Session::flush();

        return redirect('user/login');
    }

    public function search(Request $request)
    {
        // Logic for searching people
        $q = $request->get('search');
        $user = \App\User::where('name', 'LIKE', '%' . $q . '%')->orWhere('lastName', 'LIKE', '%' . $q . '%')->get();

        if (count($user) > 0) {
            return view('search')->withDetails($user)->withQuery($q);
        } else {
            $request->session()->flash('message', 'Geen studenten gevonden. Probeer opnieuw!');
            return view('search');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('uid') == true) {
            $data['users'] = \DB::table('users')->where('id', '!=', session('uid'))->get();
            return view('students/index', $data);
        } else {
            return redirect('/user/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'firstName' => 'required|max:200',
            'lastName' => 'required|max:200',
            'email' => 'required',
        ]);

        $request->flash();

        $user = new \App\User();
        $user->name = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->year = $request->input('year');
        $user->location = $request->input('location');
        $user->study_field = $request->input('study_field');
        $user->year = $request->input('year');
        $user->music = $request->input('music');
        $user->hobbies = $request->input('hobbies');
        $user->series = $request->input('series');
        $user->gaming = $request->input('gaming');
        $user->books = $request->input('books');
        $user->travel = $request->input('travel');
        $fields = $request->input('inlineRadioOptions');
        if ($fields == 'buddy') {
            $user->buddy = "Buddy";
        } else {
            $user->buddy = "Searcher";
        }
        $user->bio = $request->input('bio');
        $user->profile_picture = "https://images.unsplash.com/photo-1586162258051-1c33862abf57?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80";
        $user->password = $request->input('password');

        $user->save();

        /**
         * Message will be displayed all the time
         * $request->session()->put('message', 'Permament message');
         * 
         * Message will be removed
         * $request->session()->pull('message', 'Permament message');
         */

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ( \Auth::check()){
            // Check if the user is friend or not
            $user_id = \Auth::user()->id;
            $friend_id = \App\User::getUserid($id);
            $friendCount = \App\Friend::where(['user_id'=>$user_id, 'friend_id'=>$friend_id])->count();

            if ($friendCount > 0) {
                $friendDetails = \App\Friend::where(['user_id'=>$user_id, 'friend_id'=>$friend_id])->first();
                // echo $friendDetails->accepted;
                // die;
                if ( $friendDetails->accepted == 1) {
                    echo "Friends";
                    $friendRequest = "Verwijder";
                } else {
                    echo "Request send";
                    $friendRequest = "Verzoek verzonden";
                }
            } else {
                echo "Send request";
                $friendRequest = 'Voeg toe';
            }
        } else {
            $friendRequest = "";
        }

        // $data['user'] = \App\User::where('id', $id)->with('friends')->first();
        $data['user'] = \App\User::where('id', $id)->first();
        return view('students/show', $data)->with(compact('friendRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id != session('uid')) {
            return redirect('/');
        } else {
            $data['user'] = \App\User::where('id', $id)->first();
            return view('students/edit', $data);
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
        $user = \App\User::find($id);
        $user->name = $request->get('firstName');
        $user->name = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->year = $request->input('year');
        $user->location = $request->input('location');
        $user->study_field = $request->input('study_field');
        $user->year = $request->input('year');
        $user->music = $request->input('music');
        $user->hobbies = $request->input('hobbies');
        $user->series = $request->input('series');
        $user->gaming = $request->input('gaming');
        $user->books = $request->input('books');
        $user->travel = $request->input('travel');
        $fields = $request->input('inlineRadioOptions');
        if ($fields == 'buddy') {
            $user->buddy = "Buddy";
        } else {
            $user->buddy = "Searcher";
        }
        $user->bio = $request->input('bio');

        if ($user->save()) {
            $request->session()->flash('message-success', 'Wijzigingen opgeslagen!');
        } else {
            $request->session()->flash('message-error', 'Oeps, hier ging iets fout!');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $user = \Auth::user();
        $user = \App\User::find($request->user_id);

        $user->delete();
        $request->session()->flash('message', 'Student has been deleted');
        return redirect('/');
    }

    public function addFriend($userid) {
        $userCount = \App\User::where('id', $userid)->count();

        if ( $userCount > 0 ) {
            $user_id = \Auth::user()->id;
            $friend_id = \App\User::getUserid($userid);

            $friend = new \App\Friend;
            $friend->user_id = $user_id;
            $friend->friend_id = $friend_id;
            $friend->save();
            return redirect()->back();
        } else {
            abort(404);
        }
    }

    public function removeFriend($userid) {
        $userCount = \App\User::where('id', $userid)->count();

        if ( $userCount > 0 ) {
            $user_id = \Auth::user()->id;
            $friend_id = \App\User::getUserid($userid);

            \App\Friend::where(['user_id'=>$user_id, 'friend_id'=>$friend_id])->delete();
            return redirect()->back();
        } else {
            abort(404);
        }
    }

    public function friendsRequests() {
        $user_id = \Auth::user()->id;
        $friendsRequests = \App\Friend::where('friend_id', $user_id)->where('accepted', '==', 0)->get();

        return view('requests')->with(compact('friendsRequests'));
    }

    public function acceptRequest($sender_id) {
        $receiver_id = \Auth::user()->id;

        \App\Friend::where(['user_id'=>$sender_id, 'friend_id'=>$receiver_id])->update(['accepted' => 1]);
        return redirect()->back()->with('message-success', 'Verzoek geaccepteerd!');
    }
}
