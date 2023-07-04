@extends('layouts.app-master')

@section('title', 'Chat')

@section('styles')
	<link rel="stylesheet" href="{{ secure_asset('assets/css/conversations.css') }}">
@endsection

@section('content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Chat</h1>
        <p class="fs-5 text-body-secondary">Chat with other cookmasters and share your recipes or tips.</p>
    </div>
    
    <div class="container-fluid h-100 mb-5">
        <div class="row justify-content-center h-100">
            <div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
                <div class="card-header">
                    <div class="input-group">
                        <input id="searchUser" type="text" placeholder="Search..." name="" class="form-control search">
                        <div class="input-group-prepend">
                            <span class="input-group-text search_btn"><i class="bi bi-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card-body contacts_body">
                    <ui id="contacts" class="contacts">
                        <li class="@if (!isset($to_user)) active @endif" onclick="window.location.href = '{{ route('chat.index') }}'">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="{{ secure_asset('/images/cookmaster-logo.png') }}" class="rounded-circle user_img">
                                </div>
                                <div class="user_info">
                                    <span>Général</span>
                                </div>
                            </div>
                        </li>
						@foreach ($contacts as $contact)
							@if ($contact->from_id != auth()->user()->id)
                        		<li id="contacts_{{ $contact->fromUser->username }}" @if (isset($to_user) && $contact->fromUser->username == $to_user->username) class="active" @endif onclick="window.location.href = '{{ route('chat.show', $contact->fromUser->username) }}'">
                        		    <div class="d-flex bd-highlight">
                        		        <div class="img_cont">
                        		            <img src="{{ secure_asset($contact->fromUser->image) }}" class="rounded-circle user_img">
                        		        </div>
                        		        <div class="user_info">
                        		            <span>{{ $contact->fromUser->firstname }} {{ $contact->fromUser->lastname }}</span>
                        		        </div>
                        		    </div>
                        		</li>
							@elseif ($contact->to_id != auth()->user()->id)
								<li id="contacts_{{ $contact->toUser->username }}" @if (isset($to_user) && $contact->toUser->username == $to_user->username) class="active" @endif onclick="window.location.href = '{{ route('chat.show', $contact->toUser->username) }}'">
								    <div class="d-flex bd-highlight">
								        <div class="img_cont">
								            <img src="{{ secure_asset($contact->toUser->image) }}" class="rounded-circle user_img">
								        </div>
								        <div class="user_info">
								            <span>{{ $contact->toUser->firstname }} {{ $contact->toUser->lastname }}</span>
								        </div>
								    </div>
								</li>
							@endif
						@endforeach
						@if (isset($newConversation) && $newConversation === true)
							<li id="contacts_{{ $to_user->username }}" class="active" onclick="window.location.href = '{{ route('chat.show', $to_user->username) }}'">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="{{ secure_asset($to_user->image) }}" class="rounded-circle user_img">
									</div>
									<div class="user_info">
										<span>{{ $to_user->firstname }} {{ $to_user->lastname }}</span>
									</div>
								</div>
							</li>
						@endif
                    </ui>
                </div>
                <div class="card-footer"></div>
            </div></div>
            <div class="col-md-8 col-xl-6 chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="@if (isset($to_user)) {{ secure_asset($to_user->image) }} @endif" class="rounded-circle user_img">
                            </div>
                            <div class="user_info">
								@if (isset($to_user))
									<span> {{ $to_user->firstname }} {{ $to_user->lastname }}</span>
								@else
									<span>Général</span>
								@endif
                            </div>
                        </div>
                    </div>
					<div id="chat-messages" class="card-body msg_card_body">
						@foreach ($conversation as $conv)
							@if ($conv->from_id != auth()->user()->id)
								<div class="d-flex justify-content-start mb-4">
	                        	    <div class="img_cont_msg">
	                        	        <img src="{{ secure_asset($conv->fromUser->image) }}" class="rounded-circle user_img_msg">
	                        	    </div>
	                        	    <div class="msg_cotainer">
										@if (!isset($to_user))
											<small class="text-muted">{{ $conv->fromUser->firstname }} {{ $conv->fromUser->lastname }}</small><br>
										@endif
	                        	        {{ $conv->message }}
	                        	        <span class="msg_time">{{ $conv->created_at->format('d/m H:i') }}</span>
	                        	    </div>
	                        	</div>
							@else
								<div class="d-flex justify-content-end mb-4">
	                        	    <div class="msg_cotainer_send">
	                        	        {{ $conv->message }}
	                        	        <span class="msg_time_send">{{ $conv->created_at->format('d/m H:i') }}</span>
	                        	    </div>
	                        	    <div class="img_cont_msg">
	                        	        <img src="{{ secure_asset(auth()->user()->image) }}" class="rounded-circle user_img_msg">
	                        	    </div>
	                        	</div>
							@endif
						@endforeach
					</div>
					<div class="card-footer">
                        <div class="input-group">
                            <input id="message" name="" class="form-control type_msg" placeholder="Type your message..."></input>
                            <div class="input-group-append">
                                <span id="submit-button" class="input-group-text send_btn h-100"><i class="bi bi-send-fill"></i></span>
                            </div>
                        </div>
                    </div>
                    <input id="user_id" type="hidden" value="{{ auth()->user()->id }}"></input>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/conversations.js')

@endsection
