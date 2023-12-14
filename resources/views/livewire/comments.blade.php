<div>
    
    <livewire:comment-create :listing="$listing"/>
    @foreach ($comments as $comment)
        <livewire:comment-item :comment="$comment"
        wire:key="comment-{{$comment->id}}"/>
        
    @endforeach
</div>
