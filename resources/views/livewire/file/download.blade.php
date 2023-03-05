<div>
    <p wire.debounce.500ms>Wait <span wire:poll.100ms>{{$this->time}}</span> second for creating download link</p>
    @if(Gate::allows('user-owner',$user->username) && $file->password)
    <h6 class="d-inline">
        Password:
    </h6> 
    <span class="d-flex gap-2 mb-2" id="copyArea">
        <input type="text" readonly value="{{$file->password}}" id="passwordCopy" class="form-control">
        <button class="btn btn-primary" onclick="copyPassword(this)">Copy</button>
    </span>
    @endif
    @if($time == 0)
        <small class="text-success">Download Link Prepared! you can download now...</small>
        @if ($hasPassword) 
        <form wire:submit.prevent="download">
            @csrf
            @method('post')
            <div class="my-2">
                <input type="password" placeholder="Please enter File password" wire:model="password" class="form-control">
                @if($error)
                    <small class="text-danger">
                        {{$error}}
                    </small>     
                @endif
            </div>
        </form>
        @endif
    @endif
    
    <button wire:click="download" class="d-block btn btn-success" <?php if($time > 0) echo 'disabled';?>>
        <span>Download</span>
    </button>
    <div class="mt-2">
        <h6>Share to Social media:</h6>
        <div class="w-full">
            <a class="btn btn-sm btn-outline-primary" href="https://telegram.me/share/url?url={{route('file.show',['username' => $user->username,'file' => $file->link])}}&text=See my file here">
                <i class="fa fa-telegram"></i>
            </a>
            <a class="btn btn-sm btn-outline-warning" href="http://www.facebook.com/sharer.php?u={{route('file.show',['username' => $user->username,'file' => $file->link])}}" target="_blank">
                <i class="fa fa-facebook"></i>
            </a>
            <a class="btn btn-sm btn-outline-info" href="https://twitter.com/intent/tweet?url={{route('file.show',['username' => $user->username,'file' => $file->link])}}&text=See my file here" target="_blank">
                <i class="fa fa-twitter"></i>
            </a>
            <a class="btn btn-sm btn-outline-success" href="whatsapp://send?text={{route('file.show',['username' => $user->username,'file' => $file->link])}}" target="_blank">
                <i class="fa fa-whatsapp"></i>
            </a>
        </div>
    </div>
</div>
