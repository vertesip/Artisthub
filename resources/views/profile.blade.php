@extends('layouts.hometemplate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="https://i1.sndcdn.com/avatars-000681400931-9mhkyo-t200x200.jpg" class="rounded-circle">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    <a href="#">Add new post</a>
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>153</strong> posts</div>
                    <div class="pr-5"><strong>23k</strong> followers</div>
                    <div class="pr-W5"><strong>153</strong> following</div>
                </div>
                <p></p>
                <a href="www.doolemusic.com" target="_blank"> doolemusic.com</a><br>
                <br>
                𝐑𝐞𝐬𝐢𝐝𝐞𝐧𝐭 𝐃𝐉 𝐚𝐭<br>

                • 𝐁𝐚𝐬𝐬 𝐌𝐚𝐟𝐢𝐚: www.facebook.com/bassmafiabudapest/<br>
                • 𝐍𝐊𝐓𝐁: www.facebook.com/newkidsonthebass/<br>
            </div>
        </div>


    </div>



@endsection
