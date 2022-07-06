<nav class="navbar-expand-xxl bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('fakty.index') }}" role="button" data-bs-toggle="dropdown">
                    FAKTY
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                          <a class="dropdown-item" href="{{ route('fakty.index') }}">
                              Strona główna
                          </a>
                          @foreach($categories as $category)
                            @if($category->section == 'Fakty')
                            <a class="dropdown-item" href="{{ route('fakty.category', ['category' => $category->category]) }}">
                                {{$category->category}}
                            </a>
                            @endif
                          @endforeach
                          <!--<div class="podglad-reszta">
                              <a class="dropdown-item">
                                  TEEEEEEEEEEEEEEEEST
                              </a>
                          </div> !-->
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('biznes.index') }}" role="button" data-bs-toggle="dropdown">
                    BIZNES
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('biznes.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Biznes')
                          <a class="dropdown-item" href="{{ route('biznes.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('sport.index') }}" role="button" data-bs-toggle="dropdown">
                    SPORT
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('sport.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Sport')
                          <a class="dropdown-item" href="{{ route('sport.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('salonpolityczny.index') }}" role="button" data-bs-toggle="dropdown">
                    SALON POLITYCZNY
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('salonpolityczny.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Salon polityczny')
                          <a class="dropdown-item" href="{{ route('salonpolityczny.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('kfd.index') }}" role="button" data-bs-toggle="dropdown">
                    KOBIETA, FACET DZIECKO
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('kfd.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Kobieta facet dziecko')
                          <a class="dropdown-item" href="{{ route('kfd.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('hobby.index') }}" role="button" data-bs-toggle="dropdown">
                    HOBBY
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('hobby.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Hobby')
                          <a class="dropdown-item" href="{{ route('hobby.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('kultura.index') }}" role="button" data-bs-toggle="dropdown">
                    KULTURA
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('kultura.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Kultura')
                          <a class="dropdown-item" href="{{ route('kultura.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('motoryzacja.index') }}" role="button" data-bs-toggle="dropdown">
                    MOTORYZACJA
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('motoryzacja.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Motoryzacja')
                          <a class="dropdown-item" href="{{ route('motoryzacja.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('naukaitechnologie.index') }}" role="button" data-bs-toggle="dropdown">
                    NAUKA I TECHNOLOGIE
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('naukaitechnologie.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Nauka i Technologie')
                          <a class="dropdown-item" href="{{ route('naukaitechnologie.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('historia.index') }}" role="button" data-bs-toggle="dropdown">
                    HISTORIA
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('historia.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Historia')
                          <a class="dropdown-item" href="{{ route('historia.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('sluzbymundurowe.index') }}" role="button" data-bs-toggle="dropdown">
                    SŁUŻBY MUNDUROWE
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('sluzbymundurowe.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Sluzby mundurowe')
                          <a class="dropdown-item" href="{{ route('sluzbymundurowe.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('turystyka.index') }}" role="button" data-bs-toggle="dropdown">
                    TURYSTYKA
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('turystyka.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Turystyka')
                          <a class="dropdown-item" href="{{ route('turystyka.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('spoleczenstwo.index') }}" role="button" data-bs-toggle="dropdown">
                    SPOŁECZEŃŚTWO
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <div class="podglad">
                      <div class="podglad-menu">
                        <a class="dropdown-item" href="{{ route('spoleczenstwo.index') }}">
                            Strona główna
                        </a>
                        @foreach($categories as $category)
                          @if($category->section == 'Spoleczenstwo')
                          <a class="dropdown-item" href="{{ route('spoleczenstwo.category', ['category' => $category->category]) }}">
                              {{$category->category}}
                          </a>
                          @endif
                        @endforeach
                      </div>
                  </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
