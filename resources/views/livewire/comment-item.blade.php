<div>
    <div class="flex mb-4 gap-3">
        <div  class="w-12 h-12 flex items-center justify-content-center bg-secondary rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
              

        </div>
        <div>
            <div>
                <a href="/listings/user/{{$comment->user->id}}" class="font-semibold text-indigp-600">
                    {{$comment->user->name}}
                </a>
                - {{$comment->updated_at->diffForHumans()}}
            </div>
            @if ($editing)
                <livewire:comment-create :comment-model="$comment"/>
            @else
            <div>
               {{$comment->comment}} 
            </div>
            @endif
            <div >
                @if(Auth::id() == $comment->user_id)
                 <a wire:click.prevent="startCommentEdit" class="text-sm primary" href="">Edit</a> |
                <a wire:click.prevent="deleteComment"
                 class="text-sm" href="">Delete</a>
                @endif
            </div>
        </div>
        
    </div>
</div>
