@php

	if($essence){
		$commentss = $essence->comments()->paginate(10);

		/*
		 * Группируем комментарии по полю parent_id. При этом данное поле становится ключами массива 
		 * коллекций содержащих модели комментариев
		 */
		$com = $commentss->where('status', 1)->groupBy('parent_id');
	} else $com = null;

@endphp

<!--Блок для вывода сообщения про отправку комментария-->
<div class="wrap_result"></div>


<div id="comments">

	<ol class="commentlist group">
		@if($com)
		@foreach($com as $k => $comments)
			<!--Выводим только родительские комментарии parent_id = 0-->
			
			@if($k)
				@break
			@endif

			@include('comments.comment', ['items' => $comments])

		@endforeach
		@endif
	</ol>
	{!! $commentss->render() !!}


	<div id="respond">
		<h3 id="reply-title">Написати <span>комментарій</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Отменить ответ</a></small></h3>
		<!--параметр action используется ajax-->
		<form action="{{ route('comment')}}" method="post" id="commentform">
			@if(!\Illuminate\Support\Facades\Auth::user())
				<div style="margin-bottom:  10px;">
			<p class="comment-form-author"><label for="name">Имя</label> <input id="name" name="name" type="text" value="" size="30" aria-required="true"></p>
			<p class="comment-form-email"><label for="email">Email</label> <input id="email" name="email" type="text" value="" size="30" aria-required="true"></p>
				</div>
			@endif
			<div>
				<textarea id="comment" name="text" cols="45" rows="8"></textarea>
			</div>
			<!--Данные поля так же нужны для работы JS - вставки формы сразу за комментарием на который нужно ответить--> 
			<input type="hidden" id="comment_post_ID" name="comment_post_ID" value="{{ $essence->id}}">
			<input type="hidden" id="comment_post_ID" name="commentable_type" value="{{ get_class($essence)}}">
			<input type="hidden" id="comment_parent" name="comment_parent" value="">

			{{ csrf_field()}}

			<div class="clear"></div>
			<p class="form-submit">
				<input name="submit" type="submit" id="submit" value="Отправить">
			</p>
		</form>
	</div>
	
</div>
