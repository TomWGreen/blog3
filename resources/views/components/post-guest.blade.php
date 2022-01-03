<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
  <div class="p-6 bg-dark border-b border-black-400">
    <h1 class="text-5xl">{{ $post['title']}}</h1>
    <input id="input-1" name="input-1" class="rating rating-loading" data-display-only="true" data-min="0" data-max="5" data-step="1" value="{{ $post['averageRating'] }}" data-size="sm" disabled="">
    <p class="my-2">{{ $post['content'] }}</p>
 </div>
</div>