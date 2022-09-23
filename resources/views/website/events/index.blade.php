<x-page-layout
    :page="$page">
    <x-slot name="content">
        <section class="p-5" style="background-color:#e8e3e3;">

            <div class="container-fluid date-picker p-4 " >
                <h2 class="text-center mb-5">Seach Events</h2>
                <form action="" method="">
                    <div class="row">
                        <div class="col-md-3 mx-auto mb-" style="border-bottom:1px solid #01023B;">
                            <label for="date" style="color:#01023B;">Date</label>
                            <input class="form-control event" type="date" name="event-date" id="">
                        </div>
                        <div class="col-md-3 mx-auto mb-2" style="border-bottom:1px solid #01023B">
                            <label for="time" style="color:#01023B;">Time</label>
                            <input class="form-control event" type="time" name="event-time" id="">
                        </div>
                        <div class="col-md-3 mx-auto mb-2" style="border-bottom:1px solid #01023B">
                            <label for="time" style="color:#01023B;"> Search by Name</label>
                            <input class="form-control event" type="search" name="event-search" id="" placeholder="">
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Search" class="btn float-end mt-3 me-5 px-4 py-2 " style="border-radius: 2px">
                    </div>
                </form>
            </div>

        </section>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="card p-3 shadow">
                        <h2 class="text-center p-3">Events</h2>
                        <nav class="mx-auto">
                            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                <button class="nav-link event-tab active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Events</button>
                                <button class="nav-link event-tab" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Upcoming Events</button>
                                <button class="nav-link event-tab" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Past Events</button>
                            </div>
                        </nav>
                        <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                
                                <div class="row justify-content-around">
                                    <div class="col-md-5">
                                        <div class="event_container">
                                            <div class="event_bg" style="background-image:url('{{asset('uploads/blog_new2.jpeg')}}') "></div>
                                            <div class="event_info">
                                              <div class="event_title">
                                                <h5>Christmas Challenge, so i can trust in others, you ask a question</h5>
                                              </div>
                                              <div class="event_desc">
                                                <p>a litle description of the event, before you make me this way, you make me this way.</p>
                                              </div>
                                              <div class="event_footer">
                                                <div class="event_date">
                                                  <p>16 de Dez, 2017</p>
                                                </div>
                                                <div class="event_more">
                                                  <a href="#" class="btn_more">
                                                    learn more
                                                  </a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="event_container">
                                            <div class="event_bg" style="background-image:url('{{asset('uploads/blog_new3.jpeg')}}') "></div>
                                            <div class="event_info">
                                              <div class="event_title">
                                                <h5>Christmas Challenge, so i can trust in others, you ask a question</h5>
                                              </div>
                                              <div class="event_desc">
                                                <p>a litle description of the event, before you make me this way, you make me this way.</p>
                                              </div>
                                              <div class="event_footer">
                                                <div class="event_date">
                                                  <p>16 de Dez, 2017</p>
                                                </div>
                                                <div class="event_more">
                                                  <a href="#" class="btn_more">
                                                    learn more
                                                  </a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="row justify-content-around">
                                    <div class="col-md-5">
                                        <div class="event_container">
                                            <div class="event_bg" style="background-image:url('{{asset('uploads/blog_new6.jpeg')}}') "></div>
                                            <div class="event_info">
                                              <div class="event_title">
                                                <h5>Christmas Challenge, so i can trust in others, you ask a question</h5>
                                              </div>
                                              <div class="event_desc">
                                                <p>a litle description of the event, before you make me this way, you make me this way.</p>
                                              </div>
                                              <div class="event_footer">
                                                <div class="event_date">
                                                  <p>16 de Dez, 2017</p>
                                                </div>
                                                <div class="event_more">
                                                  <a href="#" class="btn_more">
                                                    learn more
                                                  </a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="event_container">
                                            <div class="event_bg" style="background-image:url('{{asset('uploads/blog_new1.jpeg')}}') "></div>
                                            <div class="event_info">
                                              <div class="event_title">
                                                <h5>Christmas Challenge, so i can trust in others, you ask a question</h5>
                                              </div>
                                              <div class="event_desc">
                                                <p>a litle description of the event, before you make me this way, you make me this way.</p>
                                              </div>
                                              <div class="event_footer">
                                                <div class="event_date">
                                                  <p>16 de Dez, 2017</p>
                                                </div>
                                                <div class="event_more">
                                                  <a href="#" class="btn_more">
                                                    learn more
                                                  </a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="row justify-content-around">
                                    <div class="col-md-5">
                                        <div class="event_container">
                                            <div class="event_bg" style="background-image:url('{{asset('uploads/blog_new4.jpeg')}}') "></div>
                                            <div class="event_info">
                                              <div class="event_title">
                                                <h5>Christmas Challenge, so i can trust in others, you ask a question</h5>
                                              </div>
                                              <div class="event_desc">
                                                <p>a litle description of the event, before you make me this way, you make me this way.</p>
                                              </div>
                                              <div class="event_footer">
                                                <div class="event_date">
                                                  <p>16 de Dez, 2017</p>
                                                </div>
                                                <div class="event_more">
                                                  <a href="#" class="btn_more">
                                                    learn more
                                                  </a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="event_container">
                                            <div class="event_bg" style="background-image:url('{{asset('uploads/blog_new4.jpeg')}}') "></div>
                                            <div class="event_info">
                                              <div class="event_title">
                                                <h5>Christmas Challenge, so i can trust in others, you ask a question</h5>
                                              </div>
                                              <div class="event_desc">
                                                <p>a litle description of the event, before you make me this way, you make me this way.</p>
                                              </div>
                                              <div class="event_footer">
                                                <div class="event_date">
                                                  <p>16 de Dez, 2017</p>
                                                </div>
                                                <div class="event_more">
                                                  <a href="#" class="btn_more">
                                                    learn more
                                                  </a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="row justify-content-around">
                                    <div class="col-md-5">
                                        <div class="event_container">
                                            <div class="event_bg" style="background-image:url('{{asset('uploads/blog_new5.jpeg')}}') "></div>
                                            <div class="event_info">
                                              <div class="event_title">
                                                <h5>Christmas Challenge, so i can trust in others, you ask a question</h5>
                                              </div>
                                              <div class="event_desc">
                                                <p>a litle description of the event, before you make me this way, you make me this way.</p>
                                              </div>
                                              <div class="event_footer">
                                                <div class="event_date">
                                                  <p>16 de Dez, 2017</p>
                                                </div>
                                                <div class="event_more">
                                                  <a href="#" class="btn_more">
                                                    learn more
                                                  </a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="event_container">
                                            <div class="event_bg" style="background-image:url('{{asset('uploads/blog_new5.jpeg')}}') "></div>
                                            <div class="event_info">
                                              <div class="event_title">
                                                <h5>Christmas Challenge, so i can trust in others, you ask a question</h5>
                                              </div>
                                              <div class="event_desc">
                                                <p>a litle description of the event, before you make me this way, you make me this way.</p>
                                              </div>
                                              <div class="event_footer">
                                                <div class="event_date">
                                                  <p>16 de Dez, 2017</p>
                                                </div>
                                                <div class="event_more">
                                                  <a href="#" class="btn_more">
                                                    learn more
                                                  </a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </section>
       
    </x-slot>
</x-page-layout>
