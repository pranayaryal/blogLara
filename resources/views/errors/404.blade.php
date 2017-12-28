@extends('layouts.app')

@section('content')

<article class="post">
  <header class="post_header">
      <h1 class="post_title">Something broke. 5 tips to fix it with your 404 page.</h1>

      <div class="post_meta">
        <div class="author_avatar" style="background-image:url('/images/app/kevin-price.jpg');"></div>
        <div class="post_details"><a class="author_name" href="/profile/kevin-price" title="Kevin Price">Kevin Price</a> in Errors</div>
        <time class="post_date">2 days ago</time>
      </div>
  </header>

  <div class="post_image">
    <picture>
      <img srcset="/images/app/error-404.gif" alt="error-404">
    </picture>
  </div>

  <div class="post_content">
    <div class="content">
      <h3>1. Let me know</h3>
      <p>Your visitor has to know something went wrong and quickly. Although you’ll learn later that we certainly recommend having some fun with this part of your site, it still must do its first task: acknowledge an error has occurred, and that I’m still in a safe place that looks like your brand.</p>

      <h3>2. Take me back</h3>
      This one is pretty simple. Whether it be your logo in the main navigation or a separate CTA, let your guests get back to the start of their user journey.</p>

      <h3>3. Let me try that search again</h3>
      <p>There’s a reasonable chance that your guest reached this page on a typo. By providing a second chance to retry their dexterity in a search bar, you may very well have solved their problem in a very concise way.</p>

      <h3>4. Sell me something</h3>
      <p>Yeah, why not? If a visitor didn’t find what they were looking for, perhaps you have a reasonable guess as to which one of your products or services they do seek. This can mean that you should include contact information. Your sales funnel has hit a wall electronically. Get over that hurdle by closing with a personal response via phone, chat or email.</p>

      <h3>5. Entertain me</h3>
      <p>So, your visitor messed up or your site broke. Either way, they might be a little annoyed right now. This is a great opportunity to use the tone of your brand to get them back on your side, and, if you followed along with the tips above, redirected to a better destination. That’s what user experience is all about.</p>
    </div>
  </div>
</article>

<div class="subscribe" id="mailing_list">
    @include('mailing-list')
</div>

@endsection
