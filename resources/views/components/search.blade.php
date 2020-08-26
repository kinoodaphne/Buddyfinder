<div class="jumbotron">
  <section class="container">
    <form action="/filter" method="post">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
              <select class="form-control search-slt" id="exampleFormControlSelect1" name="study_field">
                <option>Selecteer je keuzerichting</option>
                <option>Design</option>
                <option>Development</option>
                <option>UX</option>
                <option>UI</option>
              </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
              <select class="form-control search-slt" id="exampleFormControlSelect1" name="year">
                <option>Selecteer een jaar</option>
                <option>1IMD</option>
                <option>2IMD</option>
                <option>3IMD</option>
              </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
              <select class="form-control search-slt" id="exampleFormControlSelect1" name="music">
                <option>Muziek</option>
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
            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
              <select class="form-control search-slt" id="exampleFormControlSelect1" name="books">
                <option>Boeken</option>
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
            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
              <select class="form-control search-slt" id="exampleFormControlSelect1" name="gaming">
                <option>Games</option>
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
            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
              <select class="form-control search-slt" id="exampleFormControlSelect1" name="series">
                <option>Series</option>
                <option>Internationaal</option>
                <option>Nationaal</option>
                <option>Nieuws</option>
                <option>Quiz</option>
                <option>Sport</option>
                <option>Andere</option>
              </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
              <select class="form-control search-slt" id="exampleFormControlSelect1" name="travel">
                <option>Reizen</option>
                <option>Noord-Amerika</option>
                <option>Zuid-Amerika</option>
                <option>Europa</option>
                <option>Afrika</option>
                <option>Azië</option>
                <option>Australië</option>
                <option>Antartica</option>
              </select>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
              <input type="submit" class="btn btn-primary wrn-btn" value="Zoek">
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>