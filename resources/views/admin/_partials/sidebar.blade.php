  @php
      
      $id = Request::route('id');
      
      if ($id !== null) {
          $guruedit = URL::route('admin.lecturer.edit', ['id' => $id]);
          $mapeledit = URL::route('admin.courses.edit', ['id' => $id]);
          $pengampuedit = URL::route('admin.teach.edit', ['id' => $id]);
          $roomedit = URL::route('admin.room.edit', ['id' => $id]);
          $useredit = URL::route('admin.user.edit', ['id' => $id]);
          $timeedit = URL::route('admin.time.edit', ['id' => $id]);
          $dayedit = URL::route('admin.day.edit', ['id' => $id]);
          $notedit = URL::route('admin.timenotavailable.edit', ['id' => $id]);
          $hasilgenerate = URL::route('admin.generates.result', ['id' => $id]);
      } else {
          $guruedit = 1; // Handle jika parameter id tidak ditemukan dalam URL
          $mapeledit = 1;
          $pengampuedit = 1;
          $roomedit = 1;
          $useredit = 1;
          $timeedit = 1;
          $dayedit = 1;
          $notedit = 1;
          $hasilgenerate = 1;
      }
      
      $url = url()->current();
      $dashboard = URL::route('admin.dashboard');
      $guru = URL::route('admin.lecturers');
      $guruadd = URL::route('admin.lecturer.create');
      $mapel = URL::route('admin.courses');
      $mapeladd = URL::route('admin.courses.create');
      $pengampu = URL::route('admin.teachs');
      $pengampuadd = URL::route('admin.teach.create');
      $room = URL::route('admin.rooms');
      $roomadd = URL::route('admin.room.create');
      $user = URL::route('admin.user');
      $useradd = URL::route('admin.user.create');
      $time = URL::route('admin.times');
      $timeadd = URL::route('admin.time.create');
      $day = URL::route('admin.days');
      $dayadd = URL::route('admin.day.create');
      $not = URL::route('admin.timenotavailables');
      $notadd = URL::route('admin.timenotavailable.create');
      $generate = URL::route('admin.generates');
      
  @endphp

  <nav class="side-nav">
      <a href="{{ route('admin.dashboard') }}" class="intro-x flex items-center pl-5 pt-4">
          <img alt="Midone - HTML Admin Template" class="w-12" src="{{ asset('backend/dist/images/smk1.png') }}">
          <span class="hidden xl:block text-white text-lg ml-3">SMK MUTU Pekanbaru
          </span>
      </a>
      <div class="side-nav__devider my-6"></div>
      <ul>
          <li>
              @if ($url == $dashboard)
                  <a href="{{ route('admin.dashboard') }}" class="side-menu  side-menu--active">
                  @else
                      <a href="{{ route('admin.dashboard') }}" class="side-menu ">
              @endif
              <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
              <div class="side-menu__title">
                  Dashboard
              </div>
              </a>

          </li>
          <li>
              @if ($url == $time)
                  <a href="javascript:;" class="side-menu  side-menu--active">
                  @elseif ($url == $timeadd)
                      <a href="javascript:;" class="side-menu  side-menu--active">
                      @elseif ($url == $timeedit)
                          <a href="javascript:;" class="side-menu  side-menu--active">
                          @elseif ($url == $day)
                              <a href="javascript:;" class="side-menu  side-menu--active">
                              @elseif ($url == $dayedit)
                                  <a href="javascript:;" class="side-menu  side-menu--active">
                                  @elseif ($url == $dayadd)
                                      <a href="javascript:;" class="side-menu  side-menu--active">
                                      @elseif ($url == $notedit)
                                          <a href="javascript:;" class="side-menu  side-menu--active">
                                          @elseif ($url == $notadd)
                                              <a href="javascript:;" class="side-menu  side-menu--active">
                                              @elseif ($url == $not)
                                                  <a href="javascript:;" class="side-menu  side-menu--active">
                                                  @else
                                                      <a href="javascript:;" class="side-menu ">
              @endif
              <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
              <div class="side-menu__title">
                  Data Waktu
                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
              </div>
              </a>
              <ul class="">
                  <li>
                      <a href="{{ route('admin.times') }}" class="side-menu">
                          <div class="side-menu__icon"> <i data-lucide="clock"></i> </div>
                          <div class="side-menu__title"> Jam </div>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('admin.days') }}" class="side-menu">
                          <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                          <div class="side-menu__title"> Hari </div>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('admin.timenotavailables') }}" class="side-menu">
                          <div class="side-menu__icon"> <i data-lucide="clock"></i> </div>
                          <div class="side-menu__title"> Waktu Berhalangan</div>
                      </a>
                  </li>
              </ul>
          </li>

          <li>
              @if ($url == $guru)
                  <a href="{{ route('admin.lecturers') }}" class="side-menu  side-menu--active">
                  @elseif ($url == $guruadd)
                      <a href="{{ route('admin.lecturers') }}" class="side-menu  side-menu--active">
                      @elseif ($url == $guruedit)
                          <a href="{{ route('admin.lecturers') }}" class="side-menu  side-menu--active">
                          @else
                              <a href="{{ route('admin.lecturers') }}" class="side-menu ">
              @endif

              <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
              <div class="side-menu__title"> Guru</div>
              </a>
          </li>
          <li>
              @if ($url == $mapel)
                  <a href="{{ route('admin.courses') }}" class="side-menu  side-menu--active">
                  @elseif ($url == $mapeladd)
                      <a href="{{ route('admin.courses') }}" class="side-menu  side-menu--active">
                      @elseif ($url == $mapeledit)
                          <a href="{{ route('admin.courses') }}" class="side-menu  side-menu--active">
                          @else
                              <a href="{{ route('admin.courses') }}" class="side-menu ">
              @endif
              <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
              <div class="side-menu__title"> Mata Pelajaran </div>
              </a>
          </li>
          <li>
              @if ($url == $pengampu)
                  <a href="{{ route('admin.teachs') }}" class="side-menu  side-menu--active">
                  @elseif ($url == $pengampuadd)
                      <a href="{{ route('admin.teachs') }}" class="side-menu  side-menu--active">
                      @elseif ($url == $pengampuedit)
                          <a href="{{ route('admin.teachs') }}" class="side-menu  side-menu--active">
                          @else
                              <a href="{{ route('admin.teachs') }}" class="side-menu">
              @endif
              <div class="side-menu__icon"> <i data-lucide="landmark"></i> </div>
              <div class="side-menu__title"> Pengampu </div>
              </a>
          </li>
          <li>
              @if ($url == $room)
                  <a href="{{ route('admin.teachs') }}" class="side-menu  side-menu--active">
                  @elseif ($url == $roomadd)
                      <a href="{{ route('admin.rooms') }}" class="side-menu  side-menu--active">
                      @elseif ($url == $roomedit)
                          <a href="{{ route('admin.rooms') }}" class="side-menu  side-menu--active">
                          @else
                              <a href="{{ route('admin.rooms') }}" class="side-menu">
              @endif
              <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
              <div class="side-menu__title"> Ruangan</div>
              </a>
          </li>
          <li>
              @if ($url == $user)
                  <a href="{{ route('admin.user') }}" class="side-menu  side-menu--active">
                  @elseif ($url == $useradd)
                      <a href="{{ route('admin.user') }}" class="side-menu  side-menu--active">
                      @elseif ($url == $useredit)
                          <a href="{{ route('admin.user') }}" class="side-menu  side-menu--active">
                          @else
                              <a href="{{ route('admin.user') }}" class="side-menu">
              @endif
              <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
              <div class="side-menu__title"> User</div>
              </a>
          </li>

          <li>
              @if ($url == $generate)
                  <a href="javascript:;" class="side-menu  side-menu--active">
                  @elseif ($url == $hasilgenerate)
                      <a href="javascript:;" class="side-menu  side-menu--active">
                      @else
                          <a href="javascript:;" class="side-menu">
              @endif
              <div class="side-menu__icon"> <i data-lucide="file-plus"></i> </div>
              <div class="side-menu__title">
                  Generate Jadwal
                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
              </div>
              </a>
              <ul class="">
                  <li>
                      <a href="{{ route('admin.generates') }}" class="side-menu">
                          <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                          <div class="side-menu__title"> Input Generate Jadwal</div>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('admin.generates.result', 1) }}"class="side-menu">
                          <div class="side-menu__icon"> <i data-lucide="folder-plus"></i> </div>
                          <div class="side-menu__title"> Hasil Generate Jadwal </div>
                      </a>
                  </li>

              </ul>
          </li>

      </ul>
  </nav>