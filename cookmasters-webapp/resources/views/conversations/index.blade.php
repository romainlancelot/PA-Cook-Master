@extends('layouts.app-master')

@section('title', 'Chat')


@section('content')
<style>
    	body,html{
			/* height: 100%; */
			margin: 0;
			background: #7F7FD5;
	        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
	        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
		}

		.chat{
			margin-top: auto;
			margin-bottom: auto;
		}
		.card{
			height: 500px;
			border-radius: 15px !important;
			background-color: rgba(0,0,0,0.4) !important;
		}
		.contacts_body{
			padding:  0.75rem 0 !important;
			overflow-y: auto;
			white-space: nowrap;
		}
		.msg_card_body{
			overflow-y: auto;
		}
		.card-header{
			border-radius: 15px 15px 0 0 !important;
			border-bottom: 0 !important;
		}
	 .card-footer{
		border-radius: 0 0 15px 15px !important;
			border-top: 0 !important;
	}
		.container{
			align-content: center;
		}
		.search{
			border-radius: 15px 0 0 15px !important;
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color:white !important;
		}
		.search:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.type_msg{
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color:white !important;
			height: 60px !important;
			overflow-y: auto;
		}
			.type_msg:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.attach_btn{
	border-radius: 15px 0 0 15px !important;
	background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.send_btn{
	border-radius: 0 15px 15px 0 !important;
	background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.search_btn{
			border-radius: 0 15px 15px 0 !important;
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.contacts{
			list-style: none;
			padding: 0;
		}
		.contacts li{
			width: 100% !important;
			padding: 5px 10px;
			margin-bottom: 15px !important;
		}
	.active{
			background-color: rgba(0,0,0,0.3);
	}
		.user_img{
			height: 70px;
			width: 70px;
			border:1.5px solid #f5f6fa;
		
		}
		.user_img_msg{
			height: 40px;
			width: 40px;
			border:1.5px solid #f5f6fa;
		
		}
	.img_cont{
			position: relative;
			height: 70px;
			width: 70px;
	}
	.img_cont_msg{
			height: 40px;
			width: 40px;
	}
	.online_icon{
		position: absolute;
		height: 15px;
		width:15px;
		background-color: #4cd137;
		border-radius: 50%;
		bottom: 0.2em;
		right: 0.4em;
		border:1.5px solid white;
	}
	.offline{
		background-color: #c23616 !important;
	}
	.user_info{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 15px;
	}
	.user_info span{
		font-size: 20px;
		color: white;
	}
	.user_info p{
	font-size: 10px;
	color: rgba(255,255,255,0.6);
	}
	.video_cam{
		margin-left: 50px;
		margin-top: 5px;
	}
	.video_cam span{
		color: white;
		font-size: 20px;
		cursor: pointer;
		margin-right: 20px;
	}
	.msg_cotainer{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd;
		padding: 10px;
		position: relative;
	}
	.msg_cotainer_send{
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78e08f;
		padding: 10px;
		position: relative;
	}
	.msg_time{
		position: absolute;
		left: 0;
		bottom: -15px;
		color: rgba(255,255,255,0.5);
		font-size: 10px;
	}
	.msg_time_send{
		position: absolute;
		right:0;
		bottom: -15px;
		color: rgba(255,255,255,0.5);
		font-size: 10px;
	}
	.msg_head{
		position: relative;
	}
	#action_menu_btn{
		position: absolute;
		right: 10px;
		top: 10px;
		color: white;
		cursor: pointer;
		font-size: 20px;
	}
	.action_menu{
		z-index: 1;
		position: absolute;
		padding: 15px 0;
		background-color: rgba(0,0,0,0.5);
		color: white;
		border-radius: 15px;
		top: 30px;
		right: 15px;
		display: none;
	}
	.action_menu ul{
		list-style: none;
		padding: 0;
	margin: 0;
	}
	.action_menu ul li{
		width: 100%;
		padding: 10px 15px;
		margin-bottom: 5px;
	}
	.action_menu ul li i{
		padding-right: 10px;
	
	}
	.action_menu ul li:hover{
		cursor: pointer;
		background-color: rgba(0,0,0,0.2);
	}
	@media(max-width: 576px){
	.contacts_card{
		margin-bottom: 15px !important;
	}
	}
    </style>
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
                                    <img src="" class="rounded-circle user_img">
                                </div>
                                <div class="user_info">
                                    <span>Général</span>
                                </div>
                            </div>
                        </li>
						@foreach ($contacts as $contacts)
							@if ($contacts->from_id != auth()->user()->id)
                        		<li id="contacts_{{ $contacts->fromUser->username }}" onclick="window.location.href = '{{ route('chat.show', $contacts->fromUser->username) }}'">
                        		    <div class="d-flex bd-highlight">
                        		        <div class="img_cont">
                        		            <img src="{{ secure_asset($contacts->fromUser->image) }}" class="rounded-circle user_img">
                        		        </div>
                        		        <div class="user_info">
                        		            <span>{{ $contacts->fromUser->firstname }} {{ $contacts->fromUser->lastname }}</span>
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
    @vite('resources/js/chat.js')

@endsection
