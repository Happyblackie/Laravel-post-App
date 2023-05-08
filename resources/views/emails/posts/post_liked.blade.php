<x-mail::message>
# Your post was liked

{{ $liker->name }} liked one of your post.

<x-mail::button :url="''">
View post
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
