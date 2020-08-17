<?php

namespace App\Http\Controllers;

use App\User;
use App\Friend;
use Image;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $user->year = $request->input('year');
        $user->study_field = $request->input('study_field');
        $user->bio = $request->input('bio');

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
        } else {

            return back()->withErrors('Oei, je email of wachtwoord lijkt fout te zijn. Probeer opnieuw!');
        }
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

    public function filter(Request $request)
    {
        // Logic for searching people
        $music = $request->get('music');
        $series = $request->get('series');
        $gaming = $request->get('gaming');
        $books = $request->get('books');
        $travel = $request->get('travel');
        $year = $request->get('year');
        $study_field = $request->get('study_field');

        $user = \App\User::where('music', 'LIKE', '%' . $music . '%')->orWhere('series', 'LIKE', '%' . $series . '%')->orWhere('gaming', 'LIKE', '%' . $gaming . '%')->orWhere('books', 'LIKE', '%' . $books . '%')->orWhere('travel', 'LIKE', '%' . $travel . '%')->orWhere('year', 'LIKE', '%' . $year . '%')->orWhere('study_field', 'LIKE', '%' . $study_field . '%')->get();

        $data = [$music, $series, $gaming, $books, $travel, $year, $study_field];

        if (count($user) > 0) {
            return view('filter')->withDetails($user)->withQuery($data);
        } else {
            $request->session()->flash('message', 'Geen studenten gevonden. Probeer opnieuw!');
            return view('filter');
        }
    }

    public function suggestions(Request $request)
    {
        $buddy = \Auth::user()->buddy;

        $user = \DB::table('users')->where('id', '!=', session('uid'))->where('buddy', '!=', $buddy)->inRandomOrder()->get();

        if (count($user) > 0) {
            return view('suggestions')->withDetails($user);
        } else {
            $request->session()->flash('message', 'Geen studenten gevonden. Probeer opnieuw!');
            return view('suggestions');
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
            $data['users'] = \DB::table('users')->where('id', '!=', session('uid'))->inRandomOrder()->get();
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
        $user->password = $request->input('password');

        $user->save();

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
        if (\Auth::check()) {
            // Check if the user is friend or not
            $user_id = \Auth::user()->id;
            $friend_id = \App\User::getUserid($id);
            $friendCount = \App\Friend::where(['user_id' => $user_id, 'friend_id' => $friend_id])->count();

            if ($friendCount > 0) {
                $friendDetails = \App\Friend::where(['user_id' => $user_id, 'friend_id' => $friend_id])->first();
                // echo $friendDetails->accepted;
                // die;
                if ($friendDetails->accepted == 1) {
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
        if ($id != \Auth::user()->id) {
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

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatars/' . $filename));

            $user->profile_picture = $filename;
        }

        $user->name = $request->get('firstName');
        $user->name = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->year = $request->input('year');
        $user->location = $request->input('location');
        $user->year = $request->input('year');
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

    public function updateTags(Request $request, $id)
    {
        $user = \App\User::find($id);

        $user->study_field = $request->input('study_field');
        $user->music = $request->input('music');
        $user->hobbies = $request->input('hobbies');
        $user->series = $request->input('series');
        $user->gaming = $request->input('gaming');
        $user->books = $request->input('books');
        $user->travel = $request->input('travel');

        if ($user->save()) {
            $request->session()->flash('message-success', 'Wijzigingen opgeslagen!');
        } else {
            $request->session()->flash('message-error', 'Oeps, hier ging iets fout!');
        }

        return back();
    }

    public function updatePassword(Request $request, $id)
    {

        $validate = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|required_with:passwordConfirmation|same:passwordConfirmation',
            'passwordConfirmation' => 'required',
        ]);

        $user = \App\User::find($id);

        if ($user) {
            if (\Hash::check($request['oldPassword'], $user->password)) {
                $user->password = \Hash::make($request->input('newPasword'));

                $user->save();
                $request->session()->flash('message-success', 'Wijzigingen opgeslagen!');
                return back();
            } else {
                $request->session()->flash('message-error', 'Je wachtwoorden komen niet overeen!');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = \Auth::user();

        $user->delete();
        return redirect('/user/login');
    }

    public function addFriend($userid)
    {
        $userCount = \App\User::where('id', $userid)->count();

        if ($userCount > 0) {
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

    public function removeFriend($userid)
    {
        $userCount = \App\User::where('id', $userid)->count();

        if ($userCount > 0) {
            $user_id = \Auth::user()->id;
            $friend_id = \App\User::getUserid($userid);

            \App\Friend::where(['user_id' => $user_id, 'friend_id' => $friend_id])->delete();
            return redirect()->back();
        } else {
            abort(404);
        }
    }

    public function friendsRequests()
    {
        $user_id = \Auth::user()->id;
        $friendsRequests = \App\Friend::where(['friend_id' => $user_id, 'accepted' => 0])->get();

        return view('requests')->with(compact('friendsRequests'));
    }

    public function acceptRequest($sender_id)
    {
        $receiver_id = \Auth::user()->id;

        \App\Friend::where(['user_id' => $sender_id, 'friend_id' => $receiver_id])->update(['accepted' => 1]);
        return redirect()->back()->with('message-success', 'Verzoek geaccepteerd!');
    }

    public function cancelRequest($sender_id)
    {
        $receiver_id = \Auth::user()->id;

        \App\Friend::where(['user_id' => $sender_id, 'friend_id' => $receiver_id])->delete();
        return redirect()->back()->with('message-error', 'Verzoek geweigerd!');
    }

    public function showBuddies()
    {
        $user_id = \Auth::user()->id;
        $friendsCount = \App\Friend::where(['friend_id' => $user_id, 'accepted' => 1])->count();

        if ($friendsCount > 0) {
            $friends = \App\Friend::where(['friend_id' => $user_id, 'accepted' => 1])->get();
        } else {
            $friends = \App\Friend::where(['user_id' => $user_id, 'accepted' => 1])->get();
        }

        return view('buddies')->with(compact('friends', 'friendsCount'));
    }
}
