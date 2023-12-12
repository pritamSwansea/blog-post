<div>
    
    @foreach ($comments as $comment)
        <livewire:comment-item :comment="$comment"/>
        
    @endforeach
    <livewire:comment-create :listing="$listing"/>
</div>
