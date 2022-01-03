<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-dark border-b border-black-400">
        <div class="flex flex-row">
            <div class="text-center w-3/5">
                <h1 class="text-5xl">{{ $post['title']}}</h1>
            </div>
            @if(\Auth::user()->id === $post['user']['id'])
            <div class="text-center w-1/5">
                <a href="{{ route('post.edit.form', ['id' => $post['id']]) }}" class="inline-block align-middle pb-1 text-decoration-none text-green-500">
                    @component('components.edit')
                    @endcomponent
                </a>
                </div>
                <div class="text-center w-1/5">
                <form method="POST" action="{{ route('post.delete') }}" class="inline-block align-middle">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post['id'] }}" />
                    <button type="submit" class="border-0 bg-transparent text-red-400">
                        @component('components.delete')
                        @endcomponent
                    </button>
                </form>
                </div>
            @endif
        </div>
        <input id="input-1" name="input-1" class="rating rating-loading" data-display-only="true" data-min="0" data-max="5" data-step="1" value="{{ $post['averageRating'] }}" data-size="sm" disabled="">
        <p class="my-2">{{ $post['content'] }}</p>
        <form method="POST" action="{{ route('rating.save') }}" class="inline-block align-middle">
          @csrf
            <div class="rating">
            <input id="input-1" name="rate" class="rating rating-loading" data-show-caption="false" data-min="0" data-max="5" data-step="1" value="{{ $post->userAverageRating }}" data-size="xs">
            <input type="hidden" name="id" required="" value="{{ $post->id }}">
            <br/>
            <button class="btn btn-success">Submit Rating</button>
            </div>
        </form>
    </div>
</div>