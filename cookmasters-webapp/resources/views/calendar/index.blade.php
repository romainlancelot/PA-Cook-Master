@extends('layouts.app-master')

@section('title', 'Calendar')

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Calendar</h1>
        <p class="fs-5 text-body-secondary">Check the availability of the rooms and equipment and book them for your event.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="calendar"></div>
            </div>
        </div>
    </div>


    <article class="content">
        <aside class="sidebar">
          <div class="sidebar-item">
            <input class="checkbox-all" type="checkbox" id="all" value="all" checked="">
            <label class="checkbox checkbox-all" for="all">View all</label>
          </div>
          <hr>
          <div class="sidebar-item">
            <input type="checkbox" id="1" value="1" checked="">
            <label class="checkbox checkbox-calendar checkbox-1" for="1">My Calendar</label>
          </div>
          <div class="sidebar-item">
            <input type="checkbox" id="2" value="2" checked="">
            <label class="checkbox checkbox-calendar checkbox-2" for="2">Work</label>
          </div>
          <div class="sidebar-item">
            <input type="checkbox" id="3" value="3" checked="">
            <label class="checkbox checkbox-calendar checkbox-3" for="3">Family</label>
          </div>
          <div class="sidebar-item">
            <input type="checkbox" id="4" value="4" checked="">
            <label class="checkbox checkbox-calendar checkbox-4" for="4">Friends</label>
          </div>
          <div class="sidebar-item">
            <input type="checkbox" id="5" value="5" checked="">
            <label class="checkbox checkbox-calendar checkbox-5" for="5">Travel</label>
          </div>
          <hr>
          <div class="app-footer">© NHN Cloud Corp.</div>
        </aside>
        <section class="app-column">
          <nav class="navbar">
            <div class="dropdown">
              <div class="dropdown-trigger">
                <button class="button is-rounded" aria-haspopup="true" aria-controls="dropdown-menu">
                  <span class="button-text"></span>
                  <span class="dropdown-icon toastui-calendar-icon toastui-calendar-ic-dropdown-arrow"></span>
                </button>
              </div>
              <div class="dropdown-menu">
                <div class="dropdown-content">
                  <a href="#" class="dropdown-item" data-view-name="month">Monthly</a>
                  <a href="#" class="dropdown-item" data-view-name="week">Weekly</a>
                  <a href="#" class="dropdown-item" data-view-name="day">Daily</a>
                </div>
              </div>
            </div>
            <button class="button is-rounded today">Today</button>
            <button class="button is-rounded prev">
              <img alt="prev" src="./images/ic-arrow-line-left.png" srcset="
                  ./images/ic-arrow-line-left@2x.png 2x,
                  ./images/ic-arrow-line-left@3x.png 3x
                ">
            </button>
            <button class="button is-rounded next">
              <img alt="prev" src="./images/ic-arrow-line-right.png" srcset="
                  ./images/ic-arrow-line-right@2x.png 2x,
                  ./images/ic-arrow-line-right@3x.png 3x
                ">
            </button>
            <span class="navbar--range"></span>
            <div class="nav-checkbox">
              <input class="checkbox-collapse" type="checkbox" id="collapse" value="collapse">
              <label for="collapse">Collapse duplicate events and disable the detail popup</label>
            </div>
          </nav>
          <main id="app"></main>
        </section>

    @section('scripts')
        <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
        <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    @endsection

@endsection
