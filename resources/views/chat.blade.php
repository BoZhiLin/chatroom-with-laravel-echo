@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ChatRoom</div>

                <div class="card-body" id="messages">
                    
                </div>

                <div class="card-footer">
                    <form onsubmit="event.preventDefault()">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="message">
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary" id="send">發送</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('myScript')
<script src="{{ mix('js/app.js') }}"></script>
<script>
    Echo.channel('chat-room')
        .listen('PushNotification', e => {
            document.getElementById('messages').innerHTML += `<p>${e.user}說：${e.message}</p>`
        });

    window.addEventListener('load', () => {
        document.getElementById('send').addEventListener('click', () => {
            const content = document.getElementById('message').value;
            if (content.trim() !== '') {
                axios.post("{{ route('send-message') }}", { 
                        content
                    }).then(response => {
                        document.getElementById('message').value = '';
                    });
            }
        });
    });
</script>
@endsection
