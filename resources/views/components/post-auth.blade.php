<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-dark border-b border-black-400">
        <div class="flex flex-row">
            <div class="text-center w-3/5">
                <h1 class="text-xl md:text-2xl">{{ $post['title']}}</h1>
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
        <p class="my-2">{{ $post['content'] }}</p>
    </div>
</div>