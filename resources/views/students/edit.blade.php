@extends('layouts.index')

@component('components/nav')
@endcomponent

@section('content')
<div class="container-fluid">
  @if($flash = session('message-success'))
  @component('components/alert')
  @slot('type', 'success')
  {{ $flash }}
  @endcomponent
  @elseif ($flash = session('message-error'))
  @component('components/alert')
  @slot('type', 'danger')
  {{ $flash }}
  @endcomponent
  @endif
  <h1>{{ $user->name }} {{ $user->lastName }}</h1>
  <hr>
  <div class="row">
    <div class="edit-side col-lg-2">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="tabs nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
          aria-controls="v-pills-home" aria-selected="true">Account informatie</a>
        <a class="tabs nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
          aria-controls="v-pills-profile" aria-selected="false">Interesses</a>
        <a class="tabs nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab"
          aria-controls="v-pills-password" aria-selected="false">Wachtwoord</a>
      </div>
    </div>

    <div class="tab-content col-lg-10" id="v-pills-tabContent">
      <!-- edit form column -->
      <div class="col-lg-7 personal-info tab-pane fade show active" id="v-pills-home" role="tabpanel"
        aria-labelledby="v-pills-home-tab">
        <h3>Persoonlijke informatie</h3>

        <form role="form" method="post" action="/users/update/{{$user->id}}" enctype="multipart/form-data">
          {{method_field('patch')}}
          {{ csrf_field() }}

          <!-- left column -->
          <div class="form-group pt-1">
            <div class="col-md-9">
              <div class="text-center">
                <img src="/uploads/avatars/{{ $user->profile_picture }}" class="avatar rounded-circle" alt="avatar"
                  id="avatar" name="avatar" width="150" height="150">
                <h6>Kies een andere profielfoto...</h6>

                <input type="file" class="form-control" name="avatar" id="avatar">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-7 control-label">Voornaam:</label>
            <div class="col-lg-10">
              <input class="form-control" type="text" value="{{ $user->name }}" name="firstName" id="firstName">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-7 control-label">Achternaam:</label>
            <div class="col-lg-10">
              <input class="form-control" type="text" value="{{ $user->lastName }}" name="lastName" id="lastName">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-7 control-label">Email:</label>
            <div class="col-lg-10">
              <input class="form-control" type="text" value="{{ $user->email }}" name="email" id="email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Woonplaats:</label>
            <div class="col-lg-10">
              <input class="form-control" type="text" value="{{ $user->location }}" name="location" id="location">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-7 control-label">Studie jaar:</label>
            <div class="col-lg-10">
              <select name="year" id="year" class="form-control dropdown-toggle" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">
                <option>{{ $user->year }}</option>
                <option>1IMD</option>
                <option>2IMD</option>
                <option>3IMD</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="buddy">
              <label class="form-check-label" for="inlineRadio1">Help een buddy</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="searcher">
              <label class="form-check-label" for="inlineRadio2">Zoek een buddy</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-7 control-label">Korte omschrijving:</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="8" id="bio" name="bio">{{ $user->bio }}</textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="submit" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>

      <div class="col-lg-5 personal-info tab-pane fade" id="v-pills-profile" role="tabpanel"
        aria-labelledby="v-pills-profile-tab">
        <form role="form" method="post" action="/users/update-tags/{{$user->id}}" enctype="multipart/form-data">
          {{method_field('patch')}}
          {{ csrf_field() }}
          <h3>Interesses</h3>
          <div class="form-group">
            <label class="col-lg-7 control-label">Keuzerichting:</label>
            <div class="col-lg-10">
              <select name="study_field" class="form-control dropdown-toggle" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">
                <option>{{ $user->study_field }}</option>
                <option>Design</option>
                <option>Development</option>
                <option>UX</option>
                <option>UI</option>
              </select>
            </div>
          </div>
          {{-- <div class="form-group">
        <label class="col-lg-7 control-label">Films:</label>
        <div class="col-lg-10">
          <select name="movies" class="form-control dropdown-toggle" type="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="true">
            <option>{{ $user->movies }}</option>
          <option>Design</option>
          <option>Development</option>
          <option>UX</option>
          <option>UI</option>
          </select>
      </div>
    </div> --}}
    <div class="form-group">
      <label class="col-lg-7 control-label">Muziek:</label>
      <div class="col-lg-10">
        <select name="music" class="form-control dropdown-toggle" type="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
          <option>{{ $user->music }}</option>
          <option>Electro</option>
          <option>Rock</option>
          <option>Jazz</option>
          <option>Dubstep</option>
          <option>Blues</option>
          <option>Techno</option>
          <option>Country</option>
          <option>Indie</option>
          <option>Pop</option>
          <option>Metal</option>
          <option>Andere</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-7 control-label">Boeken:</label>
      <div class="col-lg-10">
        <select name="books" class="form-control dropdown-toggle" type="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
          <option>{{ $user->books }}</option>
          <option>Actie</option>
          <option>Avontuur</option>
          <option>Komedie</option>
          <option>Comics</option>
          <option>Detective</option>
          <option>Drama</option>
          <option>Graphic novels</option>
          <option>Horror</option>
          <option>Romantiek</option>
          <option>Thriller</option>
          <option>Andere</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-7 control-label">Games:</label>
      <div class="col-lg-10">
        <select name="gaming" class="form-control dropdown-toggle" type="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
          <option>{{ $user->gaming }}</option>
          <option>Actie</option>
          <option>Avontuur</option>
          <option>Komedie</option>
          <option>First person</option>
          <option>Horror</option>
          <option>Party</option>
          <option>Puzzle</option>
          <option>Racing</option>
          <option>Sport</option>
          <option>Strategie</option>
          <option>Shooter</option>
          <option>Andere</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-7 control-label">Series:</label>
      <div class="col-lg-10">
        <select name="series" class="form-control dropdown-toggle" type="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
          <option>{{ $user->series }}</option>
          <option>Internationaal</option>
          <option>Nationaal</option>
          <option>Nieuws</option>
          <option>Quiz</option>
          <option>Sport</option>
          <option>Andere</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-7 control-label">Reizen:</label>
      <div class="col-lg-10">
        <select name="travel" class="form-control dropdown-toggle" type="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
          <option>{{ $user->travel }}</option>
          <option>Noord-Amerika</option>
          <option>Zuid-Amerika</option>
          <option>Europa</option>
          <option>Afrika</option>
          <option>Azië</option>
          <option>Australië</option>
          <option>Antartica</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-6 control-label"></label>
      <div class="col-md-10">
        <input type="submit" class="btn btn-primary" value="Save Changes">
        <span></span>
        <input type="submit" class="btn btn-default" value="Cancel">
      </div>
    </div>
    </form>
  </div>

  <div class="col-lg-5 personal-info tab-pane fade" id="v-pills-password" role="tabpanel"
    aria-labelledby="v-pills-password-tab">
    <h3>Wachtwoord</h3>
    <div class="form-group">
      <label class="col-md-6 control-label">Current password:</label>
      <div class="col-md-10">
        <input class="form-control" type="password" name="currentPassword" id="password" value="{{ $user->password }}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-6 control-label">New password:</label>
      <div class="col-md-10">
        <input class="form-control" type="password" id="password" name="newPassword">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-6 control-label">Confirm password:</label>
      <div class="col-md-10">
        <input class="form-control" type="password" id="password" name="newPasswordConfirmation">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-6 control-label"></label>
      <div class="col-md-10">
        <input type="submit" class="btn btn-primary" value="Save Changes">
        <span></span>
        <input type="submit" class="btn btn-default" value="Cancel">
      </div>
    </div>
  </div>

</div>
</div>
</div>
<hr>
@endsection